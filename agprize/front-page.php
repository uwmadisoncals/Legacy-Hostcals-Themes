<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php do_action('slideshow_deploy', '223'); ?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

					</header><!-- .entry-header -->

					<div class="entry-content">
					
						<div class="fourcol first">
						<?php 
							$comp = get_page_by_title( 'About the Competition', $output = OBJECT, $post_type = 'page' );
							if (has_post_thumbnail( $comp->ID )) : ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $comp->ID ), 'full' ); ?>
							<a href="<?php echo get_permalink( $comp ); ?>" style="background-image:url(<?php echo $image[0]; ?>);"><!--span class="title">Information About the Competition</span--></a>
							<?php endif; 
						?>
						</div>
						<div class="fourcol">
						<?php 
							$comp = get_page_by_title( 'Get Engaged', $output = OBJECT, $post_type = 'page' );
							if (has_post_thumbnail( $comp->ID )) : ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $comp->ID ), 'full' ); ?>
							<a href="<?php echo get_permalink( $comp ); ?>" style="background-image:url(<?php echo $image[0]; ?>);"><!--span class="title">Information About the Competition</span--></a>
							<?php endif; 
						?>
						</div>
						<div class="fourcol">
						<?php 
							$comp = get_page_by_title( 'General Information', $output = OBJECT, $post_type = 'page' );
							if (has_post_thumbnail( $comp->ID )) : ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $comp->ID ), 'full' ); ?>
							<a href="<?php echo get_permalink( $comp ); ?>" style="background-image:url(<?php echo $image[0]; ?>);"><!--span class="title">Information About the Competition</span--></a>
							<?php endif; 
						?>
						</div>

					</div><!-- .entry-content -->

					<footer class="entry-meta">
					
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>