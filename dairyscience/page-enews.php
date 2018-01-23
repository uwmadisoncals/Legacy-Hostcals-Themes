<?php
/**
 * Template Name: eNews Form
 *
 */

get_header(); ?>


	<div id="main">

		<div id="primary">
		
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
				
					

					<?php get_template_part( 'content', 'page' ); ?>
					
					<form action="http://uwmadisondepartmentofdairyscience.createsend.com/t/t/s/iykjll/" method="post">
    <p>
        <label for="fieldName">Name</label><br />
        <input id="fieldName" name="cm-name" type="text" />
    </p>
    <p>
        <label for="fieldEmail">Email</label><br />
        <input id="fieldEmail" name="cm-iykjll-iykjll" type="email" required />
    </p>
    <p>
        <button type="submit">Subscribe</button>
    </p>
</form>

					<?php get_template_part('nav_menu', 'explore');?>

					<?php //comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
			<?php get_sidebar(); ?>
			<div class="clear"></div>
			
		</div><!-- #primary -->

	</div>
<?php get_footer(); ?>

</div>