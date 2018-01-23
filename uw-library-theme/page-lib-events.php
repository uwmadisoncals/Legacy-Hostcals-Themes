<?php
/**
 * Template Name: Events
 */

// only cache results for 2 hours
header('Cache-Control: s-maxage=7200');

get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>
		<?php if (get_theme_mod('api_site_id')):?>
			<div id="content" class="site-content local-site-content" role="main">
		<?php else: ?>
			<div id="content" class="site-content" role="main">
		<?php endif; ?> 
			<?php while ( have_posts() ) : the_post();
				get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>

					<div class="entry-content">
						<div class="library_events">
							<?php 
								$tag = get_field("event_tag");
								$event_group = get_field("event_group");
								
								if (get_field("event_group") == "Yes"){
									uwmadison_events('http://today.wisc.edu/events/tag/'. $tag, array('limit' => 10, 'per_page' => null, 'page' => null, 'grouped' => TRUE)) ;
								} else{
									uwmadison_events('http://today.wisc.edu/events/tag/'. $tag, array('limit' => 10, 'per_page' => null, 'page' => null, 'grouped' => FALSE)) ;
								}
								
								$see_more = "http://today.wisc.edu/events/search?utf8=%E2%9C%93&term=" . $tag . "&commit=Go";
							?>
						</div>
						<p class="see_more_events">See <a href="<?php echo $see_more ?>">more events</a></p>
					</div> 

				</article>

							<?php endwhile; ?>

		</div>
		<?php if (get_theme_mod('api_site_id')):?>
			<div class="right-Nav local-side-nav">
		<?php else: ?>
			<div class="right-Nav">
		<?php endif; ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('nav_menu', 'sidebar');?>
			<?php endwhile; // end of the loop. ?>
		
			<?php if( get_field('highlights_text') ): ?>
				<div class="highlights">
				<?php if( get_field('highlights_heading') ): ?>
					<h3><?php the_field('highlights_heading'); ?></h3>
				<?php endif; ?>
					<?php the_field('highlights_text'); ?>
				</div>
			<?php endif; ?>
		</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>