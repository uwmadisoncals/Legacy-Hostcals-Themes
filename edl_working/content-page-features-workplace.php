<?php
/**
 * The template used for displaying page content in page.php
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>
<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	 <?php	if ( has_post_thumbnail() ) { ?>
		 					<div class="featuredImage">
		    					<?php echo get_the_post_thumbnail($page->ID, 'large'); ?>
		 					</div>
						<?php } ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php the_content(); ?>
		<div class="pagefeatureboxes">
		<div class="row clearfix">
						<div class="span-50 box fullbleed">
						
							<h2><?php the_field('feature_container_1_title'); ?></h2>
							<img src="<?php the_field('feature_container_1_image'); ?>" alt="" />
							
							<div class="boxContent">
											<?php the_field('feature_container_1'); ?>
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
						<div class="span-50 box fullbleed">
							<h2><?php the_field('feature_container_2_title'); ?></h2>
							<img src="<?php the_field('feature_container_2_image'); ?>" alt="" />
							<div class="boxContent">
											<?php the_field('feature_container_2'); ?>
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
					
					<div class="row clearfix">
						<div class="span-50 box workplace fullbleed">
							<h2><?php the_field('feature_container_3_title'); ?></h2>
							
											
											<?php switch_to_blog(19); ?>
<?php query_posts("cat=17&posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post();  ?>

  <?php	if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else { ?>
							<img src="<?php the_field('feature_container_3_image'); ?>" alt="" />
							
							<?php
							 //echo '<img src="';
							 //echo catch_that_announcements_image();
							 
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
<?php wp_reset_query(); ?>
											<?php //the_field('feature_container_3'); ?>
                                           	
							
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
						<div class="span-50 box fullbleed">
							<h2><?php the_field('feature_container_4_title'); ?></h2>
							<img src="<?php the_field('feature_container_4_image'); ?>" alt="" />
							<div class="boxContent">
											<?php the_field('feature_container_4'); ?>
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
		</div>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
