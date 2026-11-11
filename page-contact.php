<?php
/* Neeko: contact */
get_header();
$I = NK_URI . '/assets/img/';
?>
<main>
<?php nk_page_hero(
	array( array( 'Contact', null ) ),
	'Talk to a real person at Neeko',
	'Write your message below and send it on WhatsApp or by email. Tell us what you need and we’ll reply with next steps and a quotation.',
	'', 'pg-hero-w', true
);
$side  = nk_side_head( 'Contact Neeko', 'Usually replies the same day' ) . '<p class="pgW-l">Channels</p><nav class="pgW-nv pgc-ch">';
$side .= '<a href="https://wa.me/60176604771" target="_blank" rel="noopener"><i class="wa"><svg aria-hidden="true"><use href="#i-wa"/></svg></i><span><b>WhatsApp</b><small>+60 17-660 4771</small></span></a>';
$side .= '<a href="mailto:enquiry@neeko.my"><i><svg aria-hidden="true"><use href="#i-mail"/></svg></i><span><b>Email</b><small>enquiry@neeko.my</small></span></a>';
$side .= '<a href="' . esc_url( home_url( '/#brief' ) ) . '"><i><svg aria-hidden="true"><use href="#i-pen"/></svg></i><span><b>Brief builder</b><small>Pick services, get an estimate</small></span></a>';
$side .= '</nav><p class="pgW-l">Details</p><ul class="pgc-dt"><li><svg aria-hidden="true"><use href="#i-pin"/></svg>Kuala Lumpur, Malaysia</li><li><svg aria-hidden="true"><use href="#i-clock"/></svg>Replies in business hours</li><li><svg aria-hidden="true"><use href="#i-chat"/></svg>English or Bahasa Malaysia</li></ul>';
$side .= '<figure class="pgc-ph"><img src="' . $I . 'nk-contact.webp" alt="A Neeko team member holding a tablet in the studio" width="1200" height="675" loading="eager"></figure>';
nk_win_start( 'New message', array( array( 'i-wa', 'https://wa.me/60176604771', 'Open WhatsApp', true ), array( 'i-mail', 'mailto:enquiry@neeko.my', 'Email Neeko' ) ), $side, 'pgW-ct' );
?>
  <form class="pgc-fm" id="pgfm" novalidate>
    <div class="pgc-to"><span>To</span><i class="pgD-av" aria-hidden="true">N</i><b>Neeko</b><small>Hafiz · Sales advisor</small></div>
    <label class="pgc-r"><span>Name</span><input name="name" type="text" autocomplete="name" required placeholder="Aisyah Rahman"></label>
    <label class="pgc-r"><span>Company</span><input name="company" type="text" autocomplete="organization" placeholder="Kopi Lane Sdn Bhd (optional)"></label>
    <label class="pgc-r"><span>Reply to</span><input name="contact" type="text" autocomplete="email" required placeholder="Phone or email"></label>
    <div class="pgc-r pgc-tp"><span>Topic</span><div class="pgc-cp" role="radiogroup" aria-label="Topic">
      <?php $first = true; foreach ( array( 'Not sure yet', 'Website', 'SEO', 'Social media', 'Graphic design', 'AI photography', 'AI chat assistant', 'Software and apps', 'Website care' ) as $t ) : ?><label><input type="radio" name="need" value="<?php echo esc_attr( $t ); ?>"<?php echo $first ? ' checked' : ''; ?>><span><?php echo esc_html( $t ); ?></span></label><?php $first = false; endforeach; ?>
    </div></div>
    <label class="pgc-r pgc-ms"><span class="sr">Message</span><textarea name="msg" rows="7" required placeholder="Hi Neeko, a few lines about your business, what you’d like done and any deadline…"></textarea></label>
    <p class="pger" id="pger" role="alert" hidden></p>
    <div class="pgc-bar"><button class="btn btn-blue" type="submit"><svg aria-hidden="true"><use href="#i-wa"/></svg>Send on WhatsApp</button><button class="btn btn-line" type="button" id="pgml"><svg aria-hidden="true"><use href="#i-mail"/></svg>Send by email</button><p class="pgfn">Used only to reply to you. <a href="<?php echo esc_url( nk_url( 'privacy' ) ); ?>">Privacy</a></p></div>
  </form>
<?php nk_win_end(); ?>
</div></section>

<section class="sec" id="faq"><div class="wrap">
  <div class="fqg">
    <div class="fqh rv"><h2>Before you get in touch</h2><p>Quick answers about enquiries and quotations.</p><div class="fqa"><a class="btn btn-blue" href="<?php echo esc_url( home_url( '/#brief' ) ); ?>">Start your brief <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></div>
    <?php
	$Q = array(
		array( 'what-to-include', 'What should I include in my first message?', 'Your business name, what you’d like done, any deadline and links to your current website or social pages. If you already know the service, the brief builder on our homepage gives you an estimate first.' ),
		array( 'quotation', 'Do I get a quotation before paying anything?', 'Yes. Your quotation confirms the deliverables, timing, responsibilities, payment milestones and any separate costs such as licences, hosting or ad spend. Work starts once you accept it.' ),
		array( 'outside-kl', 'Do you work with businesses outside Kuala Lumpur?', 'Yes. We work with businesses across Malaysia. Briefs, reviews and handovers happen on WhatsApp, email and video calls, so location doesn’t slow the work down.' ),
		array( 'language', 'Can we talk in Bahasa Malaysia?', 'Yes. You can message us in English or Bahasa Malaysia, and AI assistants can be set up in both languages.' ),
	);
	foreach ( $Q as $n => $q ) :
		?>
    <article class="fqc rv<?php echo 1 === $n ? ' open' : ''; ?>" id="faq-<?php echo esc_attr( $q[0] ); ?>"><button class="fqq" type="button" aria-expanded="<?php echo 1 === $n ? 'true' : 'false'; ?>"><span><?php echo esc_html( $q[1] ); ?></span><i aria-hidden="true"></i></button><div class="fqx"><div><p><?php echo esc_html( $q[2] ); ?></p></div></div></article>
	<?php endforeach; ?>
  </div>
</div></section>

<?php nk_page_cta( 'Rather plan it yourself?', 'Pick your goals in the brief builder to see your team and estimate, then send it to us.', true ); ?>
</main>
<script>
(()=>{const f=document.getElementById('pgfm');if(!f)return;const er=document.getElementById('pger');
const txt=()=>{const v=n=>(f.elements[n].value||'').trim();const need=(f.querySelector('[name=need]:checked')||{}).value||'Not sure yet';return `Hi Neeko, I'd like to get in touch.\n\nName: ${v('name')}\nCompany: ${v('company')||'-'}\nContact: ${v('contact')}\nNeed: ${need}\n\n${v('msg')}`};
const ok=()=>{const bad=[...f.querySelectorAll('[required]')].filter(x=>!x.value.trim());const c=f.elements.contact.value.trim();const cOk=!c||/@.+\./.test(c)||c.replace(/\D/g,'').length>=8;
 f.querySelectorAll('.pgc-r').forEach(l=>l.classList.remove('bad'));bad.forEach(x=>x.closest('.pgc-r').classList.add('bad'));if(!cOk)f.elements.contact.closest('.pgc-r').classList.add('bad');
 if(bad.length||!cOk){er.hidden=false;er.textContent=!cOk&&!bad.length?'Please enter a valid phone number or email.':'Please fill in your name, contact and message.';(bad[0]||f.elements.contact).focus();return false}er.hidden=true;return true};
f.addEventListener('submit',e=>{e.preventDefault();if(ok())window.open('https://wa.me/60176604771?text='+encodeURIComponent(txt()),'_blank','noopener')});
document.getElementById('pgml').addEventListener('click',()=>{if(ok())location.href='mailto:enquiry@neeko.my?subject='+encodeURIComponent('Enquiry from '+f.elements.name.value.trim())+'&body='+encodeURIComponent(txt())});
f.addEventListener('input',e=>{const l=e.target.closest('.pgc-r');if(l&&e.target.value.trim())l.classList.remove('bad')});})();
</script>
<?php get_footer();
