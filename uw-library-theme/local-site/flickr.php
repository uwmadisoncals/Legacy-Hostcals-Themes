<div class="flickr">
	<h2><span><?php echo get_bloginfo('name'); ?> Community</span> </h2>
	<?php if(get_sub_field('flickr')) { ?>
		<a class="more_options" href="https://www.flickr.com/photos/<?php the_sub_field('flickr') ?>">More Photos</a>
		<div class="flickrfeed cf" data-limit="5" data-flickrid="<?php the_sub_field('flickr') ?>" data-flickrtag="<?php the_sub_field('flickr_tag') ?>">
		<ul></ul>
		</div>
	<?php } ?>
</div>