<?php
/*
Template Name: Former Graduate Students Page
*/


get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">

		<div id="primary">
		
			

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>
					
					<?php $args = array( 'post_type' => 'graduatestudents', 'posts_per_page' => 40, 'orderby' => 'title', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
					
					<?php if( !get_field('current_student') ) { ?>
						<div class="newsItem seniors">
							<div class="previousa">
							
								<div class="additionalContent">
    			
    				
    				
				    				<?php 
				    					
					    				if ( has_post_thumbnail() ) {
						    				
						    				//the_post_thumbnail();
						    				echo get_the_post_thumbnail($page->ID, 'large');
				 
						    				} else {
				 
											 //echo '<img src="';
											 echo catch_that_image();
											// echo '" alt="" />';
				
										}
					    				
				    				?>
				
				    			
				    		</div>
				    		
				    		<div class="text">
    			<div class="glyph"></div>
    			<div class="titleheading">
    			<h3><?php the_title(); ?></h3>
    			<!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->
				
    			
    			
    			
    				
	    		</div>
			<?php //the_content_rss('', FALSE, '', 180); ?>
    			
    			
    			
    			<div class="dateheading">
    			<?php //the_date(); ?>
    			</div>
    			<div class="hiddendate"><?php echo "-"; the_time('Ymd') ?></div>
    			<div class="hiddengroup"><?php $category = get_the_category(); 
echo $category[0]->slug; ?></div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		<a href="<?php the_permalink(); ?>" class="highlight">
	    		<div class="loadingSpinner" style="display: none;">
	    			<div class="progress" style="width:100%;"></div>
	    		</div>
    		</a>
								
								
								
								
								
							</div>
						</div>
						<?php } ?>
					<?php endwhile; ?>

				<?php endwhile; // end of the loop. ?>
				
			
			<?php //get_sidebar(); ?>
			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>