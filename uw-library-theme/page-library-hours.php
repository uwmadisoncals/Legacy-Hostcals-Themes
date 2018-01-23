<?php
/**
 * Display hours for local library site.
 */

// 56 is the id of General Library System
$api_site_id = get_theme_mod('api_site_id', "56");
$content_class = $right_nav_class = "";
if($api_site_id != "56") {
	$content_class = " local-site-content";
}

get_header(); ?>
	<?php $rootpath = $_SERVER['DOCUMENT_ROOT']; ?>
	
	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>		
			<div id="content" class="site-content<?php echo $content_class; ?>" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div id="local-site-hours" class="entry-content">
						<div class="regular_hours">
							<?php print_lib_api("locations/$api_site_id/terms"); ?>
							<!--<div class="expand_this" aria-live="polite">-->
						</div>	
					</div>
				</article>
			<?php endwhile; ?>
			</div>
		</div>
		
		<div class="right-Nav local-side-nav" id="local_hours">
			<div id="nav_sidebar">
				<h3>Upcoming Hours</h3>
				<?php print_lib_api("locations/$api_site_id/days"); ?>
				<a href="/libraries/hours/">More Hours</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>