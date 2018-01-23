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
        	
                	<?php
						/* A sidebar in the footer? Yep. You can can customize
						 * your footer with four columns of widgets.
						 */
						
							get_sidebar( 'footer' );
					?>
       	                  <div class="clearfix"></div>
        </div>
        
        <div class="copyright">
        	<div>&copy;Copyright 2013. All rights reserved. College of Agricultural and Life Sciences - University of Wisconsin-Madison.</div>
	        <img src="<?php echo get_template_directory_uri(); ?>/images/uwcrest_footer.png" alt="University of Wisconsin Madison" align="center" />
        </div>
			
		</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>