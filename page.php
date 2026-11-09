<?php get_header(); ?>
<main class="nk-plain"><section class="sec"><div class="wrap">
<?php while ( have_posts() ) : the_post(); ?>
<article><h1><?php the_title(); ?></h1><?php the_content(); ?></article>
<?php endwhile; ?>
</div></section></main>
<?php get_footer();
