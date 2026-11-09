

<footer><div class="wrap">
  <div class="fg">
    <div><a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Neeko home"><svg class="lgi" viewBox="0 0 32 32" aria-hidden="true"><path fill="#1f5bff" d="M16 3c9.6 0 13 3.4 13 13s-3.4 13-13 13S3 25.6 3 16 6.4 3 16 3Z"/><rect x="10.2" y="11.7" width="3.8" height="8.6" rx="1.9" fill="#fff"/><rect x="18" y="11.7" width="3.8" height="8.6" rx="1.9" fill="#fff"/></svg><span class="wm">Neeko</span></a><p>A freelancer collective in Kuala Lumpur. Creative minds, connected solutions.</p></div>
    <div><h4>Services</h4><ul><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#features">Connect</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#features">Create</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#features">Build</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#pricing">Pricing</a></li></ul></div>
    <div><h4>Company</h4><ul><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#tools">Integrations</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#faq">FAQ</a></li><li><a href="<?php echo esc_url( home_url( '/' ) ); ?>#brief">Start a brief</a></li></ul></div>
    <div><h4>Contact</h4><ul><li><a href="https://wa.me/60176604771" target="_blank" rel="noopener">+60 17-660 4771</a></li><li><a href="mailto:enquiry@neeko.my">enquiry@neeko.my</a></li><li>Kuala Lumpur, Malaysia</li></ul></div>
  </div>
  <div class="leg"><span>&copy;&nbsp;2026 Berdua Sama Niaga (003225924-X)</span><span>Privacy · Terms</span></div>
</div></footer>

<script>
(()=>{
const nav=document.getElementById('nav'),mb=document.getElementById('mb');
mb.onclick=()=>{const o=nav.classList.toggle('open');mb.setAttribute('aria-expanded',o)};
nav.querySelectorAll('.mp a').forEach(a=>a.onclick=()=>{nav.classList.remove('open');mb.setAttribute('aria-expanded',false)});
document.querySelectorAll('.lang button').forEach(b=>b.onclick=()=>b.parentNode.querySelectorAll('button').forEach(x=>x.setAttribute('aria-pressed',x===b)));
// newsletter -> email
const nlf=document.getElementById('nlf');if(nlf)nlf.onsubmit=e=>{e.preventDefault();const v=document.getElementById('nle').value;location.href='mailto:enquiry@neeko.my?subject='+encodeURIComponent('Newsletter signup')+'&body='+encodeURIComponent('Please add '+v+' to the Neeko newsletter.')};
// faq pile: all cards open; click brings one to the front
const pile=document.getElementById('pile');
if(pile){const cards=[...pile.querySelectorAll('.fd')];let z=300;
  cards.forEach((c,i)=>c.dataset.z=i+1);
  const bring=c=>{if(c.classList.contains('top')){c.classList.remove('top');c.style.zIndex=c.dataset.z;return}
    cards.forEach(x=>{if(x.classList.contains('top')){x.classList.remove('top');x.style.zIndex=x.dataset.z}});c.classList.add('top');c.style.zIndex=++z};
  pile.addEventListener('click',e=>{const c=e.target.closest('.fd');if(c)bring(c)});
  pile.addEventListener('keydown',e=>{if((e.key==='Enter'||e.key===' ')&&e.target.classList.contains('fd')){e.preventDefault();bring(e.target)}});}
// checklist rows: fade in one by one when seen or brought to front
const play=q=>{q.classList.remove('play');void q.offsetWidth;q.classList.add('play')};
const qio=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)play(e.target)}),{threshold:.4});
document.querySelectorAll('.qc').forEach(q=>qio.observe(q));
document.getElementById('pile')?.addEventListener('click',e=>{const c=e.target.closest('.fd');if(c&&c.classList.contains('top'))c.querySelectorAll('.qc').forEach(play)});
if(matchMedia('(prefers-reduced-motion:reduce)').matches)document.querySelectorAll('.qc').forEach(q=>q.classList.add('play'));
// linked inbox map: draw dotted links from each app to the inbox card
const drawMaps=()=>document.querySelectorAll('.lmap').forEach(m=>{const svg=m.querySelector('.lk'),r=m.getBoundingClientRect(),h=m.querySelector('.hubc').getBoundingClientRect();
  const ex=h.left-r.left,ey=h.top-r.top+h.height/2,rm=matchMedia('(prefers-reduced-motion:reduce)').matches;
  const C=['#FFE65A','#FF94FE','#8E7EFC','#1F5BFF'];
  svg.innerHTML=[...m.querySelectorAll('.ln')].map((ic,k)=>{const b=ic.getBoundingClientRect(),sx=b.right-r.left+2,sy=b.top-r.top+b.height/2,mx=(sx+ex)/2,
    d=`M${sx} ${sy} C${mx} ${sy} ${mx} ${ey} ${ex} ${ey}`;
    return `<path d="${d}"/>`+(rm?`<circle r="3.5" fill="${C[k]}" cx="${sx+6}" cy="${sy}"/>`:[0,1].map(j=>`<circle r="3.5" fill="${C[k]}"><animateMotion dur="2.8s" begin="-${(k*0.7+j*1.4).toFixed(2)}s" repeatCount="indefinite" path="${d}"/></circle>`).join(''))}).join('')});
drawMaps();addEventListener('resize',drawMaps);document.fonts&&document.fonts.ready.then(drawMaps);
// faq: click to reveal
const fqA=c=>c.querySelector('.fqx').getAnimations({subtree:true}).filter(a=>a.animationName&&a.effect.getTiming().iterations===Infinity);
const fqOnce=c=>{const as=fqA(c);clearTimeout(c._h);as.forEach(a=>{a.cancel();a.play()});if(!as.length)return;const T=Math.max(...as.map(a=>a.effect.getTiming().duration))*.92;c._h=setTimeout(()=>as.forEach(a=>a.pause()),T)};
const fqStop=c=>{clearTimeout(c._h);fqA(c).forEach(a=>a.pause())};
const fqs=[...document.querySelectorAll('.fqc')];
fqs.forEach(c=>c.classList.contains('open')?fqOnce(c):fqStop(c));
document.querySelectorAll('.fqq').forEach(btn=>btn.addEventListener('click',()=>{const c=btn.closest('.fqc'),on=!c.classList.contains('open');
  fqs.forEach(o=>{if(o!==c&&o.classList.contains('open')){o.classList.remove('open');o.querySelector('.fqq').setAttribute('aria-expanded','false');fqStop(o)}});
  c.classList.toggle('open',on);btn.setAttribute('aria-expanded',on);if(on){c.querySelectorAll('.qc').forEach(q=>{q.classList.remove('play');void q.offsetWidth;q.classList.add('play')});fqOnce(c)}else fqStop(c)}));
// brief quick start
document.addEventListener('click',e=>{const q=e.target.closest('[data-qg]');if(!q)return;const g=document.querySelector(`#goals input[data-goal="${q.dataset.qg}"]`);if(g&&!g.checked)g.click()});
// business size: two drag sliders -> drive existing size buttons
(()=>{const box=document.querySelector('.hero .sizes2');if(!box)return;
  const ST=[1,2,3,4,5,8,10,15,20,25,29,35,45,60,75,100,150,200],RV=[.1,.2,.3,.5,1,2,3,5,8,12,20,30,50];
  const TIER=['Micro','Small','Medium','Large'],PK=['Starter','Growth','Growth','Pro'];
  const rm=v=>v<1?`RM${Math.round(v*1000)}k`:(v>=50?'RM50M+':`RM${v}M`);
  const w=document.createElement('div');w.className='szd';
  w.innerHTML=`<div class="bzc bzw"><span class="bzl">Team size</span><div class="whl"><div class="sc2" tabindex="0" role="spinbutton" aria-label="Team size" aria-valuemin="0" aria-valuemax="${ST.length-1}">${ST.map(n=>`<div class="it">${n>=200?'200+':n}<small>staff</small></div>`).join('')}</div></div></div>
  <label class="bzc dgr"><span class="bzl">Yearly revenue<span class="bub" hidden></span></span><span class="dt"><input id="dgR" type="range" min="0" max="${RV.length-1}" value="3" aria-label="Yearly revenue"><b class="knob"></b></span></label>
  <div class="bzc"><span class="bzl">Business size</span><div class="szo" id="szo" aria-live="polite"><span class="sb"><i></i><i></i><i></i><i></i></span><span class="kb2">Not set</span><b hidden></b></div></div>`;
  box.appendChild(w);
  const wh=w.querySelector('.sc2'),wi=[...wh.children],s2=w.querySelector('#dgR'),o=w.querySelector('#szo');let touched=[true,true],si=4,ready=false;
  const ts=n=>n<5?0:n<30?1:n<=75?2:3, tr=v=>v<.3?0:v<3?1:v<20?2:3;
  const pos=(i,t)=>{const p=i.value/i.max;i.style.setProperty('--p',p*100+'%');const k=i.parentElement.querySelector('.knob');if(k){k.textContent=t;k.style.left=(p*(i.clientWidth-64)+32)+'px'}};addEventListener('resize',()=>{const r=document.getElementById('dgR');r&&r.dispatchEvent(new Event('poke'))});
  const RH=()=>wi[0].offsetHeight||24,RM=matchMedia('(prefers-reduced-motion: reduce)');
  const toW=(i,sm)=>(wh._t=i,wh.scrollTo({top:i*RH(),behavior:sm&&!RM.matches?'smooth':'auto'}));
  let f1;wh.addEventListener('scroll',()=>{cancelAnimationFrame(f1);f1=requestAnimationFrame(()=>{const i=Math.max(0,Math.min(wi.length-1,Math.round(wh.scrollTop/RH())));if(i===wh._t)wh._t=undefined;if(i!==si){si=i;if(ready)touched[0]=true;up()}})},{passive:true});
  wi.forEach((e,i)=>e.addEventListener('click',()=>{touched[0]=true;toW(i,true)}));
  wh.addEventListener('keydown',e=>{const c=wh._t??si,m={ArrowDown:c+1,ArrowRight:c+1,ArrowUp:c-1,ArrowLeft:c-1,Home:0,End:wi.length-1,PageDown:c+3,PageUp:c-3};if(e.key in m){e.preventDefault();touched[0]=true;toW(Math.max(0,Math.min(wi.length-1,m[e.key])),true)}});
  ['pointerdown','wheel','touchstart'].forEach(ev=>wh.addEventListener(ev,()=>{touched[0]=true},{passive:true}));
  const sync=()=>toW(si);requestAnimationFrame(sync);addEventListener('load',sync);addEventListener('resize',sync);setTimeout(()=>{sync();ready=true},400);
  function up(){wi.forEach((e,i)=>e.classList.toggle('on',i===si));wh.setAttribute('aria-valuenow',si);wh.setAttribute('aria-valuetext',`${ST[si]>=200?'200+':ST[si]} staff`);s2.setAttribute('aria-valuetext',rm(RV[s2.value]));pos(s2,rm(RV[s2.value]));
    s2.closest('.bzc').classList.toggle('set',touched[1]);
    if(!touched[0]&&!touched[1])return;
    const t=Math.max(touched[0]?ts(ST[si]):0,touched[1]?tr(RV[s2.value]):0);
    o.classList.add('on');o.querySelectorAll('.sb i').forEach((x,k)=>x.classList.toggle('f',k<=t));const kb=o.querySelector('.kb2');kb.textContent=TIER[t];o.querySelector('b').textContent=`${TIER[t]} business`;
    const btn=document.querySelector(`#seg2 [data-size="${t}"]`);if(btn&&!w._intro&&btn.getAttribute('aria-pressed')!=='true')btn.click()}
  s2.addEventListener('input',()=>{touched[1]=true;up()});s2.addEventListener('poke',up);up();requestAnimationFrame(up);setTimeout(up,450);addEventListener('load',()=>setTimeout(up,50));
  // entrance: auto-set demo (wheel spins up, slider glides, bars fill)
  if(!matchMedia('(prefers-reduced-motion: reduce)').matches&&'IntersectionObserver' in window){
    const S0=si,V0=+s2.value,io3=new IntersectionObserver(es=>{if(!es.some(x=>x.isIntersecting))return;io3.disconnect();
      w._intro=true;si=0;wh.scrollTo({top:0});s2.value=0;up();
      setTimeout(()=>{toW(S0,true);const t0=performance.now(),D=1100,ez=x=>1-Math.pow(1-x,3);let last=-1;
        const k=s2.parentElement.querySelector('.knob');
        const step=n=>{const x=Math.min(1,(n-t0)/D),v=ez(x)*V0,iv=Math.round(v),p=v/s2.max;
          s2.style.setProperty('--p',p*100+'%');if(k)k.style.left=(p*(s2.clientWidth-64)+32)+'px';
          if(iv!==last){last=iv;s2.value=iv;if(k)k.textContent=rm(RV[iv]);up();s2.style.setProperty('--p',p*100+'%');if(k)k.style.left=(p*(s2.clientWidth-64)+32)+'px'}
          if(x<1)requestAnimationFrame(step);else{s2.value=V0;si=S0;w._intro=false;up()}};
        requestAnimationFrame(step)},380)},{threshold:.6});
    setTimeout(()=>io3.observe(w),650)}
})();
// cta whatsapp chat form
(()=>{const f=document.getElementById('cwf');if(!f)return;const m=document.getElementById('cwm'),b=document.getElementById('cwb'),w=f.closest('.ctw2');
const RM=matchMedia('(prefers-reduced-motion: reduce)').matches,end=()=>b.scrollTo({top:b.scrollHeight,behavior:RM?'auto':'smooth'});
const tm=()=>new Date().toLocaleTimeString([],{hour:'2-digit',minute:'2-digit'});
const el=(c,h)=>{const d=document.createElement('div');d.className=c;if(h!=null)d.innerHTML=h;b.appendChild(d);end();return d};
const esc=t=>t.replace(/[&<>"]/g,c=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;'}[c]));
const me=t=>el('cm me u',esc(t)+'<i>'+tm()+'</i>');
const AV=w.querySelector('.cwh img').src;
const row=(c,h)=>{const r=el('crw','<img src="'+AV+'" alt="" width="26" height="26"><div class="'+c+'">'+h+'</div>');return [r,r.lastElementChild]};
const bot=(h,ms=700)=>new Promise(r=>{const [t]=row('cty','<i></i><i></i><i></i>');setTimeout(()=>{t.remove();const [,d]=row('cm th',h+'<i>'+tm()+'</i>');end();r(d)},RM?0:ms)});
const NEEDS=['Website','SEO','Social media','AI assistant','Branding','Something else'];
const Q=[
 {k:'name',ask:()=>"Hi, I'm Hafiz, sales advisor at Neeko. What's your name?",ph:'Your name'},
 {k:'company',ask:a=>`Nice to meet you, ${esc(a.name.split(' ')[0])}. Which company or brand is this for?`,ph:'Company or brand'},
 {k:'need',ask:()=>'What do you need help with? Tap one or type it.',ph:'e.g. a new website',chips:NEEDS},
 {k:'contact',ask:()=>'Last one. Best phone number or email to reach you?',ph:'Phone or email',check:v=>/@.+\./.test(v)||v.replace(/\D/g,'').length>=8,err:'Please enter a valid phone number or email.'}];
let a={},st=0,busy=false,started=false,rdy=false;
const BR=()=>window.NBRIEF&&window.NBRIEF.n?window.NBRIEF:null;
const brHTML=B=>`<p class="cmt">My brief</p><ul>${B.items.map(x=>`<li>${esc(x.n)}<b>${esc(x.p)}</b></li>`).join('')}</ul><p class="cmf"><span>${B.size?esc(B.size)+' · ':''}${B.n} specialist${B.n===1?'':'s'}</span><span>${B.rm(B.one)} + ${B.rm(B.mo)}/mo</span></p>`;
const Qs=()=>BR()?Q.filter(q=>q.k!=='need'):Q;
const ask=async()=>{busy=true;m.disabled=true;const q=Qs()[st];await bot(q.ask(a));if(q.chips){const c=el('cqr',q.chips.map(x=>`<button type="button">${x}</button>`).join(''));c.querySelectorAll('button').forEach(x=>x.addEventListener('click',()=>{if(busy||Qs()[st]!==q)return;x.setAttribute('aria-pressed','true');take(x.textContent)}))}
 m.placeholder=q.ph;m.disabled=false;busy=false;if(started&&document.activeElement!==m&&w.matches(':focus-within'))m.focus()};
const send=()=>{const B2=BR();const who=`Name: ${a.name}\nCompany: ${a.company}\nContact: ${a.contact}`;const t=B2?`${B2.text}\n\n${who}`:`Hi Neeko, I'd like to start a brief.\n\n${who}\nNeed: ${a.need}`;window.open('https://wa.me/60176604771?text='+encodeURIComponent(t),'_blank','noopener')};
const summary=async()=>{busy=true;m.disabled=true;m.placeholder='Tap send to WhatsApp';const B=BR();
 const d=await bot(`<p>Here's your brief. Tap send and I'll reply on WhatsApp.</p><dl><dt>Name</dt><dd>${esc(a.name)}</dd><dt>Company</dt><dd>${esc(a.company)}</dd>${B?`<dt>Services</dt><dd>${B.items.map(x=>esc(x.n)).join(', ')}</dd><dt>Estimate</dt><dd>${B.rm(B.one)} + ${B.rm(B.mo)}/mo</dd>`:`<dt>Need</dt><dd>${esc(a.need)}</dd>`}<dt>Contact</dt><dd>${esc(a.contact)}</dd></dl><button type="button" class="cwr">Start over</button>`,900);
 d.classList.add('csm');
 rdy=true;f.classList.add('rdy');busy=false;
 d.querySelector('.cwr').addEventListener('click',()=>{b.innerHTML='';a={};st=0;rdy=false;f.classList.remove('rdy');m.value='';intro()})};
const intro=()=>{const B=BR();if(B){el('cm me',brHTML(B)+'');setTimeout(ask,RM?0:500)}else ask()};
const take=t=>{const QQ=Qs(),q=QQ[st];b.querySelectorAll('.cwe').forEach(x=>x.closest('.crw').remove());
 if(q.check&&!q.check(t)){me(t);row('cm th cwe',esc(q.err));return}
 if(q.chips)b.querySelectorAll('.cqr button').forEach(x=>x.disabled=true);
 me(t);a[q.k]=t;st++;st<QQ.length?ask():summary()};
f.addEventListener('submit',e=>{e.preventDefault();if(rdy){send();return}const t=m.value.trim();if(!t||busy||st>=Qs().length)return;m.value='';take(t)});
const io2=new IntersectionObserver(es=>{if(es.some(x=>x.isIntersecting)){io2.disconnect();started=true;intro()}},{threshold:.35});io2.observe(w);
})();
// mobile services toggle
(()=>{const L=document.querySelector('.hero #list');if(!L)return;const b=document.createElement('button');b.type='button';b.className='svtg';b.setAttribute('aria-expanded','false');b.setAttribute('aria-controls','list');L.before(b);
const lab=()=>{const n=L.querySelectorAll('input:checked').length;b.innerHTML=`Add or remove services <i>${n} selected</i>`};lab();document.addEventListener('change',lab);document.addEventListener('click',()=>setTimeout(lab,0));
b.addEventListener('click',()=>{const o=L.classList.toggle('open');b.setAttribute('aria-expanded',o)})})();
// custom package menu
(()=>{let m=null,src=null;const TK='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg>';
const close=(f)=>{if(!m)return;m.remove();m=null;if(f&&src)src.focus();src=null};
const open=(sel,kb)=>{close();src=sel;const r=sel.getBoundingClientRect();m=document.createElement('div');m.className='pkm'+(kb?' kb':'');m.setAttribute('role','listbox');
 m.innerHTML=[...sel.options].map(o=>`<button type="button" role="option" data-v="${o.value}" aria-selected="${o.selected}">${TK}<span>${o.textContent}${o.dataset.s?'<em>Suggested</em>':''}</span><small>${o.dataset.p||''}</small></button>`).join('');
 m.style.minWidth=Math.max(r.width,260)+'px';m.style.width='max-content';m.style.maxWidth=(innerWidth-16)+'px';document.body.appendChild(m);const w=m.offsetWidth,h=m.offsetHeight;let top=r.bottom+6;if(top+h>innerHeight-8)top=r.top-h-6;m.style.left=Math.max(8,Math.min(r.left,innerWidth-w-8))+'px';m.style.top=top+'px';
 if(top<r.top)m.style.transformOrigin='bottom left';
 (m.querySelector('[aria-selected="true"]')||m.querySelector('button')).focus();
 m.addEventListener('click',e=>{const b=e.target.closest('button');if(!b)return;const s=src;s.value=b.dataset.v;close();s.dispatchEvent(new Event('change',{bubbles:true}));const n=document.querySelector(`select[data-pk="${s.dataset.pk}"]`);n&&n.focus()});
 m.addEventListener('keydown',e=>{const bs=[...m.querySelectorAll('button')],i=bs.indexOf(document.activeElement);
  if(e.key==='ArrowDown'){e.preventDefault();bs[Math.min(bs.length-1,i+1)].focus()}else if(e.key==='ArrowUp'){e.preventDefault();bs[Math.max(0,i-1)].focus()}else if(e.key==='Escape'||e.key==='Tab'){e.preventDefault();close(true)}});};
document.addEventListener('mousedown',e=>{const s=e.target.closest('.hero select[data-pk]');if(s&&!s.disabled){e.preventDefault();m&&src===s?close():open(s);return}if(m&&!m.contains(e.target))close()});
document.addEventListener('keydown',e=>{const s=e.target.closest&&e.target.closest('.hero select[data-pk]');if(s&&!s.disabled&&[' ','Enter','ArrowDown','ArrowUp'].includes(e.key)){e.preventDefault();open(s,true)}});
addEventListener('scroll',()=>close(),{passive:true});addEventListener('resize',()=>close());})();
// theme toggle
(()=>{const b=document.getElementById('thm');if(!b)return;const R=document.documentElement,dk=()=>R.dataset.theme?R.dataset.theme==='dark':matchMedia('(prefers-color-scheme: dark)').matches;
const lab=()=>b.setAttribute('aria-label',dk()?'Switch to light mode':'Switch to dark mode');lab();
b.addEventListener('click',()=>{const t=dk()?'light':'dark';R.dataset.theme=t;try{localStorage.setItem('nk-theme',t)}catch(e){}lab();typeof drawMaps==='function'&&drawMaps()})})();
// reveal
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target)}}),{rootMargin:'0px 0px -8% 0px'});
[['.hero .pill',0,1],['.hero h1',0],['.hero .sub',80],['.hero .nbw',160],['#plans',60],['#pnote',120,1],['.ctl',0],['.ctw2',100],['footer .fg',0,1],['footer .leg',60,1]].forEach(([q,d,f])=>document.querySelectorAll(q).forEach(e=>{e.classList.add('rv');if(f)e.classList.add('rvf');e.dataset.d=d}));
document.querySelectorAll('.rv').forEach(el=>{const p=el.parentNode,g=p.matches('.c3,.ic3,.fqg');const k=g?[...p.children].filter(x=>x.classList.contains('rv')).indexOf(el):0;el.style.transitionDelay=(el.dataset.d!=null?+el.dataset.d:g?Math.min(k%3*40+Math.floor(k/3)*30,200):0)+'ms';io.observe(el)});
// brief step indicator (visual only, reads existing state)
const steps=[...document.querySelectorAll('.stp li')],bars=[...document.querySelectorAll('.stp .bar')];
const upd=()=>{if(!steps.length)return;const g=document.querySelectorAll('#goals input:checked').length>0,s=document.querySelectorAll('#list input:checked').length>0,z=!!document.querySelector('#seg2 [aria-pressed="true"],#seg2 input:checked,#seg2 .on'),r=document.getElementById('send')?.getAttribute('aria-disabled')!=='true';
  const done=[g||s,s,z&&s,r&&s&&z];steps.forEach((li,i)=>{li.classList.toggle('on',done[i]);li.classList.toggle('cur',!done[i]&&(i===0||done[i-1]))});bars.forEach((b,i)=>b.classList.toggle('on',done[i]))};
document.addEventListener('change',()=>setTimeout(upd,0));document.addEventListener('click',()=>setTimeout(upd,0));setTimeout(upd,50);
})();
</script>
<script>
(()=>{
const SIZES=[
 {id:'micro',n:'Micro',d:'Under 5 staff or under RM300k a year'},
 {id:'small',n:'Small',d:'5–29 staff or RM300k–RM3M a year'},
 {id:'medium',n:'Medium',d:'30–75 staff or RM3M–RM20M a year'},
 {id:'large',n:'Large',d:'75+ staff or over RM20M a year'}
];
const REC=[0,1,1,2];
const G={create:{n:'Create',c:'t-pink'},connect:{n:'Connect',c:'t-yellow'},build:{n:'Build',c:'t-lilac'},care:{n:'Care',c:'t-pink'}};
const S=[
 {id:'web',g:'connect',n:'Website',d:'WordPress, mobile-first',t:[
  {n:'Starter',one:3900,f:['5 pages','3 months support','7–10 days']},
  {n:'Growth',one:4499,f:['10 pages','6 months support','10–14 days']},
  {n:'Pro',one:7999,f:['Unlimited pages','Shop or booking + payments','12 months priority care']}]},
 {id:'seo',g:'connect',n:'SEO',d:'Get found on Google',t:[
  {n:'Starter',mo:899,f:['Local + long-tail keywords','Lower competition','Monthly report']},
  {n:'Growth',mo:1499,f:['Balanced keyword mix','Moderate competition','Monthly report']},
  {n:'Pro',mo:3599,f:['High-traffic keywords','Strong competition','Monthly report']}]},
 {id:'social',g:'connect',n:'Social media',d:'Planned, designed, posted',t:[
  {n:'Starter',mo:1200,f:['8 posts a month','1 platform','Performance summary']},
  {n:'Growth',mo:2200,f:['12 posts + 2 reels + 8 stories','Instagram + Facebook','Analytics report']},
  {n:'Pro',mo:3400,f:['16 posts + 4 reels + 12 stories','3 platforms','Monthly strategy call']}]},
 {id:'design',g:'create',n:'Graphic design',d:'Posters, posts, decks',t:[
  {n:'One-off',one:120,f:['1 artboard','Design + final export','For single requests']},
  {n:'Essential',mo:1599,f:['1 active task','Unlimited queued requests','Draft in 2–3 days']},
  {n:'Studio',mo:2499,f:['2 active tasks','Campaign + deck layouts','Draft in 1–2 days']}]},
 {id:'photo',g:'create',n:'AI photography',d:'Brand images, fast',t:[
  {n:'Starter',one:299,f:['50 high-res images','1 scene or product set','Amendments within the brief']},
  {n:'Growth',one:499,f:['100 high-res images','Creative direction','Amendments within the brief']},
  {n:'Pro',one:999,f:['250 high-res images','Campaign art direction','Amendments within the brief']}]},
 {id:'ai',g:'build',n:'AI chat assistant',d:'Answers FAQs, hands over',t:[
  {n:'Assist',one:2499,mo:399,f:['1 channel','25 FAQ topics','English + BM']},
  {n:'Connect',one:4999,mo:799,f:['2 channels','60 FAQ topics','3 workflows']},
  {n:'Operate',one:9999,mo:1499,f:['3 channels','120 FAQ topics','5 workflows']}]},
 {id:'crm',g:'build',n:'CRM setup',d:'Track every lead',t:[
  {n:'Launch',one:3500,f:['1 pipeline','Up to 5 users','2 automations']},
  {n:'Connect',one:7500,f:['2 pipelines','Up to 15 users','1 integration']},
  {n:'Scale',one:15000,f:['4 pipelines','Up to 30 users','2 integrations']}]},
 {id:'api',g:'build',n:'Connect your tools',d:'API integration',t:[
  {n:'Connect',one:1500,f:['2 systems','One-way flow','1 trigger']},
  {n:'Workflow',one:4500,f:['2 systems','1 workflow','Validation rules']},
  {n:'Multi-system',one:9500,f:['3 systems','3 workflows','Exception handling']}]},
 {id:'erp',g:'build',n:'ERP & operations',d:'Orders, stock, approvals',t:[
  {n:'Essentials',one:7500,f:['1 module','Up to 5 users','2 hours training']},
  {n:'Operations',one:15000,f:['3 modules','Up to 10 users','Approvals + reporting']},
  {n:'Connected',one:28000,f:['5 modules','Up to 20 users','1 integration']}]},
 {id:'software',g:'build',n:'Custom software',d:'Portals, dashboards, tools',t:[
  {n:'MVP',one:15000,f:['1 core workflow','Up to 6 screens','2 user roles']},
  {n:'Workflow',one:30000,f:['3 workflows','Up to 12 screens','1 integration']},
  {n:'Platform',one:60000,f:['5 workflows','Up to 20 screens','2 integrations']}]},
 {id:'mobile',g:'build',n:'Mobile app',d:'For customers or staff',t:[
  {n:'MVP',one:18000,f:['Up to 5 screens','Login + records','Admin view']},
  {n:'Growth',one:35000,f:['Up to 10 screens','Notifications','1 integration']},
  {n:'Scale',one:60000,f:['Up to 20 screens','2 integrations','Role-based workflow']}]},
 {id:'care',g:'care',n:'Website care',d:'Backups, updates, fixes',t:[
  {n:'Care',mo:199,f:['Backup + updates','Health check','1 support hour']},
  {n:'Care Plus',mo:399,f:['Health + security checks','3 support hours','Troubleshooting']},
  {n:'Priority',mo:699,f:['Health + security checks','6 support hours','Priority queue']}]}
];
const BUNDLES=[{n:'Presence',p:2199,t:[0,0,0]},{n:'Growth',p:3699,t:[1,1,1]},{n:'Authority',p:6999,t:[2,2,1]}]; // social, seo, care

const FULL={
web:{t:[['5 standard pages','3 months minor support','7–10 days estimated','Responsive, brand-matched layouts','AI-assisted copy and media','Basic SEO, GA4 + Search Console','Unlimited staging revisions'],
 ['10 standard pages','6 months minor support','10–14 days estimated','Responsive, brand-matched layouts','AI-assisted copy and media','Basic SEO, GA4 + Search Console','Unlimited staging revisions'],
 ['Unlimited standard pages','Unlimited product + blog uploads','Commerce or booking','Payment / CRM gateway','12 months priority care','14–21 days estimated','Unlimited staging revisions']],
 n:'Year-one domain and hosting included (hosting capped at RM500). PageSpeed 90+ is a target, not a guarantee.'},
seo:{d:['For a focused first search programme','For growing SMEs and specialist services','For established brands and competitive markets'],
 t:[['Local + long-tail terms','Niche keyword selection','Lower competition','Keyword research + tracking','On-page improvements','Monthly report'],
 ['Balanced keyword mix','Moderate competition','Business-led priorities','Keyword research + tracking','On-page improvements','Monthly report'],
 ['High-traffic terms','Strong competition','Broader search ambition','Keyword research + tracking','On-page improvements','Monthly report']],
 n:'3-month commitment to start. Rankings, traffic and AI Overview inclusion are not guaranteed.'},
social:{t:[['8 feed posts, no reels','1 platform: IG or FB','Brand design + captions','Hashtag research','Scheduling + publishing','Performance summary'],
 ['12 posts + 2 reels','8 stories','Instagram + Facebook','Custom design + copy','Targeting + hashtags','Calendar 2 weeks ahead','Analytics report'],
 ['16 posts + 4 reels','12 stories','3 platforms','Carousels + creative direction','Influencer outreach support','Monthly strategy call','Business-impact report']],
 n:'3 months upfront to start. Nothing goes live before calendar approval. Ad spend is paid directly to platforms.'},
design:{t:[['Defined format + message','Design + final export','Review scope agreed','Good for individual requests'],
 ['1 active design task','Unlimited queued requests','Revisions within the brief','Social, poster + collateral','First draft in 2–3 days'],
 ['2 active design tasks','Unlimited queued requests','Revisions within the brief','Campaign + deck layouts','First draft in 1–2 days']],
 n:'Complex branding, filming and 3D production are quoted separately.'},
photo:{d:['For a quick refresh of key visuals','For a full set of brand and product images','For campaigns and large product ranges'],
 t:[['50 high-resolution images','1 scene or product set','Brand-consistent colour and style','Amendments within the agreed brief'],
 ['100 high-resolution images','Up to 3 scenes or product sets','Creative direction','Brand-consistent colour and style','Amendments within the agreed brief'],
 ['250 high-resolution images','Up to 6 scenes or product sets','Campaign art direction','Brand-consistent colour and style','Sized for web, social and print','Amendments within the agreed brief']],
 n:'Starter and Pro are new packages.'},
ai:{t:[['1 channel','25 approved FAQ topics','1 lead capture flow','English + BM setup','Human handover','1 care hour a month'],
 ['Up to 2 channels','60 approved FAQ topics','Up to 3 workflows','1 standard integration','Monthly flow review','2 care hours a month'],
 ['Up to 3 channels','120 approved FAQ topics','Up to 5 workflows','2 standard integrations','Review + reporting','4 care hours a month']],
 n:'AI, messaging, WhatsApp and platform usage fees are listed separately in the quotation.'},
crm:{t:[['1 sales pipeline','Up to 5 users configured','2 simple automations','1 prepared CSV import','1 training session','30-day defect support'],
 ['Up to 2 pipelines','Up to 15 users configured','5 simple automations','1 standard integration','Dashboard + 2 sessions','60-day defect support'],
 ['Up to 4 pipelines','Up to 30 users configured','10 simple automations','2 standard integrations','Reporting + 3 sessions','90-day defect support']],
 n:'Platform licences, messaging fees and data cleansing are extra.'},
api:{t:[['1 source + 1 destination','One-way flow','1 trigger','Up to 2 actions','Testing, error logging + handover'],
 ['Up to 2 systems','1 workflow','Up to 5 mapped actions','Validation rules','Testing, error logging + handover'],
 ['Up to 3 systems','Up to 3 scoped workflows','Reporting','Exception handling','Testing, error logging + handover']],
 n:'API access, permissions and usage fees need confirmation before work starts.'},
erp:{t:[['1 standard module','Up to 5 users configured','1 prepared data import','Basic roles + report','2 hours training','30-day defect support'],
 ['Up to 3 modules','Up to 10 users configured','3 prepared data imports','Approval + reporting scope','4 hours training','60-day defect support'],
 ['Up to 5 modules','Up to 20 users configured','5 prepared data imports','1 standard integration','8 hours training','90-day defect support']],
 n:'Licences, hosting and data cleansing are extra. Accounting, payroll, tax and e-invoice work are scoped separately.'},
software:{t:[['1 core workflow','Up to 6 main screens','2 user roles','Login + structured records','Basic admin + export','30-day defect support'],
 ['Up to 3 workflows','Up to 12 main screens','3 user roles','1 standard integration','Dashboard + permissions','60-day defect support'],
 ['Up to 5 workflows','Up to 20 main screens','4 user roles','2 standard integrations','Advanced reporting scope','90-day defect support']],
 n:'Includes discovery, interface design, testing, deployment guidance and handover. Hosting and licences are separate.'},
mobile:{t:[['Up to 5 main screens','Login + basic records','Admin view','Supported devices agreed upfront'],
 ['Up to 10 main screens','Notifications','1 standard integration','Supported devices agreed upfront'],
 ['Up to 20 main screens','2 integrations','Role-based workflow','Supported devices agreed upfront']],
 n:'Store accounts, hosting, licences and ongoing support are separate. Store approval is controlled by the platform.'},
care:{t:[['1 WordPress website','Monthly backup + updates','Basic health check','Up to 1 support hour','Existing content changes'],
 ['1 WordPress website','Backup + update cycle','Health + security checks','Up to 3 support hours','Minor troubleshooting'],
 ['1 WordPress website','Backup + update cycle','Health + security checks','Up to 6 support hours','Priority work queue']],
 n:'Business-hours support. Time allowances don’t roll over. No 24/7 emergency SLA.'}
};

const L={web:'Website design',seo:'SEO',social:'Social media',design:'Graphic design',photo:'AI photography',ai:'AI assistant',crm:'CRM',api:'Integrations',erp:'ERP',software:'Custom software',mobile:'Mobile app',care:'Website care'};
const fmt=n=>'RM'+n.toLocaleString('en-MY');
const ck='<svg aria-hidden="true"><use href="#i-check"/></svg>';
const tabs=document.getElementById('ptabs'),plans=document.getElementById('plans');
const price=t=>{
  if(t.one&&t.mo)return `<b>${fmt(t.one)}</b><small>setup</small></div><p class="one">then ${fmt(t.mo)} a month</p>`;
  if(t.mo)return `<b>${fmt(t.mo)}</b><small>/ month</small></div>`;
  return `<b>${fmt(t.one)}</b><small>one-time</small></div>`;
};
const TG={web:{0:['Easy start','y'],2:['Full scope','p']},seo:{0:['Local focus','y']},social:{0:['One platform','k'],2:['3 platforms','p']},design:{2:['Bigger pack','k']},photo:{0:['Try it first','y']},ai:{2:['Multi-channel','p']},crm:{0:['Quick setup','y']},software:{2:['Full scope','p']},mobile:{0:['MVP','y']},care:{1:['Most cover','k']}};
function show(id){
  const s=S.find(x=>x.id===id);
  tabs.querySelectorAll('button').forEach(b=>b.setAttribute('aria-selected',b.dataset.id===id));
  const n=s.t.length,mid=n===3?1:-1,F=FULL[id]||{};
  const note=document.getElementById('pnote');if(note)note.innerHTML='<b>Starting prices in MYR, checked 28 Oct 2026 · your quotation confirms the final scope.</b>'+(F.n?'<span>'+F.n+'</span>':'');
  plans.innerHTML=s.t.map((t,i)=>`<article class="pc${i===mid?' hi':''}">
    <div class="ph"><h3>${t.n}</h3>${i===mid?'<span class="chip">Suggested for small teams</span>':(TG[id]&&TG[id][i]?`<span class="tg ${TG[id][i][1]}">${TG[id][i][0]}</span>`:'')}</div>
    <div class="pr num">${price(t)}
    ${F.d?`<p class="fr">${F.d[i]}</p>`:''}
    <ul>${(F.t?F.t[i]:t.f).map(f=>`<li>${ck}<span>${f}</span></li>`).join('')}</ul>
    <a class="btn ${i===mid?'':'btn-line'}" href="<?php echo esc_url( home_url( '/' ) ); ?>#brief" data-add="${id}" data-tier="${i}">Add to my brief</a>${(window.NK_SVC&&NK_SVC[id]&&NK_SVC[id]!==location.pathname)?`<a class="pfull" href="${NK_SVC[id]}">See full details →</a>`:''}</article>`).join('');
  plans.style.gridTemplateColumns=n<3?`repeat(${n},minmax(0,380px))`:'';
  plans.style.justifyContent=n<3?'center':'';
}
const TO=(()=>{const F=['seo','social','design','web'];return [...F.map(id=>S.find(x=>x.id===id)).filter(Boolean),...S.filter(x=>!F.includes(x.id))]})();
const one=c=>TO.map(s=>`<button type="button"${c?' tabindex="-1" aria-hidden="true" data-clone="1"':' role="tab"'} data-id="${s.id}">${L[s.id]||s.n}</button>`).join('');
tabs.innerHTML=one(1)+one(0)+one(1);
const mid=id=>tabs.querySelector(`button:not([data-clone])[data-id="${id}"]`);let prog=0;
tabs.addEventListener('click',e=>{const b=e.target.closest('button');if(!b)return;show(b.dataset.id);const W=tabs.scrollWidth/3;if(b.dataset.clone){tabs.scrollLeft+=b.offsetLeft<W?W:-W}const m=mid(b.dataset.id);prog=Date.now();tabs.scrollTo({left:m.offsetLeft-(tabs.clientWidth-m.offsetWidth)/2,behavior:matchMedia('(prefers-reduced-motion: reduce)').matches?'auto':'smooth'})});
tabs.addEventListener('keydown',e=>{if(!['ArrowRight','ArrowLeft'].includes(e.key))return;const bs=[...tabs.querySelectorAll('button:not([data-clone])')],i=bs.indexOf(document.activeElement);if(i<0)return;const j=(i+(e.key==='ArrowRight'?1:-1)+bs.length)%bs.length;bs[j].focus();bs[j].click()});
plans.addEventListener('click',e=>{const a=e.target.closest('[data-add]');if(!a)return;
  const id=a.dataset.add,ti=a.dataset.tier;
  const all=document.querySelector('.svt button');if(all&&all.getAttribute('aria-selected')!=='true'&&all.getAttribute('aria-pressed')!=='true')all.click();
  const c=document.querySelector(`#list input[value="${id}"]`);if(c&&!c.checked)c.click();
  setTimeout(()=>{const sel=document.querySelector(`select[data-pk="${id}"]`);if(sel){sel.value=ti;sel.dispatchEvent(new Event('change',{bubbles:true}))}},30);
});
show('web');
const loop=()=>{if(Date.now()-prog<700)return;const W=tabs.scrollWidth/3;if(tabs.scrollLeft<W*0.5)tabs.scrollLeft+=W;else if(tabs.scrollLeft>W*1.5)tabs.scrollLeft-=W};
const edge=()=>{tabs.classList.add('ov');tabs.classList.remove('st','en');loop()};
const ctr=()=>{const b=tabs.querySelector('[aria-selected="true"]');if(b)tabs.scrollLeft=b.offsetLeft-(tabs.clientWidth-b.offsetWidth)/2};
tabs.addEventListener('scroll',edge,{passive:true});addEventListener('resize',edge);edge();const home=()=>{tabs.scrollLeft=tabs.scrollWidth/3-8};home();addEventListener('load',()=>{home();edge()});setInterval(()=>{if(Date.now()-prog>700)loop()},400);
})();
;(()=>{const t=document.getElementById('ptabs');if(!t)return;
t.addEventListener('wheel',e=>{if(Math.abs(e.deltaX)>Math.abs(e.deltaY)||e.ctrlKey)return;const max=t.scrollWidth-t.clientWidth;if(max<=0)return;const d=e.deltaMode===1?e.deltaY*32:e.deltaY;
e.preventDefault();t.scrollLeft=t.scrollLeft+d},{passive:false});})();
</script>
<script>
(()=>{
const SIZES=[
 {id:'micro',n:'Micro',d:'Under 5 staff or under RM300k a year'},
 {id:'small',n:'Small',d:'5–29 staff or RM300k–RM3M a year'},
 {id:'medium',n:'Medium',d:'30–75 staff or RM3M–RM20M a year'},
 {id:'large',n:'Large',d:'75+ staff or over RM20M a year'}
];
const REC=[0,1,1,2];
const G={create:{n:'Create',c:'t-pink'},connect:{n:'Connect',c:'t-yellow'},build:{n:'Build',c:'t-lilac'},care:{n:'Care',c:'t-pink'}};
const S=[
 {id:'web',g:'connect',n:'Website',d:'WordPress, mobile-first',t:[
  {n:'Starter',one:3900,f:['5 pages','3 months support','7–10 days']},
  {n:'Growth',one:4499,f:['10 pages','6 months support','10–14 days']},
  {n:'Pro',one:7999,f:['Unlimited pages','Shop or booking + payments','12 months priority care']}]},
 {id:'seo',g:'connect',n:'SEO',d:'Get found on Google',t:[
  {n:'Starter',mo:899,f:['Local + long-tail keywords','Lower competition','Monthly report']},
  {n:'Growth',mo:1499,f:['Balanced keyword mix','Moderate competition','Monthly report']},
  {n:'Pro',mo:3599,f:['High-traffic keywords','Strong competition','Monthly report']}]},
 {id:'social',g:'connect',n:'Social media',d:'Planned, designed, posted',t:[
  {n:'Starter',mo:1200,f:['8 posts a month','1 platform','Performance summary']},
  {n:'Growth',mo:2200,f:['12 posts + 2 reels + 8 stories','Instagram + Facebook','Analytics report']},
  {n:'Pro',mo:3400,f:['16 posts + 4 reels + 12 stories','3 platforms','Monthly strategy call']}]},
 {id:'design',g:'create',n:'Graphic design',d:'Posters, posts, decks',t:[
  {n:'One-off',one:120,f:['1 artboard','Design + final export','For single requests']},
  {n:'Essential',mo:1599,f:['1 active task','Unlimited queued requests','Draft in 2–3 days']},
  {n:'Studio',mo:2499,f:['2 active tasks','Campaign + deck layouts','Draft in 1–2 days']}]},
 {id:'photo',g:'create',n:'AI photography',d:'Brand images, fast',t:[
  {n:'Starter',one:299,f:['50 high-res images','1 scene or product set','Amendments within the brief']},
  {n:'Growth',one:499,f:['100 high-res images','Creative direction','Amendments within the brief']},
  {n:'Pro',one:999,f:['250 high-res images','Campaign art direction','Amendments within the brief']}]},
 {id:'ai',g:'build',n:'AI chat assistant',d:'Answers FAQs, hands over',t:[
  {n:'Assist',one:2499,mo:399,f:['1 channel','25 FAQ topics','English + BM']},
  {n:'Connect',one:4999,mo:799,f:['2 channels','60 FAQ topics','3 workflows']},
  {n:'Operate',one:9999,mo:1499,f:['3 channels','120 FAQ topics','5 workflows']}]},
 {id:'crm',g:'build',n:'CRM setup',d:'Track every lead',t:[
  {n:'Launch',one:3500,f:['1 pipeline','Up to 5 users','2 automations']},
  {n:'Connect',one:7500,f:['2 pipelines','Up to 15 users','1 integration']},
  {n:'Scale',one:15000,f:['4 pipelines','Up to 30 users','2 integrations']}]},
 {id:'api',g:'build',n:'Connect your tools',d:'API integration',t:[
  {n:'Connect',one:1500,f:['2 systems','One-way flow','1 trigger']},
  {n:'Workflow',one:4500,f:['2 systems','1 workflow','Validation rules']},
  {n:'Multi-system',one:9500,f:['3 systems','3 workflows','Exception handling']}]},
 {id:'erp',g:'build',n:'ERP & operations',d:'Orders, stock, approvals',t:[
  {n:'Essentials',one:7500,f:['1 module','Up to 5 users','2 hours training']},
  {n:'Operations',one:15000,f:['3 modules','Up to 10 users','Approvals + reporting']},
  {n:'Connected',one:28000,f:['5 modules','Up to 20 users','1 integration']}]},
 {id:'software',g:'build',n:'Custom software',d:'Portals, dashboards, tools',t:[
  {n:'MVP',one:15000,f:['1 core workflow','Up to 6 screens','2 user roles']},
  {n:'Workflow',one:30000,f:['3 workflows','Up to 12 screens','1 integration']},
  {n:'Platform',one:60000,f:['5 workflows','Up to 20 screens','2 integrations']}]},
 {id:'mobile',g:'build',n:'Mobile app',d:'For customers or staff',t:[
  {n:'MVP',one:18000,f:['Up to 5 screens','Login + records','Admin view']},
  {n:'Growth',one:35000,f:['Up to 10 screens','Notifications','1 integration']},
  {n:'Scale',one:60000,f:['Up to 20 screens','2 integrations','Role-based workflow']}]},
 {id:'care',g:'care',n:'Website care',d:'Backups, updates, fixes',t:[
  {n:'Care',mo:199,f:['Backup + updates','Health check','1 support hour']},
  {n:'Care Plus',mo:399,f:['Health + security checks','3 support hours','Troubleshooting']},
  {n:'Priority',mo:699,f:['Health + security checks','6 support hours','Priority queue']}]}
];
const BUNDLES=[{n:'Presence',p:2199,t:[0,0,0]},{n:'Growth',p:3699,t:[1,1,1]},{n:'Authority',p:6999,t:[2,2,1]}]; // social, seo, care

const LVL=['Starter','Growth','Growth','Pro'];
const SZ=[{n:'Micro',d:'Under 5 staff',r:'Under RM300k/yr'},{n:'Small',d:'5–29 staff',r:'RM300k–3M/yr'},{n:'Medium',d:'30–75 staff',r:'RM3M–20M/yr'},{n:'Large',d:'75+ staff',r:'Over RM20M/yr'}];
const ROLE={web:['Web designer','WD'],seo:['SEO specialist','SE'],social:['Social media manager','SM'],design:['Graphic designer','GD'],photo:['AI image producer','AP'],ai:['AI automation specialist','AI'],crm:['CRM consultant','CC'],api:['Integration developer','ID'],erp:['ERP consultant','EC'],software:['Software developer','SD'],mobile:['Mobile developer','MD'],care:['Support engineer','SC']};
const TK0='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg>';
const GRP=[['Presence',['web','seo','social']],['Creative',['design','photo']],['Products',['software','mobile','api']],['Operations',['crm','erp','ai']],['After launch',['care']]];
const GOALS=[
 {n:'Get online',s:['web','seo','care']},
 {n:'Answer customers faster',s:['ai','api']},
 {n:'Look professional online',s:['web','design']},
 {n:'More leads',s:['seo','social','crm']},
 {n:'Sell online',s:['web','seo','social']},
 {n:'Fresh content every month',s:['social','design']},
 {n:'Website upkeep',s:['care']},
 {n:'Grow on social',s:['social','design','photo']},
 {n:'Take bookings',s:['web','crm']},
 {n:'Get found on Google',s:['seo','web']},
 {n:'Rebrand',s:['design','photo','web']},
 {n:'Save time',s:['ai','api','crm']},
 {n:'Track stock',s:['erp','api']},
 {n:'Follow up every lead',s:['crm','ai']},
 {n:'New website',s:['web','care']},
 {n:'Automate sales',s:['crm','ai','api']},
 {n:'Product photos',s:['photo']},
 {n:'Cut admin work',s:['erp','api','ai']},
 {n:'Launch an app',s:['mobile','api','care']},
 {n:'Internal tools',s:['software','api','care']},
 {n:'Connect my systems',s:['api']}];
const byId=Object.fromEntries(S.map(s=>[s.id,s]));
const rm=n=>'RM'+Math.round(n).toLocaleString('en-MY');
const short=n=>n>=1000?'RM'+(n/1000).toFixed(n%1000?1:0).replace('.0','')+'k':'RM'+n;
const $=id=>document.getElementById(id);
let st={size:null,order:[],sel:{},goals:[],extra:[],removed:[]};
let _saved=false;try{const v=JSON.parse(localStorage.getItem('neeko-nb')||'null');if(v&&Array.isArray(v.order)){st=v;_saved=true}}catch(e){}
if(!_saved)st.goals=[0];
const save=()=>{try{localStorage.setItem('neeko-nb',JSON.stringify(st))}catch(e){}};
const rec=s=>Math.min(st.size==null?0:REC[st.size],s.t.length-1);
const minP=s=>{const t=s.t[0];return t.one!=null?short(t.one):short(t.mo)+'/mo'};

const DET={web:'WordPress site, mobile-first',seo:'Get found on Google',social:'Plan, design and post',design:'Posters, posts and decks',photo:'100 on-brand images',software:'Portals and internal tools',mobile:'Apps for customers or staff',api:'Link the tools you already use',crm:'Track and follow up every lead',erp:'Orders, stock and approvals',ai:'Answers FAQs, hands over to you',care:'Backups, updates and fixes'};
const CATS=[['connect','Connect'],['create','Create'],['build','Build'],['care','Care']];
let cat=null;
function drawList(){
  const groups=CATS.filter(c=>!cat||c[0]===cat);
  $('svl').innerHTML=groups.map(c=>(!cat?`<p class="grp">${c[1]}</p>`:'')+S.filter(s=>s.g===c[0]).map(s=>`<label class="ck"><input type="checkbox" value="${s.id}"${s.id in st.sel?' checked':''}><span class="cc">${TK0}</span><b class="nm">${s.n}</b><small>from ${minP(s)}</small><em>${DET[s.id]}</em></label>`).join('')).join('');
  $('svl').scrollTop=0;fade();
}
$('list').innerHTML=`<div class="svt" role="tablist" aria-label="Service category"><button type="button" role="tab" data-cat="all" aria-selected="${!cat}">All<i data-cnt="all"></i></button>${CATS.map(c=>`<button type="button" role="tab" data-cat="${c[0]}" aria-selected="${c[0]===cat}">${c[1]}<i data-cnt="${c[0]}"></i></button>`).join('')}</div><div class="svl" id="svl"></div>`;
function counts(){const ta=document.querySelector('[data-cnt="all"]');if(ta)ta.textContent=st.order.length||'';CATS.forEach(c=>{const n=S.filter(s=>s.g===c[0]&&s.id in st.sel).length;const el=document.querySelector(`[data-cnt="${c[0]}"]`);if(el)el.textContent=n||''})}
function fade(){const lst=$('svl');if(!lst)return;const end=lst.scrollTop+lst.clientHeight>=lst.scrollHeight-4;lst.classList.toggle('at-end',end);lst.classList.toggle('at-top',lst.scrollTop<4)}$('svl').addEventListener('scroll',fade,{passive:true});addEventListener('resize',fade);drawList();
function drawSize(){
  $('seg2').innerHTML=SZ.map((z,i)=>`<button type="button" data-size="${i}" aria-pressed="${st.size===i}">${z.n}<small>${z.d}</small><small class="rv2">${z.r}</small></button>`).join('');
  $('sznote').innerHTML=st.size==null?"Choose one and we’ll suggest packages.":`We suggest <b>${LVL[st.size]}</b> packages. Change any below.`;
}
function msg(one,mo){
  const L=st.order.map(id=>{const s=byId[id],t=s.t[st.sel[id]];return `• ${s.n}: ${t.n} (${[t.one!=null?rm(t.one):null,t.mo!=null?rm(t.mo)+'/mo':null].filter(Boolean).join(' + ')})`});
  const gs=(st.goals||[]).map(i=>GOALS[i].n);
  return `Hi Neeko, here’s my brief.\n\n${gs.length?'Goals: '+gs.join(', ')+'\n':''}Business size: ${st.size==null?'Not sure':SZ[st.size].n+' ('+SZ[st.size].d+', '+SZ[st.size].r+')'}\n\n${L.join('\n')}\n\nEstimate: ${rm(one)} one-time + ${rm(mo)}/mo`;
}
const TK='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.2" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12.5 4.5 4.5L19 7.5"/></svg>';
function goalSet(){const s=new Set();(st.goals||[]).forEach(i=>GOALS[i].s.forEach(id=>s.add(id)));return s}
function sync(){
  const want=goalSet();(st.extra||[]).forEach(id=>want.add(id));(st.removed||[]).forEach(id=>want.delete(id));
  [...st.order].forEach(id=>{if(!want.has(id))remove(id)});
  let last;S.forEach(s=>{if(want.has(s.id)&&!(s.id in st.sel)){add(s.id);last=s.id}});
  document.querySelectorAll('#list input').forEach(i=>i.checked=i.value in st.sel);
  return last;
}
function gfade(){const g=$('goals');if(!g)return;g.classList.toggle('at-end',g.scrollTop+g.clientHeight>=g.scrollHeight-4);g.classList.toggle('at-top',g.scrollTop<4)}
function drawGoals(){
  const g=st.goals||[];
  $('goals').innerHTML=GOALS.map((x,i)=>`<label class="gl" title="${x.s.map(id=>byId[id].n).join(', ')}"><input type="checkbox" data-goal="${i}"${g.includes(i)?' checked':''}><span class="gk">${TK}</span><span>${x.n}</span></label>`).join('');
  $('clr').hidden=!g.length;
  const gs=[...goalSet()];$('goalhint').innerHTML=g.length?`<b>${gs.length} services added:</b> ${S.filter(s=>gs.includes(s.id)).map(s=>s.n).join(', ')}.`:'';
}
function draw(added){
  save();counts();
  const n=st.order.length;let one=0,mo=0;
  if(!n)$('tl').innerHTML='<li class="tempty"><span class="ti"><svg aria-hidden="true"><use href="#i-team"/></svg></span><b>Your team will appear here</b><span class="tt">Pick a goal or tick a service. Or start with one of these:</span><span class="tq"><button type="button" data-qg="0">Get online</button><button type="button" data-qg="7">Grow on social</button><button type="button" data-qg="1">Answer customers faster</button></span></li>';
  else $('tl').innerHTML=st.order.map(id=>{const s=byId[id],cur=st.sel[id],t=s.t[cur],r=rec(s);one+=t.one||0;mo+=t.mo||0;
    return `<li class="tr"${id===added?'':' style="animation:none"'}><span class="tav" aria-hidden="true">${ROLE[id][1]}</span>
    <div class="who"><b>${ROLE[id][0]}</b><span>${s.n} <em>·</em> ${t.f.join(', ')}</span></div>
    <div class="act">${s.t.length>1?`<span class="pkg${st.size!=null&&cur===r?' sug':''}"><select data-pk="${id}" aria-label="${s.n} package">${s.t.map((x,i)=>`<option value="${i}"${i===cur?' selected':''} data-p="${x.one!=null?rm(x.one):rm(x.mo)+'/mo'}" data-s="${st.size!=null&&i===r?1:''}">${x.n}</option>`).join('')}</select></span>`+(st.size==null?'':cur===r?'<em class="sgt">Suggested</em>':cur>r?'<em class="sgt up">Upgraded</em>':'<em class="sgt lo">Lighter</em>'):`<span class="pkg"><select disabled aria-label="${s.n} package"><option>${t.n}</option></select></span>`+'<em class="sgt fx">Fixed</em>'}
    <span class="amt">${t.one!=null?rm(t.one):rm(t.mo)}<small>${t.one!=null&&t.mo!=null?'+ '+rm(t.mo)+'/mo':t.one!=null?'one-time':'per month'}</small></span></div>
    <button class="xb" type="button" data-x="${id}" aria-label="Remove ${s.n}"><svg viewBox="0 0 24 24"><path d="M6 6l12 12M18 6 6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button></li>`}).join('');
  $('cnt').innerHTML=`${n} specialist${n===1?'':'s'} <small>in one scope</small>`;
  $('sum').innerHTML=n?`<b>${rm(one)}</b> <span>one-time</span> &nbsp;+&nbsp; <b>${rm(mo)}</b> <span>/ month</span>`:'';
  $('status').textContent=n?`${n} specialist${n===1?'':'s'} joining${st.size!=null?' · '+SZ[st.size].n+' business':''}`:'Pick services to see who joins';
  const s=$('send');s.setAttribute('aria-disabled',n?'false':'true');s.href='https://wa.me/60176604771?text='+encodeURIComponent(msg(one,mo));
  $('mail').href='mailto:enquiry@neeko.my?subject='+encodeURIComponent('New brief')+'&body='+encodeURIComponent(msg(one,mo));
  if(window._lastSum!==undefined&&window._lastSum!==one+'|'+mo&&!matchMedia('(prefers-reduced-motion: reduce)').matches){const el=$('sum'),c=$('cnt');[el,c].forEach(x=>x&&x.animate([{opacity:.35,transform:'translateY(3px)'},{opacity:1,transform:'none'}],{duration:220,easing:'cubic-bezier(.23,1,.32,1)'}))}
  window._lastSum=one+'|'+mo;
  window.NBRIEF={n,one,mo,size:st.size==null?null:SZ[st.size].n,items:st.order.map(id=>{const x=byId[id],t=x.t[st.sel[id]];return {n:x.n,p:[t.one!=null?rm(t.one):null,t.mo!=null?rm(t.mo)+'/mo':null].filter(Boolean).join(' + ')}}),text:msg(one,mo),rm};
  document.dispatchEvent(new Event('nb:brief'));
}
function add(id){if(!(id in st.sel)){st.sel[id]=rec(byId[id]);st.order.push(id)}}
function remove(id){delete st.sel[id];st.order=st.order.filter(x=>x!==id);const c=document.querySelector(`#list input[value="${id}"]`);if(c)c.checked=false}
document.addEventListener('change',e=>{
  const t=e.target;
  if(t.dataset.goal!=null){const i=+t.dataset.goal;st.goals=st.goals||[];st.goals=t.checked?[...st.goals,i]:st.goals.filter(x=>x!==i);if(t.checked){const gs=GOALS[i].s;st.removed=(st.removed||[]).filter(id=>!gs.includes(id))}const l=sync();drawGoals();draw(l);return}
  if(t.closest&&t.closest('#list')){const id=t.value,inG=goalSet().has(id);st.extra=(st.extra||[]).filter(x=>x!==id);st.removed=(st.removed||[]).filter(x=>x!==id);
    if(t.checked){if(!inG)st.extra.push(id)}else{if(inG)st.removed.push(id)}const l=sync();drawGoals();draw(t.checked?id:l)}
  if(t.dataset.pk){st.sel[t.dataset.pk]=+t.value;draw()}
});
document.addEventListener('click',e=>{
  const z=e.target.closest('[data-size]');if(z){st.size=+z.dataset.size;st.order.forEach(id=>st.sel[id]=rec(byId[id]));drawSize();draw();return}
  const x=e.target.closest('[data-x]');if(x){const id=x.dataset.x;st.extra=(st.extra||[]).filter(v=>v!==id);if(goalSet().has(id)){st.removed=(st.removed||[]).filter(v=>v!==id);st.removed.push(id)}sync();drawGoals();draw();return}
  const ct=e.target.closest('[data-cat]');if(ct){cat=ct.dataset.cat==='all'?null:ct.dataset.cat;document.querySelectorAll('[data-cat]').forEach(b=>b.setAttribute('aria-selected',b.dataset.cat===(cat||'all')));drawList();return}
  if(e.target.closest('#clr')){st.goals=[];st.extra=[];st.removed=[];sync();drawGoals();draw();return}
});
if(!_saved)sync();drawSize();drawGoals();draw();$('goals').addEventListener('scroll',gfade,{passive:true});addEventListener('resize',gfade);requestAnimationFrame(gfade);
})();
</script>

