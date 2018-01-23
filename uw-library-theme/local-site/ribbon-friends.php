<?php
	// This calls the API via PHP. It must be cleared daily to pick up changes in hours.
	$api_site_id = get_theme_mod('api_site_id');
	$json = json_decode(lib_api("locations/${api_site_id}.json"), true); 
	$info = $json['location'];
?>
<div class="detail-ribbon friends">
	<div class="ribbonCorner"><?php include_svg("sidebarCorner"); ?></div>
	<div class="ribbon-section">
		<h3>Contact</h3>
		<ul>
			<li>
				<?php include('ribbon-ask.php') ?>
			</li>
			<li><a href="/contact-friends/"><?php include_svg("local_sites/email"); ?> Email Us</a>
			</li>
		</ul>
	</div>
	<div class="ribbon-section">
		<h3>Resources</h3>
		<ul>
			<li><a href="publications/"> Publications</a></li>
			<li><a href="library-grants/">Library Grants</a></li>
		</ul>
	</div>		
</div>