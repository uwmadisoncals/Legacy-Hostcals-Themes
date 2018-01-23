<?php
/*
Template Name: Faculty Page
*/


get_header(); ?>

<div id="main">

		<div id="primary">

			<div id="content" class="fullWidth facultyList" role="main">

				<header class="entry-header">
					<h1 class="entry-title">Faculty &amp; Staff</h1>
				</header>

				<!-- //////////////////////// FACULTY  //////////////////////////// -->

				<?php
				    $member_group_term = get_term_by('slug','faculty','faculty');

				    $member_group_query = new WP_Query( array(
				        'post_type' => 'faculty',
				        'posts_per_page' => '200',
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'faculty',
				                'field' => 'slug',
				                'terms' => array( $member_group_term->slug ),
				                'operator' => 'IN'
				            )
				        ),
				        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
				    ) );
				    ?>
				    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>

				    <?php
				    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post();  ?>
				        <div class="faculty">


				        <div class="personPhoto">

				        <a href="<?php the_permalink(); ?>">

				            <?php

				$image = get_field('profile_photo');
				$size = 'medium'; // (thumbnail, medium, large, full or custom size)

				if( $image ) {

				echo wp_get_attachment_image( $image, $size );

				} else { ?>

				              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">

				<?php } ?>


				        </a>
				        </div>

				<div class="text">

				  <div class="titleheading">
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				  <!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->

				    <div class="contactInfo">

				      <div class="officeLocation">
				        <?php the_field('title'); ?>
				      </div>

				      <div class="officePhone">
				        <?php the_field('area_of_study'); ?>
				      </div>

				      <div class="officeEmail">
				        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
				      </div>
				    </div>

				  </div>

				</div>

				    </div>
				    <?php endwhile; endif; ?>

				    <?php
				    // Reset things, for good measure
				    $member_group_query = null;
				    wp_reset_postdata();

				?>
				<!-- ///////////////////////// END ////////////////////////////////////// -->

				<!-- //////////////////////// EMERITUS FACULTY //////////////////////////// -->

				<?php
				    $member_group_term = get_term_by('slug','emeritus-faculty','faculty');

				    $member_group_query = new WP_Query( array(
				        'post_type' => 'faculty',
				        'posts_per_page' => '200',
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'faculty',
				                'field' => 'slug',
				                'terms' => array( $member_group_term->slug ),
				                'operator' => 'IN'
				            )
				        ),
				        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
				    ) );
				    ?>
				    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>

				    <?php
				    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post();  ?>
				        <div class="faculty">


				        <div class="personPhoto">

				        <a href="<?php the_permalink(); ?>">

				            <?php

				$image = get_field('profile_photo');
				$size = 'medium'; // (thumbnail, medium, large, full or custom size)

				if( $image ) {

				echo wp_get_attachment_image( $image, $size );

				} else { ?>

				              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">

				<?php } ?>


				        </a>
				        </div>

				<div class="text">

				  <div class="titleheading">
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				  <!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->

				    <div class="contactInfo">

				      <div class="officeLocation">
				        <?php the_field('title'); ?>
				      </div>

				      <div class="officePhone">
				        <?php the_field('area_of_study'); ?>
				      </div>

				      <div class="officeEmail">
				        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
				      </div>
				    </div>

				  </div>

				</div>

				    </div>
				    <?php endwhile; endif; ?>

				    <?php
				    // Reset things, for good measure
				    $member_group_query = null;
				    wp_reset_postdata();

				?>
				<!-- ///////////////////////// END ////////////////////////////////////// -->

				<!-- //////////////////////// AFFILIATE PROFESSORS //////////////////////////// -->

				<?php
				    $member_group_term = get_term_by('slug','affiliate-professors','faculty');

				    $member_group_query = new WP_Query( array(
				        'post_type' => 'faculty',
				        'posts_per_page' => '200',
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'faculty',
				                'field' => 'slug',
				                'terms' => array( $member_group_term->slug ),
				                'operator' => 'IN'
				            )
				        ),
				        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
				    ) );
				    ?>
				    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>

				    <?php
				    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post();  ?>
				        <div class="faculty">


				        <div class="personPhoto">

				        <a href="<?php the_permalink(); ?>">

				            <?php

				$image = get_field('profile_photo');
				$size = 'medium'; // (thumbnail, medium, large, full or custom size)

				if( $image ) {

				echo wp_get_attachment_image( $image, $size );

				} else { ?>

				              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">

				<?php } ?>


				        </a>
				        </div>

				<div class="text">

				  <div class="titleheading">
				  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				  <!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->

				    <div class="contactInfo">

				      <div class="officeLocation">
				        <?php the_field('title'); ?>
				      </div>

				      <div class="officePhone">
				        <?php the_field('area_of_study'); ?>
				      </div>

				      <div class="officeEmail">
				        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
				      </div>
				    </div>

				  </div>

				</div>

				    </div>
				    <?php endwhile; endif; ?>

				    <?php
				    // Reset things, for good measure
				    $member_group_query = null;
				    wp_reset_postdata();

				?>
				<!-- ///////////////////////// END ////////////////////////////////////// -->


<!-- //////////////////////// ACADEMIC STAFF //////////////////////////// -->

<?php
    $member_group_term = get_term_by('slug','academic-staff','faculty');

    $member_group_query = new WP_Query( array(
        'post_type' => 'faculty',
        'posts_per_page' => '200',
        'tax_query' => array(
            array(
                'taxonomy' => 'faculty',
                'field' => 'slug',
                'terms' => array( $member_group_term->slug ),
                'operator' => 'IN'
            )
        ),
        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
    ) );
    ?>
    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>

    <?php
    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post();  ?>
        <div class="faculty">


        <div class="personPhoto">

        <a href="<?php the_permalink(); ?>">

            <?php

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

echo wp_get_attachment_image( $image, $size );

} else { ?>

              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">

<?php } ?>


        </a>
        </div>

<div class="text">

  <div class="titleheading">
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->

    <div class="contactInfo">

      <div class="officeLocation">
        <?php the_field('title'); ?>
      </div>

      <div class="officePhone">
        <?php the_field('area_of_study'); ?>
      </div>

      <div class="officeEmail">
        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
      </div>
    </div>

  </div>

</div>

    </div>
    <?php endwhile; endif; ?>

    <?php
    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata();

?>
<!-- ///////////////////////// END ////////////////////////////////////// -->

<!-- //////////////////////// INTERNAL ADJUNCT/AFFILIATE STAFF //////////////////////////// -->

<?php
    $member_group_term = get_term_by('slug','internal-adjunct-affiliate-staff','faculty');

    $member_group_query = new WP_Query( array(
        'post_type' => 'faculty',
        'posts_per_page' => '200',
        'tax_query' => array(
            array(
                'taxonomy' => 'faculty',
                'field' => 'slug',
                'terms' => array( $member_group_term->slug ),
                'operator' => 'IN'
            )
        ),
        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
    ) );
    ?>
    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>

    <?php
    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post();  ?>
        <div class="faculty">


        <div class="personPhoto">

        <a href="<?php the_permalink(); ?>">

            <?php

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

echo wp_get_attachment_image( $image, $size );

} else { ?>

              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">

<?php } ?>


        </a>
        </div>

<div class="text">

  <div class="titleheading">
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->

    <div class="contactInfo">

      <div class="officeLocation">
        <?php the_field('title'); ?>
      </div>

      <div class="officePhone">
        <?php the_field('area_of_study'); ?>
      </div>

      <div class="officeEmail">
        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
      </div>
    </div>

  </div>

</div>

    </div>
    <?php endwhile; endif; ?>

    <?php
    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata();

?>
<!-- ///////////////////////// END ////////////////////////////////////// -->

<!-- //////////////////////// ADMINISTRATIVE STAFF //////////////////////////// -->

<?php
    $member_group_term = get_term_by('slug','administrative-staff','faculty');

    $member_group_query = new WP_Query( array(
        'post_type' => 'faculty',
        'posts_per_page' => '200',
        'tax_query' => array(
            array(
                'taxonomy' => 'faculty',
                'field' => 'slug',
                'terms' => array( $member_group_term->slug ),
                'operator' => 'IN'
            )
        ),
        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
    ) );
    ?>
    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>

    <?php
    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post();  ?>
        <div class="faculty">


        <div class="personPhoto">

        <a href="<?php the_permalink(); ?>">

            <?php

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

echo wp_get_attachment_image( $image, $size );

} else { ?>

              <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">

<?php } ?>


        </a>
        </div>

<div class="text">

  <div class="titleheading">
  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
  <!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->

    <div class="contactInfo">

      <div class="officeLocation">
        <?php the_field('title'); ?>
      </div>

      <div class="officePhone">
        <?php the_field('area_of_study'); ?>
      </div>

      <div class="officeEmail">
        <a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
      </div>
    </div>

  </div>

</div>

    </div>
    <?php endwhile; endif; ?>

    <?php
    // Reset things, for good measure
    $member_group_query = null;
    wp_reset_postdata();

?>
<!-- ///////////////////////// END ////////////////////////////////////// -->


		</div><!-- #content -->
			<?php //get_sidebar(); ?>
			<div class="clear"></div>

		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>
