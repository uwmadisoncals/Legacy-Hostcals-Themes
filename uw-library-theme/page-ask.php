<?php
/**
 * The template for displaying ask pages
 *
 * This page must not be cached for very long, otherwise chat status won't show up
 * properly...
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
		<div id="content" class="site-content ask_content" role="main">
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<div class="entry-content">
						<div id="general-library-chat">
							<div class="chat-library"><strong>Need Help? <span class="mobile-hide">Ask a Librarian.</span></strong></div>
							<a href="#" class="chat-button offline" data-account="askuwlibrary" data-skin="134">  
								<span class="screen-reader-text">Chat with a Librarian</span>
							</a>
						</div>
						<a class="to_expand" href="#">Chat with a specific library.</a>
						<div class="expand_this" id="local_library_chat">
							<table>
								<tr>
									<td class="chat-library"><a href="http://business.library.wisc.edu/">Business Library</a></td>
									<td class="library-desc">Business</td>
									<td><a href="#" class="chat-button offline" data-account="askbusinesslibrary" data-skin="12568">
										<span class="screen-reader-text">Chat with a Business Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="/chemistry/">Chemistry Library</a></td>
									<td class="library-desc">Chemistry</td>
									<td><a href="#" class="chat-button offline" data-account="askchemistrylibrary" data-skin="141">
										<span class="screen-reader-text">Chat with a Chemistry Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="/college/">College Library</a></td>
									<td class="library-desc">Undergraduate</td>
									<td><a href="#" class="chat-button offline" data-account="askcollegelibrary" data-skin="140">
										<span class="screen-reader-text">Chat with a Helen C. White Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="http://ebling.library.wisc.edu/">Ebling Library</a></td>
									<td class="library-desc">Health Sciences</td>
									<td><a href="#" class="chat-button offline" data-account="askeblinglibrary" data-skin="12571">
										<span class="screen-reader-text">Chat with an Ebling Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="http://library.law.wisc.edu/">Law Library</a></td>
									<td class="library-desc">Law</td>
									<td><a href="#" class="chat-button offline" data-account="asklawlibrary" data-skin="12132">
										<span class="screen-reader-text">Chat with a Law Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="http://memorial.library.wisc.edu/">Memorial Library</a></td>
									<td class="library-desc">Humanities &amp; Social Sciences</td>
									<td><a href="#" class="chat-button offline" data-account="askmemoriallibrary" data-skin="138">
										<span class="screen-reader-text">Chat with a Memorial Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="http://merit.education.wisc.edu/Library/Overview.aspx">MERIT Library</a></td>
									<td class="library-desc">Education</td>
									<td><a href="#" class="chat-button offline" data-account="askmeritlibrary" data-skin="12569">
										<span class="screen-reader-text">Chat with a MERIT Librarian</span>
									</a></td>
								</tr>
								<tr>
									<td class="chat-library"><a href="http://slislib.library.wisc.edu/">SLIS Library</a></td>
									<td class="library-desc">School of Library &amp; Information Studies</td>
									<td><a href="#" class="chat-button offline" data-account="askslis" data-skin="147">
										<span class="screen-reader-text">Chat with a Steenbock Librarian</span>
									</a></td>							
								</tr>
								<tr>
									<td class="chat-library"><a href="/steenbock/">Steenbock Library</a></td>
									<td class="library-desc">Agriculture &amp; Life Sciences</td>
									<td><a href="#" class="chat-button offline" data-account="asksteenbocklibrary" data-skin="139">
										<span class="screen-reader-text">Chat with a Steenbock Librarian</span>
									</a></td>							
								</tr>
								<tr>
									<td class="chat-library"><a href="http://wendt.library.wisc.edu/">Wendt Library</a></td>
									<td class="library-desc">Engineering</td>
									<td><a href="#" class="chat-button offline" data-account="askwendtlibrary" data-skin="12128">
										<span class="screen-reader-text">Chat with a Wendt Librarian</span>
									</a></td>
								</tr>
							</table>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		</div>
		<div class="right-Nav ask-contact-info">
			<div class="highlights">
				<h3 class="screen-reader-text">More Options</h3>
				<ul class="ask-contact">
					<li><a href="/help/ask/email/"><?php include_svg("local_sites/email"); ?>Email</a></li>
					<li><a href="/help/ask/call/"><?php include_svg("local_sites/phone"); ?>Call / Text</a></li>
					<li><a href="/libraries/campus-libraries/"><?php include_svg("local_sites/home"); ?>Visit</a></li>
					<li><a href="/help/ask/appointment/"><?php include_svg("local_sites/calendar"); ?>Appointment</a></li>
				</ul>
				<ul class="ask-info">
					<li><a href="/ask/policy-hours/">Policy &amp; Hours</a></li>
					<li><a href="/help/ask/online-resources/">Online Resources</a></li>
					<li><a href="/services/subject-librarians/">Subject Librarians</a></li>
					<li><a href="/help/ask/technical-assistance/">Technical Assistance</a></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
<?php get_footer(); ?>