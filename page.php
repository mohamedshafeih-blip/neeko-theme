<?php
/* Neeko: any other page (content from wp-admin) */
get_header();
the_post();
?>
<main>
<?php nk_page_hero( array( array( get_the_title(), null ) ), esc_html( get_the_title() ), has_excerpt() ? esc_html( get_the_excerpt() ) : '', '', 'pg-hero-sm' ); ?>
<section class="sec pg-legal"><div class="wrap"><div class="pg-prose pgsolo rv"><?php the_content(); ?></div></div></section>
<?php nk_page_cta(); ?>
</main>
<?php get_footer();
