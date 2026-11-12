<?php
/**
 * Neeko theme. Lightweight, no page builder.
 */
define( 'NK_VER', '1.0.0' );
define( 'NK_URI', get_template_directory_uri() );
define( 'NK_DIR', get_template_directory() );
require NK_DIR . '/inc/services.php';

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
	return array( 'about', 'contact', 'faq', 'terms', 'privacy', '404', 'article', 'articles' );
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
	}
} );

/* nk_ensure_pages: create approved service pages once if they don't exist yet (no manual step after deploy). */
add_action( 'init', function () {
	$want = array( 'social-media' => 'Social media', 'graphic-design' => 'Graphic design', 'ai-photography' => 'AI photography', 'about' => 'About', 'contact' => 'Contact', 'faq' => 'FAQ', 'articles' => 'Articles', 'terms' => 'Terms of service', 'privacy' => 'Privacy policy' );
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

require NK_DIR . '/inc/articles.php';
require NK_DIR . '/inc/pages.php';
