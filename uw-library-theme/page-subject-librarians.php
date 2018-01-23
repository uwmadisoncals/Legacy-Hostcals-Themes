<?php
/**
 * The template for staff directory.
 */

get_header(); ?>
	<div id="primary" class="content-area subject-librarians">
		<div id="content" class="site-content" role="main">	
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="entry-content" id="subject_list">
						<div class="searchContainer">
							<div class="spinner" id="floatingCirclesG" style="display: none;">
								<div class="f_circleG" id="frotateG_01"></div>
								<div class="f_circleG" id="frotateG_02"></div>
								<div class="f_circleG" id="frotateG_03"></div>
								<div class="f_circleG" id="frotateG_04"></div>
								<div class="f_circleG" id="frotateG_05"></div>
								<div class="f_circleG" id="frotateG_06"></div>
								<div class="f_circleG" id="frotateG_07"></div>
								<div class="f_circleG" id="frotateG_08"></div>
							</div>

							<input type="text" name="name" id="group_search" placeholder="Search for a librarian by subject">
						</div>
						
						<div id="group_status"></div>
						<div id="group_list">
							<?php print_lib_api("groups"); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="right-Nav">		
				<div class="highlights">
					<h3>Staff Directory</h3>
					<p>Looking for a specific librarian? </p>
					<p>Try <a href="/about/directory/"> searching the directory.</a> </p>
				</div>
		</div>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>