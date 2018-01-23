<?php
/**
* Template Name: LA Home Page
*
* Description: Twenty Twelve loves the no-sidebar look as much as
* you do. Use this page template to remove the sidebar from any page.
*
* Tip: to remove the sidebar from all posts and pages simply remove
* any active widgets from the Main Sidebar area, and the sidebar will
* disappear everywhere.
*
* @package WordPress
* @subpackage Twenty_Twelve
* @since Twenty Twelve 1.0
*/

//wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/search.js', array( 'jquery' ), '2013-07-10' );

get_header(); ?>




	<div id="main">

		<div id="primary">
			<div id="content" class="fullWidth" role="main">




				<!-- CALS News Content Box -->
				<div class="row clearfix">

					<div class="span-50 box dropin">

							<h2>News</h2>

							
<?php query_posts("posts_per_page=1"); ?>
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post();  ?>

	<?php	if ( has_post_thumbnail() ) {

								//the_post_thumbnail();
								echo get_the_post_thumbnail($page->ID, 'large');

								} else {
							//echo "<img src='".get_template_directory_uri()."/images/newsplaceholder1.jpeg' alt=' '>";
							//echo '<img src="';
							echo catch_that_news_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
																						</div>
														<div class="topShade"></div>
							<div class="bottomShade"></div>






	<?php endwhile; ?>
<?php endif; ?>
<?php restore_current_blog(); wp_reset_query(); ?>
							<a href="/news" class="moreButton">More News</a>


						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>

					</div>

					<div class="span-50 box dropin2">
						<h2>Quick Links</h2>

							
<?php
				wp_reset_query();
				$my_query = new WP_Query( 'paged=' . get_query_var( 'page' ) );
				while ( $my_query->have_posts() ) : $my_query->the_post(); ?>

	<?php	if ( has_post_thumbnail() ) {

								//the_post_thumbnail();
								echo get_the_post_thumbnail($page->ID, 'large');

								} else {

							//echo '<img src="';
							echo catch_that_announcements_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<div class="spotlight_title links"><?php the_content(); ?> </div>
											
																						</div>
														<div class="topShade"></div>
							<div class="bottomShade"></div>






	<?php endwhile; ?>


							
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>
					</div>

				</div>





				<?php
				wp_reset_query();
				$my_query = new WP_Query( 'paged=' . get_query_var( 'page' ) );
				while ( $my_query->have_posts() ) : $my_query->the_post(); ?>


<?php if( have_rows('home_page_feature') ):

     // loop through the rows of data
    while ( have_rows('home_page_feature') ) : the_row();

        if( get_row_layout() == 'full_width_promotion' ): ?>

          <div class="row clearfix">




						<div class="span-100 box dropin">

							<?php if( function_exists('get_field') && get_sub_field('promotion_image') ):

								$attachment_id = get_sub_field('promotion_image'); $size = "large";
								$image = wp_get_attachment_image_src($attachment_id, $size);

								$backgroundImg = "background: url('" . $image[0] . "') no-repeat; background-size: auto 100%; background-position: center center";
								$slide = '<img height="' . $image[1] . '" width="' . $image[2] . '" src="' . $image[0] . '" alt=" ">';
								echo $slide;
							endif; ?>


							<div class="boxContent">
															<h3 class="spotlight_title"><a href="<?php the_sub_field('promotion_link'); ?>" rel="bookmark" title="Permanent Link to Title"><?php the_sub_field('promotion_title'); ?></a> </h3>
															<p><?php the_sub_field('promotion_caption'); ?></p>
																										</div>
																		<div class="topShade"></div>
											<div class="bottomShade"></div>









										<div class="windows8">
											<div class="wBall" id="wBall_1">
											<div class="wInnerBall">
											</div>
											</div>
											<div class="wBall" id="wBall_2">
											<div class="wInnerBall">
											</div>
											</div>
											<div class="wBall" id="wBall_3">
											<div class="wInnerBall">
											</div>
											</div>
											<div class="wBall" id="wBall_4">
											<div class="wInnerBall">
											</div>
											</div>
											<div class="wBall" id="wBall_5">
											<div class="wInnerBall">
											</div>
											</div>
										</div>

										<div class="shade"></div>

									</div>



          </div>

        <?php endif;




    endwhile;

else :

    // no layouts found

endif;

?>

<?php endwhile; // end of the loop. ?>





				<div class="row clearfix">

					<div class="span-33 box dropin3">
							<h2>Contour Issues</h2>

							
<?php $args = array( 'post_type' => 'contour', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					$loopcount = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php	if ( has_post_thumbnail() ) {

								//the_post_thumbnail();
								echo get_the_post_thumbnail($page->ID, 'large');

								} else {

							//echo '<img src="';
							echo catch_that_announcements_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
																						</div>
														<div class="topShade"></div>
							<div class="bottomShade"></div>






	<?php endwhile; ?>


							<a href="/contour" class="moreButton">More Contour Issues</a>
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>
					</div>

					<div class="span-33 box eventsBox dropin4">
							<h2>Featured</h2>

							
<?php $args = array( 'post_type' => 'monthlyfeature', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					$loopcount = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php	if ( has_post_thumbnail() ) {

								//the_post_thumbnail();
								echo get_the_post_thumbnail($page->ID, 'large');

								} else {

							//echo '<img src="';
							echo catch_that_announcements_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
																						</div>
														<div class="topShade"></div>
							<div class="bottomShade"></div>






	<?php endwhile; ?>


							<a href="/monthlyfeature" class="moreButton">More Featured</a>
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>

					</div>

					<div class="span-33 box dropin5">
							<h2>Council Ring</h2>

							
<?php $args = array( 'post_type' => 'council', 'posts_per_page' => 1 );
					$loop = new WP_Query( $args );
					$loopcount = 0;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

	<?php	if ( has_post_thumbnail() ) {

								//the_post_thumbnail();
								echo get_the_post_thumbnail($page->ID, 'large');

								} else {

							//echo '<img src="';
							echo catch_that_announcements_image();
							// echo '" alt="" />';

						} ?>
			<div class="boxContent">
											<h3 class="spotlight_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h3>
											<p><?php the_time('l, F jS, Y') ?></p>
																						</div>
														<div class="topShade"></div>
							<div class="bottomShade"></div>






	<?php endwhile; ?>


							<a href="/council" class="moreButton">More Council Ring</a>
						<div class="windows8">
							<div class="wBall" id="wBall_1">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_2">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_3">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_4">
							<div class="wInnerBall">
							</div>
							</div>
							<div class="wBall" id="wBall_5">
							<div class="wInnerBall">
							</div>
							</div>
						</div>

						<div class="shade"></div>
					</div>

				</div>

			</div><!-- #content -->

			<div class="clear"></div>
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>
