<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

// Contents of the page may only change when content changes.
// however we have no good "global content change" hook. As a result we'll
// only cache search results for 30 minutes.
header('Cache-Control: s-maxage=1800');

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2 class="page-title"><?php printf('Search Results for: <span>%s', get_search_query(), '</span>' ); ?></h2>
			</header>

			<?php while ( have_posts() ) : the_post(); ?>
				<div class="search-results">
					<?php get_template_part( 'content', get_post_format() ); ?>
				</div>
			<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div>
	</div>

<?php get_footer(); ?>