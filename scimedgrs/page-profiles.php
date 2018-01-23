<?php
/**
 * Template Name: Profiles
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">
				<div id="prof_s_wrapper" ><input id="prof_s" class="field" type="text" placeholder="Search Profiles" name="s_profiles"></div>

				<?php $args = array( 'post_type' => 'student_profiles', 'meta_key' => 'last_name', 'posts_per_page' => 200, 'orderby' => 'last_name', 'order' => 'ASC' );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php get_template_part( 'content', 'profiles' ); ?>

					

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>