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
				<p>You can help support AgrAbility 
 by making a gift to the 
University of Wisconsin Foundation.</p>
				<a href="http://www.supportuw.org/giveto/AgrAbility" class="button">Make a Gift</a>
				<p class="address">AgrAbility of Wisconsin | Agricultural Engineering | 460 Henry Mall | Madison, WI 53706 | 608.262.9336 | <a href="mailto:aaw@mailplus.wisc.edu">aaw@mailplus.wisc.edu</a></p>
			</div>
			<div class="clearfix"></div>
        </div>
        
        <div class="relative">
        <div class="copyright">
        	<img src="<?php echo get_template_directory_uri(); ?>/images/footercrest.png" alt="University of Wisconsin Madison" />
        	<div>&copy; Copyright 2015 The Board of Regents of the University of Wisconsin System</div>
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
			<a href="https://twitter.com/AgrAbilityWI" class="twitter">Twitter</a>
		
			<a href="https://www.facebook.com/agrabilityofwi" class="facebook">Facebook</a>
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
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/twitterFetcher_v10_min.js"></script>
  
  <script src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/owl-carousel/owl.carousel.js"></script>
<script>
$(document).ready(function() {
 
  $("#owl-carousel").owlCarousel({
	  navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
      autoPlay : 8000
  });
 
});

</script> 
</body>
</html>