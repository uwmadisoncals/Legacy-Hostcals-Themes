<div class="welcome_text row">
		<h2>Welcome to <?php echo get_bloginfo('name'); ?></h2>
		<div class="span-66"><?php the_field('welcome_text'); ?></div>
		<?php 
			if (get_theme_mod('api_site_id') == '59'){ //friends of the library ?>
				<a href="/become-a-member/" class="span-33 blue button" id="friends-join-btn">Join Today!</a>
		<?php } ?>
</div>
