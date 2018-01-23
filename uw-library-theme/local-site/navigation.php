<div class="welcome">
	<h2>Welcome to <?php echo get_bloginfo('name'); ?></h2>
	<div id="local-nav">
		<?php 
			wp_nav_menu( array( 'theme_location' => 'local-menu', 'link_before' =>  '<span class="nav_arrow"><svg height="512px" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polygon points="160,115.4 180.7,96 352,256 180.7,416 160,396.7 310.5,256 "/></svg></span>' ) ); 
		?>
	</div>

	<div class="welcome-links">							
	<?php while ( have_rows('welcome_links') ) : the_row(); ?>
		<?php	if( get_row_layout() == 'link_column' ): ?>
			<div class="column_of_links" <?php if(get_sub_field('column_title')):?> id="has_column_title" <?php endif; ?>> 
				<?php if(get_sub_field('column_title')):?>   	
		        		<h4><?php the_sub_field('column_title'); ?></h4>
				<?php endif; ?>
		
			<?php if( have_rows('column_links') ): ?>
				<ul>
				
				
				
			   <?php while ( have_rows('column_links') ) : the_row();
			   		
			   		if(get_sub_field('link_type') == "internal") {
			   			$url = get_sub_field('page_link');
			   		} else {
				   		$url = get_sub_field('link_address');
			   		}
			   		
						
						
						if($url):
				   ?>
							<li><a href="<?php echo $url; ?>"><?php the_sub_field('link_title'); ?></a></li>
					<?php 
						endif;
					
					
					
					 
				endwhile;
				?>
				</ul>
				
	<?php endif; ?>
		</div>
		<?php endif; ?>
		  <?php endwhile; ?>
		
	</div>
</div>