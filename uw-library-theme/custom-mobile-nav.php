<?php
/**
 * Contains the navigation for the uw-madison library
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
<?php 
	if ( !is_home() ) {
	  	$children = wp_list_pages('title_li=&child_of='.$post->ID.'&echo=0&depth=1');
		if ($children) { 
?>
	  	<h3>Explore</h3>
			<ul class="explore-mobile-menu">
				<?php echo $children; ?>
			</ul>			
			<h3>Main Menu</h3>
<?php 
		} 
	}
	if (get_theme_mod('api_site_id')){
		wp_nav_menu( array( 'theme_location' => 'local-menu', 'menu_class' => 'nav-menu-mobile', 'depth' => '1'  ) );
	}else{
?>
<ul class="main-mobile-menu">
<?php	 
	$rootpath = $_SERVER['DOCUMENT_ROOT'];
	wp_list_pages( array(
	   'sort_column' => 'menu_order',
	   'include'=> array(18,63,78,87,125,155),
	   'title_li'=>''
	) );
?>
</ul>
<?php } ?>
<ul class="mobile-nav-menu-callouts">
	<li><a class="top_item" href="/my-account/"><?php include_svg("local_sites/user"); ?>My Accounts</a></li>
	<li><a class="top_item" href="/search/"><?php include_svg("local_sites/search"); ?>Site Search</a></li>
	<li><a class="top_item" href="/ask/"><?php include_svg("ask_bubbles"); ?>Ask a Librarian</a></li>
	<li><a class="top_item" href="/about/giving/"><?php include_svg("gift"); ?>Support the Libraries</a></li>
	<li><a class="top_item" href="http://www.wisc.edu/" >UW-Madison</a></li>
</ul>