<?php
if ( !defined('ABSPATH')) exit; // Exit if accessed directly
/**
 * Woo Commerce
 * Description:  Woo Commerce Page Template
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Weaver II
 * @since Weaver II 1.0
 *
 *  	>>>> DO NOT EDIT THIS FILE <<<<
 *
 * Warning! DO NOT EDIT THIS FILE, or any other theme file! If you edit ANY theme
 * file, all your changes will be LOST when you update the theme to a newer version.
 * Instead, if you need to change theme functionality, CREATE A CHILD THEME!
 *
 *	>>>> DO NOT EDIT THIS FILE <<<<
 */

weaverii_get_header('page');
if (weaverii_getopt('wii_infobar_location') == 'top') get_template_part('infobar');
weaverii_inject_area('premain');
echo("\t<div id=\"main\" class=\"main-woo\">\n");
weaverii_trace_template(__FILE__);
weaverii_get_sidebar_left('page');
?>
		<div id="container_wrap"<?php weaverii_get_page_class('page', 'container-page'); ?>>
<?php		if (weaverii_getopt('wii_infobar_location') == 'content') get_template_part('infobar');
		weaverii_inject_area('precontent'); ?>
		<div id="container">
<?php		weaverii_get_sidebar_top('page'); ?>

			<div id="content" class="content-woo" role="main">
<?php
			if (function_exists('woocommerce_content')) {
				woocommerce_content();
			} else {
                while ( have_posts() ) {
                    aspen_post_count_clear(); the_post();

                    get_template_part( 'content', 'page' );

                    comments_template( '', true );
                }
			}
?>
			</div><!-- #content -->
<?php		weaverii_get_sidebar_bottom('page'); ?>
		</div><!-- #container -->
		</div><!-- #container_wrap -->

<?php	weaverii_get_sidebar_right('page');
	weaverii_get_footer('page');
?>
