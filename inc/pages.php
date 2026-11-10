<?php
/**
 * Shared blocks for the non-service pages (about, contact, legal, articles, 404).
 */

/** Page hero: breadcrumb + H1 + intro + optional buttons. $crumbs = [ [label, url|null], … ] */
function nk_page_hero( $crumbs, $h1, $sub = '', $btns = '', $cls = '' ) {
	?>
<section class="hero sky sv-hero pg-hero <?php echo esc_attr( $cls ); ?>" id="top"><div class="wrap hc">
    <nav class="bcr" aria-label="Breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><?php foreach ( $crumbs as $c ) : ?><span aria-hidden="true">/</span><?php if ( ! empty( $c[1] ) ) : ?><a href="<?php echo esc_url( $c[1] ); ?>"><?php echo esc_html( $c[0] ); ?></a><?php else : ?><b aria-current="page"><?php echo esc_html( $c[0] ); ?></b><?php endif; endforeach; ?></nav>
    <h1><?php echo wp_kses_post( $h1 ); ?></h1>
    <?php if ( $sub ) : ?><p class="sub"><?php echo wp_kses_post( $sub ); ?></p><?php endif; ?>
    <?php if ( $btns ) : ?><div class="cbt sv-cta"><?php echo $btns; // phpcs:ignore ?></div><?php endif; ?>
</div></section>
	<?php
}

/** Closing CTA with the WhatsApp chat (same as Home; brief links go to the Home brief). */
function nk_page_cta( $h2 = 'Ready when you are', $p = 'Pick your goals, see your team and estimate, then send it to us on WhatsApp.' ) {
	$brief = home_url( '/#brief' );
	?>
<section class="cta" id="news">
  <div class="ctab"><div class="wrap ctg">
    <div class="ctl">
      <h2><?php echo esc_html( $h2 ); ?></h2>
      <p class="s"><?php echo esc_html( $p ); ?></p>
      <div class="cbt"><a class="btn btn-white" href="<?php echo esc_url( $brief ); ?>">Start your brief <svg aria-hidden="true"><use href="#i-ne"/></svg></a><a class="btn btn-ghost" href="https://wa.me/60176604771" target="_blank" rel="noopener"><svg aria-hidden="true"><use href="#i-wa"/></svg>Chat on WhatsApp</a></div>
    </div>
    <div class="ctw2 rv">
      <div class="cwh"><img src="<?php echo NK_URI; ?>/assets/img/693ee0f3d29d.jpg" alt="" width="36" height="36"><div><b>Hafiz · Neeko</b><small>Sales advisor · Online</small></div><span class="cwt">WhatsApp</span></div>
      <div class="cwb" id="cwb" role="log" aria-live="polite" aria-label="Chat with Neeko"></div>
      <form class="cwi" id="cwf" action="https://wa.me/60176604771" target="_blank"><label class="sr" for="cwm">Message to Neeko on WhatsApp</label><input id="cwm" name="text" type="text" autocomplete="off" placeholder="Type a message" maxlength="500"><button type="submit" aria-label="Send on WhatsApp"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3.4 20.4 21 12 3.4 3.6 3.4 10.2 15 12 3.4 13.8z" fill="currentColor"/></svg></button></form>
    </div>
  </div></div>
</section>
	<?php
}

/** Link to a built page by slug (falls back to home). */
function nk_url( $slug ) {
	$p = get_page_by_path( $slug );
	return $p ? get_permalink( $p ) : home_url( '/' . $slug . '/' );
}

/** Legal page body: sticky contents list + prose. $sections = [ id => [title, html], … ] */
function nk_legal( $sections, $updated ) {
	?>
<section class="sec pg-legal"><div class="wrap pglg">
  <aside class="pgtoc rv" aria-label="On this page"><p class="pgtl">On this page</p><ol><?php foreach ( $sections as $id => $s ) : ?><li><a href="#<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $s[0] ); ?></a></li><?php endforeach; ?></ol><p class="pgup">Last updated <?php echo esc_html( $updated ); ?></p></aside>
  <div class="pg-prose rv"><?php foreach ( $sections as $id => $s ) : ?><h2 id="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $s[0] ); ?></h2><?php echo str_replace( array( '__PRIV__', '__TERMS__', '__CONTACT__' ), array( esc_url( nk_url( 'privacy' ) ), esc_url( nk_url( 'terms' ) ), esc_url( nk_url( 'contact' ) ) ), $s[1] ); // phpcs:ignore ?><?php endforeach; ?></div>
</div></section>
	<?php
}
