<?php
/* Neeko: about. Three layout samples: ?look=a|b|c (default a). */
get_header();
$I    = NK_URI . '/assets/img/';
$S    = nk_services();
$look = isset( $_GET['look'] ) && in_array( $_GET['look'], array( 'a', 'b', 'c' ), true ) ? $_GET['look'] : 'a'; // phpcs:ignore
?>
<main class="pg-look-<?php echo esc_attr( $look ); ?>">
<?php include NK_DIR . '/parts/about-' . $look . '.php'; ?>
<?php nk_page_cta( 'Let’s scope your next project', 'Tell us what you need. We’ll bring the right specialists and send a clear quotation.' ); ?>
</main>
<?php get_footer();
