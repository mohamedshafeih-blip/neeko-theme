<header class="nav" id="nav">
  <div class="nvb">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Neeko home"><svg class="lgi" viewBox="0 0 32 32" aria-hidden="true"><path fill="#1f5bff" d="M16 3c9.6 0 13 3.4 13 13s-3.4 13-13 13S3 25.6 3 16 6.4 3 16 3Z"/><rect x="10.2" y="11.7" width="3.8" height="8.6" rx="1.9" fill="#fff"/><rect x="18" y="11.7" width="3.8" height="8.6" rx="1.9" fill="#fff"/></svg><span class="wm">Neeko</span></a>
    <ul class="nl">
      <?php foreach ( nk_services() as $g => $items ) : ?><li><button type="button" aria-haspopup="true"><?php echo esc_html( $g ); ?><svg class="cv" aria-hidden="true"><use href="#i-cv"/></svg></button>
        <div class="dd"><?php foreach ( $items as $s ) : ?><a href="<?php echo esc_url( nk_svc_url( $s[0] ) ); ?>"><i><svg aria-hidden="true"><use href="#<?php echo esc_attr( $s[3] ); ?>"/></svg></i><b><?php echo esc_html( $s[1] ); ?></b><small><?php echo esc_html( $s[2] ); ?></small></a><?php endforeach; ?></div></li>
      <?php endforeach; ?>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#pricing">Pricing</a></li>
      <li><button type="button" aria-haspopup="true">Company<svg class="cv" aria-hidden="true"><use href="#i-cv"/></svg></button>
        <div class="dd">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>#tools"><i><svg><use href="#i-spark"/></svg></i><b>Integrations</b><small>The tools we connect</small></a>
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>#faq"><i><svg><use href="#i-chat"/></svg></i><b>FAQ</b><small>Timing, scope and pricing</small></a>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>#faq"><i><svg aria-hidden="true"><use href="#i-mail"/></svg></i><b>Contact</b><small>WhatsApp or email us</small></a></div></li>
    </ul>
    <div class="nr">
      <div class="lang" role="group" aria-label="Language"><button type="button" aria-pressed="true">EN</button><button type="button" aria-pressed="false">BM</button></div><button type="button" class="thm" id="thm" aria-label="Switch to dark mode"><svg class="mo" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 14.5A8 8 0 0 1 9.5 4 8 8 0 1 0 20 14.5z"/></svg><svg class="su" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2.5v2M12 19.5v2M2.5 12h2M19.5 12h2M5.3 5.3l1.4 1.4M17.3 17.3l1.4 1.4M5.3 18.7l1.4-1.4M17.3 6.7l1.4-1.4"/></svg></button>
      <a class="login" href="#">Log in</a>
      <a class="btn btn-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>#brief">Start a brief</a>
      <button class="mb" type="button" aria-label="Menu" aria-expanded="false" id="mb"><svg aria-hidden="true"><use href="#i-menu"/></svg></button>
    </div>
  </div>
  <nav class="mp" aria-label="Mobile"><?php foreach ( nk_services() as $g => $items ) { foreach ( $items as $s ) { if ( false === strpos( nk_svc_url( $s[0] ), '#pricing' ) ) { echo '<a href="' . esc_url( nk_svc_url( $s[0] ) ) . '">' . esc_html( $s[1] ) . '</a>'; } } } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>#features">Services</a><a href="<?php echo esc_url( home_url( '/' ) ); ?>#pricing">Pricing</a><a href="<?php echo esc_url( home_url( '/' ) ); ?>#tools">Integrations</a><a href="<?php echo esc_url( home_url( '/' ) ); ?>#faq">FAQ and contact</a><a href="#">Log in</a></nav>
</header>

