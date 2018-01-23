<?php
/**
 * The template for displaying image attachments
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment' ); ?>>

				<div class="entry-content">
					<nav id="image-navigation" class="navigation image-navigation" role="navigation">
						<span class="nav-previous"><?php previous_image_link( false, '<span class="meta-nav">&larr;</span> Previous'); ?></span>
						<span class="nav-next"><?php next_image_link( false, 'Next <span class="meta-nav">&rarr;</span>'); ?></span>
					</nav>

					<div class="row">
						<div class="entry-attachment span-50">
							<div class="attachment">
								<?php twentythirteen_the_attached_image(); ?>
	
								<?php if ( has_excerpt() ) : ?>
								<div class="entry-caption">
									<?php the_excerpt(); ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
	
						<?php if ( ! empty( $post->post_content ) ) : ?>
						<div class="entry-description span-50">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . 'Pages:', 'after' => '</div>' ) ); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</article>

		</div>
	</div>

<?php get_footer(); ?>