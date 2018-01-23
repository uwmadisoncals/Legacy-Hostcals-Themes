<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage UW_Madison
 * @since UW-Madison 1.0
 */
?>

<div class="profileSummary" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( is_home() ) : ?>
	
	<?php else: ?>
	
		<div class="imageCrop">
		<?php 

		$image = get_field('picture');
 
		if( !empty($image) ) { ?>
				    					
					    		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					    <?php } else { ?>
					    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt="no faculty image availble" />
					 <?php } ?>
							</div>					
									
		<div class="textCopy profileColumn1">
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></a></h3>
		<div><?php the_field('program'); ?></div>
	</div>

	<?php endif; ?>
<div class="textCopy profileColumn2">
	<div class="entry-content">
		<?php if(get_field('student_advisor')) { ?>
		<div class="row"><div class="subTitle">Student Advisor</div><?php the_field('student_advisor'); ?></div>
		<?php } ?>
		
		<?php if(get_field('cohort')) { ?>
		<div class="row"><div class="subTitle">Cohort</div><?php the_field('cohort'); ?></div>
		<?php } ?>
		
		<?php if(get_field('email')) { ?>
		<div class="row"><div class="subTitle">Email</div><a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a></div>
		<?php } ?>
		
		<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'uwmadison' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
	</footer><!-- .entry-meta -->
</div>
</div><!-- #post-<?php the_ID(); ?> -->
