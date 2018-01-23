<?php
/*
Template Name: Seniors Page
*/


get_header(); ?>

<div id="main">

		<div id="primary">
		
			<div id="content" class="fullWidth facultyList" role="main">
			

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>
					
					<?php $args = array( 'post_type' => 'seniors', 'posts_per_page' => 20, 'orderby' => 'title', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
						<div class="faculty">
							
							
								<div class="personPhoto">
    			
								<a href="<?php the_permalink(); ?>">
    				
				    				<?php 
				    					
					    				if ( has_post_thumbnail() ) {
						    				
						    				//the_post_thumbnail();
						    				echo get_the_post_thumbnail($page->ID, 'medium');
				 
						    				} else { ?>
				 
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">
				
										<?php }
					    				
				    				?>
				
								</a>
				    		</div>
				    		
				<div class="text">
    			
    			<div class="titleheading">
    			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    			<!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->
				
    			
    			
    			
    				<div class="contactInfo">
    			
	    				<div class="officeLocation">
	    					<?php the_field('office_location'); ?>
	    				</div>
	    				
	    				<div class="officePhone">
	    					<?php the_field('telephone'); ?>
	    				</div>
	    				
	    				<div class="officeEmail">
	    					<?php the_field('email'); ?>
	    				</div>
    				</div>
	    		
    			</div>
    			
    			
    			
    			
    			    			
					
					
    		</div>
    		
    		
								
								
								
								
								
							
						</div>
					<?php endwhile; ?>

				<?php endwhile; // end of the loop. ?>
				
			
			</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>