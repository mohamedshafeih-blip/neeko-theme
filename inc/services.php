<?php
/**
 * Neeko services: one list for the menu and homepage links.
 * A service links to its page when a page with that slug is published,
 * otherwise to the pricing section on the homepage.
 */
function nk_services() {
	return array(
		'Connect' => array(
			array( 'website-design', 'Website design', 'WordPress, mobile-first', 'i-globe' ),
			array( 'seo', 'SEO', 'Get found on Google and AI', 'i-search' ),
			array( 'social-media', 'Social media', 'Planned, designed, posted', 'i-ig' ),
		),
		'Create'  => array(
			array( 'graphic-design', 'Graphic design', 'Posters, posts, decks', 'i-pen' ),
			array( 'ai-photography', 'AI photography', 'Brand images, fast', 'i-cam' ),
		),
		'Build'   => array(
			array( 'ai-chat-assistant', 'AI chat assistant', 'Answers FAQs, hands over', 'i-chat' ),
			array( 'crm', 'CRM setup', 'Track every lead', 'i-team' ),
			array( 'integrations', 'Connect your tools', 'API integration', 'i-sheet' ),
			array( 'erp', 'ERP and operations', 'Orders, stock, approvals', 'i-cart' ),
			array( 'custom-software', 'Custom software', 'Portals, dashboards, tools', 'i-code' ),
			array( 'mobile-app', 'Mobile app', 'For customers or staff', 'i-send' ),
		),
		'Care'    => array(
			array( 'website-care', 'Website care', 'Backups, updates, fixes', 'i-shield' ),
		),
	);
}

function nk_svc_url( $slug ) {
	static $cache = array();
	if ( ! isset( $cache[ $slug ] ) ) {
		$p = get_page_by_path( $slug );
		$cache[ $slug ] = ( $p && 'publish' === $p->post_status ) ? get_permalink( $p ) : home_url( '/#pricing' );
	}
	return $cache[ $slug ];
}

/** Chips for one homepage group tile. */
function nk_svc_chips( $group ) {
	$all = nk_services();
	if ( empty( $all[ $group ] ) ) return '';
	$out = '<div class="svl">';
	foreach ( $all[ $group ] as $s ) {
		$out .= '<a href="' . esc_url( nk_svc_url( $s[0] ) ) . '">' . esc_html( $s[1] ) . '</a>';
	}
	return $out . '</div>';
}

/** Pricing tab id => page slug, exposed to the pricing script (built pages only). */
function nk_pricing_map() {
	$ids = array( 'web' => 'website-design', 'seo' => 'seo', 'social' => 'social-media', 'design' => 'graphic-design', 'photo' => 'ai-photography', 'ai' => 'ai-chat-assistant', 'crm' => 'crm', 'api' => 'integrations', 'erp' => 'erp', 'software' => 'custom-software', 'mobile' => 'mobile-app', 'care' => 'website-care' );
	$out = array();
	foreach ( $ids as $id => $slug ) {
		$u = nk_svc_url( $slug );
		if ( false === strpos( $u, '#pricing' ) ) $out[ $id ] = wp_make_link_relative( $u );
	}
	return $out;
}
add_action( 'wp_head', function () {
	echo '<script>window.NK_SVC=' . wp_json_encode( nk_pricing_map() ) . ';</script>' . "\n";
}, 2 );
