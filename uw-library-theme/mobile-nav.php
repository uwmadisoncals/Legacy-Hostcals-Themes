<div class="mobile-nav" aria-hidden="true">
	<?php 
		if (get_theme_mod('menu_content') == "staticmenu"){
			include('custom-mobile-nav.php');
		}else{
			wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu-mobile', 'depth' => '0'  ) );
		} 
	?>
</div>