<?php
/**
 * Template for Library Hours
 */

$date = get_query_var("date"); 

// Don't cache for very long if a date is not set.
if($date == "") {
	// Cache for 30 minutes.
	header('Cache-Control: s-maxage=1800');
}

get_header(); ?>

	<div id="primary" class="content-area content-hours">
		<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="entry-content">
						<div id="datepicker">
							<a href="/libraries/hours/" id="todayDt">Today</a>
						</div>
						<div class="library_hours_details">
							<a href="#" class="display-all-hours">Show Closed Libraries</a>
							<?php  print_lib_api("hours/".$date); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>