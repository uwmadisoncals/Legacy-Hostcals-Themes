<?php
/**
 * The template for displaying content in the single.php template
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="imagePlacement">
		<?php 

		$image = get_field('picture');
 
		if( !empty($image) ) { ?>
				    					
					    		<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					    <?php } else { ?>
					    	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt="no faculty image availble" />
					 <?php } ?>
							</div>	
	<div class="singleProfile">
	<header class="entry-header">

		<h1 class="entry-title"><?php the_field('first_name'); ?> <?php the_field('last_name'); ?></h1>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php twentyeleven_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="textCopy">
			<div class="entry-content">
				<div class="row"><div class="subTitle">Program</div><?php the_field('program'); ?></div>
				<div class="row"><div class="subTitle">Student Advisor</div><?php the_field('student_advisor'); ?></div>
				<div class="row"><div class="subTitle">Cohort</div><?php the_field('cohort'); ?></div>
				<div class="row"><div class="subTitle">Email</div><?php the_field('email'); ?></div>
				
				<?php //wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'uwmadison' ) . '</span>', 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
			<footer class="entry-meta">
			</footer><!-- .entry-meta -->
		</div>
	</div><!-- .entry-content -->

	</div>
	<div class="clear"></div>
</article><!-- #post-<?php the_ID(); ?> -->
