<?php
/**
 * The template for Library by Feature.
 */

get_header(); ?>
	<div id="primary" class="content-area find-a-library">
		<div id="content" class="site-content" role="main">
			<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="row filterOptions cf">
						<div id="features-options" class="span-33 libraryDropdown">
							<h3>Show libraries with...</h3>
							<div class="list">
								<?php print_lib_api("features");?>
							</div>
						</div>
						<div class="span-66 librariesList">
							<?php print_lib_api("libfeatures");?>
						</div>
					</div>
				</article>
		</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>
			