<?php
/* Neeko: terms of service */
get_header();
?>
<main>
<?php nk_page_hero( array( array( 'Terms of service', null ) ), 'Terms of service', 'The rules for using neeko.my and working with Neeko. Your quotation sets out the specific scope of your project; these terms cover everything around it.', '', 'pg-hero-sm pg-hero-w', true ); ?>
<?php
nk_legal( array(
'about' => array( 'About these terms', <<<'HTML'
<p>Neeko is a trading name of <b>Berdua Sama Niaga</b> (003225924-X), a business registered in Malaysia and based in Kuala Lumpur (“Neeko”, “we”, “us”). These terms apply when you use this website or buy any Neeko service.</p>
<p>If your signed quotation or agreement says something different from these terms, the quotation or agreement applies for that project.</p>
HTML ),
'website' => array( 'Using this website', <<<'HTML'
<p>Information on this website is general and may change. Prices shown are starting prices in Malaysian Ringgit (MYR). Estimates from the brief builder are a guide, not an offer: only a quotation from us is an offer to supply services.</p>
<p>Please don’t misuse the website, copy its design or content for commercial use, or try to disrupt it.</p>
HTML ),
'quotations' => array( 'Quotations and scope', <<<'HTML'
<p>Every project starts with a quotation. It confirms the deliverables, timing, responsibilities, payment milestones and the support arrangement. Work begins once you accept the quotation and any first payment it lists has been received.</p>
<p>Work outside the agreed scope, such as new features, extra pages or new workflows, is quoted separately before we start it.</p>
HTML ),
'payment' => array( 'Prices and payment', <<<'HTML'
<ul>
<li>Prices are in MYR. Applicable taxes are confirmed in your quotation.</li>
<li>Payments follow the milestones in your quotation. Invoices are due by the date shown on them.</li>
<li>If a payment is overdue, we may pause work and the timeline moves accordingly.</li>
</ul>
HTML ),
'monthly' => array( 'Monthly services', <<<'HTML'
<p>Social media, SEO, monthly design and connected bundles start with <b>3 months paid upfront</b>, then continue month to month. To stop a monthly service after the first 3 months, tell us in writing before your next billing month starts.</p>
<p>Monthly allowances, such as posts, tasks, care hours or support hours, are for that month and do not roll over.</p>
HTML ),
'changes' => array( 'Reviews and changes', <<<'HTML'
<p>Website builds include unlimited amendments on staging within the agreed build scope, until final approval. Other services follow the task, revision or care allowance stated in their package or quotation.</p>
<p>Please send one consolidated set of feedback at each review. Late or conflicting feedback can extend the timeline.</p>
HTML ),
'responsibilities' => array( 'Your responsibilities', <<<'HTML'
<ul>
<li>Give us accurate information, brand assets and the system access the work needs.</li>
<li>Make sure you have the right to use any text, images, logos or data you send us.</li>
<li>Review and approve work at the agreed points. You are responsible for checking content before it is published.</li>
</ul>
HTML ),
'costs' => array( 'Third-party costs', <<<'HTML'
<p>Hosting, domains, paid software and plugins, app-store accounts, payment gateway charges, API usage, AI model usage, messaging fees and ad spend are paid by you and itemised where relevant. Website packages include a year-one standard domain and hosting, with the hosting contribution capped at RM500. Renewals after that are separate.</p>
HTML ),
'ownership' => array( 'Ownership and licences', <<<'HTML'
<p>Once the project is paid in full, you own the final deliverables we create specifically for you, such as your website content, designs and images. Third-party items, including fonts, plugins, themes, stock assets and software platforms, stay under their own licences.</p>
<p>Draft concepts that you did not choose, our internal tools and reusable code remain ours. We may show finished work in our portfolio unless you ask us not to.</p>
HTML ),
'ai' => array( 'AI-assisted work', <<<'HTML'
<p>Some services use AI tools to draft copy, generate images or run chat assistants. People on our team direct and review this work, and you approve it before it is published. AI chat assistants answer only from the information you approve and hand over to your team when needed.</p>
HTML ),
'results' => array( 'Results and performance', <<<'HTML'
<p>We do not guarantee search rankings, traffic, enquiries, sales or inclusion in AI search results. These depend on competition, your website and ongoing activity. Performance targets such as a PageSpeed score depend on hosting, third-party scripts and final content.</p>
HTML ),
'support' => array( 'Support', <<<'HTML'
<p>Support is provided during Malaysian business hours. A 24/7 emergency service is not included unless your quotation says otherwise.</p>
HTML ),
'cancellation' => array( 'Cancellation and refunds', <<<'HTML'
<ul>
<li><b>One-time projects:</b> if you cancel, work completed up to that point is chargeable, and payments for completed milestones are not refundable.</li>
<li><b>Monthly services:</b> fees for a month that has started are not refundable. The 3-month upfront period is not refundable once work has begun.</li>
<li>Third-party costs already paid on your behalf are not refundable.</li>
</ul>
HTML ),
'liability' => array( 'Liability', <<<'HTML'
<p>To the extent the law allows, our total liability for any claim is limited to the fees you paid for the affected service in the 3 months before the claim. We are not liable for indirect losses such as lost profit, lost data or business interruption. Nothing in these terms limits rights you have under Malaysian law that cannot be excluded.</p>
HTML ),
'confidentiality' => array( 'Confidentiality and data', <<<'HTML'
<p>We keep your business information and system access confidential and use it only for the agreed work. Our <a href="__PRIV__">privacy policy</a> explains how we handle personal data.</p>
HTML ),
'law' => array( 'Governing law', <<<'HTML'
<p>These terms are governed by the laws of Malaysia. Any dispute will be handled by the courts of Kuala Lumpur, after we have first tried to resolve it with you directly.</p>
HTML ),
'contact' => array( 'Changes and contact', <<<'HTML'
<p>We may update these terms. The version on this page at the time you accept a quotation applies to that project. Questions? Email <a href="mailto:enquiry@neeko.my">enquiry@neeko.my</a> or WhatsApp <a href="https://wa.me/60176604771">+60 17-660 4771</a>.</p>
HTML ),
), '10 November 2026', 'terms' );
?>
</div></section>
</main>
<?php get_footer();
