<?php
/*
Template Name: People
*/
?>
<?php get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">
	
	
		<div id="primary">
  <div id="content" role="main">
<?php while ( have_posts() ) : the_post(); ?>
 <ul class="accordion">
  <?php
  wp_list_pages('title_li=&child_of='.$post->ID); ?>
  </ul>
  
  <?php endwhile; // end of the loop. ?>
  
  </div><!-- /#content -->
  <?php get_sidebar(); ?>
			<div class="clear"></div>
</div><!-- /#primary -->
	
	
	<script type="text/javascript">
			$(document).ready(function() {
				$("#content .page_item ul.children").hide();
				$("#content .page_item a").not('.children .page_item a').addClass("accordionBar");
			  	$("#content .page_item a").not('.children .page_item a').click(function() {
			  		$("#content .page_item ul.children").slideUp();
			  		$(this).next().slideDown(400, function() {
				  		// Animation complete.
				  	});
				  
			  		return false;
				});
			});
	</script>

		

	</div>
<?php get_footer(); ?>

</div>