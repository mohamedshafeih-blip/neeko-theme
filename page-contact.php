<?php
/* Neeko: contact */
get_header();
$I = NK_URI . '/assets/img/';
?>
<main>
<?php nk_page_hero(
	array( array( 'Contact', null ) ),
	'Talk to a real person at Neeko',
	'Send a quick message on WhatsApp, email us, or fill in the form below. Tell us what you need and we’ll reply with next steps and a quotation.'
); ?>

<section class="sec" id="message"><div class="wrap pgct">
  <form class="pgfm rv" id="pgfm" novalidate>
    <div class="pgfh"><h2>Send us a message</h2><p>It opens WhatsApp with your message ready to send. Prefer email? Use the second button.</p></div>
    <div class="pgfr">
      <label class="pgf"><span>Your name</span><input name="name" type="text" autocomplete="name" required placeholder="Aisyah Rahman"></label>
      <label class="pgf"><span>Company or brand</span><input name="company" type="text" autocomplete="organization" placeholder="Kopi Lane Sdn Bhd"></label>
    </div>
    <div class="pgfr">
      <label class="pgf"><span>Phone or email</span><input name="contact" type="text" autocomplete="email" required placeholder="012-345 6789"></label>
      <label class="pgf"><span>What do you need?</span><select name="need"><option value="">Not sure yet</option><?php foreach ( nk_services() as $g => $items ) : ?><optgroup label="<?php echo esc_attr( $g ); ?>"><?php foreach ( $items as $s ) : ?><option><?php echo esc_html( $s[1] ); ?></option><?php endforeach; ?></optgroup><?php endforeach; ?></select></label>
    </div>
    <label class="pgf"><span>Message</span><textarea name="msg" rows="5" required placeholder="A few lines about your business, what you’d like done and any deadline."></textarea></label>
    <p class="pger" id="pger" role="alert" hidden></p>
    <div class="pgfa"><button class="btn btn-blue" type="submit"><svg aria-hidden="true"><use href="#i-wa"/></svg>Send on WhatsApp</button><button class="btn btn-line" type="button" id="pgml"><svg aria-hidden="true"><use href="#i-mail"/></svg>Send by email</button></div>
    <p class="pgfn">We only use these details to reply to you. See our <a href="<?php echo esc_url( nk_url( 'privacy' ) ); ?>">privacy policy</a>.</p>
  </form>

  <aside class="pgcs">
    <figure class="pgcp rv"><img src="<?php echo $I; ?>nk-contact.webp" alt="A Neeko team member holding a tablet in the studio" width="1200" height="675" loading="eager"></figure>
    <a class="pgcc rv" href="https://wa.me/60176604771" target="_blank" rel="noopener"><i class="wa"><svg aria-hidden="true"><use href="#i-wa"/></svg></i><span><small>WhatsApp</small><b>+60 17-660 4771</b></span><svg class="ar" aria-hidden="true"><use href="#i-ne"/></svg></a>
    <a class="pgcc rv" href="mailto:enquiry@neeko.my"><i><svg aria-hidden="true"><use href="#i-mail"/></svg></i><span><small>Email</small><b>enquiry@neeko.my</b></span><svg class="ar" aria-hidden="true"><use href="#i-ne"/></svg></a>
    <div class="pgcc rv"><i><svg aria-hidden="true"><use href="#i-pin"/></svg></i><span><small>Based in</small><b>Kuala Lumpur, Malaysia</b></span></div>
    <div class="pgcc rv"><i><svg aria-hidden="true"><use href="#i-clock"/></svg></i><span><small>Replies</small><b>Business hours, Malaysia time</b></span></div>
  </aside>
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

<?php nk_page_cta( 'Rather plan it yourself?', 'Pick your goals in the brief builder to see your team and estimate, then send it to us.' ); ?>
</main>
<script>
(()=>{const f=document.getElementById('pgfm');if(!f)return;const er=document.getElementById('pger');
const txt=()=>{const v=n=>(f.elements[n].value||'').trim();const need=v('need')||'Not sure yet';return `Hi Neeko, I'd like to get in touch.\n\nName: ${v('name')}\nCompany: ${v('company')||'-'}\nContact: ${v('contact')}\nNeed: ${need}\n\n${v('msg')}`};
const ok=()=>{const bad=[...f.querySelectorAll('[required]')].filter(x=>!x.value.trim());const c=f.elements.contact.value.trim();const cOk=!c||/@.+\./.test(c)||c.replace(/\D/g,'').length>=8;
 f.querySelectorAll('.pgf').forEach(l=>l.classList.remove('bad'));bad.forEach(x=>x.closest('.pgf').classList.add('bad'));if(!cOk)f.elements.contact.closest('.pgf').classList.add('bad');
 if(bad.length||!cOk){er.hidden=false;er.textContent=!cOk&&!bad.length?'Please enter a valid phone number or email.':'Please fill in your name, contact and message.';(bad[0]||f.elements.contact).focus();return false}er.hidden=true;return true};
f.addEventListener('submit',e=>{e.preventDefault();if(ok())window.open('https://wa.me/60176604771?text='+encodeURIComponent(txt()),'_blank','noopener')});
document.getElementById('pgml').addEventListener('click',()=>{if(ok())location.href='mailto:enquiry@neeko.my?subject='+encodeURIComponent('Enquiry from '+f.elements.name.value.trim())+'&body='+encodeURIComponent(txt())});
f.addEventListener('input',e=>{const l=e.target.closest('.pgf');if(l&&e.target.value.trim())l.classList.remove('bad')});})();
</script>
<?php get_footer();
