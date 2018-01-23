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
			<h3>Publications</h3>
		</div>
		<ul>
		<li>
			<a href="#">Publication 1</a>
		</li>
		
		<li>
			<a href="#">Publication 2</a>
		</li>
		
		<li>
			<a href="#">Publication 3</a>
		</li>
		</ul>
		
	</div>
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