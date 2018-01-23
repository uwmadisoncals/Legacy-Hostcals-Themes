<?php
/*
Template Name: News Page
*/


get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">

		<div id="primary">
		
			<div id="content" role="main">

				<?php
// retrieve one post with an ID of 5
query_posts( 'cat=-13' );

// set $more to 0 in order to only get the first part of the post
global $more;
$more = 0;

// the Loop
while (have_posts()) : the_post(); ?>
<div class="storyEntry">
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	
	<?php the_content( 'Read the full post »' ); ?>
	
</div>
<?php endwhile;
?>
				
			</div><!-- #content -->
			<div id="content_widget_sidebar" class="widget-area" role="complementary">
			
		
			<?php // if ( !is_home() ) { get_template_part('nav_menu', 'sidebar'); } ?>
		
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<aside id="archives" class="widget">
					<h3 class="widget-title"><?php _e( 'Archives', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget">
					<h3 class="widget-title"><?php _e( 'Meta', 'twentyeleven' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</aside>
			</div>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>