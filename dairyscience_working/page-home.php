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
				
					<div class="span-50 box dropin">
							
							<h2>News</h2>
							
							<?php switch_to_blog(20); ?>
<?php query_posts("posts_per_page=1&category_name=featured-articles"); ?>
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
    
    

    
 

  <?php endwhile; ?>
<?php endif; ?>
<?php restore_current_blog(); ?>							
							<a href="http://news.cals.wisc.edu" class="moreButton">More News</a>
						
						
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
					
					<div class="span-50 box dropin2">
							 <?php 
								//hold original loop
								$tmp_post = $post;
								
								//get spotlight posts
								$posts = get_posts('category_name=spotlight&numberposts=1');
								foreach($posts as $post){
									setup_postdata($post);?>
									
								<?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
 
							 //echo '<img src="';
							 echo catch_that_image();
							// echo '" alt="" />';

						} ?>
                                               
                                                <h2>Spotlight</h2>
                                             <div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink();?>"><?php  the_title();?></a></h3>
											<p><?php echo $post->post_excerpt;?></p>
                                             </div>
                                             <div class="topShade"></div>
							<div class="bottomShade"></div>
								<!-- .spotlight_slide -->  
                        <?php	 
							
								} 
								//restore original loop
								$post = $tmp_post;
							?>
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
				
				<div class="row clearfix">
				
					<div class="span-33 box dropin3">
							<h2>Announcements</h2>
							
							<?php switch_to_blog(19); ?>
<?php query_posts("cat=17&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

  <?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
							
							 //echo '<img src="';
							 echo catch_that_announcements_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>			
    
    

    
 

  <?php endwhile; ?>
<?php endif; ?>
<?php restore_current_blog(); ?>							
							<a href="http://ecals.cals.wisc.edu" class="moreButton">More Announcements</a>
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
					
					<div class="span-33 box eventsBox dropin4">
							<h2>Events</h2>
							<img src="<?php echo get_template_directory_uri(); ?>/images/aghall1.jpg" alt=" ">
							<div class="boxContent">
										<?php // Get RSS Feed(s)
  include_once(ABSPATH . WPINC . '/rss.php');
  $rss = fetch_rss('http://www.today.wisc.edu/events/feed/30.rss2');
  $maxitems = 2;
  $items = array_slice($rss->items, 0, $maxitems);
?>


  <?php if (empty($items)): ?>
   <h3 class="spotlight_title">No Upcoming Events</h3>
  <?php else:
      foreach ( $items as $item ):
        ?>
        <h3 class="spotlight_title">
          <a href='<?php echo $item['link']; ?>' title='<?php echo $item['title']; ?>'>
            
            <?php $tempTitle = $item['title']; $newTitle = substr($tempTitle, 20, 60); ?>
            <?php echo $newTitle."..."; ?>
          </a>
        </h3>
        <p><?php $tempDate = $item['title']; $newDate = substr($tempTitle, 0, 18); ?>
            <?php echo $newDate; ?></p>
        <?php
      endforeach;
    endif;
  ?>

				
			
								
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>			
    
								<a href="http://www.today.wisc.edu/events/feed/30" class="moreButton">More Events</a>
								
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
					
					<div class="span-33 box dropin5">
							<h2>Faces</h2>
							
							<?php switch_to_blog(20); ?>
<?php query_posts("posts_per_page=1&cat=17"); ?>
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
    
    

    
 

  <?php endwhile; ?>
<?php endif; ?>
<?php restore_current_blog(); ?>
<a href="http://news.cals.wisc.edu/category/departments/cals-faces/" class="moreButton">More Faces</a>
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
				
			</div><!-- #content -->
			
			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>