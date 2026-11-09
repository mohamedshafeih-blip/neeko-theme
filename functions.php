<?php
/**
 * Neeko theme. Lightweight, no page builder.
 */
define( 'NK_VER', '1.0.0' );
define( 'NK_URI', get_template_directory_uri() );
define( 'NK_DIR', get_template_directory() );

add_action( 'after_setup_theme', function () {
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'script', 'style' ) );
} );

/** Which approved design is this request? */
function nk_page_key() {
	if ( is_front_page() ) return 'home';
	if ( is_page( 'website-design' ) ) return 'website-design';
	if ( is_page( 'seo' ) ) return 'seo';
	return '';
}

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'nk-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'nk-site', NK_URI . '/assets/css/site.css', array(), NK_VER );
	$k = nk_page_key();
	if ( $k && 'home' !== $k ) {
		wp_enqueue_style( 'nk-svc-' . $k, NK_URI . '/assets/css/svc-' . $k . '.css', array( 'nk-site' ), NK_VER );
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
	$pages = array( 'home' => 'Home', 'website-design' => 'Website design', 'seo' => 'SEO' );
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
