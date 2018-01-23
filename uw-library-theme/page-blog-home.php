<?php
/**
 *
 * This is the layout for the homepage of the uw-madison library
 * website. 
 *
 */


get_header(); 

$args = array( 'post_type' => 'home_page_slides', 'posts_per_page' => 3, rand() );
$loop = new WP_Query( $args );

$rootpath = $_SERVER['DOCUMENT_ROOT'];

?>

	<div id="primary" class="content-area blog-home">
		<?php get_template_part('local-heading', 'menu'); ?> 
		<?php if (get_theme_mod('api_site_id')):?>
			<div id="content" class="site-content local-site-content" role="main">
		<?php else: ?>
			<div id="content" class="site-content" role="main">
		<?php endif; ?> 
			<header class="entry-header">
				<h2 class="entry-title">News &amp; Events at <?php echo get_bloginfo('name'); ?></h2>
			</header>
			<div class="row toppadding spotlight">
			<?php query_posts('showposts=10'); ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="span-75">
				
					<div class="row">
						<div class="span-33 spotlightImage">
							<?php if ( has_post_thumbnail() ) { ?>
								  <?php the_post_thumbnail('thumbnail'); ?>
							<?php } 
								else{ ?>
									<img alt=" " src="/assets/img/default_blog_img.png">
								<?php }
								
							?>
		
						</div>
						
						<div class="span-66">
						<h3 class="home link"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				
				
				        <?php the_excerpt(); ?>
						</div>
					</div>
				</div>
		        <?php endwhile; ?>
				<?php wp_reset_query(); ?>
				
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
	
	<?php if (get_theme_mod('api_site_id')):?>
			<div class="right-Nav local-side-nav">
		<?php else: ?>
			<div class="right-Nav">
		<?php endif; ?>
			<div class="highlights">
				<!--<p>Can't get enough <?php echo get_bloginfo('name'); ?> News? Check out our <a href="#">archives</a>. </p>-->
				<p>Stay up to date with all the <a href="/news">news and events</a> at the UW-Madison Libraries.</p>
			</div>
		</div>
		<div class="clear"></div>

<?php get_footer(); ?>