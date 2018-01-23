<?php
/**
 * The template for the library directory.
 * This loads data from the API via PHP, and cache must be refreshed daily to get new hours information.
 */

get_header(); ?>
	<div id="primary" class="content-area campus-map">
		<div id="content" class="site-content" role="main">
			<div class="startingOverlay">
				<div class="messaging">
					<h2><?php include("images/arrow-left-thin.svg"); ?> Select a Library</h2>
				</div>
			</div>
			<div id="map-canvas"></div>
			<div class="libraryDropdown">
				<div class="list">
					<?php print_lib_api("libraries");?>
				</div>
			</div>		
			<div id="lib-map-info">
				<?php while ( have_posts() ) : the_post();
					get_template_part('breadcrumb', 'menu'); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<header class="entry-header">
							<div id="libraryinfo" class="libraryInfo"></div>
							<a href="#" class="librariesButton button white">Campus Libraries <span><?php include("images/arrow-down-thin.svg"); ?></span></a>
						</header>
	
						<div class="entry-content">
							<div id="librarylist" class="search_options"></div>
						</div>
	
					</article>
	
				<?php endwhile; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>