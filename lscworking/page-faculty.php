<?php
/*
Template Name: Faculty Page
*/


get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">

		<div id="primary">
		
			<div id="container4" class="wide">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php //get_template_part( 'content', 'page' ); ?>

					<?php //comments_template( '', true ); ?>
					
					<?php $args = array( 'post_type' => 'faculty', 'meta_key' => 'last_name', 'posts_per_page' => 40, 'orderby' => 'last_name', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					
						<div class="newsItem faculty">
							<div class="previousa">
							
								<div class="additionalContent">
    			
    				
    				
				    				<?php 
				    					
					    				if ( has_post_thumbnail() ) {
						    				
						    				//the_post_thumbnail();
						    				echo get_the_post_thumbnail($page->ID, 'large');
				 
						    				} else {
												
												?>
													<img src="<?php echo get_template_directory_uri(); ?>/images/avatarplaceholder.jpg" alt="no faculty image availble" />
												<?php											 //echo '<img src="';
											 //echo catch_that_image();
											// echo '" alt="" />';
				
										}
					    				
				    				?>
				
				    			
				    		</div>
				    		
				    		<div class="text">
    			<div class="glyph"></div>
    			<div class="titleheading">
    			<div class="fadetowhite"></div>
    			<h3><?php the_title(); ?></h3>
    			<div class="workingTitle"><?php the_field('professional_title'); ?></div>
    			
    			
    				<div class="contactInfo">
    			
	    				<div class="officeLocation">
	    					<?php the_field('office_location'); ?>
	    				</div>
	    				
	    				<div class="officePhone">
	    					<?php the_field('phone_number'); ?>
	    				</div>
	    				
	    				<div class="officeEmail">
	    					<?php the_field('office_email'); ?>
	    				</div>
    				</div>
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
								
								
							
						
					<?php endwhile; ?>

				<?php endwhile; // end of the loop. ?>
				
			
			<?php //get_sidebar(); ?>
			<div class="clear"></div>
		</div><!-- #primary -->
</div>
	</div>
<?php get_footer(); ?>
<script>
	setInterval(function() {
	$("#container3").isotope({
        masonry: {
        columnWidth: 237
        
          //columnWidth: 1
        },
        sortBy: 'alphabetical',
        getSortData: {
          number: function( $elem ) {
            var number = $elem.hasClass('newsItem') ? 
              $elem.find('.number').text() :
              $elem.attr('data-number');
            return parseInt( number, 10 );
          },
          alphabetical: function( $elem ) {
            var name = $elem.find('h3'),
            itemText = name.length ? name : $elem;
            return itemText.text();
          },
          chronological: function( $elem ) {
            var number = $elem.find('.hiddendate').text();
            return parseInt( number );
          },
          grouped: function( $elem ) {
            var groupname = $elem.find('.hiddengroup').text();
            return groupname;
          }
        }
      });
      
      },1000);
</script>
</div>