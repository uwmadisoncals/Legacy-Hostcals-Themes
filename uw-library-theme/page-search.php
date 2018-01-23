<?php
/**
 * This is the layout for the search results page for Libraries
 */

// Contents of the page may only change when content changes.
// however we have no good "global content change" hook. As a result we'll
// cache search results for 24 hours
header('Cache-Control: s-maxage=86400');

get_header(); 

// eventually we'll want to add support for image search, faceting, etc.

// Grab relevant params to pass along.
$results = "";
$user_query = "";
if(isset($_GET["q"]) && $_GET["q"] != "") {
	$qstring = "search?q=" . urlencode($_GET["q"]);
	$user_query = htmlspecialchars($_GET["q"]);
	if(isset($_GET["start"])) {
		$qstring .= "&start=" . urlencode($_GET["start"]);
	}
	if(not_bot($_SERVER['HTTP_USER_AGENT'])) {
		$results = lib_api($qstring);	
	}
}
?>
<div id="primary" class="content-area search-page">
	<div id="content" class="site-content" role="main">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title">Search the Library</h2>
					</header>
					<div class="entry-content">
						<div class="search_box" id="search_page_box">
							<form role="search" method="get" class="search-form" action="/search/">
								<label>
									<span class="screen-reader-text">Search for:</span>
									<input type="text" id="main_sitesearch" class="search-field" placeholder="Search &hellip;" value="<?php echo $user_query; ?>" name="q">
								</label>
								<input type="submit" class="search-submit" value="Search">
							</form>
						</div>
						<div class="search_results">
							<?php print($results); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
	</div>
	<div class="clear"></div>
</div>
<?php get_footer(); ?>