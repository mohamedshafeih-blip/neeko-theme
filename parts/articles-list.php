<?php
/* Articles index, topic archives and search results: one library window. */
$blog = get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/articles/' );
$cur  = is_category() ? get_queried_object_id() : 0;
$cats = get_categories( array( 'hide_empty' => true ) );
$tot  = (int) wp_count_posts()->publish;
if ( is_category() || is_tag() ) {
	$t = single_term_title( '', false );
	nk_page_hero( array( array( 'Articles', $blog ), array( $t, null ) ), esc_html( $t ) . ' articles', term_description() ? wp_strip_all_tags( term_description() ) : 'Guides and answers from the Neeko team.', '', 'pg-hero-w', true );
	$wt = esc_html( $t );
} elseif ( is_search() ) {
	nk_page_hero( array( array( 'Articles', $blog ), array( 'Search', null ) ), 'Results for “' . esc_html( get_search_query() ) . '”', '', '', 'pg-hero-w', true );
	$wt = 'Search';
} else {
	nk_page_hero( array( array( 'Articles', null ) ), 'Articles and guides', 'Straight answers on websites, SEO, social media, design and automation for Malaysian businesses, with real prices and timelines.', '', 'pg-hero-w', true );
	$wt = 'All articles';
}
$side  = nk_side_head( 'Neeko library', $tot . ' guides · real prices', 'i-doc' ) . '<form class="pgsr pgW-sr" role="search" action="' . esc_url( home_url( '/' ) ) . '"><label class="sr" for="pgq">Search articles</label><svg aria-hidden="true"><use href="#i-search"/></svg><input id="pgq" type="search" name="s" value="' . esc_attr( get_search_query() ) . '" placeholder="Search articles"></form>';
$side .= '<p class="pgW-l">Topics</p><nav class="pgW-nv pgW-tp" aria-label="Topics"><a href="' . esc_url( $blog ) . '"' . ( ( ! $cur && ! is_search() ) ? ' aria-current="page"' : '' ) . '><svg aria-hidden="true"><use href="#i-doc"/></svg><span>All</span><em>' . $tot . '</em></a>';
foreach ( $cats as $c ) $side .= '<a href="' . esc_url( get_category_link( $c ) ) . '"' . ( $cur === $c->term_id ? ' aria-current="page"' : '' ) . '><svg aria-hidden="true"><use href="#i-tag"/></svg><span>' . esc_html( $c->name ) . '</span><em>' . (int) $c->count . '</em></a>';
$side .= '</nav><div class="pgW-cta"><b>Can’t find it?</b><p>Ask us on WhatsApp and a real person replies.</p><a class="btn btn-blue" href="https://wa.me/60176604771" target="_blank" rel="noopener"><svg aria-hidden="true"><use href="#i-wa"/></svg>Ask Neeko</a></div>';
$n = (int) $GLOBALS['wp_query']->found_posts;
nk_win_start( $wt, array( 'i-search', 'i-doc' ), $side, 'pgW-lib', $n . ' article' . ( 1 === $n ? '' : 's' ) );
if ( have_posts() ) {
	echo '<div class="pgag">';
	$i = 0;
	while ( have_posts() ) { the_post(); nk_post_card(); $i++; }
	echo '</div>';
	$links = paginate_links( array( 'type' => 'array', 'prev_text' => '← Newer', 'next_text' => 'Older →' ) );
	if ( $links ) { echo '<nav class="pgpg" aria-label="Pages">' . implode( '', $links ) . '</nav>'; } // phpcs:ignore
} else {
	echo '<div class="pgem"><h2>No articles found</h2><p>Try another search, or browse all articles.</p><a class="btn btn-blue" href="' . esc_url( $blog ) . '">All articles</a></div>';
}
nk_win_end();
echo '</div></section>';
nk_page_cta();
