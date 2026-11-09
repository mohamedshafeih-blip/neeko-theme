<?php
/* Neeko: home */
get_header(); ?>
<main>
<section class="hero sky" id="top">
  <div class="wrap hc">
    <span class="pill">Freelance collective in Kuala Lumpur <span class="pls"><i class="p1">Connect</i><i class="p2">Create</i><i class="p3">Build</i></span><b>12 services</b></span>
    <h1>One brief, the right team, prices up front</h1>
    <p class="sub">Websites, marketing, design and software for Malaysian businesses. Pick your goals below to see your team and estimate.</p>
  </div>
    <div class="hb rv in" id="brief">
    
    <div class="nbw">
      <div class="nbh"><h3><span class="wfa" aria-hidden="true"><img src="<?php echo NK_URI; ?>/assets/img/7b1d80ea9991.jpg" alt=""><img src="<?php echo NK_URI; ?>/assets/img/22dd9647dd75.jpg" alt=""><img src="<?php echo NK_URI; ?>/assets/img/3ad4608001e5.jpg" alt=""></span>New brief <small>— Neeko</small></h3><p class="status"><i></i><span id="status">Pick services to see who joins</span></p><span class="wctl" aria-hidden="true"><i class="mn"></i><i class="mx"></i><i class="cl"></i></span></div>
      <div class="nbb">
        <div class="nbs">
          <div class="qk"><p class="qkh"><span>What are your goals?</span><button type="button" class="clr" id="clr" hidden aria-label="Clear goals" title="Clear goals"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 7h16M10 11v6M14 11v6M6 7l1 12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2l1-12M9 7V4h6v3"/></svg></button></p><div class="gls" id="goals"></div><small id="goalhint"></small></div>
          <div class="list" id="list"></div>
        </div>
        <div class="nbm">
          <div class="sizes2"><div class="lb"><b>Your business size</b><span id="sznote">Choose one and we’ll suggest packages.</span></div><div class="seg2" id="seg2" role="group" aria-label="Business size"></div></div>
          <ul class="tl" id="tl" aria-live="polite"></ul>
          <div class="nbf">
            <div><p class="big" id="cnt">0 specialists <small>in one scope</small></p><p class="sum" id="sum"></p></div>
            <div class="r"><a class="btn btn-primary" id="send" target="_blank" rel="noopener" aria-disabled="true"><svg aria-hidden="true"><use href="#i-wa"/></svg>Send this brief</a><a class="alt" id="mail" href="mailto:enquiry@neeko.my">Email it to us</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>

<section class="sec alt" id="features">
  <div class="wrap">
    <div class="sh rv"><h2>Three ways we help you grow</h2><p>Get online, look the part and automate the busywork. Mix and match in one brief.</p></div>
    <div class="c3">
      <article class="fc rv">
        <div class="pv"><div class="aiw rk">
          <div class="aih"><span>Google ranking</span><span class="chip">Sample</span></div>
          <div class="aip"><svg aria-hidden="true"><use href="#i-search"/></svg><span>web design kuala lumpur</span></div>
          <ol class="rkl"><li class="me"><b class="rn"></b><span>yourbrand.my</span><em>↑ 3</em></li><li class="o1"><b class="rn"></b><span>agency-a.my</span></li><li class="o2"><b class="rn"></b><span>agency-b.my</span></li><li class="o3"><b class="rn"></b><span>agency-c.my</span></li></ol>
          </div></div>
        <div class="bd"><h3>Connect</h3><p>Mobile-first WordPress websites, SEO and social media that bring the right people to you.</p><a class="btn btn-line" href="#brief">Plan a website <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div>
      </article>
      <article class="fc rv">
        <div class="pv"><div class="aiw">
          <div class="aih"><span>AI photography</span><span class="chip g">Live</span></div>
          <div class="aip"><svg aria-hidden="true"><use href="#i-spark"/></svg><span class="tp2">Candid editorial, woman holding a poster, sky blue</span></div>
          <div class="aii" style="background-image:url(<?php echo NK_URI; ?>/assets/img/7805d5d69752.jpg)"><span class="gen"><i></i>Generating…</span><span class="bar"><i></i></span></div>
          <div class="aif"><span>1 of 100</span><b>100 images from RM499</b></div>
        </div></div>
        <div class="bd"><h3>Create</h3><p>Posters, social posts, decks and AI brand photography, designed in days, not weeks.</p><a class="btn btn-blue" href="#brief">Brief a designer <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div>
      </article>
      <article class="fc rv">
        <div class="pv"><div class="ch"><p class="u">Do you deliver to Shah Alam?</p><p class="a">Yes! Orders before 3pm arrive next day. Want me to pass you to our team?</p><div class="ty"><i></i><i></i><i></i></div></div>
          <div class="fl"><i><svg><use href="#i-chat"/></svg></i>English + BM</div></div>
        <div class="bd"><h3>Build</h3><p>AI chat assistants, CRM, custom software and apps that answer faster and cut admin work.</p><a class="btn btn-line" href="#brief">Scope a build <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div>
      </article>
    </div>
  </div>
</section>

<section class="sec" id="pricing">
  <div class="wrap">
    <div class="sh rv"><h2>A starting price for every service</h2><p>Pick a service to compare its packages. Your quotation confirms the final scope.</p></div>
    <div class="ptw rv"><div class="ptabs" id="ptabs" role="tablist" aria-label="Services"></div></div>
    <div class="c3" id="plans" role="tabpanel" aria-live="polite"></div>
    <p class="pnote" id="pnote"></p>
  </div>
</section>

<section class="sec" id="tools">
  <div class="wrap">
    <div class="wh rv">
      <div class="sh"><h2>Works with the tools you already use</h2><p>We connect your website, chats, sheets and payments so leads and orders stop falling through the cracks.</p></div>
      <a class="btn btn-blue" href="#brief"><span class="dot"></span>Connect your tools</a>
    </div>
    <div class="ic3"><article class="fc ixc rv"><div class="pv"><div class="wg"><div class="wt"><span>Connected channels</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="lmap"><svg class="lk" aria-hidden="true"></svg><div class="lcol"><span class="ln" style="--c:var(--nk-yel)"><i></i>WhatsApp</span><span class="ln" style="--c:var(--nk-pink)"><i></i>Instagram</span><span class="ln" style="--c:var(--nk-pur)"><i></i>Website</span><span class="ln" style="--c:#1f5bff"><i></i>Email</span></div><div class="hubc"><div class="hh"><b>Inbox</b><em>4 new</em></div><span class="msg"><i class="dt" style="background:var(--nk-yel)"></i>Aisyah · WhatsApp</span><small>Is the RM3,900 package still…</small><span class="msg"><i class="dt" style="background:var(--nk-pink)"></i>@kopi.kl · Instagram</span><small>Do you do product photos?</small></div></div></div></div><div class="bd"><h3>Every channel, one inbox</h3><p>WhatsApp, Instagram and website enquiries land in one place, so no message gets missed.</p><a class="btn btn-line" href="<?php echo esc_url( nk_svc_url( 'ai-chat-assistant' ) ); ?>">AI chat assistant <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></article><article class="fc ixc rv"><div class="pv"><div class="wg"><div class="wt"><span>Leads · Google Sheets</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="sht"><div class="sh-h"><span>Name</span><span>Service</span><span>Status</span></div><div class="sh-r"><span>Hafiz R.</span><span>Website</span><span><em class="st q">Quoted</em></span></div><div class="sh-r"><span>Mei Ling</span><span>SEO</span><span><em class="st c">Contacted</em></span></div><div class="sh-r"><span>Ravi K.</span><span>Social</span><span><em class="st w">Won</em></span></div><div class="sh-r new"><span>Aisyah</span><span>Website</span><span><em class="st n">New</em></span></div><span class="sel" aria-hidden="true"></span><span class="mcur" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 3l14 8-6.2 1.6L10 19z" fill="#0b0d12" stroke="#fff" stroke-width="1.6" stroke-linejoin="round"/></svg><em class="c1">Copied</em><em class="c2">Pasted</em></span></div></div></div><div class="bd"><h3>No more copy and paste</h3><p>Leads and orders flow into Google Sheets or your CRM automatically, with checks and a human handover.</p><a class="btn btn-blue" href="<?php echo esc_url( nk_svc_url( 'integrations' ) ); ?>">Connect your tools <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></article><article class="fc ixc rv"><div class="pv"><div class="wg"><div class="wt"><span>Book a slot</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="cal"><div class="cd"><small>Mon</small><span class="bk">10am</span><span class="">2pm</span><span class="">4pm</span></div><div class="cd"><small>Tue</small><span class="">10am</span><span class="bk">2pm</span><span class="">4pm</span></div><div class="cd"><small>Wed</small><span class="">10am</span><span class="pk">2pm</span><span class="">4pm</span></div><div class="cd"><small>Thu</small><span class="bk">10am</span><span class="">2pm</span><span class="">4pm</span></div><div class="cd"><small>Fri</small><span class="">10am</span><span class="">2pm</span><span class="bk">4pm</span></div><span class="mcur cur2" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 3l14 8-6.2 1.6L10 19z" fill="#0b0d12" stroke="#fff" stroke-width="1.6" stroke-linejoin="round"/></svg></span></div><div class="paid"><i><svg aria-hidden="true"><use href="#i-check"/></svg></i>Wed 2pm booked · RM150 paid</div></div></div><div class="bd"><h3>Bookings and payments</h3><p>Let customers pick a slot and pay online, with records that update your team in real time.</p><a class="btn btn-line" href="<?php echo esc_url( nk_svc_url( 'custom-software' ) ); ?>">Custom software <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></article><article class="fc ixc rv"><div class="pv"><div class="wg"><div class="wt"><span>Website build</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="wbb"><div class="tb"><i></i><i></i><i></i><span>yourbrand.my</span></div><div class="ws"><div class="wn"><b>yourbrand</b><span class="wm">Menu ▾<span class="wdd"><span class="on">Coffee</span><span>Pastries</span><span>Catering</span></span></span><span>About</span><span>Contact</span></div><div class="whero" style="background-image:url(<?php echo NK_URI; ?>/assets/img/756872311167.jpg)"><div><strong>Good coffee, close to home</strong><em>Order now</em></div></div><div class="cs"><span>Menu</span><span>Catering</span><span>Visit us</span></div><span class="mcur cur3" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M5 3l14 8-6.2 1.6L10 19z" fill="#0b0d12" stroke="#fff" stroke-width="1.6" stroke-linejoin="round"/></svg></span></div></div></div></div><div class="bd"><h3>A website built around you</h3><p>Branded WordPress pages that work on any phone, with basic SEO and Google Analytics set up from day one.</p><a class="btn btn-line" href="<?php echo esc_url( nk_svc_url( 'website-design' ) ); ?>">Website design <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></article><article class="fc ixc rv"><div class="pv"><div class="wg"><div class="igp"><div class="igh"><span class="iga">N</span><span><b>yourbrand.my</b><small>Kuala Lumpur</small></span><span class="chip g">Posted</span></div><div class="igi" style="background-image:url(<?php echo NK_URI; ?>/assets/img/9502ac02e56d.jpg)"><span class="hrt"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 5.6-7 10-7 10z" fill="#fff"/></svg></span></div><div class="iga2"><span class="lk2"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 5.6-7 10-7 10z"/></svg><b class="num"></b> likes</span><span class="cap"><b>yourbrand.my</b> Weekend picnic edit is here 🌿</span></div></div></div></div><div class="bd"><h3>Posts that go out on time</h3><p>Your content calendar is planned, designed and scheduled across Instagram and Facebook.</p><a class="btn btn-line" href="<?php echo esc_url( nk_svc_url( 'social-media' ) ); ?>">Social media <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></article><article class="fc ixc rv"><div class="pv"><div class="wg"><div class="wt"><span>Site health</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="hg"><svg viewBox="0 0 120 120" aria-hidden="true"><circle cx="60" cy="60" r="50" class="bg"/><circle cx="60" cy="60" r="50" class="fg"/></svg><div class="hv"><b class="num"></b><small>Healthy</small></div></div><div class="hlc"><span><i></i>Backup</span><span><i></i>Updates</span><span><i></i>Security</span></div></div></div><div class="bd"><h3>A website that stays healthy</h3><p>Backups, updates, security checks and small edits handled every month, so nothing breaks quietly.</p><a class="btn btn-line" href="<?php echo esc_url( nk_svc_url( 'website-care' ) ); ?>">Website care <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div></article></div>
  </div>
</section>

<section class="sec" id="faq">
  <div class="wrap">
    <div class="fqg">
      <div class="fqh rv"><h2>Questions, answered</h2><p>Can’t find what you need? Start a brief and a real person replies.</p><a class="btn btn-blue" href="#brief">Start your brief <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div>
      <article class="fqc rv" id="faq-how-long-does-a-website-take"><button class="fqq" type="button" aria-expanded="false"><span>How long does a website take?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="wt"><span>Build time</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="tlb"><div>Starter<i style="--w:45%">7–10 days</i></div><div>Growth<i class="on" style="--w:64%">10–14 days</i></div><div>Pro<i style="--w:100%">14–21 days</i></div></div></div></div><p>About 7–10 days for Starter, 10–14 days for Growth and 14–21 days for Pro. Timing depends on content, access and approvals.</p></div></div></article><article class="fqc rv open" id="faq-can-i-request-changes-during-the-build"><button class="fqq" type="button" aria-expanded="true"><span>Can I request changes during the build?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="wt"><span>Staging versions</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="vs"><b class="vk"></b><span>v1</span><span>v2</span><span>v3</span><span>v4 ✓</span></div></div></div><p>Yes. Website builds include unlimited amendments on staging within the agreed scope. New features are quoted separately.</p></div></div></article><article class="fqc rv" id="faq-is-there-a-minimum-commitment"><button class="fqq" type="button" aria-expanded="false"><span>Is there a minimum commitment?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="wt"><span>Billing</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><div class="mo"><span class="on">M1</span><span class="on">M2</span><span class="on">M3</span><span>M4</span><span>M5</span><span>M6</span></div><small>3 months upfront, then month to month</small></div></div><p>Social media, SEO and monthly bundles start with 3 months upfront, then continue month to month.</p></div></div></article><article class="fqc rv" id="faq-do-you-guarantee-seo-rankings"><button class="fqq" type="button" aria-expanded="false"><span>Do you guarantee SEO rankings?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="wt"><span>Campaign cycle</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><ol class="ps"><li class="d">Research priorities</li><li class="c">Optimise pages</li><li>Review and report</li></ol></div></div><p>No. Search results build over time and depend on competition and your website. We agree the work up front and report on what was done.</p></div></div></article><article class="fqc rv" id="faq-will-an-ai-assistant-replace-my-team"><button class="fqq" type="button" aria-expanded="false"><span>Will an AI assistant replace my team?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="cw"><div class="ch2"><span class="av"><svg aria-hidden="true"><use href="#i-spark"/></svg></span><span class="nm">AI assistant<small>Online</small></span><span class="lang2">EN · BM</span></div><div class="m u">Can I change my booking?</div><div class="row"><span class="av"><svg aria-hidden="true"><use href="#i-spark"/></svg></span><div class="stk"><div class="ty2" aria-hidden="true"><i></i><i></i><i></i></div><div class="m a">Sure. I’ll pass you to our team with your booking details.</div></div></div><div class="sys"><i><svg aria-hidden="true"><use href="#i-team"/></svg></i>Team member joined</div></div></div></div><p>No. It answers approved FAQs, captures enquiry details and hands over to a person when needed.</p></div></div></article><article class="fqc rv" id="faq-are-the-prices-final"><button class="fqq" type="button" aria-expanded="false"><span>Are the prices final?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="wt"><span>Your quotation</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><ul class="qc"><li><svg aria-hidden="true"><use href="#i-check"/></svg>Scope and timing</li><li><svg aria-hidden="true"><use href="#i-check"/></svg>Payment milestones</li><li class="x"><svg aria-hidden="true"><use href="#i-check"/></svg>Licences, ad spend (separate)</li></ul></div></div><p>They’re starting prices. Your quotation confirms scope, timing, payment milestones and any separate costs like licences or ad spend.</p></div></div></article><article class="fqc rv" id="faq-what-do-you-need-from-me"><button class="fqq" type="button" aria-expanded="false"><span>What do you need from me?</span><i aria-hidden="true"></i></button><div class="fqx"><div><div class="pv"><div class="wg"><div class="wt"><span>Your checklist</span><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><i><svg aria-hidden="true"><use href="#i-ne"/></svg></i></div><ul class="qc"><li><svg aria-hidden="true"><use href="#i-check"/></svg>Business information</li><li><svg aria-hidden="true"><use href="#i-check"/></svg>Logo and brand assets</li><li><svg aria-hidden="true"><use href="#i-check"/></svg>System access</li><li class="x"><svg aria-hidden="true"><use href="#i-check"/></svg>One round of feedback per review</li></ul></div></div><p>Accurate information, your brand assets and access to any systems we connect. Then one consolidated set of feedback at each review.</p></div></div></article>
    </div>
  </div>
</section>

<section class="cta" id="news">
  <div class="ctab"><div class="wrap ctg">
    <div class="ctl">
      <h2>Ready when you are</h2>
      <p class="s">Pick your goals, see your team and estimate, then send it to us on WhatsApp.</p>
      <div class="cbt"><a class="btn btn-white" href="#brief">Start your brief <svg aria-hidden="true"><use href="#i-ne"/></svg></a><a class="btn btn-ghost" href="https://wa.me/60176604771" target="_blank" rel="noopener"><svg aria-hidden="true"><use href="#i-wa"/></svg>Chat on WhatsApp</a></div>
    </div>
    <div class="ctw2 rv">
      <div class="cwh"><img src="<?php echo NK_URI; ?>/assets/img/693ee0f3d29d.jpg" alt="" width="36" height="36"><div><b>Hafiz · Neeko</b><small>Sales advisor · Online</small></div><span class="cwt">WhatsApp</span></div>
      <div class="cwb" id="cwb" role="log" aria-live="polite" aria-label="Chat with Neeko"></div>
      <form class="cwi" id="cwf" action="https://wa.me/60176604771" target="_blank"><label class="sr" for="cwm">Message to Neeko on WhatsApp</label><input id="cwm" name="text" type="text" autocomplete="off" placeholder="Type a message" maxlength="500"><button type="submit" aria-label="Send on WhatsApp"><svg aria-hidden="true" viewBox="0 0 24 24"><path d="M3.4 20.4 21 12 3.4 3.6 3.4 10.2 15 12 3.4 13.8z" fill="currentColor"/></svg></button></form>
    </div>
  </div></div>
</section>
</main>
<?php get_footer();
