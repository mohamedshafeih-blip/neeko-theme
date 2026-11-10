<?php
/**
 * Neeko articles: helpers for the blog templates, per-article SEO head, and a one-time seed of starter guides.
 */

/** Theme photos used when an article has no featured image (by slug, then rotated). */
function nk_post_img( $post = null ) {
	$post = get_post( $post );
	if ( ! $post ) return '';
	if ( has_post_thumbnail( $post ) ) return get_the_post_thumbnail_url( $post, 'large' );
	$m = get_post_meta( $post->ID, '_nk_img', true );
	if ( $m && file_exists( NK_DIR . '/assets/img/' . $m ) ) return NK_URI . '/assets/img/' . $m;
	$pool = array( 'nk-art-prepare.webp', 'nk-art-seo.webp', 'nk-art-ai.webp', 'nk-art-cost.webp', 'nk-about-team.webp' );
	return NK_URI . '/assets/img/' . $pool[ $post->ID % count( $pool ) ];
}

/** Minutes to read, rounded up, at 220 words a minute. */
function nk_read_time( $post = null ) {
	$post  = get_post( $post );
	$words = str_word_count( wp_strip_all_tags( $post ? $post->post_content : '' ) );
	return max( 1, (int) ceil( $words / 220 ) );
}

/** First category name and link. */
function nk_post_cat( $post = null ) {
	$c = get_the_category( get_post( $post ) ? get_post( $post )->ID : 0 );
	if ( empty( $c ) ) return array( 'Guides', get_permalink( get_option( 'page_for_posts' ) ) );
	return array( $c[0]->name, get_category_link( $c[0] ) );
}

/** One article card. */
function nk_post_card( $post = null, $cls = '' ) {
	$post = get_post( $post );
	list( $cat ) = nk_post_cat( $post );
	$u = get_permalink( $post );
	?>
	<article class="pgac rv <?php echo esc_attr( $cls ); ?>">
		<a class="pgai" href="<?php echo esc_url( $u ); ?>" tabindex="-1" aria-hidden="true"><img src="<?php echo esc_url( nk_post_img( $post ) ); ?>" alt="" loading="lazy" width="896" height="672"></a>
		<div class="pgab">
			<p class="pgam"><span><?php echo esc_html( $cat ); ?></span><time datetime="<?php echo esc_attr( get_the_date( 'c', $post ) ); ?>"><?php echo esc_html( get_the_date( 'j M Y', $post ) ); ?></time><span><?php echo (int) nk_read_time( $post ); ?> min read</span></p>
			<h3><a href="<?php echo esc_url( $u ); ?>"><?php echo esc_html( get_the_title( $post ) ); ?></a></h3>
			<p><?php echo esc_html( wp_trim_words( has_excerpt( $post ) ? $post->post_excerpt : wp_strip_all_tags( $post->post_content ), 24 ) ); ?></p>
		</div>
	</article>
	<?php
}

/* Article head: description, Open Graph and Article + BreadcrumbList schema. Index/archives get their own meta. */
add_action( 'wp_head', function () {
	$k = nk_page_key();
	if ( 'article' === $k ) {
		$p    = get_queried_object();
		$desc = has_excerpt( $p ) ? $p->post_excerpt : wp_trim_words( wp_strip_all_tags( $p->post_content ), 28, '…' );
		$url  = get_permalink( $p );
		$img  = nk_post_img( $p );
		if ( 0 === strpos( $img, '/' ) || 0 === strpos( $img, 'theme' ) ) $img = home_url( $img );
		list( $cat ) = nk_post_cat( $p );
		$blog = get_permalink( get_option( 'page_for_posts' ) );
		$ld   = array(
			'@context' => 'https://schema.org',
			'@graph'   => array(
				array(
					'@type'            => 'BlogPosting',
					'headline'         => get_the_title( $p ),
					'description'      => $desc,
					'image'            => $img,
					'datePublished'    => get_the_date( 'c', $p ),
					'dateModified'     => get_the_modified_date( 'c', $p ),
					'mainEntityOfPage' => $url,
					'articleSection'   => $cat,
					'wordCount'        => str_word_count( wp_strip_all_tags( $p->post_content ) ),
					'author'           => array( '@type' => 'Organization', 'name' => 'Neeko', 'url' => home_url( '/' ) ),
					'publisher'        => array( '@id' => 'https://neeko.my/#org', '@type' => 'Organization', 'name' => 'Neeko', 'url' => 'https://neeko.my/' ),
					'inLanguage'       => 'en-MY',
				),
				array(
					'@type'           => 'BreadcrumbList',
					'itemListElement' => array(
						array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => home_url( '/' ) ),
						array( '@type' => 'ListItem', 'position' => 2, 'name' => 'Articles', 'item' => $blog ),
						array( '@type' => 'ListItem', 'position' => 3, 'name' => get_the_title( $p ), 'item' => $url ),
					),
				),
			),
		);
		echo '<meta name="description" content="' . esc_attr( $desc ) . '"><link rel="canonical" href="' . esc_url( $url ) . '">';
		echo '<meta property="og:type" content="article"><meta property="og:title" content="' . esc_attr( get_the_title( $p ) ) . '"><meta property="og:description" content="' . esc_attr( $desc ) . '"><meta property="og:url" content="' . esc_url( $url ) . '"><meta property="og:image" content="' . esc_url( $img ) . '"><meta name="twitter:card" content="summary_large_image">' . "\n";
		echo '<script type="application/ld+json">' . wp_json_encode( $ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
	} elseif ( 'articles' === $k && ( is_category() || is_tag() || is_search() || is_paged() ) ) {
		echo '<meta name="robots" content="' . ( is_search() ? 'noindex,follow' : 'index,follow' ) . '">' . "\n";
	}
}, 6 );

/* Archives use the same 9-per-page grid as the index. */
add_action( 'pre_get_posts', function ( $q ) {
	if ( ! is_admin() && $q->is_main_query() && ( $q->is_home() || $q->is_archive() || $q->is_search() ) ) {
		$q->set( 'posts_per_page', 9 );
		if ( $q->is_search() ) $q->set( 'post_type', 'post' );
	}
} );

/* Seed starter guides once (staging), so Articles is never empty. Edit or delete them freely in wp-admin. */
add_action( 'init', function () {
	if ( get_option( 'nk_seed_articles' ) === '1' ) return;
	if ( ! function_exists( 'wp_insert_post' ) ) return;
	update_option( 'nk_seed_articles', '1', false );
	$hello = get_page_by_path( 'hello-world', OBJECT, 'post' );
	if ( $hello && false !== strpos( $hello->post_content, 'Welcome to WordPress' ) ) wp_trash_post( $hello->ID );
	$file = NK_DIR . '/inc/seed-articles.php';
	if ( ! file_exists( $file ) ) return;
	$items = include $file;
	$day   = 0;
	foreach ( $items as $a ) {
		if ( get_page_by_path( $a['slug'], OBJECT, 'post' ) ) continue;
		$term = term_exists( $a['cat'], 'category' );
		if ( ! $term ) $term = wp_insert_term( $a['cat'], 'category' );
		$tid = is_array( $term ) ? (int) $term['term_id'] : (int) $term;
		$id  = wp_insert_post( array(
			'post_title'    => $a['title'],
			'post_name'     => $a['slug'],
			'post_excerpt'  => $a['excerpt'],
			'post_content'  => $a['body'],
			'post_status'   => 'publish',
			'post_type'     => 'post',
			'post_date'     => gmdate( 'Y-m-d H:i:s', gmmktime( 0, 30, 0, 11, 10, 2026 ) - ( $day++ * 4 * DAY_IN_SECONDS ) ),
			'post_category' => $tid ? array( $tid ) : array(),
		) );
		if ( $id && ! is_wp_error( $id ) ) update_post_meta( $id, '_nk_img', $a['img'] );
	}
	$unc = get_category_by_slug( 'uncategorized' );
	if ( $unc && 0 === (int) $unc->count ) wp_update_term( $unc->term_id, 'category', array( 'name' => 'Guides', 'slug' => 'guides' ) );
}, 20 );

/* One-time: article URLs as /articles/post-name/ and publish any seeded guide that was scheduled by timezone. */
add_action( 'init', function () {
	if ( get_option( 'nk_art_fix' ) === '3' ) return;
	update_option( 'nk_art_fix', '3', false );
	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure( '/articles/%postname%/' );
	$wp_rewrite->set_category_base( 'topic' );
	foreach ( array( 'website-cost-malaysia', 'prepare-before-website-project', 'seo-first-three-months', 'ai-chat-assistant-small-business' ) as $slug ) {
		$q = get_posts( array( 'name' => $slug, 'post_status' => 'future', 'numberposts' => 1 ) );
		if ( $q ) wp_publish_post( $q[0]->ID );
	}
	$wp_rewrite->flush_rules( false );
}, 30 );
