<?php
/* Neeko: service page still being built. Data in inc/soon.php (blurred preview + "Updating" window + real packages). */
$S = nk_soon_cur();
if ( ! $S ) { include NK_DIR . '/page.php'; return; }
list( $slug, $d ) = $S;
get_header();
$wa  = 'https://wa.me/60176604771?text=' . rawurlencode( 'Hi Neeko, I would like to know more about ' . $d['name'] . '.' );
$rm  = function ( $n ) { return 'RM' . number_format( $n ); };
$ico = function ( $i ) { return '<svg aria-hidden="true"><use href="#' . esc_attr( $i ) . '"/></svg>'; };
$btn = '<a class="btn btn-blue" href="' . esc_url( $wa ) . '" target="_blank" rel="noopener">' . $ico( 'i-wa' ) . 'Ask on WhatsApp</a><a class="btn btn-line" href="#pgU-pk">See packages</a>';
?>
<main class="pgU-pg">
<section class="pgU" id="top">
  <div class="pgU-bl" aria-hidden="true" inert>
	<div class="pgU-mh"><small><?php echo esc_html( $d['group'] ); ?> · <?php echo esc_html( $d['name'] ); ?></small><b><?php echo esc_html( $d['h1'] ); ?></b><p><?php echo esc_html( $d['sub'] ); ?></p><span><i></i><i></i></span></div>
	<div class="pgU-g">
	<?php foreach ( $d['win'] as $w ) : ?>
	<div class="hw pgU-w pgU-<?php echo esc_attr( $w[2] ); ?>">
		<?php if ( 'photo' === $w[2] ) : ?>
		<img src="<?php echo esc_url( $w[3] ); ?>" alt="" loading="lazy" decoding="async">
		<?php else : ?>
		<div class="hwt"><span class="hwn"><?php echo esc_html( $w[0] ); ?></span><i class="hi"><?php echo $ico( $w[1] ); // phpcs:ignore ?></i></div>
			<?php if ( 'chat' === $w[2] ) : foreach ( $w[3] as $m ) : ?>
		<div class="pgU-b<?php echo $m[1] ? ' me' : ''; ?>"><?php echo esc_html( $m[0] ); ?></div>
			<?php endforeach; elseif ( 'list' === $w[2] ) : foreach ( $w[3] as $r ) : ?>
		<div class="pgU-r"><i></i><?php echo esc_html( $r ); ?></div>
			<?php endforeach; else : ?>
		<div class="pgU-st"><?php foreach ( $w[3] as $s ) : ?><div><small><?php echo esc_html( $s[0] ); ?></small><b><?php echo esc_html( $s[1] ); ?></b></div><?php endforeach; ?></div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php endforeach; ?>
	</div>
  </div>

  <div class="pgU-fl pgU-f1" aria-hidden="true"><i class="pgU-sp"></i><span>Writing FAQ answers</span><b class="pgU-dt"><i></i><i></i><i></i></b></div>
  <div class="pgU-fl pgU-f2" aria-hidden="true"><img src="<?php echo NK_URI; ?>/assets/img/<?php echo 'website-care' === $slug ? 'nk-about-team' : 'nk-about-create'; ?>.webp" alt=""><span>Placing real photos</span><b class="pgU-mb"><i></i></b></div>

  <section class="hw pgU-ov" id="pgU-pk" aria-labelledby="pgU-t">
	<div class="hwt"><span class="hwn"><i class="pgU-sp" aria-hidden="true"></i><span id="pgU-t">Updating this page</span></span><a class="hi" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener" aria-label="Ask on WhatsApp"><?php echo $ico( 'i-wa' ); // phpcs:ignore ?></a></div>
	<div class="pgU-hd">
	  <i class="pgU-ic"><?php echo $ico( $d['icon'] ); // phpcs:ignore ?></i>
	  <div><h1><?php echo esc_html( $d['name'] ); ?></h1><small>The full page is on its way. Packages and prices below are current.</small></div>
	</div>
	<div class="pgU-bar" role="progressbar" aria-label="Page progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="68"><i></i></div>
	<ul class="pgU-tk">
	  <li class="dn"><i><?php echo $ico( 'i-check' ); // phpcs:ignore ?></i><span><?php echo esc_html( $d['tasks'][0] ); ?></span><em>Done</em></li>
	  <li class="on"><i class="pgU-sp" aria-hidden="true"></i><span><?php echo esc_html( $d['tasks'][1] ); ?></span><em>In progress</em></li>
	  <li><i></i><span><?php echo esc_html( $d['tasks'][2] ); ?></span><em>Next</em></li>
	</ul>
	<p class="pgU-l">Packages</p>
	<ul class="pgU-pk">
	<?php foreach ( $d['pk'] as $n => $p ) : ?>
	  <li<?php echo 1 === $n ? ' class="hi"' : ''; ?>><span><b><?php echo esc_html( $p[0] ); ?></b><small><?php echo esc_html( $p[3] ); ?></small></span><span class="pgU-p"><?php
		if ( $p[1] ) {
			echo '<b>' . esc_html( $rm( $p[1] ) ) . '</b>' . ( $p[2] ? '<small>then ' . esc_html( $rm( $p[2] ) ) . '/mo</small>' : '<small>one-off</small>' );
		} else {
			echo '<b>' . esc_html( $rm( $p[2] ) ) . '</b><small>per month</small>';
		}
		?></span></li>
	<?php endforeach; ?>
	</ul>
	<div class="pgU-bt"><a class="btn btn-blue" href="<?php echo esc_url( $wa ); ?>" target="_blank" rel="noopener"><?php echo $ico( 'i-wa' ); // phpcs:ignore ?>Ask on WhatsApp</a><a class="btn btn-line" href="<?php echo esc_url( home_url( '/#brief' ) ); ?>">Start your brief</a></div>
  </section>
</section>
</main>
<?php get_footer();
