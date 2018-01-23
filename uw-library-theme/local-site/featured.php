<div class="featured">
	<h2>Featured Items</h2>						
	<?php if( have_rows('item') ): ?>
			<ul>
		   <?php while ( have_rows('item') ) : the_row(); 
									 
			
					$image = get_sub_field('image');
					$size = 'medium'; // (thumbnail, medium, large, full or custom size)
					
					if( $image ) {
					 
						$sizedimage = wp_get_attachment_image_src( $image, $size );
					 
					}
									 
			?>
					
						<li><a href="<?php the_sub_field('catalog_url'); ?>"><img alt=" " src="<?php echo $sizedimage[0]; ?>"><span class="screen-reader-text"><?php the_sub_field('name'); ?></span></a></li>			
				<?php 

					endwhile; ?>
			</ul>
			
		<?php endif; ?>

</div>