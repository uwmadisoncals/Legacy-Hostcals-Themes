<?php
/**
 * Template Name: No Side Navigation
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>
		<?php if (get_theme_mod('api_site_id')):?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div id="content" class="site-content local-site-content nopadding" role="main">
			<?php }  
				else { ?>
					<div id="content" class="site-content local-site-content" role="main">
				<?php } ?>
		<?php else: ?>
			<div id="content" class="site-content" role="main">
		<?php endif; ?>

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . 'Pages:' . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div>

				</article>

			<?php endwhile; ?>

		</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>