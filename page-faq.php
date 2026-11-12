<?php
/* Neeko: FAQ (help centre). Data in inc/faq-data.php; FAQPage schema built from the same list. */
get_header();
require_once NK_DIR . '/inc/faq-data.php';
$F   = nk_faq_data();
$tot = 0;
foreach ( $F as $t ) $tot += count( $t[2] );
$lk = function ( $s ) {
	if ( '' === $s ) return '';
	if ( '#' === $s[0] ) return home_url( '/' . $s );
	return in_array( $s, array( 'about', 'contact' ), true ) ? nk_url( $s ) : nk_svc_url( $s );
};

$side  = nk_side_head( 'Help centre', $tot . ' answers · updated 12 Nov', 'i-chat' );
$side .= '<div class="pgsr pgW-sr pgF-sr"><label class="sr" for="pgFq">Search questions</label><svg aria-hidden="true"><use href="#i-search"/></svg><input id="pgFq" type="search" placeholder="Search questions" autocomplete="off"></div>';
$side .= '<p class="pgW-l">Topics</p><nav class="pgW-nv pgW-tp pgF-nv" aria-label="FAQ topics">';
foreach ( $F as $k => $t ) $side .= '<a href="#t-' . esc_attr( $k ) . '" data-t="' . esc_attr( $k ) . '"><svg aria-hidden="true"><use href="#' . esc_attr( $t[0] ) . '"/></svg><span>' . esc_html( $t[1] ) . '</span><em>' . count( $t[2] ) . '</em></a>';
$side .= '</nav><div class="pgD-ctc"><p>Rather talk to a person?</p><nav class="pgW-nv pgc-ch" aria-label="Contact Neeko"><a href="https://wa.me/60176604771" target="_blank" rel="noopener"><i class="wa"><svg aria-hidden="true"><use href="#i-wa"/></svg></i><span><b>WhatsApp</b><small>+60 17-660 4771</small></span><svg class="pgc-ar" aria-hidden="true"><use href="#i-ne"/></svg></a><a href="mailto:enquiry@neeko.my"><i><svg aria-hidden="true"><use href="#i-mail"/></svg></i><span><b>Email</b><small>enquiry@neeko.my</small></span><svg class="pgc-ar" aria-hidden="true"><use href="#i-ne"/></svg></a></nav></div>';
?>
<main>
<?php nk_page_hero( array( array( 'FAQ', null ) ), 'Frequently asked questions', 'Prices, timing, scope and support across every Neeko service. Search below or pick a topic.', '', 'pgF-hero pg-hero-w', true ); ?>
<?php nk_win_start( 'All questions', array( array( 'i-wa', 'https://wa.me/60176604771', 'Ask on WhatsApp', true ) ), $side, 'pgF', '<span id="pgFn">' . $tot . ' answers</span> · ' . count( $F ) . ' topics' ); ?>
<?php
$n = 0;
foreach ( $F as $k => $t ) :
	?>
  <section class="pgF-g" id="t-<?php echo esc_attr( $k ); ?>" data-t="<?php echo esc_attr( $k ); ?>"><h2><i><svg aria-hidden="true"><use href="#<?php echo esc_attr( $t[0] ); ?>"/></svg></i><?php echo esc_html( $t[1] ); ?></h2>
	<?php
	foreach ( $t[2] as $q ) :
		$n++;
		$u = $lk( $q[3] );
		?>
    <details class="pgF-q" id="q-<?php echo esc_attr( $q[0] ); ?>"<?php echo 2 === $n ? ' open' : ''; ?>><summary><span><?php echo esc_html( $q[1] ); ?></span><i aria-hidden="true"></i></summary><div class="pgF-a"><p><?php echo esc_html( $q[2] ); ?></p><?php if ( $u ) : ?><a class="pgF-lk" href="<?php echo esc_url( $u ); ?>"><?php echo esc_html( $q[4] ); ?><svg aria-hidden="true"><use href="#i-ne"/></svg></a><?php endif; ?></div></details>
	<?php endforeach; ?>
  </section>
<?php endforeach; ?>
  <div class="pgF-no" id="pgFno" hidden><i><svg aria-hidden="true"><use href="#i-search"/></svg></i><b>No answer for “<span id="pgFt"></span>” yet</b><span>Ask us directly and a real person replies.</span><a class="btn btn-blue" id="pgFwa" href="https://wa.me/60176604771" target="_blank" rel="noopener"><svg aria-hidden="true"><use href="#i-wa"/></svg>Ask on WhatsApp</a></div>
<?php nk_win_end(); ?>
</div></section>
<?php nk_page_cta(); ?>
</main>
<?php
$ld = array();
foreach ( $F as $t ) foreach ( $t[2] as $q ) $ld[] = array( '@type' => 'Question', 'name' => $q[1], 'acceptedAnswer' => array( '@type' => 'Answer', 'text' => $q[2] ) );
echo '<script type="application/ld+json">' . wp_json_encode( array( '@context' => 'https://schema.org', '@type' => 'FAQPage', '@id' => home_url( '/faq/#faq' ), 'mainEntity' => $ld ) ) . '</script>' . "\n";
?>
<script>
(()=>{const inp=document.getElementById('pgFq'),gs=[...document.querySelectorAll('.pgF-g')],qs=[...document.querySelectorAll('.pgF-q')],nav=[...document.querySelectorAll('.pgF-nv a')],no=document.getElementById('pgFno'),cnt=document.getElementById('pgFn'),tot=qs.length;if(!inp)return;
const norm=s=>s.toLowerCase().normalize('NFKD').replace(/[̀-ͯ’']/g,'');
qs.forEach(q=>q.dataset.s=norm(q.textContent));
let last=null;
inp.addEventListener('input',()=>{const v=norm(inp.value.trim()),w=v.split(/\s+/).filter(Boolean);let c=0;
 qs.forEach(q=>{const m=!w.length||w.every(x=>q.dataset.s.includes(x));q.hidden=!m;if(m)c++;if(w.length&&m&&c===1&&last!==v){q.open=true}});last=v;
 gs.forEach(g=>{g.hidden=!g.querySelector('.pgF-q:not([hidden])')});
 nav.forEach(a=>{const g=document.getElementById('t-'+a.dataset.t),k=g.querySelectorAll('.pgF-q:not([hidden])').length;a.querySelector('em').textContent=k;a.classList.toggle('pgF-0',!k)});
 cnt.textContent=w.length?c+' of '+tot+' answers':tot+' answers';no.hidden=!!c;
 if(!c){document.getElementById('pgFt').textContent=inp.value.trim();document.getElementById('pgFwa').href='https://wa.me/60176604771?text='+encodeURIComponent('Hi Neeko, I have a question: '+inp.value.trim())}});
const on=k=>nav.forEach(a=>a.toggleAttribute('aria-current',a.dataset.t===k));
let rq=0;const spy=()=>{rq=0;let k=null;for(const g of gs){if(g.hidden)continue;if(g.getBoundingClientRect().top<=innerHeight*.35||!k)k=g.dataset.t}on(k)};addEventListener('scroll',()=>{if(!rq)rq=requestAnimationFrame(spy)},{passive:true});spy();
const hash=()=>{const h=location.hash.slice(1);if(!h)return;const el=document.getElementById(h);if(el&&el.tagName==='DETAILS'){el.open=true;setTimeout(()=>el.scrollIntoView({block:'center'}),60)}};hash();addEventListener('hashchange',hash);
})();
</script>
<?php get_footer();
