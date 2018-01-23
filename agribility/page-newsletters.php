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

					<h1><?php the_title(); ?></h1>

				<?php endwhile; // end of the loop. ?>
				
				
				<?php $args = array( 'post_type' => 'newsletter_archive', 'posts_per_page' => 10, 'order' => 'DESC' );
					$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php get_template_part( 'content', 'page_newsletters' ); ?>

					
				<?php endwhile; // end of the loop. ?>
				
				<?php while ( have_posts() ) : the_post(); ?>

					<?php the_content(); ?>

				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
			<?php //get_sidebar(); ?>
			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>