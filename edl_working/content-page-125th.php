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
		    					<?php echo get_the_post_thumbnail($page->ID, 'full'); ?>
		 					</div>
						<?php } ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		
		<?php the_content(); ?>
		
		<div class="pagefeatureboxes">
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/twitterFetcher_v10_min.js"></script>
		<div class="row clearfix">
						<div class="span-50 box fullbleed">
						
							<h2><?php the_field('feature_container_1_title'); ?></h2>
							<img src="<?php the_field('feature_container_1_image'); ?>" alt="" />
							
							<div class="boxContent">
											<?php the_field('feature_container_1'); ?>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>	
							
							<a href="http://today.wisc.edu/events/tag/CALS125" class="moreButton">More <?php the_field('feature_container_1_title'); ?></a>
						
						
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
											<div id="firstRecentTweet"></div>
											<?php the_field('feature_container_2'); ?>
                                             </div>
                            <div class="topShade"></div>
							<div class="bottomShade"></div>	
							
							<a href="https://twitter.com/search?q=%23UWCALS125&src=typd&f=realtime" class="moreButton">See More Shared CALS Memories</a>
						
						
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
						<div class="span-50 box fullbleed">
							<h2><?php the_field('feature_container_3_title'); ?></h2>
							<img src="<?php the_field('feature_container_3_image'); ?>" alt="" />
							<div class="boxContent">
											<?php the_field('feature_container_3'); ?>
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
