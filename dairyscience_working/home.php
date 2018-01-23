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
					<div class="span-33">
						<div class="box dropin">
							
							<h2>Videos</h2>
							
							
<?php query_posts("category_name=videos&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

  <?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
		    				
		    				
		    				$url = get_the_content();
		    				
		    				//$url = linkifyYouTubeURLs($content);
		    				//echo $url;
							//$url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
  parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
  $videoimg = "http://img.youtube.com/vi/".$my_array_of_vars['v']."/0.jpg";
							 echo '<img src="';
							 echo $videoimg;
							 //echo catch_that_image();
							echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>			
    
    

    
 

<?php //restore_current_blog(); ?>	
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>							
							<a href="<?php get_site_url(); ?>/dairyscience/category/videos/" class="moreButton">More Videos</a>
						
						
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
						<div class="box dropin3">
							<h2>Blog</h2>
							
							
<?php query_posts("category_name=blog&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

   <?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 echo catch_that_news_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>			
    
    

    
 

<?php //restore_current_blog(); ?>	
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>							
							<a href="<?php get_site_url(); ?>/dairyscience/category/blog/" class="moreButton">More Blog Entries</a>
						
						
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
					
					<div class="span-33">
						<div class="box dropin3 doubleHeight">
							
							<h2>In the News</h2>
							
							
<?php query_posts("category_name=news&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

   <?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 echo catch_that_news_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>			
    
    

    
 

<?php //restore_current_blog(); ?>	
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>							
							<a href="<?php get_site_url(); ?>/dairyscience/category/news/" class="moreButton">More Dairy News</a>
						
						
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
					
					<div class="span-33">
						<div class="box dropin2 doubleHeight">
							 
                                               
                                                <h2>Events</h2>
                                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/eventsbg.jpg" alt=" ">
                                            <div class="boxContent">
                                           <?php if (class_exists('EM_Events')) {

											    echo EM_Events::output( array('limit'=>3,'orderby'=>'date') );
											
											} ?>

                                            
											
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>	
								<!-- .spotlight_slide -->  
                       <a href="<?php get_site_url(); ?>/dairyscience/calendar-2/" class="moreButton">More Events</a>

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