<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="page-title">
				<div class="page-title-content">
					<h3 class="page-title"><?php the_title(); ?></h3>
					 <div class="post-meta-single">
						<!--Written by <span class="orange weight-normal"><?php the_author_link(); ?></span> on <?php the_time('l, F jS, Y') ?>-->
							
							<img src="<?php echo get_template_directory_uri(); ?>/images/Slogan.gif" width="560" alt="Building the roots of basic science" />
						<!--<div class="box">-->
							<!--<?php if (('open' == $post-> comment_status)) : ?>
								Comments <a href="#respond">are open</a> on this page, you can <a href="#respond">leave a response</a>.
							<?php else: ?>
								Comments are <strong>closed.</strong>
							<?php endif; ?>
							<?php if(('open' == $post->ping_status)) : ?>
								You may <?php if(('open' == $post-> comment_status)): ?>also<?php endif; ?> leave a <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> from your site.
							<?php endif; ?>
							<?php wp_link_pages(array('before' => '<strong>Pages:</strong> ', 'after' => '', 'next_or_number' => 'number')); ?>
							<?php edit_post_link('Edit this entry.', '', ''); ?>-->
							<!-- Add Featured Image -->
							<?php
				// Check to see if the header image has been removed
				/*$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}*/
					?>
					
						<!--</div>-->
					</div>
				</div>
			</div>
		</div>
		<div class="left-content">
			<div class="post">
				<div class="post-date"><span class="month block"><?php the_time('M'); ?> </span><span class="day"><?php the_time('d'); ?> </span></div>
				<?php the_content(''); ?>
			</div>
			<?php comments_template(); ?>
		</div>
	<?php endwhile; endif; ?>
	</div>
	<div id="right-col">
		<?php get_sidebar(); ?>
	</div>
</div></div>
<?php get_footer(); ?>

