<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package gravit
 */
?>
	<?php get_sidebar(); ?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer footerClass" role="contentinfo">
		<div class="site-info">
			<?php echo esc_attr(get_theme_mod('footer_text', 'Gravit Theme powered by WordPress')); ?>
			Silage Breeding is part of the <a href="http://agronomy.wisc.edu/" target="_blank">Agronomy Department</a> of the <a href="http://www.wisc.edu/" target="_blank">University of Wisconsin-Madison</a>.<br />
			Copyright &copy;2006 The Board of Regents of the University of Wisconsin System.<br />
			Feedback, questions or accessibility issues: <a href="mailto:ndeleongatti@wisc.edu">ndeleongatti@wisc.edu</a>.<br /><br />
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_reset_query(); ?>

<?php wp_footer(); ?>

</body>
</html>