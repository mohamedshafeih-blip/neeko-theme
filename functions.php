<?php
/**
 * Neeko theme. Lightweight, no page builder.
 */
define( 'NK_VER', '1.0.0' );
define( 'NK_URI', get_template_directory_uri() );
define( 'NK_DIR', get_template_directory() );
require NK_DIR . '/inc/services.php';
require NK_DIR . '/inc/i18n.php';

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'script', 'style' ) );
} );

/** Which approved design is this request? */
function nk_page_key() {
	if ( is_front_page() ) return 'home';
	if ( is_page( 'website-design' ) ) return 'website-design';
	if ( is_page( 'seo' ) ) return 'seo';
	if ( is_page( 'social-media' ) ) return 'social-media';
	if ( is_page( 'graphic-design' ) ) return 'graphic-design';
	if ( is_page( 'ai-photography' ) ) return 'ai-photography';
	if ( is_page( 'ai-solutions' ) ) return 'ai-solutions';
	if ( is_page( 'crm' ) ) return 'crm';
	if ( function_exists( 'nk_soon_cur' ) && nk_soon_cur() ) return 'soon';
	foreach ( array( 'about', 'contact', 'faq', 'terms', 'privacy' ) as $pg ) {
		if ( is_page( $pg ) ) return $pg;
	}
	if ( function_exists( 'is_404' ) && is_404() ) return '404';
	if ( function_exists( 'is_singular' ) && is_singular( 'post' ) ) return 'article';
	if ( function_exists( 'is_home' ) && ( is_home() || is_archive() || is_search() ) ) return 'articles';
	return '';
}

/** Service pages and Home carry the brief + pricing scripts; other pages don't. */
function nk_has_brief() {
	$k = nk_page_key();
	return $k && ! in_array( $k, nk_plain_keys(), true );
}
function nk_plain_keys() {
	return array( 'about', 'contact', 'faq', 'terms', 'privacy', '404', 'article', 'articles', 'soon' );
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'nk-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'nk-site', NK_URI . '/assets/css/site.css', array(), filemtime( NK_DIR . '/assets/css/site.css' ) );
	$k = nk_page_key();
	if ( $k && 'home' !== $k && file_exists( NK_DIR . '/assets/css/svc-' . $k . '.css' ) ) {
		wp_enqueue_style( 'nk-svc-' . $k, NK_URI . '/assets/css/svc-' . $k . '.css', array( 'nk-site' ), filemtime( NK_DIR . '/assets/css/svc-' . $k . '.css' ) );
	} elseif ( 'home' !== $k ) {
		// About, contact, legal, articles, 404 and any other WordPress page.
		wp_enqueue_style( 'nk-pages', NK_URI . '/assets/css/pages.css', array( 'nk-site' ), filemtime( NK_DIR . '/assets/css/pages.css' ) );
	}
	// Keep the front end lean: drop block-editor styles this theme doesn't use.
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'global-styles' );
	wp_dequeue_style( 'classic-theme-styles' );
}, 20 );

add_action( 'wp_head', function () {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
	echo '<script>' . file_get_contents( NK_DIR . '/assets/js/theme-init.js' ) . '</script>' . "\n";
}, 1 );

/* Meta description, Open Graph and JSON-LD for each approved page. */
add_action( 'wp_head', function () {
	$k = nk_page_key();
	if ( $k && file_exists( NK_DIR . '/parts/head-' . $k . '.html' ) ) {
		echo file_get_contents( NK_DIR . '/parts/head-' . $k . '.html' );
	}
}, 5 );

add_filter( 'pre_get_document_title', function ( $t ) {
	$k = nk_page_key();
	if ( ! $k ) return $t;
	$titles = json_decode( file_get_contents( NK_DIR . '/inc/titles.json' ), true );
	if ( 'article' === $k ) return single_post_title( '', false ) . ' — Neeko';
	if ( 'articles' === $k && ( is_category() || is_tag() ) ) return single_term_title( '', false ) . ' articles — Neeko';
	if ( 'articles' === $k && is_search() ) return 'Search: ' . get_search_query() . ' — Neeko';
	return isset( $titles[ $k ] ) ? html_entity_decode( $titles[ $k ] ) : $t;
} );

/* Lean head. */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/* On activation: create the three pages (if missing) and set the homepage. */
add_action( 'after_switch_theme', function () {
	$pages = array( 'home' => 'Home', 'website-design' => 'Website design', 'seo' => 'SEO', 'social-media' => 'Social media' );
	$ids   = array();
	foreach ( $pages as $slug => $title ) {
		$p = get_page_by_path( $slug );
		$ids[ $slug ] = $p ? $p->ID : wp_insert_post( array(
			'post_title'  => $title,
			'post_name'   => $slug,
			'post_status' => 'publish',
			'post_type'   => 'page',
		) );
	}
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $ids['home'] );
	if ( '' === get_option( 'permalink_structure' ) ) {
		update_option( 'permalink_structure', '/%postname%/' );
	}
	flush_rewrite_rules();
} );

/* Keep the fixed menu below the admin bar for logged-in users. */
add_action( 'wp_head', function () {
	if ( is_admin_bar_showing() ) {
		echo '<style>#nav{top:32px}@media (max-width:782px){#nav{top:46px}}</style>' . "\n";
	}
}, 99 );

/* After each deploy (new git commit), purge the page cache once. */
add_action( 'init', function () {
	$head = @file_get_contents( NK_DIR . '/.git/HEAD' );
	if ( ! $head ) return;
	$head = trim( $head );
	if ( 0 === strpos( $head, 'ref: ' ) ) {
		$ref  = @file_get_contents( NK_DIR . '/.git/' . substr( $head, 5 ) );
		$head = $ref ? trim( $ref ) : $head;
	}
	if ( get_option( 'nk_deployed' ) === $head ) return;
	update_option( 'nk_deployed', $head, false );
	do_action( 'litespeed_purge_all' );
	if ( function_exists( 'wp_cache_flush' ) ) wp_cache_flush();
} );

/* Staging: never page-cache, so every deploy shows straight away. */
add_action( 'send_headers', function () {
	if ( false !== strpos( home_url(), '//stage.' ) && ! headers_sent() ) {
		header( 'X-LiteSpeed-Cache-Control: no-cache' );
		header( 'X-Robots-Tag: noindex, nofollow', true );
	}
} );

/* nk_ensure_pages: create approved service pages once if they don't exist yet (no manual step after deploy). */
add_action( 'init', function () {
	$want = array( 'social-media' => 'Social media', 'graphic-design' => 'Graphic design', 'ai-photography' => 'AI photography', 'about' => 'About', 'contact' => 'Contact', 'faq' => 'FAQ', 'articles' => 'Articles', 'terms' => 'Terms of service', 'privacy' => 'Privacy policy', 'ai-solutions' => 'AI solutions', 'crm' => 'CRM setup', 'integrations' => 'API integration', 'erp' => 'ERP and operations', 'custom-software' => 'Custom web app', 'mobile-app' => 'Mobile app', 'website-care' => 'Website care', 'ai-care' => 'AI care', 'system-care' => 'System care' );
	if ( get_option( 'nk_pages_v' ) === implode( ',', array_keys( $want ) ) ) return;
	foreach ( $want as $slug => $title ) {
		if ( ! get_page_by_path( $slug ) ) {
			wp_insert_post( array( 'post_title' => $title, 'post_name' => $slug, 'post_status' => 'publish', 'post_type' => 'page' ) );
		}
	}
	$posts = get_page_by_path( 'articles' );
	if ( $posts ) update_option( 'page_for_posts', $posts->ID );
	$priv = get_page_by_path( 'privacy' );
	if ( $priv ) update_option( 'wp_page_for_privacy_policy', $priv->ID );
	update_option( 'nk_pages_v', implode( ',', array_keys( $want ) ) );
} );

require NK_DIR . '/inc/soon.php';

/* AI chat assistant → AI automation → AI solutions (13 Nov 2026): keep old links and rankings. */
add_action( 'template_redirect', function () {
	if ( preg_match( '#^/(ai-chat-assistant|ai-automation)/?(\?|$)#', $GLOBALS['nk_path'] ) ) {
		wp_redirect( nk_svc_url( 'ai-solutions' ), 301 );
		exit;
	}
}, 1 );
require NK_DIR . '/inc/articles.php';
require NK_DIR . '/inc/pages.php';

/* Favicon from the theme (unless a Site Icon is set in WordPress). /favicon.ico redirects to the theme copy. */
add_action( 'wp_head', function () {
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) return;
	$u = NK_URI . '/assets/icon/';
	echo '<link rel="icon" href="' . esc_url( $u . 'favicon.ico' ) . '" sizes="48x48"><link rel="icon" href="' . esc_url( $u . 'favicon.svg' ) . '" type="image/svg+xml"><link rel="apple-touch-icon" href="' . esc_url( $u . 'apple-touch-icon.png' ) . '"><link rel="manifest" href="' . esc_url( $u . 'site.webmanifest' ) . '"><meta name="theme-color" content="#ffffff">' . "\n";
}, 3 );
add_action( 'do_faviconico', function () {
	if ( function_exists( 'has_site_icon' ) && has_site_icon() ) return;
	wp_redirect( NK_URI . '/assets/icon/favicon.ico', 301 );
	exit;
} );

/* Staging must never be indexed: noindex meta + robots.txt blocks everything (live neeko.my is unaffected). */
function nk_is_stage() { return false !== strpos( home_url(), '//stage.' ); }
add_filter( 'wp_robots', function ( $r ) { return nk_is_stage() ? array( 'noindex' => true, 'nofollow' => true ) : $r; }, 99 );
add_filter( 'robots_txt', function ( $txt ) { return nk_is_stage() ? "User-agent: *\nDisallow: /\n" : $txt; }, 99 );
