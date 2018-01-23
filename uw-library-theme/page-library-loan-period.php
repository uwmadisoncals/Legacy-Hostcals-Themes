<?php
/**
 *  Page lay out for loan periods at local sites
 */

// 56 is the id of General Library System
$api_site_id = get_theme_mod('api_site_id', "56");
$content_class = "";
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
					<div class="entry-content">
						<div id="loan_period_container">
						<a href="#" class="truncate loan_period_select"><span>Who are you?</span>
						 <?php
						    $path = $rootpath . "/assets/img/arrow-down.svg";
						    include($path); 
						 ?>
						</a>
						<?php print_lib_api("locations/$api_site_id/loans"); ?>
						</div>
					</div>
					<div id="libInfo" class="entry-content"></div>
				</article>
				
			<?php endwhile; ?>
		</div>
	</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>