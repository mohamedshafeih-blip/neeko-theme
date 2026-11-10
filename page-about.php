<?php
/* Neeko: about */
get_header();
$I = NK_URI . '/assets/img/';
$S = nk_services();
?>
<main>
<?php nk_page_hero(
	array( array( 'About', null ) ),
	'Independent minds. One Neeko.',
	'Neeko is a freelancer collective in Kuala Lumpur. We bring creative, marketing and technical specialists together around one clear business brief, with prices published up front.',
	'<a class="btn btn-blue" href="' . esc_url( home_url( '/#brief' ) ) . '">Start your brief <svg aria-hidden="true"><use href="#i-ne"/></svg></a><a class="btn btn-line" href="#how">How we work</a>'
); ?>

<section class="sec" id="who"><div class="wrap pgsp">
  <figure class="pgph rv"><img src="<?php echo $I; ?>nk-about-team.webp" alt="Neeko specialists reviewing a project together around a table" width="896" height="672" loading="eager"></figure>
  <div class="pgsx rv">
    <span class="eb">Our way of working</span>
    <h2>The right skills. A shared direction.</h2>
    <p>Most businesses don’t need a big agency, and they don’t want to manage five freelancers either. Neeko sits in between: we bring the relevant specialists into your scope, from visual communication and customer touchpoints to the systems behind the work.</p>
    <p>You get one brief, one quotation and one point of contact, while the work is done by people who focus on that craft every day.</p>
    <dl class="pgfx">
      <div><dt>12</dt><dd>Services in one brief</dd></div>
      <div><dt>3</dt><dd>Practices: Create, Connect, Build</dd></div>
      <div><dt>RM120</dt><dd>Lowest starting price, all published</dd></div>
    </dl>
  </div>
</div></section>

<section class="sec" id="practices"><div class="wrap">
  <div class="sh rv"><h2>Three practices, one team</h2><p>Start with one need, or connect the work across your customer journey and operations.</p></div>
  <div class="c3 pgpr">
    <?php
	$P = array(
		array( 'Create', 'Design, content and imagery', 'Posters, social posts, decks and AI brand photography, designed in days.', 'nk-about-create.webp', 'A designer arranging products for a photo shoot' ),
		array( 'Connect', 'Websites, search and social', 'Mobile-first WordPress websites, SEO and social media that bring the right people to you.', 'nk-about-connect.webp', 'A web designer presenting a website layout on screen' ),
		array( 'Build', 'Software, systems and automation', 'AI chat assistants, CRM, integrations, custom software and apps that cut admin work.', 'nk-about-build.webp', 'A developer testing an app on a phone next to his laptop' ),
	);
	foreach ( $P as $n => $p ) :
		?>
    <article class="fc rv pgpc">
      <div class="pv pgpi"><img src="<?php echo $I . $p[3]; ?>" alt="<?php echo esc_attr( $p[4] ); ?>" width="760" height="570" loading="lazy"><span class="pgpn">0<?php echo $n + 1; ?></span></div>
      <div class="bd"><h3><?php echo esc_html( $p[0] ); ?> <small><?php echo esc_html( $p[1] ); ?></small></h3><p><?php echo esc_html( $p[2] ); ?></p>
        <div class="pgsl"><?php foreach ( $S[ $p[0] ] as $s ) : ?><a href="<?php echo esc_url( nk_svc_url( $s[0] ) ); ?>"><svg aria-hidden="true"><use href="#<?php echo esc_attr( $s[3] ); ?>"/></svg><?php echo esc_html( $s[1] ); ?></a><?php endforeach; ?><?php if ( 'Build' === $p[0] ) : ?><a href="<?php echo esc_url( nk_svc_url( 'website-care' ) ); ?>"><svg aria-hidden="true"><use href="#i-shield"/></svg>Website care</a><?php endif; ?></div>
      </div>
    </article>
	<?php endforeach; ?>
  </div>
</div></section>

<section class="sec" id="how"><div class="wrap">
  <div class="sh rv"><h2>A clear process, with room to refine</h2><p>A project moves forward when the scope, responsibilities and review points are clear.</p></div>
  <ol class="pgst">
    <li class="rv"><i>01</i><h3>Understand</h3><p>Your business, audience, current assets and the problem to solve.</p></li>
    <li class="rv"><i>02</i><h3>Agree</h3><p>Deliverables, timing, responsibilities, review points and the commercial scope.</p></li>
    <li class="rv"><i>03</i><h3>Create and build</h3><p>Design, content or development, with reviews at the planned stages.</p></li>
    <li class="rv"><i>04</i><h3>Launch and continue</h3><p>Agreed checks, final approval and handover, followed by support or recurring work.</p></li>
  </ol>
  <div class="pgyp rv"><span class="pgyi"><svg aria-hidden="true"><use href="#i-check"/></svg></span><p><b>Your part in the process.</b> Accurate information, brand assets, relevant system access and one consolidated set of feedback at each review.</p><a class="btn btn-line" href="<?php echo esc_url( home_url( '/#faq' ) ); ?>">Read the FAQ <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div>
</div></section>

<section class="sec" id="values"><div class="wrap">
  <div class="sh rv"><h2>What you can expect from us</h2><p>The same promises on every project, big or small.</p></div>
  <div class="pgvg">
    <article class="pgvc rv"><i><svg aria-hidden="true"><use href="#i-card"/></svg></i><h3>Prices up front</h3><p>Every service shows a starting price. Your quotation confirms scope, timing, payment milestones and anything billed separately.</p></article>
    <article class="pgvc rv"><i><svg aria-hidden="true"><use href="#i-pen"/></svg></i><h3>Room to refine</h3><p>Website builds include unlimited amendments on staging within the agreed scope. Other services follow their stated revision allowance.</p></article>
    <article class="pgvc rv"><i><svg aria-hidden="true"><use href="#i-team"/></svg></i><h3>People in the loop</h3><p>Automation answers the routine questions. A real person handles everything that needs judgement.</p></article>
    <article class="pgvc rv"><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><h3>Honest reporting</h3><p>We agree the work before it starts and report on what was done. No guaranteed rankings, no vanity numbers.</p></article>
  </div>
  <p class="pgco rv">Neeko is a trading name of <b>Berdua Sama Niaga</b> (003225924-X), registered in Malaysia.</p>
</div></section>

<?php nk_page_cta( 'Let’s scope your next project', 'Tell us what you need. We’ll bring the right specialists and send a clear quotation.' ); ?>
</main>
<?php get_footer();
