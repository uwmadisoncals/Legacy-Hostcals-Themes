<?php
/**
 * Twenty Thirteen functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link http://codex.wordpress.org/Plugin_API
 *
 * This theme only works in WordPress 3.6 or later.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * Set up the content width value based on the theme's design.
 *
 * @see twentythirteen_content_width() for template-specific adjustments.
 */
if ( ! isset( $content_width ) )
  $content_width = 604;


/**
 * Add support for a custom header image.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Twenty Thirteen setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Thirteen supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add Visual Editor stylesheets.
 * @uses add_theme_support() To add support for automatic feed links, post
 * formats, and post thumbnails.
 * @uses register_nav_menu() To add support for a navigation menu.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
 
 
 
function twentythirteen_setup() {
  /*
   * This theme styles the visual editor to resemble the theme style,
   * specifically font, colors, icons, and column width.
   */
   
   /* Add SVG support to media uploader */
   	function cc_mime_types( $mimes ){
   	 	$mimes['svg'] = 'image/svg+xml';
   	 	return $mimes;
	}
	add_filter( 'upload_mimes', 'cc_mime_types' );

  add_editor_style( array( 'css/editor-style.css' ) );

  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Switches default core markup for search form, comment form,
   * and comments to output valid HTML5.
   */
  add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menu( 'primary', 'Navigation Menu' );
  register_nav_menu( 'local-menu', 'Local Navigation Menu' );

  /*
   * This theme uses a custom image size for featured images, displayed on
   * "standard" posts and pages.
   */
  add_theme_support( 'post-thumbnails' );
  set_post_thumbnail_size( 604, 270, true );

  // This theme uses its own gallery styles.
  add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'twentythirteen_setup' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
 */
function twentythirteen_wp_title( $title, $sep ) {
  global $paged, $page;

  if ( is_feed() )
    return $title;

  // Add the site name.
  $title .= get_bloginfo( 'name' );

  // Add the site description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) )
    $title = "$title $sep $site_description";

  // Add a page number if necessary.
  if ( $paged >= 2 || $page >= 2 )
    $title = "$title $sep " . sprintf('Page %s', max( $paged, $page ) );

  return $title;
}
add_filter( 'wp_title', 'twentythirteen_wp_title', 10, 2 );

/**
 * Register two widget areas.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_widgets_init() {
  register_sidebar( array(
    'name'          => 'Main Widget Area',
    'id'            => 'sidebar-1',
    'description'   => 'Appears in the footer section of the site.',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => 'Secondary Widget Area',
    'id'            => 'sidebar-2',
    'description'   => 'Appears on posts and pages in the sidebar.',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
}
add_action( 'widgets_init', 'twentythirteen_widgets_init' );

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_paging_nav() {
  global $wp_query;

  // Don't print empty markup if there's only one page.
  if ( $wp_query->max_num_pages < 2 )
    return;
  ?>
  <nav class="navigation paging-navigation" role="navigation">
    <h1 class="screen-reader-text">Posts navigation</h1>
    <div class="nav-links">

      <?php if ( get_next_posts_link() ) : ?>
      <div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts' ); ?></div>
      <?php endif; ?>

      <?php if ( get_previous_posts_link() ) : ?>
      <div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>' ); ?></div>
      <?php endif; ?>

    </div>
  </nav>
  <?php
}
endif;


if ( ! function_exists( 'twentythirteen_entry_meta' ) ) :
/**
 * Print HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentythirteen_entry_meta() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_entry_meta() {
  if ( is_sticky() && is_home() && ! is_paged() )
    echo '<span class="featured-post">Sticky</span>';

  if ( ! has_post_format( 'link' ) && 'post' == get_post_type() )
    twentythirteen_entry_date();

  // Translators: used between list items, there is a space after the comma.
  /* $categories_list = get_the_category_list(', ');
  if ( $categories_list ) {
    echo '<span class="categories-links">' . $categories_list . '</span>';
  }

  // Translators: used between list items, there is a space after the comma.
  $tag_list = get_the_tag_list( '', ', ');
  if ( $tag_list ) {
    echo '<span class="tags-links">' . $tag_list . '</span>';
  }

  // Post author
 if ( 'post' == get_post_type() ) {
    printf( '<span class="author vcard"><a class="url fn n" href="%1$s" rel="author">%3$s</a></span>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf('View all posts by %s', get_the_author() ) ),
      get_the_author()
    );
  }*/
}
endif;

if ( ! function_exists( 'twentythirteen_entry_date' ) ) :
/**
 * Print HTML with date information for current post.
 *
 * Create your own twentythirteen_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo (optional) Whether to echo the date. Default true.
 * @return string The HTML-formatted post date.
 */
function twentythirteen_entry_date( $echo = true ) {
  if ( has_post_format( array( 'chat', 'status' ) ) )
    $format_prefix = '%1$s on %2$s';
  else
    $format_prefix = '%2$s';

  $date = sprintf( '<span class="date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
    esc_url( get_permalink() ),
    esc_attr( sprintf('Permalink to %s', the_title_attribute( 'echo=0' ) ) ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
  );

  if ( $echo )
    echo $date;

  return $date;
}
endif;

if ( ! function_exists( 'twentythirteen_the_attached_image' ) ) :
/**
 * Print the attached image with a link to the next attached image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_the_attached_image() {
  /**
   * Filter the image attachment size to use.
   *
   * @since Twenty thirteen 1.0
   *
   * @param array $size {
   *     @type int The attachment height in pixels.
   *     @type int The attachment width in pixels.
   * }
   */
  $attachment_size     = apply_filters( 'twentythirteen_attachment_size', array( 724, 724 ) );
  $next_attachment_url = wp_get_attachment_url();
  $post                = get_post();

  /*
   * Grab the IDs of all the image attachments in a gallery so we can get the URL
   * of the next adjacent image in a gallery, or the first image (if we're
   * looking at the last image in a gallery), or, in a gallery of one, just the
   * link to that image file.
   */
  $attachment_ids = get_posts( array(
    'post_parent'    => $post->post_parent,
    'fields'         => 'ids',
    'numberposts'    => -1,
    'post_status'    => 'inherit',
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'order'          => 'ASC',
    'orderby'        => 'menu_order ID'
  ) );

  // If there is more than 1 attachment in a gallery...
  if ( count( $attachment_ids ) > 1 ) {
    foreach ( $attachment_ids as $attachment_id ) {
      if ( $attachment_id == $post->ID ) {
        $next_id = current( $attachment_ids );
        break;
      }
    }

    // get the URL of the next image attachment...
    if ( $next_id )
      $next_attachment_url = get_attachment_link( $next_id );

    // or get the URL of the first image attachment.
    else
      $next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
  }

  printf( '<a href="%1$s" rel="attachment">%3$s</a>',
    esc_url( $next_attachment_url ),
    the_title_attribute( array( 'echo' => false ) ),
    wp_get_attachment_image( $post->ID, $attachment_size )
  );
}
endif;

/**
 * Return the post URL.
 *
 * @uses get_url_in_content() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return string The Link format URL.
 */
function twentythirteen_get_link_url() {
  $content = get_the_content();
  $has_url = get_url_in_content( $content );

  return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Active widgets in the sidebar to change the layout and spacing.
 * 3. When avatars are disabled in discussion settings.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param array $classes A list of existing body class values.
 * @return array The filtered body class list.
 */
function twentythirteen_body_class( $classes ) {
  if ( is_active_sidebar( 'sidebar-2' ) && ! is_attachment() && ! is_404() )
    $classes[] = 'sidebar';

  if ( ! get_option( 'show_avatars' ) )
    $classes[] = 'no-avatars';

  return $classes;
}
add_filter( 'body_class', 'twentythirteen_body_class' );

/**
 * Adjust content_width value for video post formats and attachment templates.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function twentythirteen_content_width() {
  global $content_width;

  if ( is_attachment() )
    $content_width = 724;
  elseif ( has_post_format( 'audio' ) )
    $content_width = 484;
}
add_action( 'template_redirect', 'twentythirteen_content_width' );

/**
 * Customize menu types
 *
 * @since Twenty Thirteen 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 * @return void
 */
function twentythirteen_customize_register( $wp_customize ) {
  $wp_customize->add_section( 'twentythirteen_menu_type', array(
      'title'          => 'Menu Type',
      'priority'       => 35,
  ) );
  
  $wp_customize->add_setting( 'menu_type', array(
      'default'        => 'slidepanel',
      'type'           => 'theme_mod',
      'capability'     => 'edit_theme_options',
  ) );

  $wp_customize->add_control( 'twentythirteen_menu_type', array(
      'section'    => 'twentythirteen_menu_type',
      'settings'   => 'menu_type',
      'type'       => 'radio',
      'choices'    => array(
        'classic' => 'Classic Drop Down',
        'slidepanel' => 'Slide Panel',
      ),
  ) );  
  
  
  $wp_customize->add_section( 'twentythirteen_menu_content', array(
      'title'          => 'Menu Content',
      'priority'       => 35,
  ) );
  
  $wp_customize->add_setting( 'menu_content', array(
      'default'        => 'wpmenu',
      'type'           => 'theme_mod',
      'capability'     => 'edit_theme_options',
  ) );
  
  $wp_customize->add_control( 'twentythirteen_menu_content', array(
      'section'    => 'twentythirteen_menu_content',
      'settings'   => 'menu_content',
      'type'       => 'radio',
      'choices'    => array(
        'wpmenu' => 'WP Menu',
        'staticmenu' => 'Static Menu',
      ),
  ) );  
  
  
  $wp_customize->add_section( 'twentythirteen_site_id', array(
      'title'          => 'API Site ID',
      'priority'       => 36,
  ) );
  
  $wp_customize->add_setting( 'api_site_id', array(
      'type'           => 'theme_mod',
      'capability'     => 'edit_theme_options',
  ) );
  
  $wp_customize->add_control( 'twentythirteen_site_id', array(
      'section'    => 'twentythirteen_site_id',
      'settings'   => 'api_site_id',
      'type'       => 'text',
  ) );    

}
add_action( 'customize_register', 'twentythirteen_customize_register' );



/**
 * Modifying TinyMCE editor to remove unused items.
 * ----------------------------------------------------------------------------
 */
 function customformatTinyMCE($init) {
   $init['block_formats'] = "Paragraph=p; Heading 3=h3; Heading 4=h4";
   $init['toolbar2']='formatselect,styleselect,alignjustify,pastetext,removeformat,charmap,outdent,indent,undo,redo,table';
   
   $init['toolbar1'] = 'bold,italic,underline, strikethrough,bullist,numlist,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,wp_fullscreen,wp_adv ';
  
  return $init;
}
add_filter('tiny_mce_before_init', 'customformatTinyMCE' );


add_action( 'init', 'pds_add_editor_styles' );

function pds_add_editor_styles(){
    add_editor_style( '/admin-style.css' );
}

// Add custom styles
function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}
// Register our callback to the appropriate filter
add_filter('mce_buttons_2', 'my_mce_buttons_2');

// Callback function to filter the MCE settings
function my_mce_before_init_insert_formats( $init_array ) {  
	// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'Heading',  
			'classes' => 'mce_inline-heading',
			'inline' => 'span',
			'wrapper' => true,
		),  
		array(  
			'title' => 'Citation',  
			'classes' => 'mce_citation',
			'inline' => 'cite',
			'wrapper' => true,
		), 
		array(  
			'title' => 'Button',  
			'classes' => 'button',
			'selector' => 'a',
		),  
	);  
	
	unset($init_array['preview_styles']); 
	
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats ); 
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );  


/**
 * Shorten Excerpt Length
 * ----------------------------------------------------------------------------
 */ 
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );



/**
 * Add homepage slides promotion
 * ----------------------------------------------------------------------------
 */ 
function create_post_type() {
  register_post_type( 'home_page_slides',
    array(
      'labels' => array(
        'name' => 'Promotions',
        'singular_name' => 'Promotions'
      ),
    'public' => true,
    'has_archive' => true,
    'exclude_from_search' => true
    )
  );
}
add_action( 'init', 'create_post_type' );

/**
 * Activate Gravity Forms for Editors on Theme setup
 * ----------------------------------------------------------------------------
 */
function add_grav_forms(){
	$role = get_role('editor');
	$role->add_cap('gform_full_access');
}
add_action('after_setup_theme','add_grav_forms');


/**
 * Move Gravity Forms JavaScript to the footer
 * ----------------------------------------------------------------------------
 */

add_filter("gform_init_scripts_footer", "init_scripts");
function init_scripts()
{
    return true;
}

 

/**
 * Removes 301 redirects from Speedy Page Redirect plugin
 * ----------------------------------------------------------------------------
 */
add_filter( 'gdd_spr_statuses', 'gdd_spr_statuses' );
function gdd_spr_statuses( $statuses ) {
	unset( $statuses[301] );
	return $statuses;
}


/**
 * Adds css for styling the admin
 * ----------------------------------------------------------------------------
 */
add_action( 'admin_enqueue_scripts', 'load_admin_style' );
    function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
}


/**
 * Remove empty paragraph tags
 * ----------------------------------------------------------------------------
 */
add_filter( 'the_content', 'remove_empty_p', 20, 1 );
function remove_empty_p( $content ){
	// clean up p tags around block elements
	$content = preg_replace( array(
		'#<p>\s*<(div|aside|section|article|header|footer)#',
		'#</(div|aside|section|article|header|footer)>\s*</p>#',
		'#</(div|aside|section|article|header|footer)>\s*<br ?/?>#',
		'#<(div|aside|section|article|header|footer)(.*?)>\s*</p>#',
		'#<p>\s*</(div|aside|section|article|header|footer)#',
	), array(
		'<$1',
		'</$1>',
		'</$1>',
		'<$1$2>',
		'</$1',
	), $content );
 
	return preg_replace('#<p>(\s|&nbsp;)*+(<br\s*/*>)?(\s|&nbsp;)*</p>#i', '', $content);
}



/* ======================================================================
 * Disable-Inline-Styles.php
 * Removes inline styles and other coding junk added by the WYSIWYG editor.
 * Script by Chris Ferdinandi - http://gomakethings.com
 * ====================================================================== */

add_filter( 'the_content', 'clean_post_content' );
function clean_post_content($content) {

    // Remove inline styling
    $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);

    // Remove font tag
    $content = preg_replace('/<font[^>]+>/', '', $content);

    // Remove empty tags
    $post_cleaners = array('<p></p>' => '', '<p> </p>' => '', '<p>&nbsp;</p>' => '', '<span></span>' => '', '<span> </span>' => '', '<span>&nbsp;</span>' => '', '<span>' => '', '</span>' => '', '<font>' => '', '</font>' => '');
    $content = strtr($content, $post_cleaners);

    return $content;
}
 

/**
 * Fix linking for admin editing to force https
 * Forces all content when within the admin interface to use https
 *
 * This does not fix embedded attachments on the normal site
 *
 * This is to force admin interface connections to https, to prevent previewing
 * the pages over http, loosing the edit bar (because cache kills cookies), and not getting back.
 * specifically the "view page" button uses these links.
 * 
 * Starting with newer versions of wordpress this get_permalink is also used for inserting links
 * this allows us to make sure protocol relative links are inserted by users when they add links.
 * in the future we may need to pull out the domain name as well, and make a domain relative link.
 * ----------------------------------------------------------------------------
 */
function fix_admin_ssl( $url, $id ) {
  if ( is_admin() ) {    
    return str_replace("http://", "//", $url);  
  }
  return $url;
}

// Only add these filters in if we're forcing SSL admin.
if(defined("FORCE_SSL_ADMIN") && FORCE_SSL_ADMIN == true) {
  add_filter( 'page_link', 'fix_admin_ssl', 10, 2 );
  add_filter( 'attachment_link', 'fix_admin_ssl', 10, 2 );
}

/**
 * Add custom pretty url for staff searching.
 * ----------------------------------------------------------------------------
 */

function pretty_staff() {
  // TODO: Should handle non-ascii characters in the future.
  add_rewrite_tag('%person%', '([a-zA-Z-]+)');
  add_rewrite_rule('^about/directory/staff/([a-zA-Z-]+)$', 'index.php?pagename=about/directory/staff&person=$matches[1]', 'top');
  //flush_rewrite_rules( true );  // Never actually call this, but needed for development.
}
add_action('init', 'pretty_staff');

/**
 * Add custom pretty url for hours searching.
 * ----------------------------------------------------------------------------
 */

function pretty_hours() {
  add_rewrite_tag('%date%', '([0-9]{8})');
  add_rewrite_rule('^libraries/hours/([0-9]{8})$', 'index.php?pagename=libraries/hours&date=$matches[1]', 'top');
  // TODO: Disable this call
  //flush_rewrite_rules( true );  // Never actually call this, but needed for development.
}
add_action('init', 'pretty_hours');

/**
 * Add excerpts to wordpress pages
 * ----------------------------------------------------------------------------
 */
add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
     add_post_type_support( 'post', 'excerpt' );
}

/**
 * Get base URL for API methods.
 * ----------------------------------------------------------------------------
 */
function api_base_url() {
  if(defined("API_BASE")) {
    return API_BASE;
  } else {
    return "http://api.library.wisc.edu/api/";

  }
}

/**
 * Fetch contents from UW Madison Library API
 * and return as a string.
 * $api_method is everything after the /api call. No leading slash.
 * If a call fails, catch the error and return an empty string.
 * ----------------------------------------------------------------------------
 */
function lib_api($api_method) {
  $base_url = api_base_url();
  $context = stream_context_create( array('http'=>array('timeout' => 2.0)));
  $data = @file_get_contents($base_url . $api_method, false, $context);
  if ($data === false) {
    return "";
  }
  return $data;
}

/**
 * Fetch contents from UW Madison Library API
 * and print out.
 * ----------------------------------------------------------------------------
 */
function print_lib_api($api_method) {
  print lib_api($api_method);
}

/**
 * Includes an svg asset from the lws-assets folder.
 * lws-assets are for shared assets, used across multiple LWS pages, and shared
 * between different LWS themes, but are limited to the library web page scope.
 * The asset must exist in the img folder.
 * supply a relative path from img, minus the extension, to include the asset
 * for example:  include_svg("menu");
 * ----------------------------------------------------------------------------
 */
function include_svg($asset) {
  @include($_SERVER['DOCUMENT_ROOT'] . "/assets/img/${asset}.svg");
}

/**
 * Returns true if the user agent is not a bot.
 * Returns false if the user agent is a known bot, or unset.
 * ----------------------------------------------------------------------------
 */
function not_bot($user_agent) {
  // Unset user agents we'll say are bots.
  if($user_agent == "") {
    return false;
  }
  // Most legit bots have a string like this.
  if(strpos($user_agent, '+http:') !== false) {
    return false;
  }
  return true;
}


/**
 * Filter the UW-Madison Events date formats
 * ----------------------------------------------------------------------------
 */
function my_uw_events_date_formats($date_formats) {
    // Custom header format for each group of events
    // in the grouped event view
    $date_formats['group_header'] = '<span class="uwmadison_event_group_date">%A, %B %e, %Y</span>';

    return $date_formats;
}
add_filter('uwmadison_events_date_formats', 'my_uw_events_date_formats');


/**
 * Set up Gravity Forms to send admin emails in plain text
 * ----------------------------------------------------------------------------
 */
add_filter('gform_notification', 'change_notification_format', 10, 3);

function change_notification_format( $notification, $form, $entry ) {
    	if ($notification["name"] == "Plain Text")
    		$notification['message_format'] = "text";
    	else
    		$notification['message_format'] = "html";
    		
	    return $notification;
}


/**
 * Sort "My Sites" alphabetically
 * ----------------------------------------------------------------------------
 */
add_filter('get_blogs_of_user','sort_my_sites');
function sort_my_sites($blogs) {
        $f = create_function('$a,$b','return strcasecmp($a->blogname,$b->blogname);');
        uasort($blogs, $f);
        return $blogs;
}


  

/**
 * Customise the events html for the <li> or each event
 * ----------------------------------------------------------------------------
 */
function my_uwmadison_events_html($html, $event, $opts) {
	date_default_timezone_set('America/Chicago');
	
    $my_event_title = '<a href="' . $event->link . '" class="uwmadison_event_title">' . $event->title .' </a>';
    
    $my_event_date = '<div class="uwmadison_event_full_date">' . date('l, F j, Y',$event->start_timestamp) . '</div>';
    $my_event_time = '<div class="uwmadison_event_date">' . date('g:i a',$event->start_timestamp);
    if (empty($event->end_timestamp)){
        $my_event_time .=  '</div>';
    } else{
        $my_event_time .=  '-' . date('g:i a',$event->end_timestamp) . '</div>';
    }
    
    
    $my_event_desc = '<div class="uwmadison_event_description">' . $event->description .' </div>';
    
    
    $my_event_location = '<div class="event_contact">';
    
    if (!empty($event->uw_map_url)){
        $my_event_location .=  '<a href="' . $event->uw_map_url . '" class="location">' . $event->location . '</a>';
    } else if (!empty($event->location)){
    	$my_event_location .=  '<div class="location">' . $event->location . '</div>';
    }
    
    
    $my_event_contact = $my_event_location . '</div>';
    
    $my_event_html = $my_event_date. $my_event_title . $my_event_contact . $my_event_time . $my_event_desc;
    return $my_event_html;
}
// When registering this filter, we must tell it we're receiving 3 arguments
// if we want access to the $event object and options
add_filter('uwmadison_events_event_html', 'my_uwmadison_events_html', 10, 3);

