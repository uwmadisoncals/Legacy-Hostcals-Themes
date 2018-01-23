<div id="recent_stories">
	<h3>Recent Stories</h3>
	<a class="more_options" href="<?php echo site_url(); ?>/blog-home">See More</a>
	<div class="row toppadding">
	<?php query_posts('showposts=4'); ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="span-25">
		
			<div class="row">
				<div class="span-50 spotlightImage">
					<?php if ( has_post_thumbnail() ) { ?>
						  <?php the_post_thumbnail('thumbnail'); ?>
					<?php } 
						else{ ?>
							<img alt=" " src="/assets/img/default_blog_img.png">
						<?php }
						
					?>
				</div>
				
				<div class="span-50">
					<h4 class="home link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				</div>
			</div>
		</div>
        <?php endwhile; ?>
		<?php wp_reset_query(); ?>
		
	</div>
	
</div>