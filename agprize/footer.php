<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo" style="background-color:#3b2415; color:#FFFFFF; background-image:none; height:70px; padding-top:10px;">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/agprize/leaf.png" style="width:50px; padding-top:0px;" />
			<a href="http://wisc.edu" style="color:#FFFFFF; margin-top:10px;">&nbsp;&nbsp;&nbsp;&copy; 2013, Board of Regents of the University of Wisconsin System</a>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/agprize/twitter-bird-light-bgs.png" style="width:50px; padding-top:0px;" />
			<a href="http://twitter.com/Ag_Prize" style="color:#FFFFFF; margin-top:10px;">@Ag_Prize</a> &nbsp;&nbsp;&nbsp; <a href="https://twitter.com/search?q=%23agprize" style="color:#FFFFFF; margin-top:10px;">#AgPrize</a>
			&nbsp;&nbsp;&nbsp; <a href="https://www.facebook.com/AgriculturalInnovationPrize" style="color:#FFFFFF; margin-top:10px;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/agprize/FB-f-Logo__blue_50.png" style="width:35px; padding-top:0px;" /></a> 
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>