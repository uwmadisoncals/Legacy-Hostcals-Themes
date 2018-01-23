<?php
/**
 * Template Name: Secure Page
 */

// This redirects to https if not already on it.
if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
  // SSL connection
} else {
	// Non ssl connection
	$redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  header("Location: $redirect");
}

$content_class = $right_nav_class = "";
if(get_theme_mod('api_site_id')) {
	$content_class = " local-site-content";
	$right_nav_class = " local-side-nav";
}

get_header(); ?>
	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>
			<div id="content" class="site-content<?php echo $content_class; ?>" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . 'Pages:' . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div>
				</article>
			<?php endwhile; ?>
			</div>
		</div>
			<div class="right-Nav<?php echo $right_nav_class; ?>">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php 
				include('sidebar.php');
			?>
		<?php endwhile; // end of the loop. ?>
		</div>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>