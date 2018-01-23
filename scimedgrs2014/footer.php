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
		<div class="inner clearfix">
		
        
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
	        <div class="donateContainer">
	        <p>You can help support the SciMed Graduate Research Scholars Program by making a gift to the University of Wisconsin Foundation.</p>
	        <a href="http://www.supportuw.org/giving?seq=8088" class="button blue" target="_blank">Make a gift</a>
	        </div>
	        <!--<div class="poweredBy"><img src="<?php echo get_template_directory_uri(); ?>/images/pb_cals.png" alt="Powered by CALS"></div>-->
	        <div class="clearfix"></div>
		</div>
			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-55729435-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>