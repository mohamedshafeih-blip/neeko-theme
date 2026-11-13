<?php
/**
 * Service pages still being built ("Updating" pages).
 * A slug here gets page-soon.php until its own page-{slug}.php exists.
 * Packages mirror the pricing data in parts/site-footer.php.
 * Blurred windows: [title, icon, type, data]; types: chat, list, photo, stats.
 */
function nk_soon() {
	$I = NK_URI . '/assets/img/';
	return array(
		'ai-solutions' => array(
			'name'  => 'AI solutions',
			'group' => 'Build',
			'icon'  => 'i-chat',
			'h1'    => 'AI that answers customers and handles the routine work',
			'sub'   => 'AI chat assistants on WhatsApp and your website, workflows that capture leads and follow up, and custom AI built around your business. A person stays in the loop.',
			'desc'  => 'AI solutions for Malaysian businesses: AI chat assistants from RM1,499 per channel, workflow automation from RM1,499 and custom AI prototypes from RM4,999.',
			'title' => 'AI solutions in Malaysia: chat assistants, automation, custom AI — Neeko',
			'mo'    => false,
			'pk'    => array( array( 'AI chat assistant', 1499, 0, 'Per channel · 25 FAQ topics · handover' ), array( 'Workflow automation', 1499, 0, 'Per workflow · trigger, action, fallback' ), array( 'Custom AI', 4999, 0, 'Working prototype in 2–4 weeks' ) ),
			'tasks' => array( 'Chat, workflow and custom AI prices', 'Demo windows', 'Setup steps and FAQ' ),
			'win'   => array(
				array( 'WhatsApp inbox', 'i-wa', 'chat', array( array( 'Hi, how much for a 3-page website?', 0 ), array( 'Our Starter site is RM3,900 for up to 5 pages. Want me to book a call?', 1 ), array( 'Yes, tomorrow 3pm', 0 ) ) ),
				array( 'FAQ topics', 'i-doc', 'list', array( 'Prices and packages', 'Opening hours', 'Delivery areas', 'Booking a slot', 'Refund policy' ) ),
				array( '', '', 'photo', $I . 'nk-art-ai.webp' ),
				array( 'This week', 'i-spark', 'stats', array( array( 'Chats', '312' ), array( 'Answered', '87%' ), array( 'Leads', '46' ), array( 'Handovers', '19' ) ) ),
				array( 'Handover', 'i-team', 'chat', array( array( 'Customer asked for a custom quote', 1 ), array( 'Hafiz joined the chat', 0 ) ) ),
				array( 'Languages', 'i-globe', 'list', array( 'English', 'Bahasa Melayu', 'Mixed replies' ) ),
			),
		),
		'crm' => array(
			'name'  => 'CRM setup',
			'group' => 'Build',
			'icon'  => 'i-team',
			'h1'    => 'A CRM that tracks every lead',
			'sub'   => 'Pipelines, users and follow-up reminders set up around how your team already sells.',
			'desc'  => 'CRM setup for Malaysian businesses: pipelines, users, automations and integrations so no lead is missed. From RM3,500.',
			'title' => 'CRM setup in Malaysia from RM3,500 — Neeko',
			'mo'    => false,
			'pk'    => array( array( 'Launch', 3500, 0, '1 pipeline · up to 5 users · 2 automations' ), array( 'Connect', 7500, 0, '2 pipelines · up to 15 users · 1 integration' ), array( 'Scale', 15000, 0, '4 pipelines · up to 30 users · 2 integrations' ) ),
			'tasks' => array( 'Packages and prices', 'Pipeline windows', 'Setup steps and FAQ' ),
			'win'   => array(
				array( 'Pipeline', 'i-team', 'list', array( 'New lead · 12', 'Contacted · 8', 'Quoted · 5', 'Won · 3' ) ),
				array( 'Follow-ups today', 'i-cal', 'list', array( 'Call Aina · 10:00', 'Send quote to Jason', 'WhatsApp Mr Ong' ) ),
				array( '', '', 'photo', $I . 'nk-about-build.webp' ),
				array( 'This month', 'i-sheet', 'stats', array( array( 'Leads', '128' ), array( 'Won', '31' ), array( 'Value', 'RM84k' ), array( 'Response', '2h' ) ) ),
				array( 'Lead', 'i-chat', 'chat', array( array( 'Form: Website enquiry', 1 ), array( 'Assigned to Hafiz', 0 ) ) ),
				array( 'Automations', 'i-spark', 'list', array( 'New lead → WhatsApp alert', 'Quote sent → reminder in 3 days' ) ),
			),
		),
		'integrations' => array(
			'name'  => 'API integration',
			'group' => 'Build',
			'icon'  => 'i-sheet',
			'h1'    => 'Connect the tools you already use',
			'sub'   => 'Your website, forms, sheets, CRM and payment tools passing data to each other, without copy and paste.',
			'desc'  => 'API integration for Malaysian businesses: connect your website, forms, CRM, sheets and payment tools. From RM1,500.',
			'title' => 'API integration in Malaysia from RM1,500 — Neeko',
			'mo'    => false,
			'pk'    => array( array( 'Connect', 1500, 0, '2 systems · one-way flow · 1 trigger' ), array( 'Workflow', 4500, 0, '2 systems · 1 workflow · validation rules' ), array( 'Multi-system', 9500, 0, '3 systems · 3 workflows · exception handling' ) ),
			'tasks' => array( 'Packages and prices', 'Workflow windows', 'Setup steps and FAQ' ),
			'win'   => array(
				array( 'Workflow', 'i-spark', 'list', array( 'Website form submitted', 'Add row to Google Sheets', 'Create lead in CRM', 'Send WhatsApp alert' ) ),
				array( 'Run log', 'i-doc', 'list', array( '10:42 · Lead synced', '10:31 · Payment matched', '10:05 · Order created' ) ),
				array( '', '', 'photo', $I . 'nk-about-connect.webp' ),
				array( 'Today', 'i-sheet', 'stats', array( array( 'Runs', '214' ), array( 'Success', '99%' ), array( 'Saved', '3.5h' ), array( 'Errors', '2' ) ) ),
				array( 'New lead saved', 'i-check', 'chat', array( array( 'Aina · aina@mail.com', 1 ), array( 'Google Sheets · row 482', 0 ) ) ),
				array( 'Connected', 'i-link', 'list', array( 'WordPress', 'Google Sheets', 'WhatsApp' ) ),
			),
		),
		'erp' => array(
			'name'  => 'ERP and operations',
			'group' => 'Build',
			'icon'  => 'i-cart',
			'h1'    => 'Orders, stock and approvals in one system',
			'sub'   => 'One system for the daily work: orders, stock, approvals and reports, with training for your team.',
			'desc'  => 'ERP and operations setup for Malaysian businesses: orders, stock, approvals and reporting in one system. From RM7,500.',
			'title' => 'ERP and operations systems in Malaysia from RM7,500 — Neeko',
			'mo'    => false,
			'pk'    => array( array( 'Essentials', 7500, 0, '1 module · up to 5 users · 2 hours training' ), array( 'Operations', 15000, 0, '3 modules · up to 10 users · approvals + reporting' ), array( 'Connected', 28000, 0, '5 modules · up to 20 users · 1 integration' ) ),
			'tasks' => array( 'Packages and prices', 'Module windows', 'Setup steps and FAQ' ),
			'win'   => array(
				array( 'Orders', 'i-cart', 'list', array( '#1042 · Packed', '#1041 · Awaiting approval', '#1040 · Delivered' ) ),
				array( 'Approvals', 'i-check', 'list', array( 'PO 233 · RM4,200', 'Leave · Aina · 2 days', 'Claim · RM180' ) ),
				array( '', '', 'photo', $I . 'nk-about-team.webp' ),
				array( 'Stock', 'i-sheet', 'stats', array( array( 'SKUs', '1,240' ), array( 'Low', '14' ), array( 'Orders', '86' ), array( 'Value', 'RM212k' ) ) ),
				array( 'Low stock', 'i-clock', 'chat', array( array( 'Carton box M · 40 left', 1 ), array( 'PO drafted for approval', 0 ) ) ),
				array( 'Modules', 'i-doc', 'list', array( 'Sales', 'Inventory', 'Purchasing', 'Reports' ) ),
			),
		),
		'custom-software' => array(
			'name'  => 'Custom software',
			'group' => 'Build',
			'icon'  => 'i-code',
			'h1'    => 'Software built around how you work',
			'sub'   => 'Built around one workflow first, with the screens and user roles your team needs.',
			'desc'  => 'Custom software for Malaysian businesses: portals, dashboards and internal tools, built around your workflow. From RM15,000.',
			'title' => 'Custom software development in Malaysia from RM15,000 — Neeko',
			'mo'    => false,
			'pk'    => array( array( 'MVP', 15000, 0, '1 core workflow · up to 6 screens · 2 user roles' ), array( 'Workflow', 30000, 0, '3 workflows · up to 12 screens · 1 integration' ), array( 'Platform', 60000, 0, '5 workflows · up to 20 screens · 2 integrations' ) ),
			'tasks' => array( 'Packages and prices', 'Dashboard windows', 'Build steps and FAQ' ),
			'win'   => array(
				array( 'Dashboard', 'i-sheet', 'stats', array( array( 'Requests', '58' ), array( 'Open', '12' ), array( 'Done', '46' ), array( 'SLA', '96%' ) ) ),
				array( 'Requests', 'i-doc', 'list', array( 'REQ-221 · Site visit', 'REQ-220 · Quotation', 'REQ-219 · Approved' ) ),
				array( '', '', 'photo', $I . 'nk-about-build.webp' ),
				array( 'Roles', 'i-team', 'list', array( 'Admin', 'Staff', 'Client portal' ) ),
				array( 'Activity', 'i-chat', 'chat', array( array( 'Aina approved REQ-219', 1 ), array( 'Client notified by email', 0 ) ) ),
				array( 'Screens', 'i-code', 'list', array( 'Login', 'Dashboard', 'Request form', 'Reports' ) ),
			),
		),
		'mobile-app' => array(
			'name'  => 'Mobile app',
			'group' => 'Build',
			'icon'  => 'i-send',
			'h1'    => 'A mobile app for your customers or staff',
			'sub'   => 'iOS and Android apps with login, records and an admin view, built in clear stages.',
			'desc'  => 'Mobile app development for Malaysian businesses: customer or staff apps with login, records, notifications and admin view. From RM18,000.',
			'title' => 'Mobile app development in Malaysia from RM18,000 — Neeko',
			'mo'    => false,
			'pk'    => array( array( 'MVP', 18000, 0, 'Up to 5 screens · login + records · admin view' ), array( 'Growth', 35000, 0, 'Up to 10 screens · notifications · 1 integration' ), array( 'Scale', 60000, 0, 'Up to 20 screens · 2 integrations · role-based workflow' ) ),
			'tasks' => array( 'Packages and prices', 'App screen windows', 'Build steps and FAQ' ),
			'win'   => array(
				array( 'Home screen', 'i-send', 'list', array( 'My bookings', 'Rewards · 240 pts', 'Messages' ) ),
				array( 'Notification', 'i-chat', 'chat', array( array( 'Your order is on the way', 1 ), array( 'Rate your visit', 0 ) ) ),
				array( '', '', 'photo', $I . 'nk-contact.webp' ),
				array( 'This month', 'i-sheet', 'stats', array( array( 'Installs', '1,920' ), array( 'Active', '64%' ), array( 'Rating', '4.8' ), array( 'Bookings', '410' ) ) ),
				array( 'Admin', 'i-team', 'list', array( 'Users', 'Bookings', 'Push messages' ) ),
				array( 'Release', 'i-check', 'list', array( 'App Store', 'Google Play' ) ),
			),
		),
		'website-care' => array(
			'name'  => 'Website care',
			'group' => 'Care',
			'icon'  => 'i-shield',
			'h1'    => 'Keep your website safe and working',
			'sub'   => 'Monthly backups, plugin updates, health checks and support hours, so your site keeps working.',
			'desc'  => 'Website care plans in Malaysia: backups, updates, health and security checks and support hours. From RM199/month.',
			'title' => 'Website care and maintenance in Malaysia from RM199/month — Neeko',
			'mo'    => true,
			'pk'    => array( array( 'Care', 0, 199, 'Backup + updates · health check · 1 support hour' ), array( 'Care Plus', 0, 399, 'Health + security checks · 3 support hours' ), array( 'Priority', 0, 699, 'Health + security checks · 6 support hours · priority queue' ) ),
			'tasks' => array( 'Packages and prices', 'Site health windows', 'Care steps and FAQ' ),
			'win'   => array(
				array( 'Site health', 'i-shield', 'stats', array( array( 'Health', '98' ), array( 'Uptime', '99.9%' ), array( 'Speed', '1.4s' ), array( 'Updates', '0' ) ) ),
				array( 'Backups', 'i-clock', 'list', array( '13 Nov · Full backup', '6 Nov · Full backup', '30 Oct · Full backup' ) ),
				array( '', '', 'photo', $I . 'nk-about-connect.webp' ),
				array( 'Updates', 'i-check', 'list', array( 'WordPress 6.8', 'LiteSpeed Cache', 'Contact form' ) ),
				array( 'Support', 'i-chat', 'chat', array( array( 'The contact form stopped sending', 0 ), array( 'Fixed and tested, mail is going out', 1 ) ) ),
				array( 'Security', 'i-shield', 'list', array( 'Firewall on', 'Login protection', 'SSL valid' ) ),
			),
		),
		'ai-care' => array(
			'name'  => 'AI care',
			'group' => 'Care',
			'icon'  => 'i-spark',
			'h1'    => 'Keep your AI assistant and workflows running',
			'sub'   => 'Monthly monitoring, fixes when a connected tool changes, answer updates and care hours for your chat assistants and workflows.',
			'desc'  => 'AI care plans in Malaysia: monitoring, fixes and care hours for AI chat assistants and automated workflows. From RM399/month.',
			'title' => 'AI care: monitoring for chatbots and automation from RM399/month — Neeko',
			'mo'    => true,
			'pk'    => array( array( 'AI Care', 0, 399, 'Up to 2 chats or workflows · monitoring · 1 care hour' ), array( 'AI Care Plus', 0, 799, 'Up to 4 · monthly review · 2 care hours' ), array( 'AI Priority', 0, 1499, 'Up to 8 · review + report · 4 care hours' ) ),
			'tasks' => array( 'Packages and prices', 'Monitoring windows', 'Care steps and FAQ' ),
			'win'   => array(
				array( 'Site health', 'i-shield', 'stats', array( array( 'Health', '98' ), array( 'Uptime', '99.9%' ), array( 'Speed', '1.4s' ), array( 'Updates', '0' ) ) ),
				array( 'Backups', 'i-clock', 'list', array( '13 Nov · Full backup', '6 Nov · Full backup', '30 Oct · Full backup' ) ),
				array( '', '', 'photo', $I . 'nk-about-connect.webp' ),
				array( 'Updates', 'i-check', 'list', array( 'WordPress 6.8', 'LiteSpeed Cache', 'Contact form' ) ),
				array( 'Support', 'i-chat', 'chat', array( array( 'The contact form stopped sending', 0 ), array( 'Fixed and tested, mail is going out', 1 ) ) ),
				array( 'Security', 'i-shield', 'list', array( 'Firewall on', 'Login protection', 'SSL valid' ) ),
			),
		),
		'system-care' => array(
			'name'  => 'System care',
			'group' => 'Care',
			'icon'  => 'i-code',
			'h1'    => 'Keep your CRM, ERP and apps running',
			'sub'   => 'Monitoring, bug fixes and support hours for the systems your team relies on: CRM, ERP, custom software, mobile apps and integrations.',
			'desc'  => 'System care plans in Malaysia: monitoring, bug fixes and support hours for CRM, ERP, custom software, mobile apps and integrations. From RM399/month.',
			'title' => 'System care: CRM, ERP and app support from RM399/month — Neeko',
			'mo'    => true,
			'pk'    => array( array( 'System Care', 0, 399, '1 system · monitoring + bug fixes · 1.5 support hours' ), array( 'System Care Plus', 0, 999, 'Up to 3 systems · monthly review · 5 support hours' ), array( 'System Priority', 0, 1999, 'Up to 6 systems · priority queue · 10 support hours' ) ),
			'tasks' => array( 'Packages and prices', 'Monitoring windows', 'Care steps and FAQ' ),
			'win'   => array(
				array( 'Site health', 'i-shield', 'stats', array( array( 'Health', '98' ), array( 'Uptime', '99.9%' ), array( 'Speed', '1.4s' ), array( 'Updates', '0' ) ) ),
				array( 'Backups', 'i-clock', 'list', array( '13 Nov · Full backup', '6 Nov · Full backup', '30 Oct · Full backup' ) ),
				array( '', '', 'photo', $I . 'nk-about-connect.webp' ),
				array( 'Updates', 'i-check', 'list', array( 'WordPress 6.8', 'LiteSpeed Cache', 'Contact form' ) ),
				array( 'Support', 'i-chat', 'chat', array( array( 'The contact form stopped sending', 0 ), array( 'Fixed and tested, mail is going out', 1 ) ) ),
				array( 'Security', 'i-shield', 'list', array( 'Firewall on', 'Login protection', 'SSL valid' ) ),
			),
		),
	);
}

/** Current page's entry when it is an updating page. */
function nk_soon_cur() {
	foreach ( nk_soon() as $slug => $d ) {
		if ( is_page( $slug ) && ! file_exists( NK_DIR . '/page-' . $slug . '.php' ) ) return array( $slug, $d );
	}
	return null;
}

/* Template, title and head for updating pages. */
add_filter( 'template_include', function ( $t ) {
	return nk_soon_cur() ? NK_DIR . '/page-soon.php' : $t;
} );
add_filter( 'pre_get_document_title', function ( $t ) {
	$s = nk_soon_cur();
	return $s ? $s[1]['title'] : $t;
}, 20 );
add_action( 'wp_head', function () {
	$s = nk_soon_cur();
	if ( ! $s ) return;
	list( $slug, $d ) = $s;
	$url = 'https://neeko.my/' . $slug . '/';
	$off = array();
	foreach ( $d['pk'] as $p ) {
		$off[] = array( '@type' => 'Offer', 'name' => $p[0], 'priceCurrency' => 'MYR', 'price' => $p[1] ? $p[1] : $p[2], 'description' => $p[3] );
	}
	$ld = array( '@context' => 'https://schema.org', '@graph' => array(
		array( '@type' => 'ProfessionalService', '@id' => 'https://neeko.my/#org', 'name' => 'Neeko', 'url' => 'https://neeko.my/', 'telephone' => '+60176604771', 'areaServed' => 'MY' ),
		array( '@type' => 'Service', 'name' => $d['name'], 'serviceType' => $d['name'], 'provider' => array( '@id' => 'https://neeko.my/#org' ), 'areaServed' => 'MY', 'url' => $url, 'offers' => $off ),
		array( '@type' => 'BreadcrumbList', 'itemListElement' => array( array( '@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => 'https://neeko.my/' ), array( '@type' => 'ListItem', 'position' => 2, 'name' => $d['name'], 'item' => $url ) ) ),
	) );
	echo '<meta name="description" content="' . esc_attr( $d['desc'] ) . '"><meta property="og:title" content="' . esc_attr( $d['title'] ) . '"><meta property="og:description" content="' . esc_attr( $d['desc'] ) . '"><meta property="og:url" content="' . esc_url( $url ) . '"><meta property="og:type" content="website">' . "\n";
	echo '<script type="application/ld+json">' . wp_json_encode( $ld ) . '</script>' . "\n";
}, 5 );
