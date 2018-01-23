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

$content_class = "";
if(get_theme_mod('api_site_id')) {
	$content_class = " local-site-content";
}

get_header(); ?>
	<div id="primary" class="content-area">
		<?php get_template_part('local-heading', 'menu'); ?>
			<div id="content" class="site-content<?php echo $content_class; ?>" role="main">
		
			<?php get_template_part('breadcrumb', 'menu'); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<h2 class="entry-title"><?php the_title(); ?></h2>
					</header>
					<div class="entry-content">
<script>
var openURL = document.referrer;

function editOpenURL() {
	var editedOpenURL = openURL.replace("sid=sfx:citation", "sid=sfx:bookmark");

	if (editedOpenURL)	{
		document.write('<br />' +
		'<form action="http://tinyurl.com/create.php" method="post">' +
		'<textarea name="url" rows="4" cols="80">' + editedOpenURL + '</textarea><br /><br />' +
		'<p><strong><em>OR</em></strong> make the Permalink a TinyURL (shortened link):<br /><br /></p>' + 
		'<p><input type="submit" name="submit" value="Make a TinyURL"><br /><br /></p>' +
		'</form>');
	}
}
editOpenURL();
</script>
					</div>
				</article>
			</div>
		<div class="clear"></div>
	</div>

<?php get_footer(); ?>