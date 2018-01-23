<?php
/*
Template Name: Current Graduate Students Page
*/


get_header(); ?>

<div id="main">

		<div id="primary">
		
			<div id="content" class="fullWidth facultyList" role="main">
			<header class="entry-header">
					<h1 class="entry-title">Graduate Students</h1>
				</header>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>
					
					<?php $args = array( 'post_type' => 'grad-students', 'posts_per_page' => 200, 'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					
					
						<div class="faculty">
							
							
								<div class="personPhoto">
    			
								<a href="<?php the_permalink(); ?>">
    				
				    				<?php 

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

} else { ?>
				 
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">
				
 <?php } ?>

				
								</a>
				    		</div>
				    		
				<div class="text">
    			
    			<div class="titleheading">
    			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    			<!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->
				
    			
    			
    			
    				<div class="contactInfo">
    			
	    				<div class="officeLocation">
	    					<?php the_field('program'); ?>
	    				</div>
	    				
	    				<div class="officePhone">
	    					<?php the_field('graduate_field'); ?>
	    				</div>
	    				
	    				<div class="officeEmail">
	    					<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
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