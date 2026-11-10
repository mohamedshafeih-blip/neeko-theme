<?php
/* Articles index, category archives and search results share this list. */
$blog = get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/articles/' );
if ( is_category() || is_tag() ) {
	$t = single_term_title( '', false );
	nk_page_hero( array( array( 'Articles', $blog ), array( $t, null ) ), esc_html( $t ), term_description() ? wp_strip_all_tags( term_description() ) : 'Guides and answers from the Neeko team.' );
} elseif ( is_search() ) {
	nk_page_hero( array( array( 'Articles', $blog ), array( 'Search', null ) ), 'Results for “' . esc_html( get_search_query() ) . '”', sprintf( '%d article%s found.', (int) $GLOBALS['wp_query']->found_posts, 1 === (int) $GLOBALS['wp_query']->found_posts ? '' : 's' ) );
} else {
	nk_page_hero( array( array( 'Articles', null ) ), 'Articles and guides', 'Straight answers on websites, SEO, social media, design and automation for Malaysian businesses, with real prices and timelines.' );
}
$cur  = is_category() ? get_queried_object_id() : 0;
$cats = get_categories( array( 'hide_empty' => true ) );
?>
<section class="sec pg-arts"><div class="wrap">
  <div class="pgbar rv">
    <nav class="pgcats" aria-label="Topics"><a href="<?php echo esc_url( $blog ); ?>"<?php echo ( ! $cur && ! is_search() ) ? ' aria-current="page"' : ''; ?>>All</a><?php foreach ( $cats as $c ) : ?><a href="<?php echo esc_url( get_category_link( $c ) ); ?>"<?php echo $cur === $c->term_id ? ' aria-current="page"' : ''; ?>><?php echo esc_html( $c->name ); ?></a><?php endforeach; ?></nav>
    <form class="pgsr" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>"><label class="sr" for="pgq">Search articles</label><svg aria-hidden="true"><use href="#i-search"/></svg><input id="pgq" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Search articles"></form>
  </div>
  <?php if ( have_posts() ) : ?>
  <div class="pgag">
    <?php $i = 0; while ( have_posts() ) : the_post(); nk_post_card( null, ( 0 === $i && ! is_paged() && ! is_search() ) ? 'lead' : '' ); $i++; endwhile; ?>
  </div>
  <?php
	$links = paginate_links( array( 'type' => 'array', 'prev_text' => '← Newer', 'next_text' => 'Older →' ) );
	if ( $links ) echo '<nav class="pgpg" aria-label="Pages">' . implode( '', $links ) . '</nav>'; // phpcs:ignore
	?>
  <?php else : ?>
  <div class="pgem rv"><h2>No articles found</h2><p>Try another search, or browse all articles.</p><a class="btn btn-blue" href="<?php echo esc_url( $blog ); ?>">All articles</a></div>
  <?php endif; ?>
</div></section>
<?php nk_page_cta( 'Have a question we haven’t answered?', 'Send us a brief or a WhatsApp message and a real person replies.' );
