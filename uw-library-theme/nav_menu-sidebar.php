<?php 
/** Outputs a full page navigation menu 
 *
 *
 *
 * @param $post obj 
 * @param $parent_before string custom html code to be printed before parent page link is printed
 * @param $parent_after string custom html code to be printed after parent page link is printed
 * @param $current_page_ancestors array
 * @param $top_ancestor int id of top-most parent page
 * @depth_count int internal counter used by function to keep track of depth level of current iteration
*/
?>
<div id="nav_sidebar">
	<?php
		
		//find all of the parents to the post
		$current_page_ancestors = get_post_ancestors($post);
		
		$tmp_post = $post;
		$reverted = new ArrayIterator(array_reverse($current_page_ancestors));
		
		
		
		//get children of current page
		$child_pages = get_pages('child_of='.$post->ID.'&parent='.$post->ID.'&hierarchical=0&post_type=page&sort_column=menu_order&sort_order=ASC');
		
		if(!empty($child_pages) && sizeof($reverted) >= 0){?>
		
			<div class="exploreMenu">
			<h3><?php the_title(); ?></h3>
	        <ul id="nav_explore">
				
				<?php
	            foreach($child_pages as $post){
	            	setup_postdata($post);?>
	           			<li class="page_item page-item-<?php the_ID();?>">
	           				<a href="<?php the_permalink(); ?>">
	           					<span class="nav_arrow"><?php include("images/arrow-right-thin.svg"); ?></span>
	           					<span class="nav_text"><?php the_title(); ?></span>
							</a>
	                     </li>
	            <?php } ?>
	            </ul><!-- #nav_explore --> 
			</div>   
		<?php 
		}


		// Done. restore original $post
		$post = $tmp_post;
		?>
</div>



	
