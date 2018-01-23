<div class="flickr_and_poll">
	<h2><?php echo get_bloginfo('name'); ?> Community </h2>
	<div class="row">
		<div class="span-50">
			<?php echo do_shortcode('[gravityform action="polls" id="'. get_sub_field('poll_id') . '" ajax="true"]'); ?> 
		</div>
		<div class="span-50">
			<h3>Our Community </h3>
			<?php if(get_sub_field('flickr')) { ?>
				<a class="more_options" href="http://www.flickr.com/photos/<?php the_sub_field('flickr') ?>">More Photos</a>
				<div class="flickrfeed cf" data-limit="4" data-flickrid="<?php the_sub_field('flickr') ?>">
				<ul></ul>
				</div>
			<?php } ?>
		</div>
	</div>
</div>