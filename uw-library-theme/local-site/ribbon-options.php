<?php //only print for Steenbock ?>
<?php if (get_theme_mod('api_site_id') == '29'): ?>
	<div class="ribbon-section">
		<h3>Resources</h3>
		<ul>
			<li><a href="http://ecs.library.wisc.edu/location.php?id=7"><?php include_svg("local_sites/laptop"); ?> Laptop Checkout</a></li>
			<li><a href="/libraries/library-study-rooms/study-rooms-steenbock/"><?php include_svg("local_sites/lamp"); ?> Room Reservations</a></li>
			<li><a href="/steenbock/spaces/floor-plans/"><?php include_svg("local_sites/building"); ?> Floor Plans</a></li>
		</ul>
	</div>		
<?php endif; ?>

<?php //only print for Chemistry ?>
<?php if (get_theme_mod('api_site_id') == '5'): ?>
	<div class="ribbon-section">
		<h3>Chemistry</h3>
		<ul>
			<li><a href="http://www.chem.wisc.edu/"><?php include_svg("local_sites/home"); ?> Department</a></li>
			<li class="users-icon"><a href="http://www.chem.wisc.edu/areas/clc/"><?php include_svg("local_sites/users"); ?> Learning Center</a></li>
		</ul>
	</div>		
<?php endif; ?>


<?php //only print for College ?>
<?php if (get_theme_mod('api_site_id') == '6'): ?>
	<div class="ribbon-section">
		<h3>Resources</h3>
		<ul>
			<li><a href="http://ecs.library.wisc.edu/location.php?id=1"><?php include_svg("local_sites/laptop"); ?> Laptop Checkout</a></li>
			<li><a href="/libraries/library-study-rooms/study-room-college/"><?php include_svg("local_sites/lamp"); ?> Room Reservations</a></li>
			<li><a href="/college/spaces/floor-plans/"><?php include_svg("local_sites/building"); ?> Floor Plans</a></li>
		</ul>
	</div>		
	<div class="ribbon-section">
		<h3>College Library</h3>
		<ul>
			<li><a href="http://designlab.wisc.edu/"><?php include_svg("local_sites/chart"); ?> DesignLab</a></li>
			<li><a href="/college/services-at-college/computer-lab/"><?php include_svg("local_sites/computer"); ?> Computer Lab</a></li>
			<li><a href="/college/spaces/media-studios/"><?php include_svg("local_sites/video"); ?> Media Studio</a></li>
			<li class="users-icon"><a href="http://www.wiscel.wisc.edu/"><?php include_svg("local_sites/users"); ?> WisCEL</a></li>
		</ul>
	</div>		
<?php endif; ?>
		