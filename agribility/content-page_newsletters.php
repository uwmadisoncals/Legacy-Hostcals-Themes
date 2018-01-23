<?php
/**
 * The template used for displaying page content in page.php
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
		<div class="newsletterRow">
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<div class="newsletterDate"><?php the_date(); ?></div>
		</div>
	

	
</article><!-- #post-<?php the_ID(); ?> -->
