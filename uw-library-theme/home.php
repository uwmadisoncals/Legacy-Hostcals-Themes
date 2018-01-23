<?php
/**
 *
 * This is the layout for the homepage of the uw-madison library
 * website. 
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

// Pull in promotion data, build up a slides array.
include("promotions.php");

get_header(); ?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div id="homemain">
				<div class="primarySearchContainer slideDown cf">
					<div class="leftCol">
						<div class="searchSelect">
							<a href="#catalog" class="selected_search button"><span class="btnLabel">Catalog</span> <img alt="Click to see more options" class="dropdownImg" src="<?php echo get_stylesheet_directory_uri(); ?>/images/arrow_down.svg"></a>
							<div class="search_options"><ul>
								<li><a href="#articles" class="article_search"><span class="title">Articles</span> <span class="example">Find magazine, newspaper, and scholarly articles</span></a></li>
								<li><a href="#catalog" class="catalog_search"><span class="title">Catalog</span> <span class="example">Explore books, music, movies, and more</span></a></li>
								<li><a href="#databases" class="database_search"><span class="title">Databases</span> <span class="example">Locate databases by title and description</span></a></li>
								<li><a href="#journals" class="journal_search"><span class="title">Journals</span> <span class="example">Find journals by exact title</span></a></li>
								<li><a href="#worldcat" class="worldcat_search"><span class="title">WorldCat</span> <span class="example">Search the collections of libraries worldwide</span></a></li>
							</ul></div>
						</div>
						<div class="searchFormsContainer">
							<div id="catalog_search" class="searchForms">
								<form action="http://search.library.wisc.edu/catalog" method="post" autocomplete="off">
									<input name="search_field" value="all_fields" type="hidden"><input type="text" placeholder="Explore books, music, movies, and more" class="searchInput" name="q">
									<div class="advancedSearchContainers cf"><ul>
										<li><a href="http://search.library.wisc.edu/advanced">Advanced Search</a></li>
										<li><a href="http://search.library.wisc.edu/?uwsystem=on">Search UW System</a></li>
									</ul></div>
									<input type="submit" class="searchButton" value="Search">
								</form>
							</div>
							<div id="database_search" class="searchForms">
								<form method="get" action="http://xerxes.library.wisconsin.edu/wisc/" autocomplete="off">
									<input name="base" value="databases" type="hidden"><input name="action" value="find" type="hidden"><input id="database-input" class="searchInput" placeholder="Locate databases by title and description" type="text" name="query">
									<div class="advancedSearchContainers cf"><ul>
										<li><a href="http://xerxes.library.wisconsin.edu/wisc/?base=databases&amp;action=categories">Browse by Subject</a></li>
										<li><a href="/introductory-databases/">Introductory Databases</a></li>
										<li><a href="/top-10-databases/">Top 10 Databases</a></li>
									</ul></div>
									<input type="submit" class="searchButton" value="Search">
								</form>            
							</div>
							<div id="journal_search" class="searchForms">
								<form action="http://sfx.wisconsin.edu/wisc/" method="get" autocomplete="off">
									<input type="hidden" name="url_ver" value="Z39.88-2004"><input type="hidden" name="url_ctx_fmt" value="info:ofi/fmt:kev:mtx:ctx"><input type="hidden" name="ctx_ver" value="Z39.88-2004"><input type="hidden" name="rfr_id" value="info:sid/sfxit.com:citation"><input type="hidden" name="rft_val_fmt" value="info:ofi/fmt:kev:mtx:journal"><input type="hidden" name="rft.genre" value="journal"><input type="hidden" name="__base_url" value="/wisc"><input type="hidden" name="__citation_form" value="journal"><input type="hidden"  name="sfx.title_search" value="exact"><input id="journal-input" type="text" name="rft.jtitle" value="" class="searchInput"  placeholder="Find journals by exact title">
									<div class="advancedSearchContainers cf"><ul>
										<li><a href="http://sfx.wisconsin.edu/wisc/az?param_perform_value=searchCategories">Browse by Subject</a></li>
										<li><a href="http://digital.library.wisc.edu/1711.web/ejournals">Browse by Title</a></li>
										<li><a href="http://sfx.wisconsin.edu/wisc/cgi/core/citation-linker.cgi?rft.genre=journal">Citation: Find It</a></li>	
									</ul></div>
									<input type="submit" class="searchButton" value="Search">
								</form>
							</div>
							<div id="article_search" class="searchForms">
								<form method="post" action="http://ezproxy.library.wisc.edu/form?qurl=http%3a%2f%2fuw-primo.hosted.exlibrisgroup.com%2fprimo_library%2flibweb%2faction%2fdlSearch.do" id="simple" autocomplete="off" onsubmit="searchPrimo();">
										<input name="displayMode" value="full" type="hidden"><input name="group" value="GUEST" type="hidden"><input name="institution" value="WISC" type="hidden"><input name="onCampus" value="true" type="hidden"><input name="search_scope" value="WISC_PCI" type="hidden"><input name="vid" value="WISC" type="hidden"><input type="hidden" id="primoQuery" name="query"><input type="text"  id="primoQueryTemp" class="searchInput"  placeholder="Find magazine, newspaper and scholarly articles" value="" name="queryTemp">
									<div class="advancedSearchContainers cf">
										<ul><li><a href="http://ezproxy.library.wisc.edu/login?url=http://uw-primo.hosted.exlibrisgroup.com/primo_library/libweb/action/search.do?vid=WISC&amp;ct=AdvancedSearch&amp;mode=Advanced">Advanced Search</a></li>
										<li><a href="http://sfx.wisconsin.edu/wisc/cgi/core/citation-linker.cgi?rft.genre=journal">Citation: Find It</a></li>
										<li><a href="/find/introductory-databases/">Introductory Databases</a></li>
									</ul>
									</div>
									<input type="submit" class="searchButton" value="Search">
								</form>            
							</div>
							<div id="worldcat_search" class="searchForms">
								<form action="http://worldcat.org.ezproxy.library.wisc.edu/search" method="get" id="wcfn" enctype="application/x-www-form-urlencoded" autocomplete="off">
									<input value="affiliate" name="qt" type="hidden"><input id="q" name="q" class="searchInput" type="text" placeholder="Search the collections of libraries worldwide">
									<div class="advancedSearchContainers cf"><ul>
										<li><a href="http://www.worldcat.org.ezproxy.library.wisc.edu/advancedsearch">Advanced Search</a></li>
										<li><a href="http://ezproxy.library.wisc.edu/login?url=http://firstsearch.oclc.org/fsip?dbname=worldcat&amp;screen=advanced&amp;done=http://www.library.wisc.edu/">FirstSearch</a></li>
									</ul></div>
									<input type="submit" class="searchButton" value="Search">
								</form>
							</div>
						</div>
						<div class="resourceLinks"><ul class="cf">
							<li><a href="/libraries/hours"><?php include_svg("local_sites/clock"); ?> <span>Library Hours</span></a></li>
							<li><a href="/libraries/library-study-rooms/"><?php include_svg("local_sites/lamp"); ?> <span>Study Rooms</span></a></li>
							<li><a href="/events/"><?php include_svg("local_sites/calendar"); ?> <span>Events <span class="hide-in-mobile">&amp; Workshops</span></span></a></li>
						</ul></div>
					</div>
					<div class="rightCol"><ul class="cf">
						<li><a href="/services/borrow-renew-request/">Borrow, Renew, Request</a></li>
						<li><a href="/services/course-reserves-materials/">Course Reserves &amp; Materials</a></li>
						<li><a href="http://researchguides.library.wisc.edu/">Research Guides</a></li>
						<li><a href="/top-10-databases/">Top 10 Databases</a></li>
					</ul></div>
					<div class="clear"></div>
					<?php include("library_alerts.php"); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="scrollArrow"><a href="#" class="scrollArrowContainer"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32" enable-background="new 0 0 32 32" xml:space="preserve"><g><path fill="#4E4E50" class="scrollfill" d="M32,15.998C32,7.164,24.836,0,16,0S0,7.164,0,15.998C0,24.836,7.164,32,16,32S32,24.836,32,15.998z M8,16.029h6V8h4v8.029h5.969L16,24L8,16.029z"/></g></svg></a></div>	
	<div class="homePageSlidesImages"><div class="homeFeatures"><div class="homePageSlides"><ul id="slidelist"></ul></div></div><div class="slidesCover"></div></div>
<script>var slides = <?php echo $promoSlides; ?>;
	slides.sort(function() { return 0.5 - Math.random() });	document.getElementById('slidelist').innerHTML = slides.join('');
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>