<?php if (get_theme_mod('api_site_id')):?>
		<?php if ( has_post_thumbnail() ) { ?>
			<div id="localSiteBanner" class="primarySearchContainer cf">
		<?php } else { ?>
			<div id="localSiteBanner" class="primarySearchContainer nofeature cf">
		<?php } ?>
			<div class="local-banner-content">
				<div class="inner glassTop">
					<h2><a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h2>
				</div>
			<?php if ( has_post_thumbnail() && is_page() && is_page_template( 'page-navigationPage.php' )) { ?>
				<div class="homePageSlidesExtras2" aria-hidden="true">
					<div class="headerImage" style="background: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>') no-repeat; background-size: 100% auto; background-position: center 50px;"></div>
				</div>
			<?php } ?>
			</div>
		</div>
<?php endif; ?>



		
