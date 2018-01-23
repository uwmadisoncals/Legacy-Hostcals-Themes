<?php
/**
 * Display hours for local library site.
 */

$api_site_id = get_theme_mod('api_site_id');

get_header(); ?>
	<?php $rootpath = $_SERVER['DOCUMENT_ROOT']; ?>
	
	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>
		
		<?php if (get_theme_mod('api_site_id')):?>
			<div id="content" class="site-content local-site-content" role="main">
		<?php else: ?>
			<div id="content" class="site-content" role="main">
		<?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part('breadcrumb', 'menu'); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>

					
				</article>
				
	
			<?php endwhile; ?>
			</div>
		</div>
		
		<div class="right-Nav local-side-nav">	
			<div id="nav_sidebar">
				<div class="exploreMenu">
					<h3>Directory</h3>
					<ul id="nav_explore">
						<li>
	           				<a href="/about/directory/library-departments/">
		           				<span class="nav_arrow"><?php include("images/arrow-right-thin.svg"); ?></span>
		           				<span class="nav_text">Library Departments</span>
							</a>
	                     </li>
	                     <li>
	           				<a href="/about/directory/all-staff/">
		           				<span class="nav_arrow"><?php include("images/arrow-right-thin.svg"); ?></span>
		           				<span class="nav_text">All Staff</span>
							</a>
	                     </li>
					</ul>
				</div>   
			</div>
	
			<div class="highlights">
				<h3>Subject Librarians</h3>
				<p>Looking for a librarian specializing in a specific subject? </p>
				<p>Try <a href="/services/subject-librarian/"> searching by subject.</a> </p>
			</div>
		</div>
		<div class="clear"></div>

	</div>

<?php get_footer(); ?>