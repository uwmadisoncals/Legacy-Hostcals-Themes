<?php
/**
 * Template Name: Home Page
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
			
			<div class="homeImage">
			<?php $args = array( 'post_type' => 'headerslides', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					$loopcount = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>





					    				<?php if ( has_post_thumbnail() ) {


						    				$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' );
$url = $thumb['0']; ?>

<img src="<?php echo $url; ?>">

						    				<?php } ?>
											<div class="homeImageCaption">
												<?php the_content(); ?>
											</div>
											
											<div class="homeImageGradient">
											</div>

					<?php endwhile; ?>
			</div>
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