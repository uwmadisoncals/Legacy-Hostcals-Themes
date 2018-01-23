<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

header('X-UA-Compatible: IE=edge');

?><!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="stylesheet" href="/wp-content/themes/library-wp-theme/css/site.css" type="text/css" media="all">
		<link rel="shortcut icon" href="/assets/img/favicon.png" type="image/x-icon">
		<link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
		<?php wp_head(); ?>
		<?php include('inspectlet.php'); ?>
		<?php include('google-analytics.php'); ?>
	</head>
	<body <?php body_class(); ?>>
	<?php include('mobile-nav.php'); ?>
	<div id="page" class="hfeed site">
		<div id="pageWrapper">
		<header id="masthead" class="site-header" role="banner">
			<h1 class="site-title">Libraries</h1>
			<h2 class="site-description">University of Wisconsin - Madison</h2>
			<div class="home-link">
				<a href="/" rel="home" class="large-logo"><?php include_svg("logo-min"); ?> <span class="screen-reader-text">University of Wisconsin Madison Libraries</span></a>
				<?php include('header-search.php'); ?>
				<a href="#" class="mobile_menu_btn"><?php include_svg("menu"); ?></a>
			</div>
			<div id="navbarContainer">
				<div id="navbar" class="navbar">
					<nav id="site-navigation" class="navigation main-navigation" role="navigation">
						<h3 class="menu-toggle">Menu</h3>
						<a class="screen-reader-text skip-link" href="#content" title="Skip to content">Skip to content</a>
						<div class="<?php echo get_theme_mod('menu_type'); ?>">
						<a href="#" class="closeMenu">Close Menu</a>
						<?php 
							if (get_theme_mod('menu_content') == "staticmenu"){
								include('custom-nav.php');
							}else{
								wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) );
							} 
						?>
						</div>
						<div class="navcornerleft"></div>
						<div class="navcornerright"></div>
					</nav>
				</div>
			</div>
		</header>
		<div id="main" class="site-main">