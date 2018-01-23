<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 * @package WordPress
 * @subpackage CALSv2
 * @since CALS 2.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
	
<meta name="viewport" content="width=320.1, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" /> 
<meta name="apple-mobile-web-app-capable" content="no">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
 <!-- iOS Device Startup Images -->
 
<!-- iPhone -->
<!--<link rel="apple-touch-startup-image"
      media="(device-width: 320px)"
      href="<?php echo get_template_directory_uri(); ?>/images/startup-iphone.png">-->
<!-- iPhone (Retina) -->
<!--<link rel="apple-touch-startup-image"
      media="(device-width: 320px)
         and (-webkit-device-pixel-ratio: 2)"
      href="<?php echo get_template_directory_uri(); ?>/images/startup-iphone4.png">-->
      
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo.png" />
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo@2x.png" />
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/default_app_logo@2x.png" />


<!-- iPhone SPLASHSCREEN-->
        <link href="apple-touch-startup-image-320x460.png" media="(device-width: 320px)" rel="apple-touch-startup-image">
        <!-- iPhone (Retina) SPLASHSCREEN-->
        <link href="apple-touch-startup-image-640x920.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPad (portrait) SPLASHSCREEN-->
        <link href="apple-touch-startup-image-768x1004.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
        <!-- iPad (landscape) SPLASHSCREEN-->
        <link href="apple-touch-startup-image-748x1024.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
        <!-- iPad (Retina, portrait) SPLASHSCREEN-->
        <link href="apple-touch-startup-image-1536x2008.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
        <!-- iPad (Retina, landscape) SPLASHSCREEN-->
        <link href="apple-touch-startup-image-1496x2048.png" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">

	
<link rel="profile" href="https://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/mobile.css" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" />
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" />
<![endif]-->
 
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>


 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>
 <!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery_easing.js"></script>-->
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.iosslider.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-css-transform.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-rotate.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/browserdetect.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/twitterFetcher_v10_min.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mainactions.js"></script>
   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/global.js"></script>

<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<?php $options = twentyeleven_get_theme_options();
$current_colorscheme = $options['link_color']; 


?>

<body <?php body_class(); ?> id="<?php echo $current_colorscheme; ?>">

<div class="mobileMenu">
	<div class="searchBox"><?php get_search_form(); ?></div>
	<div class="mobileScrollTop"></div>
	<h2 class="mobileTitle">Menu</h2>
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
</div>
<div class="menuOverlay"></div>

<div id="page" class="hfeed">
	<header id="branding" role="banner">
	
			<hgroup class="heading">
				<a href="#" class="mobileTrigger"><svg height="32px" id="Layer_1" style="enable-background:new 0 0 32 32; fill: #b7ab82;" version="1.1" viewBox="0 0 32 32" width="32px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M4,10h24c1.104,0,2-0.896,2-2s-0.896-2-2-2H4C2.896,6,2,6.896,2,8S2.896,10,4,10z M28,14H4c-1.104,0-2,0.896-2,2  s0.896,2,2,2h24c1.104,0,2-0.896,2-2S29.104,14,28,14z M28,22H4c-1.104,0-2,0.896-2,2s0.896,2,2,2h24c1.104,0,2-0.896,2-2  S29.104,22,28,22z"/></svg></a>	
				<h1 id="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>


			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						// We need to figure out what the minimum width should be for our featured image.
						// This result would be the suggested width if the theme were to implement flexible widths.
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}
					?>
			
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logoImage">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php  // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>

			<?php
				// Has the text been hidden?
				if ( 'blank' == get_header_textcolor() ) :
			?>
				
				
					
					<div class="loginBox">
						<h3>Log in to LabArchives or register for a new account</h3>
						<a href="https://shib.labarchives.com?entityID=https%3A%2F%2Flogin.wisc.edu%2Fidp%2Fshibboleth" class="button red">Existing Account Login</a>
						<a href="http://eln.wisc.edu/get-started/sign-up/" class="button red">New Account Registration</a>
					</div>
					
				
				
				
			<?php
				else :
			?>
				<?php get_search_form(); ?>
			<?php endif; ?>

			
			</hgroup>
			
			<div class="utilityMenu">
			<?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
			</div>
			
		<nav id="access" class ="main-navigation" role="navigation">
				<div class="site-navigation-container">
				
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				<!-- Commented out to hardcode the site's navigation -->
  				
  					<div class="globalSearch">
				<?php get_search_form(); ?>
				<div class="filtered" style="display: none;">
					<ul>
					<li class="subheading" style="display: block;">Results <span id="filter-count"></span></li>
						
					</ul>
				</div>
				</div>
			
  				
				</div>
				
			</nav><!-- #access -->
			
			<div class="navcornerleft"></div>
			<div class="navcornerright"></div>
<div class="headingbg clearfix"></div>
	</header><!-- #branding -->
	