<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */

get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">


		<div id="primary">
		
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					
					<?php if( function_exists('get_field') && get_field('featured_image') ): 
			$attachment_id = get_field('featured_image'); $size = "large"; 
			$image = wp_get_attachment_image_src($attachment_id, $size); 
			
			
			$slide = '<div class="featuredImageContainer"><img src="' . $image[0] . '" class="pageFeatureImage" alt=" "></div>';
			echo $slide;
		endif; ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>
		</div><!-- #primary -->
<?php get_footer(); ?>
	</div>


</div>