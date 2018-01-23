<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

$person = get_query_var("person"); 
$details = false;
if ($person != "") {
	$details = lib_api("people/" . strtolower($person));
}
add_filter('wp_title','set_user_name');
function set_user_name() {
	global $details;
	if ($details !== false) {
		preg_match("/<h2.*?>(.*)<\/h2>/",$details, $name);
		if (isset($name[1])) {
			return "$name[1] | Libraries";	
		}
	}

	return "Person not found | Libraries";
}

if($details == "") {
	header("HTTP/1.1 404 Not Found");
}	
get_header(); ?>
	<div id="primary" class="content-area staff-page">
		<div id="content" class="site-content" role="main">	
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
			<?php if ($details !== false && $details !== "") { ?>
					<div class="entry-content staff_details_pg" id="staff_details">
						<?php print $details; ?>
					</div>
			<?php } else { ?>					
					<div class="entry-content staff_details_empty">
						Sorry about that, but there was no staff information found. 
						<a href="/directory/">Search again?</a> 
					</div>
					<?php } ?>
				</article>
			<?php endwhile; ?>
		</div>
		<?php if ($details !== false && $details !== "") { ?>
			<div class="right-Nav">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="highlights">
						<div id="staff-contact-form">
							<?php the_content(); ?>
						</div>
					</div>
				<?php endwhile; // end of the loop. ?>
			</div>
			<div class="clear"></div>
		<?php } ?>
	</div>

<?php get_footer(); ?>