<?php
/*
Template Name: CALS Directory Search
*/
get_header(); ?>


	<div id="main">

		<div id="primary">
		
			<div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="entry-title"><?php the_title(); ?></h1>
					<div class="entry-content">
						<h2>CALS Directory Search <small class="small_title">(Powered by <a href="http://www.wisc.edu/directories/" title="Link to UW-Madison Directory Search" target="_blank">UW-Madison Directory Search</a>)</small></h2>
						<?php the_content(); ?>
                        <?php cals_uw_directory_search(); ?>
                        <div class="mainResults"></div>
						<?php get_template_part('nav_menu', 'explore');?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
                    </div><!-- .entry-content -->
				</div><!-- #post-## -->
<?php endwhile; ?>

			</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>
</div>