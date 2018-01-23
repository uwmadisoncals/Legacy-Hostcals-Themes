<?php if(get_sub_field('events_tag')) { ?>
<div class="local_events row">
	<h2>Workshops &amp; Events</h2>
	<?php $see_more = "http://today.wisc.edu/events/search?utf8=%E2%9C%93&term=" . get_sub_field("events_tag") . "&commit=Go"; ?>
	<p class="more_options"><a href="<?php echo $see_more ?>">More Events</a></p>
	<div>
		<?php if(get_sub_field('event_title')) { ?>
			<h3> <?php echo get_sub_field('event_title')?></h3>
		<?php } ?>
		<?php 
			$tag = get_sub_field("events_tag"); 
			uwmadison_events('http://today.wisc.edu/events/tag/'. $tag, array('limit' => 3, 'per_page' => null, 'page' => null, 'grouped' => FALSE)) ;
		?>
	</div>
</div>
<?php } ?>
