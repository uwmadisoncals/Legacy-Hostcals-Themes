<?php
/*
Template Name: Blog Posts
*/
?>

<?php get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">
	
	
		<div id="primary">
  <div id="content" role="main">

  <?php
  /* the_post will retrieve the content of the new page you 
  *  create to list the posts, e.g. as an intro to describe 
  *  which posts are shown.
  */
  the_post(); 
  
  // Display content of page
  get_template_part( 'content', get_post_format() ); 
  wp_reset_postdata();

  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

  $args = array(
	// Change these category SLUGS to suit your use.
	'category_name' => '', 
	'paged' => $paged
  );

  $list_of_posts = new WP_Query( $args ); 

  twentyeleven_content_nav( 'nav-above' );
  while ( $list_of_posts->have_posts() ): $list_of_posts->the_post();

    // Display content of posts
    get_template_part( 'content', get_post_format() );

  endwhile; 
  twentyeleven_content_nav( 'nav-below' ); 
  ?>

  </div><!-- /#content -->
  <?php get_sidebar(); ?>
			<div class="clear"></div>
</div><!-- /#primary -->
	
	
	

		

	</div>
<?php get_footer(); ?>

</div>