<?php
	// This calls the API via PHP. It must be cleared daily to pick up changes in hours.
	$api_site_id = get_theme_mod('api_site_id');
	$json = json_decode(lib_api("locations/${api_site_id}.json"), true); 
	$info = $json['location'];

?>
<div class="detail-ribbon">
	<div class="ribbonCorner"><?php include_svg("sidebarCorner"); ?></div>
	<a href="/libraries/campus-libraries/#<?php echo $api_site_id; ?>" class="map">
		<span class="screen-reader-text">Click to view the location of the <?php echo get_bloginfo('name'); ?></span>
		<img src="/assets/img/maps/<?php echo $api_site_id; ?>.png" alt=" ">
		<div class="mapInfo">
			<div class="text">
			<strong><?php echo get_bloginfo('name'); ?></strong>
			<?php print $info["address"]; ?>
			</div>
		</div>
	</a>
	<div class="ribbon-section">
		<h3>Hours</h3>
		<ul>
			<li><a href="<?php print $info["hours_url"]; ?>">
				<?php include_svg("local_sites/clock"); ?>
				<?php print $info["hours_today"]; ?></a>
			</li>
		</ul>
	</div>
	<div class="ribbon-section">
		<h3>Contact</h3>
		<ul>
			<li>
				<?php include('ribbon-ask.php') ?>
			</li>
			<li><a href="/help/ask/email/?incominglib=<?php echo get_bloginfo('name'); ?>"><?php include_svg("local_sites/email"); ?> Email Us</a>
			</li>
			<li><a href="/about/directory/staff-by-location/#<?php echo $api_site_id ?>" class="user"><?php include_svg("local_sites/user"); ?> Library Staff</a>
			</li>
			<?php // print only for steenbock
			if (get_theme_mod('api_site_id') == '29'): ?>
				<li><a href="/help/ask/appointment/?incominglib=<?php echo get_bloginfo('name'); ?>"><?php include_svg("local_sites/calendar"); ?> Make an Appointment</a>
				</li>
			<?php endif; ?>
			<li><span class="screen-reader-text">Call us at</span><div class="noLink"><?php include_svg("local_sites/phone"); ?>
				<?php print $info["pretty_phone"]; ?></div>
			</li>
		</ul>
	</div>
	<?php include('ribbon-options.php') ?>
</div>