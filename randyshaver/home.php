<?php
/**
 * Template Name: Home Page
 *
 * Description: Twenty Twelve loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 * Tip: to remove the sidebar from all posts and pages simply remove
 * any active widgets from the Main Sidebar area, and the sidebar will
 * disappear everywhere.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

//wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/search.js', array( 'jquery' ), '2013-07-10' );

get_header(); ?>



	<div id="main">

		<div id="primary">
			<div id="content" class="fullWidth" role="main">


				<!-- CALS News Content Box -->
				<div class="row clearfix">
					

					<div class="span-66">
						<div class="box dropin3 doubleHeight news">

							<h2>In the News</h2>


								<?php query_posts("posts_per_page=3"); ?>
								<?php if (have_posts()) : ?>
								<div class="boxContent">
								  <?php while (have_posts()) : the_post();  ?>
								  <div class="boxContentRow">
								
											
																			<h3 class="spotlight_title"><a href="<?php the_permalink() ?>"  rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
																			<p><?php the_time('l, F jS, Y') ?></p>
																			
																			<div class="excerpt"><?php the_excerpt(); ?></div>
								</div>
								<?php endwhile; ?>
								
								<?php endif; ?>
								</div>
								<?php wp_reset_query(); ?>


                                            
                            <div class="topShade"></div>
							<div class="bottomShade"></div>


	<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" style="left:13px;" class="moreButton">More Dairy News</a>




</div>
							

						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						
						
					
					
					
				
					
				</div>
					
					<div class="span-33">
						<div class="box dropin2 doubleHeight events">
							 
                                               
                                                <h2>Dr. Shaver's Speaking Schedule</h2>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eventsbg.jpg" alt=" ">
                                            <div class="boxContent">
                                           <?php if (class_exists('EM_Events')) {

											    echo EM_Events::output( array('limit'=>3,'orderby'=>'event_start_date') );
											
											} ?>

                                            
											
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>	
								<!-- .spotlight_slide -->  
                       <a href="<?php get_site_url(); ?>/paulfricke/events/calendar/" class="moreButton">More Speaking Events</a>

						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div> 

						<div class="shade"></div>	
					</div>
										
					
					</div>

					
				</div>




			</div><!-- #content -->

			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>
