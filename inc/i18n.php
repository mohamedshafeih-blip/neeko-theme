<?php
/**
 * Neeko languages: English at /, translations at /ms/, /zh/, /ar/.
 *
 * Templates stay in plain English. On a translated URL the finished HTML is
 * passed through a dictionary (lang/{code}.json: "English text" => "translation"):
 * text between tags, alt/title/aria-label/placeholder/meta content, and quoted
 * strings inside inline scripts (pricing data, JSON-LD). Internal links get the
 * language prefix. New pages need nothing extra: add their strings to the files.
 *
 * lang/{code}.json: {"live": false, "strings": {}}
 *   live false = URL works for checking (noindex), hidden from the switcher and hreflang.
 *   live true  = public: switcher link, hreflang, indexable.
 * Admins: add ?nk_i18n=missing to a translated URL to get that page's untranslated strings as JSON
 * (value "page" = visible text/attribute, "script" = string in an inline script: only translate the
 * script ones that are shown to visitors, never class names, ids or event names).
 */

function nk_langs() {
	return array(
		'en' => array( 'name' => 'English', 'short' => 'EN', 'locale' => 'en-MY', 'og' => 'en_MY' ),
		'ms' => array( 'name' => 'Bahasa Melayu', 'short' => 'BM', 'locale' => 'ms-MY', 'og' => 'ms_MY' ),
		'zh' => array( 'name' => '中文', 'short' => '中文', 'locale' => 'zh-Hans-MY', 'og' => 'zh_CN' ),
		'ar' => array( 'name' => 'العربية', 'short' => 'عربي', 'locale' => 'ar', 'og' => 'ar_AR', 'rtl' => true ),
	);
}

/** Dictionary file for a language, or null when that language isn't set up. */
function nk_lang_file( $code ) {
	static $c = array();
	if ( ! array_key_exists( $code, $c ) ) {
		$f = NK_DIR . '/lang/' . $code . '.json';
		$j = ( 'en' !== $code && is_readable( $f ) ) ? json_decode( file_get_contents( $f ), true ) : null;
		$c[ $code ] = is_array( $j ) ? $j : null;
	}
	return $c[ $code ];
}
function nk_lang_live( $code ) {
	if ( 'en' === $code ) return true;
	$j = nk_lang_file( $code );
	return $j && ! empty( $j['live'] );
}
function nk_lang() { return defined( 'NK_LANG' ) ? NK_LANG : 'en'; }

/* Route: /ms/about/ is served as /about/ with NK_LANG = ms. Runs before WordPress parses the request. */
if ( ! defined( 'NK_LANG' ) && ! is_admin() && isset( $_SERVER['REQUEST_URI'] ) ) {
	if ( preg_match( '#^/(ms|zh|ar)(/|\?|$)#', $_SERVER['REQUEST_URI'], $m ) && nk_lang_file( $m[1] ) ) {
		define( 'NK_LANG', $m[1] );
		$GLOBALS['nk_path'] = '/' . ltrim( substr( $_SERVER['REQUEST_URI'], strlen( $m[1] ) + 1 ), '/' );
		$_SERVER['REQUEST_URI'] = $GLOBALS['nk_path'];
	}
}
if ( ! isset( $GLOBALS['nk_path'] ) ) $GLOBALS['nk_path'] = isset( $_SERVER['REQUEST_URI'] ) ? $_SERVER['REQUEST_URI'] : '/';

/** Same page in another language (path only, query kept off). */
function nk_lang_url( $code, $path = null ) {
	$p = strtok( null === $path ? $GLOBALS['nk_path'] : $path, '?#' );
	$GLOBALS['nk_raw'] = true;
	$u = home_url( 'en' === $code ? $p : '/' . $code . $p );
	$GLOBALS['nk_raw'] = false;
	return $u;
}

if ( 'en' !== nk_lang() ) {
	/* Every home_url() link (menus, permalinks, canonical) carries the prefix. */
	add_filter( 'home_url', function ( $url, $path ) {
		if ( ! empty( $GLOBALS['nk_raw'] ) || is_admin() ) return $url;
		if ( preg_match( '#^/?(wp-|xmlrpc|feed)#', (string) $path ) ) return $url;
		$base = untrailingslashit( preg_replace( '#(https?://[^/]+).*#', '$1', $url ) );
		$rest = substr( $url, strlen( $base ) );
		return $base . '/' . NK_LANG . ( '' === $rest ? '/' : $rest );
	}, 10, 2 );
	remove_action( 'template_redirect', 'redirect_canonical' );
	add_filter( 'language_attributes', function ( $out ) {
		$l = nk_langs()[ NK_LANG ];
		return 'lang="' . esc_attr( $l['locale'] ) . '"' . ( ! empty( $l['rtl'] ) ? ' dir="rtl"' : '' );
	} );
	add_filter( 'wp_robots', function ( $r ) {
		return nk_lang_live( NK_LANG ) ? $r : array( 'noindex' => true, 'follow' => true );
	}, 100 );
	add_action( 'template_redirect', function () {
		ob_start( 'nk_i18n_buffer' );
	}, 0 );
	if ( 'ar' === NK_LANG ) {
		add_action( 'wp_enqueue_scripts', function () {
			wp_enqueue_style( 'nk-font-ar', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap', array(), null );
		}, 21 );
	}
} else {
	add_filter( 'language_attributes', function () { return 'lang="en-MY"'; } );
}

/* hreflang for every public language + x-default. */
add_action( 'wp_head', function () {
	if ( is_404() || is_search() ) return;
	$out = '';
	foreach ( nk_langs() as $code => $l ) {
		if ( nk_lang_live( $code ) ) $out .= '<link rel="alternate" hreflang="' . esc_attr( $l['locale'] ) . '" href="' . esc_url( nk_lang_url( $code ) ) . '">';
	}
	if ( substr_count( $out, 'hreflang' ) < 2 ) return; // English only: nothing to declare yet.
	echo $out . '<link rel="alternate" hreflang="x-default" href="' . esc_url( nk_lang_url( 'en' ) ) . '">' . "\n";
}, 6 );

/** Header switcher (desktop dropdown) and mobile pills. */
function nk_lang_switch( $mobile = false ) {
	$cur = nk_lang();
	$L   = nk_langs();
	$items = '';
	foreach ( $L as $code => $l ) {
		$nm = '<bdi lang="' . esc_attr( $l['locale'] ) . '"' . ( ! empty( $l['rtl'] ) ? ' dir="rtl"' : '' ) . '>' . esc_html( $l['name'] ) . '</bdi>';
		if ( $code === $cur || nk_lang_live( $code ) ) {
			$items .= '<a href="' . esc_url( nk_lang_url( $code ) ) . '" hreflang="' . esc_attr( $l['locale'] ) . '"' . ( $code === $cur ? ' aria-current="true"' : '' ) . '>' . $nm . '</a>';
		} else {
			$items .= '<span aria-disabled="true">' . $nm . '<em lang="en">Soon</em></span>';
		}
	}
	if ( $mobile ) return '<div class="lgp" role="group" aria-label="Language">' . $items . '</div>';
	return '<div class="lgs"><button type="button" class="lgb" aria-haspopup="true" aria-expanded="false" onclick="this.setAttribute(\'aria-expanded\',this.getAttribute(\'aria-expanded\')!==\'true\')" aria-label="Language: ' . esc_attr( $L[ $cur ]['name'] ) . '"><svg aria-hidden="true"><use href="#i-globe"/></svg><span>' . esc_html( $L[ $cur ]['short'] ) . '</span><svg class="cv" aria-hidden="true"><use href="#i-cv"/></svg></button><div class="lgm">' . $items . '</div></div>';
}

/* ---------- Translation pass ---------- */

function nk_i18n_key( $s ) {
	return trim( preg_replace( '/\s+/u', ' ', html_entity_decode( $s, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) ) );
}
function nk_i18n_get( $s ) {
	static $d = null;
	if ( null === $d ) { $j = nk_lang_file( NK_LANG ); $d = ( $j && ! empty( $j['strings'] ) ) ? $j['strings'] : array(); }
	$k = nk_i18n_key( $s );
	if ( '' === $k || ! preg_match( '/\p{L}/u', $k ) ) return null;
	if ( isset( $d[ $k ] ) && '' !== $d[ $k ] ) return $d[ $k ];
	if ( ! isset( $GLOBALS['nk_missing'][ $k ] ) ) $GLOBALS['nk_missing'][ $k ] = empty( $GLOBALS['nk_in_js'] ) ? 'page' : 'script';
	return null;
}
function nk_i18n_text( $raw ) {
	$t = nk_i18n_get( $raw );
	if ( null === $t ) return $raw;
	preg_match( '/^\s*/u', $raw, $a );
	preg_match( '/\s*$/u', $raw, $b );
	return $a[0] . htmlspecialchars( $t, ENT_NOQUOTES, 'UTF-8', false ) . $b[0];
}
/** Root-relative or same-site page link → language-prefixed. Files, wp-*, anchors and other sites untouched. */
function nk_i18n_href( $h ) {
	$GLOBALS['nk_raw'] = true;
	$home = untrailingslashit( home_url() );
	$GLOBALS['nk_raw'] = false;
	$p = 0 === strpos( $h, $home . '/' ) ? substr( $h, strlen( $home ) ) : $h;
	if ( '/' !== substr( $p, 0, 1 ) || '//' === substr( $p, 0, 2 ) ) return $h;
	if ( preg_match( '#^/(ms|zh|ar|en)(/|$)#', $p ) || preg_match( '#^/(wp-|feed|xmlrpc)#', $p ) || preg_match( '#\.[a-z0-9]{2,5}($|\?)#i', strtok( $p, '#' ) ) ) return $h;
	return ( $p === $h ? '' : $home ) . '/' . NK_LANG . $p;
}
function nk_i18n_js( $code ) {
	return preg_replace_callback( '/"((?:[^"\\\\\n]|\\\\.)*)"|\'((?:[^\'\\\\\n]|\\\\.)*)\'/u', function ( $m ) {
		if ( isset( $m[2] ) && '' !== $m[2] ) {
			$s = str_replace( array( "\\'", '\\\\' ), array( "'", '\\' ), $m[2] );
			$t = nk_i18n_get( $s );
			return null === $t ? $m[0] : "'" . str_replace( array( '\\', "'" ), array( '\\\\', "\\'" ), $t ) . "'";
		}
		$s = json_decode( '"' . $m[1] . '"' );
		if ( ! is_string( $s ) ) return $m[0];
		$t = nk_i18n_get( $s );
		return null === $t ? $m[0] : json_encode( $t, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES );
	}, $code );
}
function nk_i18n_buffer( $html ) {
	if ( '' === $html || false === stripos( $html, '<html' ) ) return $html;
	$GLOBALS['nk_missing'] = array();
	$parts = preg_split( '#(<script\b[^>]*>.*?</script>|<style\b[^>]*>.*?</style>|<!--.*?-->)#is', $html, -1, PREG_SPLIT_DELIM_CAPTURE );
	foreach ( $parts as $i => &$p ) {
		if ( $i % 2 ) {
			// Inline scripts: page data and JSON-LD. External scripts and styles stay as they are.
			if ( preg_match( '#^(<script\b[^>]*>)(.*)(</script>)$#is', $p, $m ) && '' !== trim( $m[2] ) && false === stripos( $m[1], ' src=' ) ) {
				$GLOBALS['nk_in_js'] = true;
				$p = $m[1] . nk_i18n_js( $m[2] ) . $m[3];
				$GLOBALS['nk_in_js'] = false;
			}
			continue;
		}
		$p = preg_replace_callback( '/>([^<]+)</u', function ( $m ) { return '>' . nk_i18n_text( $m[1] ) . '<'; }, $p );
		$p = preg_replace_callback( '/\s(alt|title|aria-label|placeholder|content|data-tip)="([^"]*)"/u', function ( $m ) {
			$t = nk_i18n_get( $m[2] );
			return null === $t ? $m[0] : ' ' . $m[1] . '="' . esc_attr( $t ) . '"';
		}, $p );
		$p = preg_replace_callback( '/<a\b[^>]*>/i', function ( $m ) {
			if ( false !== stripos( $m[0], 'hreflang=' ) ) return $m[0];
			return preg_replace_callback( '/\shref="([^"]*)"/', function ( $h ) { return ' href="' . nk_i18n_href( $h[1] ) . '"'; }, $m[0] );
		}, $p );
	}
	unset( $p );
	$html = implode( '', $parts );
	$html = preg_replace( '#(<meta property="og:url" content=")[^"]*"#', '${1}' . esc_url( nk_lang_url( NK_LANG ) ) . '"', $html );
	$html = preg_replace( '#(<meta property="og:locale" content=")[^"]*"#', '${1}' . nk_langs()[ NK_LANG ]['og'] . '"', $html );
	if ( isset( $_GET['nk_i18n'] ) && 'missing' === $_GET['nk_i18n'] && current_user_can( 'manage_options' ) ) {
		if ( ! headers_sent() ) header( 'Content-Type: application/json; charset=utf-8' );
		return json_encode( $GLOBALS['nk_missing'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT );
	}
	return $html;
}
