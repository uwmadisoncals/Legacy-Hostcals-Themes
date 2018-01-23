<?php
/**
 * Template Name: No Side Navigation
 * Description: A Page Template for pages without side navigation
 * @package WordPress
 * @subpackage UW Madison
 * @since UWLibrary 1.0
 */

get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">

		<div id="primary">
			<div id="content" class="nosidebar" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>