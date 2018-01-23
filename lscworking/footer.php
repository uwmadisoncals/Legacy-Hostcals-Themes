<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
		<div class="inner">
			<div id="pre-footer">
			<div class="linksContainer">
			<h3>Resources</h3>
        	<?php
						/* A sidebar in the footer? Yep. You can can customize
						 * your footer with four columns of widgets.
						 */

							get_sidebar( 'footer' );
					?>            <div class="clearfix"></div>
			</div>
			<div class="linksContainer right">
				<h3>Support</h3>
				<p>You can help support Life Sciences
Communication by making a gift to the
University of Wisconsin Foundation.</p>
				<a href="https://www.myuwconnect.org/give?id=984FE62C-0739-438F-B9D9-A97E2FFFD61B" class="button">Make a Gift</a>
				<p class="address">Department of Life Sciences Communication | Hiram Smith Hall | 1545 Observatory Drive | Madison, WI 53706 | 608.262.1464 </p>
			</div>
			<div class="clearfix"></div>
        </div>

        <div class="relative">
        <div class="copyright">
        	<img src="<?php echo get_template_directory_uri(); ?>/images/footercrest.png" alt="University of Wisconsin Madison" />
        	<div>&copy; Copyright <?php echo date("Y"); ?> The Board of Regents of the University of Wisconsin System</div>
        	<a href="http://www.wisc.edu">University of Wisconsin Madison</a>
	        <!--<img src="<?php echo get_template_directory_uri(); ?>/images/uwcrest_footer.png" alt="University of Wisconsin Madison" align="center" />  -->
            <div class="soc_icon_group"></div>
			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with four columns of widgets.
				 */

					get_sidebar( 'footer' );
			?>
		</div>
		<div class="socialRef">
			<a href="https://twitter.com/uw_lsc" class="twitter">Twitter</a>

			<a href="https://www.facebook.com/UWMadisonLSC" class="facebook">Facebook</a>

			<a href="https://www.instagram.com/uwmadison_lsc/" class="instagram">Instagram</a>
		</div>
			<div class="clearfix"></div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.7.1.min.js"></script>
 <!--<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery_easing.js"></script>-->
 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.iosslider.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.isotope.min.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-css-transform.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-rotate.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/browserdetect.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mainactions.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/twitterfetcher_v17.js"></script>
</body>
</html>
