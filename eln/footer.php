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
		
        
	        <div class="copyright">
	        	<img src="<?php echo get_template_directory_uri(); ?>/images/uwlogo_small.png" alt="University of Wisconsin Madison" />
				<div class="uwaddress">
					<h4>University of Wisconsin - Madison <?php bloginfo('name'); ?></h4>
					<!--<address>
							<span>123 Street</span>
							<span class="bullet_img">Madison WI</span>
							<span class="bullet_img">53719</span>
					</address>
					<div class="phone">
						<span>Phone: (111) 111-1111</span>
						<span class="bullet_img">FAX: (111) 111-1111</span>
					</div>-->
	        		<div class="copyrightline">&copy; 2015. Board of Regents of the University of Wisconsin System.</div>
				</div>
	        </div>
	        
	        <div class="navcornerleft"></div>
	        <div class="navcornerright"></div>
	        <div class="poweredBy"><img src="<?php echo get_template_directory_uri(); ?>/images/pb_cals.png" alt="Powered by CALS"></div>
	        <div class="clearfix"></div>
		</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>