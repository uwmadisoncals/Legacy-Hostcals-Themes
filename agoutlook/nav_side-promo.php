
							
							
							
							
<?php $args = array( 'post_type' => 'promo', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					//$loopcount = 0;
					if (have_posts()) : 
					while ( $loop->have_posts() ) : $loop->the_post();  ?>


<div class="row clearfix sidebarRow">
<div class="box">

  <?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($post->ID, 'medium');
		    				/*$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large' );
$url = $thumb['0']; echo $url;*/
 
		    				} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							 //echo '<img src="';
							 echo catch_that_news_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_field('link_to'); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_excerpt_rss(); ?></p>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>			
    
    
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
    
 

  <?php endwhile; ?>

	<?php endif; ?>						
							
						
						
						


