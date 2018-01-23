<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

<div class="collegeFeature2">
  <?php if (function_exists( 'muneeb_ssp_slider')) {muneeb_ssp_slider( 183 );} ?>
   </div>

	<div id="main">
	
	
		<div id="primary">
  <div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'home' ); ?>

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
			
			<div class="clear"></div>
			
			</div><!-- /#primary -->
	
	
	

		

	</div>
<?php get_footer(); ?>

</div>