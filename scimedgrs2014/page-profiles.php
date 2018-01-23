<?php
/**
 * Template Name: Profiles
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="prof_s_wrapper" ><input id="prof_s" class="field" type="text" placeholder="Filter Profiles" name="s_profiles"></div>
				
				<div class="filtered2">

				<?php $args = array( 'post_type' => 'student_profiles', 'meta_key' => 'last_name', 'posts_per_page' => 200, 'orderby' => 'last_name', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li class="item clearfix">
						<?php get_template_part( 'content', 'profiles' ); ?>
					</li>
					

				<?php endwhile; // end of the loop. ?>
				</div>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>

<style>
	.hidden {
		display: none;
	}	
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
			$(function(){			
		
		
		
		
		//Regular Expression Search Filter Auto Complete
		$("#prof_s").keyup(function () {
			var filter = $(this).val(), count = 0;
			var resultscounted = 0;
			//console.log(filter);
			
		        //console.log("s");    
			$(".filtered2 li.item").each(function () {
				//console.log($(this).text().search(new RegExp(filter, "i")));
		        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
			        
			        $(this).addClass("hidden"); 
			        $(this).removeClass("visible"); 
			       
			        
		        } else {
				
					
					
			
				
		            $(this).removeClass("hidden");
		            $(this).addClass("visible");
		            
		          
		            
		            count++;
		           
		            
		        }
		    });
		   
		
		
		   });
		   
		   });
				</script>

<?php get_footer(); ?>

