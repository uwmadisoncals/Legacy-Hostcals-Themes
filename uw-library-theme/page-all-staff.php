<?php
/**
 * The template for displaying all library staff
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
					<div class="entry-content">
						<div id="all-staff">
							<?php  print_lib_api("people"); ?>
						</div>
					</div>
				</article>
		</div>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>