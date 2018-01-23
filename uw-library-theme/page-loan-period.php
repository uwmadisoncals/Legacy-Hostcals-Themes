<?php
/**
 * Template Name: Loan Period Page
 */

// 56 is the id of General Library System
$api_site_id = get_theme_mod('api_site_id', "56");
$content_class = $right_nav_class = "";
if($api_site_id != "56") {
	$content_class = " local-site-content";
	$right_nav_class = " local-side-nav";
}

get_header(); ?>
	<?php $rootpath = $_SERVER['DOCUMENT_ROOT']; ?>
	
	<div id="primary" class="content-area loan-period-page">
		<?php get_template_part('local-heading', 'menu'); ?>
			<div id="content" class="site-content<?php echo $content_class; ?>" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php $title = get_the_title(); ?>
						<h2 class="entry-title"><?php echo $title; ?></h2>
					</header>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</article>
				
			<?php endwhile; ?>

		</div>
		<div class="right-Nav<?php echo $right_nav_class; ?>">
		<div class="highlights">
			<h3>What's your loan period?</h3>
			<div id="loan_period_container">
				
				<a href="#" class="truncate loan_period_select"><span>Select a Library<span class="screen-reader-text"> to view the loan periods</span></span>
					 <?php
					    $path = $rootpath . "/assets/img/arrow-down.svg";
					    include($path); 
					 ?>
				</a>

				<?php
					// Determine the patron class
					// This must match the wordpress title of the page.
					switch($title) {
						case "UW-Madison Faculty &amp; Staff":
							$patron_class = "1";
							break;
						case "UW-Madison Graduate Students":
							$patron_class = "2";
							break;
						case "UW-Madison Undergraduates &amp; Special Students":
							$patron_class = "3";
							break;
						case "UW-Madison Affiliates":
							$patron_class = "4";
							break;
						case "UW-Madison Other Appointments":
							$patron_class = "5";
							break;
						case "UW-Madison Alumni":
							$patron_class = "6";
							break;
						case "UW System Faculty &amp; Staff":
							$patron_class = "7";
							break;
						case "UW System Students":
							$patron_class = "8";
							break;
						case "Friends of the Library":
							$patron_class = "9";
							break;
						case "Courtesy Card Holders":
							$patron_class = "10";
							break;
						case "Annual Fee Card Holders":
							$patron_class = "11";
							break;
						default:
							$patron_class = "1";
					}
				?>

				<?php print_lib_api("loans/$patron_class"); ?>
			</div>
			<div id="libInfo"></div>
		</div>
	</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>