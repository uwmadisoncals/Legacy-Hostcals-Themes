<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>
		</div>
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="copyright">
					<div class="contact-info">
						<img src="/wp-content/themes/library-wp-theme/images/uwcrest_footer.png" alt=" " height="74">
						<div class="uwaddress"><h3>UW&dash;Madison Libraries</h3>
							<a href="http://www.wisc.edu/"> University of Wisconsin-Madison</a>
							<address><span class="street">728 State Street</span>
									<span><span class="mobile-hide">&bull;</span> Madison WI</span>
									<span>&bull; 53706</span></address>
							<div class="phone">(608) 262-3193</div>
							<div class="links"><a href="/help/contact/">Contact Us</a>
								<span class="mobile-hide">&bull;</span> <a href="/accessibility/">Accessibility</a>
								<span class="mobile-hide">&bull;</span> <a href="/code-of-conduct/">Code of Conduct</a>
							</div>
						</div>
					</div>
					 <div class="support"><h3>Did you know?</h3>
						<p class="mission-statement">UW-Madison Libraries serve over 4 million visitors a year.</p>
						<a href="http://giving.library.wisc.edu/" class="button blue">Support <span class="mobile-hide">the Libraries</span></a>
						<div class="social-media"><a class="facebook" href="https://www.facebook.com/UWMadLibraries"><span class="screen-reader-text">Facebook</span><?php include_svg("social/facebook"); ?></a>
							<a class="twitter" href="https://twitter.com/UWMadLibraries"><span class="screen-reader-text">Twitter</span><?php include_svg("social/twitter"); ?></a>
							<a href="/social-media/">More ways to follow us.</a>
						</div>
					</div><a href="http://www.wisconsin.edu/" class="copyright_link">&copy; 2014. Board of Regents of the University of Wisconsin System</a>
				</div>
			</footer>
		</div>
	</div>
	<script src="/wp-content/themes/library-wp-theme/js/site.js"></script>
	<?php 
		if(defined("GOOGLE_KEY") && defined("GOOGLE_DOMAIN")) { ?>
		<script>$(document).ready(function() {
				$('a.chat-button').each(function(){ $(this).attr('onclick', "ga('send', 'event', 'chat', 'click', '" + $(this).data('account') + "');"); });
				$('a.ask-chat-link').each(function(){ $(this).attr('onclick', "ga('send', 'event', 'chat-link', 'click', '" + $(this).data('account') + "');"); });				
			});
		</script>
	<?php } else { ?>
	<!-- analytics tracking disabled -->
	<?php } ?>
	<?php wp_footer(); ?>
	<?php if (is_page( 887 )): ?>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
		<script>loadMap();</script>
	<?php	endif;?>
	<?php if (is_front_page()) { ?>
		<script>$(document).ready(function() { check_library_location(); });</script>
	<?php } ?>
</body>
</html>