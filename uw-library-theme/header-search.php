<?php
/**
 * Contains the right side navigation links in the header
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
$search_value = "";
if(isset($_GET["q"])) {
	$search_value = $_GET["q"];
}
?>
<div class="search_top">
	<div id="ask">
		<a id="heading-uw-link" href="http://www.wisc.edu/">UW-Madison</a>
		<a class="uw_options" id="ask_options" href="#">
			<img alt=" " src="/wp-content/themes/library-wp-theme/images/ask_logo_short_white_text.svg">
			<span class="screen-reader-text">Ask a Librarian</span>
		</a>
		<div class="uw_links">
			<ul class="search_link">
				<li><a href="#" class="ask-chat-link" data-account="askuwlibrary" data-skin="134"><?php include_svg("chat"); ?> Chat</a></li>
				<li><a href="/help/ask/email/"><?php include_svg("local_sites/email"); ?>Email</a></li>
				<li><a href="/help/ask/call/"><?php include_svg("local_sites/phone"); ?>Call</a></li>
				<li><a href="/help/ask/"><?php include_svg("more"); ?>More</a></li>
			</ul>
		</div>
	</div>
	<div class="giving"><a href="/about/giving/" id="giving"><?php include_svg("gift"); ?><span class="screen-reader-text">Support the Libraries</span></a></div>
	<div class="search_box">
		<form role="search" method="get" class="search-form" action="/search/">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" id="sitesearch" class="search-field" placeholder="Search &hellip;" value="<?php print $search_value;  ?>" name="q">
			</label>
			<input type="submit" class="search-submit" value="Search">
		</form>
	</div>
</div>