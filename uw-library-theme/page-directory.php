<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">	
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>	
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					
					<div class="entry-content directorySearch">
					
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
							<input type="text" name="name" id="staff_search" placeholder="Search for library staff by name">
						</div>
						<div id="staff_status"></div>
						<div id="staff_list"></div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="right-Nav">	
			<div id="nav_sidebar">
				<div class="exploreMenu">
					<h3>Directory</h3>
					<ul id="nav_explore">
						<li>
	           				<a href="/about/directory/staff-by-location/">
		           				<span class="nav_arrow"><?php include("images/arrow-right-thin.svg"); ?></span>
		           				<span class="nav_text">Staff by Location</span>
							</a>
	                     </li>
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
					</ul><!-- #nav_explore --> 
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