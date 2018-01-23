<?php
/**
 * The Homepage widget areas.
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>
<div class="homeSidebar">

<div class="newsItem homewidget">
	<div class="previousa">
		<div class="titleheading">
			<h3>Recent Publications</h3>
		</div>
		<ul>


		<?php
// The Query
query_posts( array( 'post_type' => 'publications','posts_per_page' => 4 ) );

// The Loop
while ( have_posts() ) : the_post();
    echo '<li>';

       the_content();

    echo '</li>';
endwhile; ?>


<?php // Reset Query
wp_reset_query();
?>

					</ul>
	</div>
  <a href="<?php echo site_url(); ?>/publications" class="moreButton"><strong>+</strong> More Publications</a>
</div>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'sidebar-2'  )

	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

	<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>

		<?php dynamic_sidebar( 'sidebar-2' ); ?>

	<?php endif; ?>

</div>
