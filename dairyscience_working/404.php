<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */

get_header(); ?>

<div class="mobileScroll">
<a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>

	<div id="main">

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title">Something is amiss...</h1>
					<!--<h2>This site has recently been redesigned and restructured to make content easier to find.  A brief search should do the trick.</h2>-->
				</header>

				<div class="entry-content">
					<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching, or one of the links below, can help.', 'twentyeleven' ); ?></p>

					<?php get_search_form(); ?>

<div class="widget">
						<h2 class="widgettitle">Site Structure Guide</h2>
						<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'footer1' ) ); ?>
						<?php wp_nav_menu( array( 'theme_location' => 'footer2' ) ); ?>
						</ul>
					</div>
						
					<?php the_widget( 'WP_Widget_Recent_Posts', array( 'number' => 10 ), array( 'widget_id' => '404' ) ); ?>

					<div class="widget" style="margin-right: 0px;">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'twentyeleven' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>
					
					
					
					

					<?php //the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->
	<div class="clear"></div>
	</div>
<?php get_footer(); ?>

</div>