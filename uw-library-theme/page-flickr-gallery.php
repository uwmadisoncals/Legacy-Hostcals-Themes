<?php
/**
 * Template Name: Flickr Gallery
 */

$content_class = $right_nav_class = "";
if(get_theme_mod('api_site_id')) {
	$content_class = " local-site-content";
	$right_nav_class = " local-side-nav";
}
 
get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>
			<div id="content" class="site-content<?php echo $content_class; ?>" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php if(get_field('flickr_id')) { ?>
							<div class="flickr_gallery">
								<div class="flickrfeed cf" data-limit="20" data-flickrid="<?php the_field('flickr_id') ?>" data-flickrtag="<?php the_field('flickr_tag') ?>">
								<ul></ul>
								</div>
							</div>
						<?php } ?>	
					</div>

				</article>

		<?php endwhile; ?>

		</div>
		<div class="right-Nav <?php echo $content_class; ?>">
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