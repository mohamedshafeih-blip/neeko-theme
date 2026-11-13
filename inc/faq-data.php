<?php
/**
 * Neeko FAQ page data: topic => [ icon, label, [ [ id, question, answer, service slug|'' , link label ] … ] ].
 * Facts follow the company profile (price references checked 28 Oct 2026). Never promise rankings, followers or results.
 */
function nk_faq_data() {
	return array(
		'start' => array( 'i-team', 'Getting started', array(
			array( 'what-is-neeko', 'What is Neeko?', 'Neeko is a freelancer collective based in Kuala Lumpur, registered as Berdua Sama Niaga (003225924-X). We bring the right creative, marketing and technical specialists into one scope, so you brief one team and get one quotation.', 'about', 'About Neeko' ),
			array( 'services', 'What services do you offer?', 'Three groups of work. Create: graphic design and AI photography. Connect: websites, SEO and social media. Build: AI solutions, CRM, API integration, ERP, custom software and mobile apps. Care plans for websites, AI and systems keep things running after launch.', '#pricing', 'See all prices' ),
			array( 'how-to-start', 'How do I start?', 'Use the brief builder on our homepage to pick your goals and see an estimate, or message us on WhatsApp. We confirm the scope with you and send a quotation before any work starts.', '#brief', 'Start a brief' ),
			array( 'outside-kl', 'Do you work with businesses outside Kuala Lumpur?', 'Yes. We work with businesses across Malaysia. Briefs, reviews and handovers happen on WhatsApp, email and video calls.', '', '' ),
			array( 'language', 'Which languages can we use?', 'You can message us in English, Bahasa Malaysia, Chinese or Arabic. AI assistants are set up in English and Bahasa Malaysia.', '', '' ),
		) ),
		'pricing' => array( 'i-card', 'Pricing and payment', array(
			array( 'prices-final', 'Are the prices on the site final?', 'They are starting prices. Website and SEO prices follow our published rates, and the other services use proposed starting packages. Your quotation confirms the final scope and price after we understand the work.', '#pricing', 'See all prices' ),
			array( 'quotation', 'Do I get a quotation before paying anything?', 'Yes. The quotation confirms deliverables, timing, responsibilities, payment milestones and the support arrangement. Work starts once you accept it.', '', '' ),
			array( 'commitment', 'Is there a minimum commitment?', 'Websites, software and other one-time builds are paid per project. SEO, social media and monthly bundles start with 3 months upfront. Social media then continues month to month. Your quotation states the term for each plan.', '', '' ),
			array( 'extra-costs', 'What costs are not included?', 'Hosting renewals, paid software and licences, app store accounts, payment charges, API usage, messaging fees and ad spend are separate. We list them in the quotation where they apply, together with any applicable taxes.', '', '' ),
			array( 'bundles', 'Do you offer monthly bundles?', 'Yes. Bundles combine social media, SEO and website care in one monthly scope: Presence from RM2,199, Growth from RM3,699 and Authority from RM6,999 per month, with 3 months upfront to start. Website builds are quoted separately.', '#pricing', 'See all prices' ),
		) ),
		'process' => array( 'i-clock', 'Process and timing', array(
			array( 'how-it-works', 'How does a project work?', 'Four steps. Understand your business and the problem. Agree the deliverables, timing and review points. Create and build, with reviews at the planned stages. Then launch, hand over and continue with support or recurring work.', 'about', 'How we work' ),
			array( 'what-you-need', 'What do you need from me?', 'Accurate information, your brand assets, access to the systems involved and one consolidated set of feedback at each review.', '', '' ),
			array( 'website-time', 'How long does a website take?', 'About 7–10 days for Starter, 10–14 days for Growth and 14–21 days for Pro. Timing depends on content, access and approvals.', 'website-design', 'Website design' ),
			array( 'changes', 'Can I request changes?', 'Website builds include unlimited amendments on staging within the agreed scope. Other services follow their stated task, revision or care allowance. New features are quoted separately.', '', '' ),
			array( 'ai-use', 'Do you use AI in your work?', 'Yes, where it helps: AI-assisted copy and media for websites, AI-assisted visuals for social media and AI photography. A person reviews everything before it reaches you.', 'ai-photography', 'AI photography' ),
		) ),
		'web' => array( 'i-globe', 'Websites and SEO', array(
			array( 'website-included', 'What comes with a website package?', 'A WordPress site with responsive pages, AI-assisted content, basic SEO, GA4 and Search Console setup and unlimited staging revisions. Year-one standard domain and hosting are included, with the hosting contribution capped at RM500.', 'website-design', 'Website design' ),
			array( 'pagespeed', 'Will my site score 90+ on PageSpeed?', 'It is our optimisation target for the agreed build, not a promise. The final score depends on hosting, third-party scripts and your content.', 'website-design', 'Website design' ),
			array( 'seo-guarantee', 'Do you guarantee SEO rankings?', 'No. Search performance builds over time and depends on competition, website health and ongoing work. Rankings, traffic, enquiries and AI Overview inclusion are not guaranteed. We report what was done and what changed.', 'seo', 'SEO' ),
			array( 'seo-packages', 'How do the SEO packages differ?', 'By competition level. Starter targets local and long-tail terms, Growth a balanced mix with moderate competition, and Pro high-traffic terms in competitive markets. Deliverables are agreed before work starts.', 'seo', 'SEO' ),
		) ),
		'social' => array( 'i-ig', 'Social media and design', array(
			array( 'posts', 'How many posts do I get each month?', 'Starter: 8 feed posts on one platform. Growth: 12 posts, 2 reels and 8 stories on Instagram and Facebook. Pro Creator: 16 posts, 4 reels and 12 stories across 3 platforms.', 'social-media', 'Social media' ),
			array( 'approval', 'Is anything posted without my approval?', 'No. Nothing is published before you approve the content calendar.', 'social-media', 'Social media' ),
			array( 'followers', 'Do you guarantee followers or engagement?', 'No. The agreed content and publishing scope define what we deliver. You get a monthly report on what went out and how it performed.', 'social-media', 'Social media' ),
			array( 'ad-spend', 'Is ad spend included?', 'No. Advertising spend is paid directly to the platforms.', '', '' ),
			array( 'design-plans', 'How do the monthly design plans work?', 'You add requests to a queue. Design Essential works on 1 task at a time, with a typical first draft in 2–3 days. Design Studio works on 2 at a time, in 1–2 days. Single pieces are RM120 per artboard. Complex branding, filming and 3D are quoted separately.', 'graphic-design', 'Graphic design' ),
		) ),
		'build' => array( 'i-code', 'AI, software and systems', array(
			array( 'ai-replace', 'Will an AI assistant replace my team?', 'No. It answers approved questions and captures enquiries, then hands over to a person when a request is new or sensitive. Human handover is part of every flow.', 'ai-solutions', 'AI solutions' ),
			array( 'ai-price', 'How much does an AI chat assistant or automation cost?', 'An AI chat assistant is RM1,499 for the first channel and RM999 for each extra channel. Workflow automation starts from RM1,499 per workflow. Custom AI starts with a working prototype from RM4,999; full builds start from RM15,000. Bundles of chat and workflows start at RM2,499.', 'ai-solutions', 'AI solutions' ),
			array( 'ai-care', 'What does AI care cover?', 'Monitoring, error alerts, fixes when a connected tool changes and monthly care hours. AI care starts from RM399 per month for up to 2 chat channels or workflows. Model tokens, WhatsApp fees and vendor subscriptions are charged separately.', 'ai-care', 'AI care' ),
			array( 'licences', 'Are CRM or ERP licences included?', 'No. Platform licences, hosting and data cleansing are extra. User counts in the packages describe how many users we configure, not paid seats.', 'crm', 'CRM setup' ),
			array( 'integration', 'Can you connect the tools we already use?', 'Yes, through API integration: from one trigger between two systems to scoped workflows across three systems, with testing, error logging and handover. API access and usage fees need to be confirmed first.', 'integrations', 'API integration' ),
			array( 'mobile', 'Do you build for both iOS and Android?', 'Where it suits the project, we use a shared codebase. Supported devices, offline use and store submission are confirmed in the quotation. Store approval is controlled by Apple and Google.', 'mobile-app', 'Mobile app' ),
			array( 'defects', 'What is defect support?', 'After launch, software, CRM and ERP projects include 30, 60 or 90 days, depending on the package, to fix anything that doesn’t work as agreed. New features are quoted separately.', 'custom-software', 'Custom software' ),
		) ),
		'care' => array( 'i-shield', 'Care and support', array(
			array( 'after-launch', 'What happens after my website launches?', 'Website packages include 3, 6 or 12 months of minor support. After that, website care starts from RM199 per month for backups, updates, health checks and support hours.', 'website-care', 'Website care' ),
			array( 'hours', 'Do unused support hours roll over?', 'No. Support runs in business hours, time allowances don’t roll over and there is no 24/7 emergency SLA.', 'website-care', 'Website care' ),
			array( 'system-care', 'Do you support apps and automations after launch?', 'Yes. System care covers CRM, ERP, custom software, mobile apps and integrations. It starts from RM399 per month for 1 system with monitoring, bug fixes and 1.5 support hours; larger plans cover up to 3 or 6 systems with 5 or 10 hours.', 'system-care', 'System care' ),
		) ),
	);
}
