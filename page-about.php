<?php
/* Neeko: about. Three layout samples: ?look=a|b|c|d (default d, chat). */
get_header();
$I    = NK_URI . '/assets/img/';
$S    = nk_services();
$look = isset( $_GET['look'] ) && in_array( $_GET['look'], array( 'a', 'b', 'c', 'd' ), true ) ? $_GET['look'] : 'd'; // phpcs:ignore
?>
<main class="pg-look-<?php echo esc_attr( $look ); ?>">
<?php include NK_DIR . '/parts/about-' . $look . '.php'; ?>
<?php nk_page_cta(); ?>
</main>
<?php get_footer();
