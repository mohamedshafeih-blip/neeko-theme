<?php
/* Neeko: single article */
get_header();
the_post();
$blog = get_option( 'page_for_posts' ) ? get_permalink( get_option( 'page_for_posts' ) ) : home_url( '/articles/' );
list( $cat, $catu ) = nk_post_cat();
?>
<main>
<section class="hero sky sv-hero pg-hero pg-art" id="top"><div class="wrap hc">
  <nav class="bcr" aria-label="Breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span aria-hidden="true">/</span><a href="<?php echo esc_url( $blog ); ?>">Articles</a><span aria-hidden="true">/</span><a href="<?php echo esc_url( $catu ); ?>"><?php echo esc_html( $cat ); ?></a></nav>
  <h1><?php the_title(); ?></h1>
  <p class="pgam"><time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'j M Y' ) ); ?></time><span><?php echo (int) nk_read_time(); ?> min read</span><span>By the Neeko team</span></p>
</div></section>

<section class="sec pg-post"><div class="wrap">
<?php
$side  = nk_side_head( esc_html( $cat ), (int) nk_read_time() . ' min read · ' . esc_html( get_the_date( 'j M Y' ) ), 'i-doc' ) . '<nav class="pgtoc pgW-tc" id="pgtoc" aria-label="In this article" hidden><p class="pgW-l">In this article</p><ol class="pgW-toc"></ol></nav>';
$side .= '<div class="pgW-cta"><b>Need a hand?</b><p>Tell us what you need and get a clear quotation. Prices start from RM120.</p><a class="btn btn-blue" href="' . esc_url( home_url( '/#brief' ) ) . '">Start your brief <svg aria-hidden="true"><use href="#i-ne"/></svg></a><a class="btn btn-line" href="https://wa.me/60176604771" target="_blank" rel="noopener"><svg aria-hidden="true"><use href="#i-wa"/></svg>WhatsApp us</a></div>';
$side .= '<div class="pgsh"><span>Share</span><a href="https://wa.me/?text=' . rawurlencode( get_the_title() . ' ' . get_permalink() ) . '" target="_blank" rel="noopener" aria-label="Share on WhatsApp"><svg aria-hidden="true"><use href="#i-wa"/></svg></a><a href="https://www.linkedin.com/sharing/share-offsite/?url=' . rawurlencode( get_permalink() ) . '" target="_blank" rel="noopener" aria-label="Share on LinkedIn"><svg aria-hidden="true"><use href="#i-in"/></svg></a><button type="button" id="pgcp" aria-label="Copy link"><svg aria-hidden="true"><use href="#i-link"/></svg><em>Copy link</em></button></div>';
nk_win_start( esc_html( wp_make_link_relative( get_permalink() ) ), array( 'i-globe', array( 'i-ne', $blog, 'All articles' ) ), $side, 'pgW-rd', esc_html( $cat ) . ' · ' . (int) nk_read_time() . ' min read' );
?>
  <figure class="pgW-hi"><img src="<?php echo esc_url( nk_post_img() ); ?>" alt="" width="1200" height="675" loading="eager" fetchpriority="high"></figure>
  <article class="pg-prose" id="pgart"><?php the_content(); ?></article>
<?php nk_win_end(); ?>
</div></section>

<?php
$more = get_posts( array( 'numberposts' => 3, 'post__not_in' => array( get_the_ID() ) ) );
if ( $more ) :
	?>
<section class="sec pg-more"><div class="wrap">
  <div class="wh rv"><div class="sh"><h2>More articles</h2></div><a class="btn btn-line" href="<?php echo esc_url( $blog ); ?>">All articles <svg aria-hidden="true"><use href="#i-ne"/></svg></a></div>
  <div class="pgag pgag3"><?php foreach ( $more as $m ) nk_post_card( $m ); ?></div>
</div></section>
<?php endif; ?>
<?php nk_page_cta(); ?>
</main>
<script>
(()=>{const a=document.getElementById('pgart'),t=document.getElementById('pgtoc');if(!a||!t)return;const hs=[...a.querySelectorAll('h2')];
const sl=s=>s.toLowerCase().replace(/[^a-z0-9]+/g,'-').replace(/^-|-$/g,'').slice(0,60);
if(hs.length>1){const ol=t.querySelector('ol');hs.forEach(h=>{if(!h.id)h.id=sl(h.textContent);const li=document.createElement('li');li.innerHTML=`<a href="#${h.id}"></a>`;li.firstChild.textContent=h.textContent;ol.appendChild(li)});t.hidden=false;
 const ls=[...ol.querySelectorAll('a')];const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting)ls.forEach(l=>l.classList.toggle('on',l.getAttribute('href')==='#'+e.target.id))}),{rootMargin:'-20% 0px -70% 0px'});hs.forEach(h=>io.observe(h))}
a.querySelectorAll('table').forEach(x=>{const w=document.createElement('div');w.className='pgtw';x.before(w);w.appendChild(x)});
const c=document.getElementById('pgcp');if(c)c.onclick=()=>{navigator.clipboard&&navigator.clipboard.writeText(location.href).then(()=>{c.classList.add('ok');c.querySelector('em').textContent='Copied';setTimeout(()=>{c.classList.remove('ok');c.querySelector('em').textContent='Copy link'},1800)})}})();
</script>
<?php get_footer();
