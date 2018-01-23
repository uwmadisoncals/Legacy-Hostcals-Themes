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
		<div class="ieFooter">
		<div class="inner">
			<div id="pre-footer">




        <div class="copyright">
        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/footercrest3.png" alt="University of Wisconsin Madison" align="center" />
        	<div>&copy;Copyright 2015 The Board of Regents of the University of Wisconsin System <a href="http://wisc.edu">University of Wisconsin-Madison</a></div>



        </div>

        <div class="socialRef">
			<a href="https://twitter.com/WisconsinLaw" title="Follow Us on Twitter" class="twitter">Twitter</a>
			
			<a href="https://www.youtube.com/user/WisconsinLaw" title="Our latest videos" class="youtube">Youtube</a>
			<a href="https://www.facebook.com/uwlaw" title="Like us on Facebook" class="facebook">Facebook</a>

		</div>
			<div class="clearfix"></div>
        </div>


			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with four columns of widgets.
				 */

					get_sidebar( 'footer' );
			?>
		</div>
	</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


 <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/min/master.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.simpleWeather.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/dysci.js"></script>



</body>
</html>
