<?php
/**
 *
 * This is the layout for the homepage of the uw-madison library
 * website. 
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

// Pull in promotion data, build up a slides array.
include("promotions_local.php");
$api_site_id = get_theme_mod('api_site_id');

get_header(); 

?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div id="local-site-home">
				
				<div id="slidelist"></div>
				
				<script>
					var slides = <?php echo $promoSlides; ?>;
					document.getElementById('slidelist').innerHTML = slides;
				</script>
				
				<div class="subsiteHome">
					<div class="inner cf">
						<div class="localRightCol">
							<?php 
								if ($api_site_id == '59'){ //friends of the library
									include('local-site/ribbon-friends.php');
								}else{
									include('local-site/ribbon.php');	
								}
							?>
						</div>
						<div class="localLeftCol">
						<?php 
							while ( have_posts() ) : the_post(); 
							
								if ($api_site_id == '59'){ //friends of the library
									include('local-site/welcome-text.php') ;
								}
								else { 
									include('local-site/navigation.php') ;
								}
							
								if( have_rows('homepage_options') ):
									while ( have_rows('homepage_options') ) : the_row();
										if( get_row_layout() == 'spotlight' ):
											include('local-site/spotlight.php'); 	
										endif;
										
										if( get_row_layout() == 'flickr' ):
											include('local-site/flickr.php');
										endif;
										
										if( get_row_layout() == 'general_content' ):
											include('local-site/general.php');
										endif;
										
										if( get_row_layout() == 'events' ):
											include('local-site/events.php');
										endif;
										
										if( get_row_layout() == 'featured_items' ):
											include('local-site/featured.php');
										endif;

									endwhile;
								endif;
							endwhile;
						?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>