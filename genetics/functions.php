<?php
/**
 * Twenty Eleven functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, twentyeleven_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'twentyeleven_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
 
 

/*add_filter('the_content', 'rewriteURL');

function rewriteURL($URL) {
$URL = str_replace('https://technology.genetics.wisc.edu/', 'http://technology.genetics.wisc.edu/', $URL);
return $URL;
}*/




/*function cals_ssl_template_redirect() {
  if ( is_page( 317 ) && ! is_ssl() ) {
    if ( 0 === strpos($_SERVER['REQUEST_URI'], 'http') ) {
      wp_redirect(preg_replace('|^http://|', 'https://', $_SERVER['REQUEST_URI']), 301 );
      
      exit();
    } else {
      wp_redirect('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
      exit();
    }
  } else if ( !is_page( 317 ) && is_ssl() && !is_admin() ) {
    if ( 0 === strpos($_SERVER['REQUEST_URI'], 'http') ) {
      wp_redirect(preg_replace('|^https://|', 'http://', $_SERVER['REQUEST_URI']), 301 );
      exit();
    } else {
      wp_redirect('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], 301 );
      exit();
    }
  }
}
add_action( 'template_redirect', 'cals_ssl_template_redirect', 1 );


function cals_permalink_page_ssl( $permalink, $post, $leavename ) {
  if ( 317 == $post->ID )
    return preg_replace( '|^http://|', 'https://', $permalink );
  return $permalink;
}
add_filter( 'pre_post_link', 'cals_permalink_page_ssl', 10, 3 );


*/

?>