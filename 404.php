<?php
/* Neeko: 404 */
get_header();
$S = nk_services();
?>
<main>
<section class="hero sky sv-hero pg-hero pg-404" id="top"><div class="wrap pg4g">
  <div class="pg4t">
    <span class="pg4c">Error 404</span>
    <h1>This page has moved or never existed</h1>
    <p class="sub">The link may be old or mistyped. Try a search, or pick up from one of the pages below.</p>
    <form class="pgsr pg4s" role="search" action="<?php echo esc_url( home_url( '/' ) ); ?>"><label class="sr" for="pg4q">Search the site</label><svg aria-hidden="true"><use href="#i-search"/></svg><input id="pg4q" type="search" name="s" placeholder="Search articles"><button class="btn btn-blue" type="submit">Search</button></form>
    <div class="cbt"><a class="btn btn-line" href="<?php echo esc_url( home_url( '/' ) ); ?>">Back to home</a><a class="btn btn-line" href="<?php echo esc_url( nk_url( 'contact' ) ); ?>">Contact us</a></div>
  </div>
  <div class="pv pg4w" aria-hidden="true"><div class="hw">
    <div class="hwt"><span class="hwn">neeko.my<b class="pg4u"><?php echo esc_html( wp_parse_url( isset( $_SERVER['REQUEST_URI'] ) ? wp_unslash( $_SERVER['REQUEST_URI'] ) : '/', PHP_URL_PATH ) ); ?></b></span><i class="hi"><svg><use href="#i-globe"/></svg></i></div>
    <div class="pg4i"><img src="<?php echo NK_URI; ?>/assets/img/nk-404.webp" alt="" width="760" height="760"><span class="pg4n"><b>404</b><small>Page not found</small></span></div>
  </div></div>
</div></section>

<section class="sec pg-404l"><div class="wrap">
  <div class="sh rv"><h2>Popular pages</h2><p>Services, prices and answers most people come here for.</p></div>
  <div class="pg4l">
    <?php foreach ( array( 'Connect', 'Create' ) as $g ) : foreach ( $S[ $g ] as $s ) : ?>
    <a class="pgcc rv" href="<?php echo esc_url( nk_svc_url( $s[0] ) ); ?>"><i><svg aria-hidden="true"><use href="#<?php echo esc_attr( $s[3] ); ?>"/></svg></i><span><small><?php echo esc_html( $s[2] ); ?></small><b><?php echo esc_html( $s[1] ); ?></b></span><svg class="ar" aria-hidden="true"><use href="#i-ne"/></svg></a>
    <?php endforeach; endforeach; ?>
    <a class="pgcc rv" href="<?php echo esc_url( home_url( '/#pricing' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-card"/></svg></i><span><small>Every service, every package</small><b>Pricing</b></span><svg class="ar" aria-hidden="true"><use href="#i-ne"/></svg></a>
    <a class="pgcc rv" href="<?php echo esc_url( nk_url( 'articles' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-doc"/></svg></i><span><small>Guides with real prices</small><b>Articles</b></span><svg class="ar" aria-hidden="true"><use href="#i-ne"/></svg></a>
    <a class="pgcc rv" href="<?php echo esc_url( nk_url( 'about' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-team"/></svg></i><span><small>Who we are</small><b>About Neeko</b></span><svg class="ar" aria-hidden="true"><use href="#i-ne"/></svg></a>
  </div>
</div></section>
</main>
<?php get_footer();
