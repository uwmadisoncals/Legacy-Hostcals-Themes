<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area blog-post">
		<?php get_template_part('local-heading', 'menu'); ?>
		
		<?php if (get_theme_mod('api_site_id')):?>
			<div id="content" class="site-content local-site-content" role="main">
		<?php else: ?>
			<div id="content" class="site-content" role="main">
		<?php endif; ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('breadcrumb', 'menu'); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
			
			<?php include('local-site/recent_stories.php'); ?>
		<?php endwhile; ?>

			</div>
	</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>