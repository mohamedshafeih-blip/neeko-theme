<?php
/* Neeko: privacy policy (PDPA 2010 notice) */
get_header();
?>
<main>
<?php nk_page_hero( array( array( 'Privacy policy', null ) ), 'Privacy policy', 'How Neeko collects, uses and protects your personal data, in line with Malaysia’s Personal Data Protection Act 2010 (PDPA).', '', 'pg-hero-sm pg-hero-w', true ); ?>
<?php
nk_legal( array(
'who' => array( 'Who we are', <<<'HTML'
<p>This notice is issued by <b>Berdua Sama Niaga</b> (003225924-X), trading as Neeko, Kuala Lumpur, Malaysia (“Neeko”, “we”, “us”). We decide how and why your personal data is used for the purposes below.</p>
<p>For any privacy question or request, email <a href="mailto:enquiry@neeko.my">enquiry@neeko.my</a>.</p>
HTML ),
'collect' => array( 'What we collect', <<<'HTML'
<ul>
<li><b>Contact details:</b> your name, company, phone number and email address.</li>
<li><b>Enquiry details:</b> your message, the services and business size you choose in the brief builder, and your conversations with us on WhatsApp, email or calls.</li>
<li><b>Project information:</b> content, brand assets and system access you share so we can do the agreed work.</li>
<li><b>Billing details:</b> the information needed for quotations, invoices and payment records.</li>
<li><b>Website usage:</b> basic technical data such as browser type and pages visited, where analytics is enabled.</li>
</ul>
<p>We don’t ask for sensitive personal data. Please don’t send it unless a project specifically needs it and we have agreed how it will be handled.</p>
HTML ),
'how' => array( 'How we collect it', <<<'HTML'
<p>You give it to us directly: by messaging us on WhatsApp, emailing us, using the contact form or brief builder (which open WhatsApp or your email app with the message ready), or sharing materials during a project. The website’s forms do not store your message on our server.</p>
HTML ),
'use' => array( 'Why we use it', <<<'HTML'
<ul>
<li>To reply to your enquiry and prepare a quotation.</li>
<li>To deliver, support and invoice the services you buy.</li>
<li>To keep records we are required to keep by law, such as accounting records.</li>
<li>To improve our website and services.</li>
<li>To send updates you have asked for. You can opt out at any time.</li>
</ul>
<p>Giving us your contact details is voluntary, but without them we can’t reply to you or provide services.</p>
HTML ),
'share' => array( 'Who we share it with', <<<'HTML'
<ul>
<li>Neeko specialists working on your project, who are bound to keep it confidential.</li>
<li>Service providers we use to run the business, such as hosting, email, WhatsApp (Meta), cloud storage, analytics and payment providers.</li>
<li>Third-party platforms you ask us to connect, such as your CRM or booking system.</li>
<li>Authorities, when the law requires it.</li>
</ul>
<p>We do not sell your personal data.</p>
HTML ),
'transfer' => array( 'Transfers outside Malaysia', <<<'HTML'
<p>Some of our service providers store data on servers outside Malaysia. When this happens, we choose providers with recognised security standards and take reasonable steps to make sure your data is protected to a standard comparable to the PDPA.</p>
HTML ),
'retention' => array( 'How long we keep it', <<<'HTML'
<p>We keep enquiry details for as long as needed to respond and follow up, and client records for the length of our working relationship. Financial records are kept for 7 years, as Malaysian law requires. After that, we delete or anonymise the data.</p>
HTML ),
'security' => array( 'Keeping it secure', <<<'HTML'
<p>We use access controls, secure passwords and reputable platforms to protect your data. System logins you share for a project are used only for the agreed work. We recommend changing shared passwords after handover. If a personal data breach could cause you significant harm, we will notify you and the Personal Data Protection Commissioner as the law requires.</p>
HTML ),
'rights' => array( 'Your rights', <<<'HTML'
<p>Under the PDPA, you can:</p>
<ul>
<li>ask for a copy of the personal data we hold about you;</li>
<li>ask us to correct data that is inaccurate, incomplete or out of date;</li>
<li>withdraw your consent or ask us to limit how we use your data;</li>
<li>ask us to transfer your data to another organisation, where technically possible;</li>
<li>stop receiving updates from us at any time.</li>
</ul>
<p>Email <a href="mailto:enquiry@neeko.my">enquiry@neeko.my</a> with your request. We respond within 21 days. We may need to confirm your identity first.</p>
HTML ),
'cookies' => array( 'Cookies and browser storage', <<<'HTML'
<p>This website saves a few settings in your browser so it works the way you left it: your light or dark mode choice and your brief builder selections. These stay on your device and are not sent to us. If analytics is enabled, it uses cookies to count visits and see which pages are useful. You can clear or block cookies in your browser settings.</p>
HTML ),
'children' => array( 'Children', <<<'HTML'
<p>Our services are for businesses. We do not knowingly collect personal data from anyone under 18.</p>
HTML ),
'changes' => array( 'Language and changes', <<<'HTML'
<p>A Bahasa Malaysia version of this notice is available on request. We may update this policy and will show the date of the latest change on this page. See also our <a href="__TERMS__">terms of service</a>.</p>
HTML ),
), '10 November 2026', 'privacy' );
?>
</div></section>
</main>
<?php get_footer();
