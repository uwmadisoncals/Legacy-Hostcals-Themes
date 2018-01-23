<?php
/**
 * Template Name: Navigation Only
 */

get_header(); ?>

	<div id="primary" class="content-area nav-page">
		<?php get_template_part('local-heading', 'menu'); ?>
		<?php if (get_theme_mod('api_site_id')):?>
			<?php if ( has_post_thumbnail() ) { ?>
				<div id="content" class="site-content local-site-content nopadding" role="main">
			<?php }  
				else { ?>
					<div id="content" class="site-content local-site-content" role="main">
				<?php } ?>
		<?php else: ?>
			<div id="content" class="site-content" role="main">
		<?php endif; ?>
		<?php while ( have_posts() ) : the_post(); ?>
			
			<?php get_template_part('breadcrumb', 'menu'); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header top-page">
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="entry-thumbnail">
						<?php the_post_thumbnail('large'); ?>
					</div>
					<h2 class="entry-title thumbnail-title"><?php the_title(); ?></h2>
					<?php }
						else{
					?>
					<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } ?>
				</header>

				<div class="entry-content">
					<?php the_content(); ?>
					
					<?php
						//find all of the parents to the post
						$current_page_ancestors = get_post_ancestors($post);
						
						$tmp_post = $post;

						//get children of current page
						$child_pages = get_pages('child_of='.$post->ID.'&parent='.$post->ID.'&sort_order=ASC');


						if(!empty($child_pages)){?>
							<div class="topExploreMenu">
							
							<?php if( get_field('highlights_text') ): ?>
					        	<ul id="nav_explore">
					        <?php else: ?>
					        	<ul id="nav_explore" class="twoColumns">
							<?php endif; ?>
								<?php
					            foreach($child_pages as $post){
					            	setup_postdata($post);?>
					           			<li class="page_item page-item-<?php the_ID();?>">
					           				<a href="<?php the_permalink(); ?>">
					           					<div class="heading"><?php the_title(); ?> </div>
												<?php the_excerpt(); ?>
											</a
											
					                     </li>
					            <?php } ?>
					            </ul><!-- #nav_explore --> 
							</div>   
						<?php 
						}
				
				
						// Done. restore original $post
						$post = $tmp_post;
						?>

				</div>
			</article>

		<?php endwhile; ?>

	</div>
	<?php if (get_theme_mod('api_site_id')):?>
			<div class="right-Nav local-side-nav">
		<?php else: ?>
			<div class="right-Nav">
		<?php endif; ?>
		<?php if( get_field('highlights_text') ): ?>
			<div class="highlights">
			<?php if( get_field('highlights_heading') ): ?>
				<h3><?php the_field('highlights_heading'); ?></h3>
			<?php endif; ?>
				<?php the_field('highlights_text'); ?>
			</div>
		<?php endif; ?>
	</div>
	<div class="clear"></div>
</div>

<?php get_footer(); ?>