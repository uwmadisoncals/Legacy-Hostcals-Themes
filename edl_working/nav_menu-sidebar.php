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

function cals_page_navigation_menu($post, $parent_before = '', $parent_after= '', $current_page_ancestors, $top_ancestor = '', $depth_count = 0){
	
	//Temporarily assign $post as the new  global $post
	//(needed to keep wordpress from overriding the $post variable within the function)
	$GLOBALS['post'] = $post; 
					
	//Check whether $post item has children only if $post is:
	  	// - The top ancestor
		// - The current page
		// - One of the current page's ancestors
		
	//This condition keeps the nav bar from printing every single child page
	if($top_ancestor == $post->ID || is_page($post->ID) || in_array($post->ID, $current_page_ancestors)){
		$children = get_pages('child_of='.$post->ID.'&parent='.$post->ID.'&hierarchical=0&post_type=page&sort_column=menu_order&sort_order=ASC');
	}
	
	//Is the current item the top ancestor?
	if($top_ancestor == $post->ID){
		$is_top_ancestor = true;
	}
	
	//If the current item is top_ancestor, print opening custom html specified by $parent_before param (if available).
	//Otherwise, print generic li element
	if($is_top_ancestor) {
		echo $parent_before;
	} else {
		echo '<li class="page_item page-item-'.$post->ID.'">';
	}
	
	//print menu element link
	?>
				
	<a href="<?php the_permalink(); ?>" <?php if (is_page($post->ID)){ echo 'class="current_link"';}?> title="<?php the_title();?>"><span class="white"><?php the_title();?></span><span class="arrow"></span></a>
	
	<?php 
	//If the current item is top_ancestor is top_ancestor, print closing custom html for it 
	//(if available)
	if($is_top_ancestor){
		echo $parent_after;
	}
	
	//if there are children, print them
	if(count($children)>0){
		
		//since there are children, we are going in deeper, so increase depth 
		//counter to keep track of how deep we are in the hierarchy
		$depth_count++;
		
		//Wrap children with <ul>, but only assign class "children if $depth_count>1,
		//to be consistent with WP
		
		?>
		<ul <?php if($depth_count>1) { echo 'class="children"'; }?>>
					
		<?php
		//get current item's children
		foreach($children as $child){
			cals_page_navigation_menu($child, '', '', $current_page_ancestors, '', $depth_count);
		}
		
		?>
	   
		
		</ul>
	
	<?php 
	} else {
		//The current item has no children, so we are going back one level
		$depth_count--;
	}
	
	if(!$is_top_ancestor){
		echo '</li>';
	}
				
} //EOF cals_page_navigation_menu
?>



<ul id="nav_sidebar">
	<?php
	
	//setup parameters
		//current page's title
		$the_title = get_the_title();

		//select main level pages except the current one, so they are excluded 
		$current_page_ancestors = get_post_ancestors($post);
		
		
		//get top ancestor information
			$top_ancestor = $current_page_ancestors[count($current_page_ancestors)-1];	
			
			//define class for top ancestor
			if($top_ancestor==""){
				//this is a top-level page
				$top_ancestor = $post->ID;
				$css_class = "current_page_item";
			} else {
				//this is a child-level page
				$css_class = "current_page_ancestor";
			}

			$top_ancestor_post = get_posts('include='.$top_ancestor.'&posts_per_page=1&post_type=page');
			
		//define custom html parameters for $top_ancestor
		$parent_before = '<h3 class="page_item page-item-'.$top_ancestor.' '.$css_class.'">';
		$parent_after = '</h3>';
	
		//Run the stuff
		//hold original $post
		$tmp_post = $post;
	
		//print li.pagenav element, which wraps all elements in hierarchical menus in WP
		echo '<li class="pagenav">';
	
		//populate list
		foreach($top_ancestor_post as $post){
			setup_postdata($post);		
			//call function to start printing out navigation list
			cals_page_navigation_menu($post, $parent_before, $parent_after, $current_page_ancestors, $top_ancestor, $depth_count);
		}
	
		//close  li.pagenav element
		echo '</li>';

	// Done. restore original $post
	$post = $tmp_post;
?>
</ul>


	
