<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/* Weaver II - admin shortcodes
 *
 */

function weaverii_admin_pro() {

	$opts = array(
	array('name' => 'Administrative Opts', 'id' => 'maintab3', 'type' => 'header0',
		'info' => 'Weaver II Pro Administrative Options',
		'help' => 'help.html#ProAdminOpts'),
	array('name' => 'Use Inline CSS', 'id' => '_wii_inline_style', 'type' => '+checkbox',
		'info' => 'Generate in-line CSS code rather than using style-weaverii.css file. &diams;'),
	array('name' => 'Development Mode', 'id' => '_wii_development_mode', 'type'=>'+checkbox',
		'info' => 'Run in development mode. Uses in-line CSS and displays the diagnostic information enabled below when developing
		  a new custom theme. TURN OFF FOR PRODUCTION SITES! &diams;'),
	array('name' => '<small>Trace Page Templates</small>', 'id' => '_wii_diag_trace_templates', 'type' => '+checkbox',
		'info' => 'Displays a label for each page template called (e.g., index, category, page, etc.). &diams;'),
	array('name' => '<small>Trace Sidebars</small>', 'id' => '_wii_diag_trace_sidebars', 'type' => '+checkbox',
		'info' => 'Displays a label for sidebar displayed. &diams;'),
	array('name' => '<small>Show Area Borders</small>', 'id' => '_wii_diag_borders', 'type' => '+checkbox',
		'info' => 'Show a 1px red border around most major &lt;div&gt;s. Overrides other borders. &diams;'),
	array('name' => '<small>Show Page Generation Time</small>', 'id' => '_weaverii_diag_timer', 'type' => '+checkbox',
		'info' => 'Show page generation time at bottom of page. &diams;'),
	array('name' => '#070<small>Show Mobile Device Info</small>', 'id' => '_wii_diag_trace_mobile', 'type' => '+checkbox',
		'info' => 'Shows info about display device at top of page. &diams;'),


	array('name' => 'Shortcodes & Features', 'id' => 'maintab2', 'type' => 'header0',
			'info' => 'Selectively Enable/Disable Weaver II Pro Shortcodes and Features',
			'help' => 'help.html#ProShortcodes'),

	array('name' => 'Note:', 'id' => 'wii_pshc', 'type' => 'note',
			'info' => 'These enable/disabe Weaver Pro Shortcodes. See the Dashboard Appearance->Shortcodes + Pro panel.'),

	array('name' => 'Disable Header Gadgets', 'id' => '_wii_hide_headergadgets', 'type' => '+checkbox',
		  'info' => 'Header Gadgets - Place links, images, and text over the header; directly or with [weaver_gadget] &diams;'),
	array('name' => 'Disable Link Buttons', 'id' => '_wii_hide_linkbuttons', 'type' => '+checkbox',
		  'info' => 'Link Buttons - [weaver_buttons] + Widget to display link image buttons you define &diams;'),
	array('name' => 'Disable Social Buttons', 'id' => '_wii_hide_socialbuttons', 'type' => '+checkbox',
		  'info' => 'Social Buttons - [weaver_social] + Widget to display icon links to most current social sites &diams;'),
	array('name' => 'Disable Slider', 'id' => '_wii_hide_slider', 'type' => '+checkbox',
		  'info' => 'Slider - [weaver_slider] - place sliding image menus in header, sidebar, or content area &diams;'),
	array('name' => 'Disable Extra Menus', 'id' => '_wii_hide_extramenus', 'type' => '+checkbox',
		  'info' => 'Extra Menu [weaver_extra_menu] + Vertical Menu Widget - add new menus almost anywhere &diams;'),
	array('name' => 'Disable Widget Area', 'id' => '_wii_hide_widgetarea', 'type' => '+checkbox',
		  'info' => 'Widget Area - [weaver_widget_area] - add new widget area almost anywhere, including in pages and posts &diams;'),
	array('name' => 'Disable Search Form', 'id' => '_wii_hide_searchbox', 'type' => '+checkbox',
		  'info' => 'Search Form - [weaver_search] - add a search form wherever you want &diams;'),
	array('name' => 'Disable Show Feed', 'id' => '_wii_hide_showfeed', 'type' => '+checkbox',
		  'info' => 'Show Feed - [weaver_show_feed] - show an external RSS feed styled to match your own posts &diams;'),
	array('name' => 'Disable Popup Link', 'id' => '_wii_hide_popuplink', 'type' => '+checkbox',
		  'info' => 'Popup Link - [weaver_popup_link] - Define a link to a popup window &diams;'),
	array('name' => 'Disable Show/Hide Text', 'id' => '_wii_hide_showhide', 'type' => '+checkbox',
		  'info' => 'Show/Hide - [weaver_showhide] - adds button to show/hide text such as lyrics or spoilers &diams;'),
	array('name' => 'Disable Comment Policy', 'id' => '_wii_hide_commentpolicy', 'type' => '+checkbox',
		  'info' => 'Comment Policy - add comment policy or terms right before the submit comment button &diams;'),
	array('name' => 'Disable Shortcoder', 'id' => '_wii_hide_shortcoder', 'type' => '+checkbox',
		  'info' => 'Shortcoder - [weaver_sc] - define your own short code: add standard text or other content using a shortcode &diams;'),
	array('name' => 'Enable PHP', 'id' => '_wii_show_php', 'type' => '+checkbox',
		  'info' => 'PHP - [weaver_php] - add PHP whereever you need it &diams;'),
	array('name' => 'Enable Total CSS Options', 'id' => '_wii_show_totalcss', 'type' => '+checkbox',
		  'info' => 'Total CSS - define custom CSS for virtually every important element of your theme &diams;'),

	);
?>
<h3>Weaver II Pro Features <?php weaverii_help_link('help.html#WeaverIIPro','Help for Admin Options'); ?></h3>
<?php

	if (!weaverii_init_base()) {
?>
<p>Weaver II Pro adds features to Weaver II, but is now being retired. Rather than designing new sites using
<em>Weaver II</em>, [lease switch to our new theme: <strong>Weaver Xtreme.</strong></p>
<h3>Visit <?php weaverii_site('','http://weavertheme.com','Weaver Theme'); ?>WeaverTheme.com</a>
now to learn all about <em>Weaver Xtreme</em>.</strong>
</h3>
	<p>After over 5 years as one of the best WordPress themes available, <em>Weaver II</em> is being phased out.
	We will continue to provide critical updates for the foreseeable future, but we <strong>highly</strong> recommend
	switching to our latest, improved theme - <em>Weaver Xtreme</em>.
	</p>
<?php
		weaverii_form_show_options($opts);
		return;
	}

	// to here, have pro features
?>
<h3>Weaver II Pro Features - You are using Weaver II Pro. Thank you.</h3>
<p>After over 5 years as one of the best WordPress themes available, <em>Weaver II Pro</em> is being phased out.
	We will continue to provide critical updates for the foreseeable future, but we <strong>highly</strong> recommend
	switching to our latest, improved theme - <em>Weaver Xtreme</em>, and its premium version, <em>Weaver Xtreme Plus</em>.
</p>
<?php

	weaverii_sapi_submit();

	weaverii_hide_advanced('begin');
	weaverii_form_show_options($opts);
?>

 <p><strong><a href="<?php echo site_url('/wp-admin/themes.php?page=WeaverII_Shortcodes'); ?>"><em>More Weaver II Pro Options and Shortcodes</em></a></strong></p>

<p style="max-width:700px;"><small>Note: The above options allow you to selectively enable and disable the listed Weaver II Pro shortcodes and
features. Disabling a feature will optomize the speed of your site. Any difference will be very small, but might
give a slight improvment for heavily loaded sites.</small>
	<br /><br />
	<?php echo 'Memory: ' . round(memory_get_usage()/1024/1024,2) . ' of ' .  (int)ini_get('memory_limit') . 'M ' ; ?>
</p>
<?php
	weaverii_sapi_submit();
	(int)ini_get('memory_limit');

	weaverii_hide_advanced('end');
}

?>
