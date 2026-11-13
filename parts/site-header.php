<header class="nav" id="nav">
  <div class="nvb">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Neeko home"><svg class="lgi" viewBox="0 0 32 32" aria-hidden="true"><path fill="#1f5bff" d="M16 3c9.6 0 13 3.4 13 13s-3.4 13-13 13S3 25.6 3 16 6.4 3 16 3Z"/><rect x="10.2" y="11.7" width="3.8" height="8.6" rx="1.9" fill="#fff"/><rect x="18" y="11.7" width="3.8" height="8.6" rx="1.9" fill="#fff"/></svg><span class="wm">Neeko</span></a>
    <ul class="nl">
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a></li>
      <?php foreach ( nk_services() as $g => $items ) : ?><li><button type="button" aria-haspopup="true"><?php echo esc_html( $g ); ?><svg class="cv" aria-hidden="true"><use href="#i-cv"/></svg></button>
        <div class="dd"><?php foreach ( $items as $s ) : ?><a href="<?php echo esc_url( nk_svc_url( $s[0] ) ); ?>"><i><svg aria-hidden="true"><use href="#<?php echo esc_attr( $s[3] ); ?>"/></svg></i><b><?php echo esc_html( $s[1] ); ?></b><small><?php echo esc_html( $s[2] ); ?></small></a><?php endforeach; ?></div></li>
      <?php endforeach; ?>
      <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#pricing">Pricing</a></li>
      <li><button type="button" aria-haspopup="true">Company<svg class="cv" aria-hidden="true"><use href="#i-cv"/></svg></button>
        <div class="dd">
          <a href="<?php echo esc_url( nk_url( 'about' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-team"/></svg></i><b>About</b><small>Who we are, how we work</small></a>
          <a href="<?php echo esc_url( nk_url( 'articles' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-doc"/></svg></i><b>Articles</b><small>Guides with real prices</small></a>
          <a href="<?php echo esc_url( nk_url( 'faq' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-chat"/></svg></i><b>FAQ</b><small>Timing, scope and pricing</small></a>
          <a href="<?php echo esc_url( nk_url( 'contact' ) ); ?>"><i><svg aria-hidden="true"><use href="#i-mail"/></svg></i><b>Contact</b><small>WhatsApp or email us</small></a></div></li>
    </ul>
    <div class="nr">
      <?php echo nk_lang_switch(); ?><button type="button" class="thm" id="thm" aria-label="Switch to dark mode"><svg class="mo" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 14.5A8 8 0 0 1 9.5 4 8 8 0 1 0 20 14.5z"/></svg><svg class="su" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path d="M12 2.5v2M12 19.5v2M2.5 12h2M19.5 12h2M5.3 5.3l1.4 1.4M17.3 17.3l1.4 1.4M5.3 18.7l1.4-1.4M17.3 6.7l1.4-1.4"/></svg></button>
      <a class="login" href="#">Log in</a>
      <a class="btn btn-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>#brief">Start a brief</a>
      <button class="mb" type="button" aria-label="Menu" aria-expanded="false" aria-controls="mp" id="mb"><svg class="mbo" aria-hidden="true"><use href="#i-menu"/></svg><svg class="mbx" aria-hidden="true"><use href="#i-x"/></svg></button>
    </div>
  </div>
  <nav class="mp" id="mp" aria-label="Mobile">
    <?php foreach ( nk_services() as $g => $items ) : ?><div class="mpg"><span class="mpl"><?php echo esc_html( $g ); ?></span><?php foreach ( $items as $s ) : ?><a class="mpi" href="<?php echo esc_url( nk_svc_url( $s[0] ) ); ?>"><i><svg aria-hidden="true"><use href="#<?php echo esc_attr( $s[3] ); ?>"/></svg></i><b><?php echo esc_html( $s[1] ); ?></b><small><?php echo esc_html( $s[2] ); ?></small></a><?php endforeach; ?></div>
    <?php endforeach; ?><div class="mpc"><a href="<?php echo esc_url( home_url( '/' ) ); ?>#pricing">Pricing</a><a href="<?php echo esc_url( nk_url( 'about' ) ); ?>">About</a><a href="<?php echo esc_url( nk_url( 'articles' ) ); ?>">Articles</a><a href="<?php echo esc_url( nk_url( 'faq' ) ); ?>">FAQ</a><a href="<?php echo esc_url( nk_url( 'contact' ) ); ?>">Contact</a><a href="#">Log in</a></div>
    <?php echo nk_lang_switch( true ); ?>
    <div class="mpa"><a class="btn mpw" href="https://wa.me/60176604771" target="_blank" rel="noopener"><svg aria-hidden="true"><use href="#i-wa"/></svg>WhatsApp us</a><a class="btn btn-blue" href="<?php echo esc_url( home_url( '/' ) ); ?>#brief">Start a brief</a></div>
  </nav>
</header>

