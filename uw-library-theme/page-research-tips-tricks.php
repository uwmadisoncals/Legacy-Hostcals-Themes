<?php


get_header(); ?>

<div id="primary" class="content-area nav-page">
	<div id="content" class="site-content" role="main">
		<?php get_template_part('breadcrumb', 'menu'); ?>
		
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header top-page">
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</header>

			<div class="entry-content">
				<div class="topExploreMenu">
					<ul id="nav_explore" class="twoColumns">
						<li>
							<a href="/help/research-tips-tricks/get-started/">
				           		<div class="heading">Get Started</div>
								<p>This page will help in choosing or narrowing your topic, choosing the right sources, and finding background information</p>
							</a>
						</li>
						<li>
							<a href="/help/research-tips-tricks/find-books/">
				           		<div class="heading">Find Books</div>
								<p>This page will provide help to find books by title, author, and generally on your topic</p>
							</a>
						</li>
						<li>
							<a href="/help/research-tips-tricks/find-articles/">
				           		<div class="heading">Find Articles</div>
								<p>Provides help finding articles when you have a citation, when starting searching on a particular topic, and to identify scholarly articles</p>
							</a>
						</li>
						<li>
							<a href="/help/research-tips-tricks/evaluate-sources/">
				           		<div class="heading">Evaluate Sources</div>
								<p>This page provides help supporting your conclusions, judging reliability and relevance of sources, and explaining the the differences between popular and scholarly articles</p>
							</a>
						</li>
						<li>
							<a href="/help/research-tips-tricks/cite-sources/">
				           		<div class="heading">Cite Sources</div>
								<p>This page provides help in noting what information to include in citations, selecting a citation style, and offering popular citation managers</p>
							</a>
						</li>
						<li>
							<a href="/help/research-tips-tricks/intro-to-libraries/">
				           		<div class="heading">Online Workshop: Introduction to the Libraries</div>
								<p>This online workshop comprised of several videos will teach you how to find resources via the UW-Madison Libraries. Additionally, we’ll orient you to tools and services that will make you an efficient researcher</p>
							</a>
						</li>
					</ul>
				</div>   
			</div>
		</article>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>