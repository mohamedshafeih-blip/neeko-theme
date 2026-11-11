<?php
/**
 * Shared blocks for the non-service pages (about, contact, legal, articles, 404).
 */

/** Page hero: breadcrumb + H1 + intro + optional buttons. $crumbs = [ [label, url|null], … ] */
function nk_page_hero( $crumbs, $h1, $sub = '', $btns = '', $cls = '', $open = false ) {
	?>
<section class="hero sky sv-hero pg-hero <?php echo esc_attr( $cls ); ?>" id="top"><div class="wrap hc">
    <nav class="bcr" aria-label="Breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><?php foreach ( $crumbs as $c ) : ?><span aria-hidden="true">/</span><?php if ( ! empty( $c[1] ) ) : ?><a href="<?php echo esc_url( $c[1] ); ?>"><?php echo esc_html( $c[0] ); ?></a><?php else : ?><b aria-current="page"><?php echo esc_html( $c[0] ); ?></b><?php endif; endforeach; ?></nav>
    <h1><?php echo wp_kses_post( $h1 ); ?></h1>
    <?php if ( $sub ) : ?><p class="sub"><?php echo wp_kses_post( $sub ); ?></p><?php endif; ?>
    <?php if ( $btns ) : ?><div class="cbt sv-cta"><?php echo $btns; // phpcs:ignore ?></div><?php endif; ?>
</div><?php if ( $open ) { echo '<div class="wrap pgW-wrap">'; return; } ?></section>
	<?php
}

/** Sidebar header: avatar/icon + title + subtitle (+ optional progress bar). */
function nk_side_head( $t, $sub, $icon = '', $prog = null ) {
	$av = $icon ? '<i class="pgW-ai"><svg aria-hidden="true"><use href="#' . esc_attr( $icon ) . '"/></svg></i>' : '<i class="pgD-av" aria-hidden="true">N</i>';
	$pg = null === $prog ? '' : '<div class="pgW-pb" aria-hidden="true"><i style="width:' . (float) $prog . '%"></i></div>';
	return '<div class="pgW-sh">' . $av . '<span><b>' . $t . '</b><small>' . $sub . '</small></span></div>' . $pg;
}

/** Big window: opens the frame, sidebar, main and header. Close with nk_win_end(). */
function nk_win_start( $title, $icons = array(), $side = '', $cls = '', $sub = '' ) {
	echo '<div class="pgW rv ' . esc_attr( $cls ) . '">';
	if ( $side ) echo '<aside class="pgW-sd">' . $side . '</aside>'; // phpcs:ignore
	echo '<div class="pgW-mn"><div class="pgW-h"><span class="pgW-t">' . $title . ( $sub ? '<small>' . $sub . '</small>' : '' ) . '</span>'; // phpcs:ignore
	foreach ( $icons as $i ) {
		if ( is_array( $i ) ) echo '<a class="hi" href="' . esc_url( $i[1] ) . '" aria-label="' . esc_attr( $i[2] ) . '"' . ( ! empty( $i[3] ) ? ' target="_blank" rel="noopener"' : '' ) . '><svg aria-hidden="true"><use href="#' . esc_attr( $i[0] ) . '"/></svg></a>';
		else echo '<i class="hi"><svg aria-hidden="true"><use href="#' . esc_attr( $i ) . '"/></svg></i>';
	}
	echo '</div><div class="pgW-c">';
}
function nk_win_end() {
	echo '</div></div></div>';
}

/** Closing CTA with the WhatsApp chat (same as Home; brief links go to the Home brief). */
function nk_page_cta( $h2 = 'Ready when you are', $p = 'Pick your goals, see your team and estimate, then send it to us on WhatsApp.', $plain = false ) {
	$brief = home_url( '/#brief' );
	?>
<section class="cta<?php echo $plain ? ' pg-plain' : ''; ?>" id="news">
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

/** Legal page: document window with documents list + contents. $sections = [ id => [title, html], … ] */
function nk_legal( $sections, $updated, $doc = 'terms' ) {
	$docs = array( 'terms' => 'Terms of service', 'privacy' => 'Privacy policy' );
	$side = nk_side_head( 'Legal', '2 documents · Malaysia', 'i-shield' ) . '<p class="pgW-l">Documents</p><nav class="pgW-nv">';
	foreach ( $docs as $k => $n ) $side .= '<a href="' . esc_url( nk_url( $k ) ) . '"' . ( $k === $doc ? ' aria-current="page"' : '' ) . '><svg aria-hidden="true"><use href="#i-doc"/></svg><span>' . esc_html( $n ) . '</span></a>';
	$side .= '</nav><p class="pgW-l">On this page</p><ol class="pgW-toc">';
	foreach ( $sections as $id => $x ) $side .= '<li><a href="#' . esc_attr( $id ) . '">' . esc_html( $x[0] ) . '</a></li>';
	$side .= '</ol><p class="pgW-ft">Updated ' . esc_html( $updated ) . '</p>';
	$tok = array( array( '__PRIV__', '__TERMS__', '__CONTACT__' ), array( esc_url( nk_url( 'privacy' ) ), esc_url( nk_url( 'terms' ) ), esc_url( nk_url( 'contact' ) ) ) );
	nk_win_start( esc_html( $docs[ $doc ] ) . '.pdf', array( array( 'i-doc', '#', 'Print', false ), array( 'i-mail', 'mailto:enquiry@neeko.my', 'Email a question' ) ), $side, 'pgW-doc', 'Berdua Sama Niaga · Updated ' . esc_html( $updated ) );
	echo '<div class="pg-prose">';
	foreach ( $sections as $id => $x ) echo '<h2 id="' . esc_attr( $id ) . '">' . esc_html( $x[0] ) . '</h2>' . str_replace( $tok[0], $tok[1], $x[1] ); // phpcs:ignore
	echo '</div>';
	nk_win_end();
	echo '<script>document.querySelectorAll(".pgW-doc a[aria-label=Print]").forEach(a=>a.addEventListener("click",e=>{e.preventDefault();print()}))</script>';
}
