<?php
/**
 * The template for displaying staff by department
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
				<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="entry-content ">
						<div id="select_container">
							<a href="#" class="item_select"><span>Select a Library</span><?php include_svg("arrow-down"); ?></a>
							<?php print_lib_api("people/locations"); ?>
						</div>
					</div>
					<div id="libInfo" class="entry-content loc-staff-list"></div>
				</article>
		</div>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>