<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<header class="page-header">
				<h2 class="page-title">Something is misplaced...</h2>
			</header>

			
				<div class="entry-content">
					<p>It seems we can’t find what you’re looking for. Perhaps try searching or <a href="help/ask/">Ask a Librarian</a> </p>
					<?php get_search_form(); ?>
				</div>
				
				<div class="aside">
					<p>Pages look diff'rent. <br/> Things familiar are gone. <br/>Go, please, ask for help</p>
					<p class="right">-- Edie Dixon</p>
				</div>

		</div>
	</div>

<?php get_footer(); ?>