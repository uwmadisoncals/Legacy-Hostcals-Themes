<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage CALSv1
 */

get_header(); ?>

<div class="mobileScroll">
  <a href="#" class="mobileNavTriggerLarge" style="display: none;"></a>
  
  <div class="collegeFeature2">
  <?php if (function_exists( 'muneeb_ssp_slider')) {muneeb_ssp_slider( 5 );} ?>
  
   </div>
  
 
  
 
  <div id="main">

		<div id="primary">
			
			
			
			<?php $options = twentyeleven_get_theme_options();
$current_layout = $options['theme_layout'];
//$current_colorscheme = $options['link_color'];



if ( 'content' != $current_layout ) : ?>
	<div id="content" role="main">
    <?php if ( have_posts() ) : ?>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
  
<?php endif; ?>	
			
			
		<?php if ( 'content' == $current_layout ) : ?>	
			<div class="loadBar">
	<div class="progress"></div>
</div>
		<div class="centeredContainerInset topspace">
 
 
  
  	<div class="newsItem customize">
			<span class="number">1</span>
			<div class="hiddendate">-9999999999</div>
    	<div class="categories">
	  		<div class="topics">
		  		<ul>
		  			

	    	<?php
$categories = get_categories();
foreach ($categories as $cat) {

if($cat->cat_name != 'Uncategorized') {
echo '<li><a href="#" data-cat="'.$cat->slug.'" class="selected categor">'.$cat->cat_name.'</a></li>';
}

}
?>
					
			    	
		  		</ul>
	  		</div>
	  	
	  	
		  	<div class="categoriesSort">	
		    	 <ul id="sort" class="option-set clearfix" data-option-key="sortBy">
			    	<!--<li><a href="#" data-cat="number">Highlighted</a></li>-->
			        <li><a href="#" data-cat="chronological" class="selected">Chronological</a></li>
			        
			        <li><a href="#" data-cat="alphabetical">Alphabetical</a></li>
			        <li><a href="#" data-cat="grouped">Grouped</a></li>
		  		</ul>
		  	</div>
	  	
	  		<a href="#" class="remembersettings selected" data-rem="yes">Remember My Settings</a>

  		</div>
    </div>
  
  
  </div>
  
  
  
  
    
    
    
		
			<div id="content" role="main">
			<div id="container2"  class="super-list variable-sizes clearfix">



		
   		<?php	query_posts( 'showposts=1&cat=3' );  ?>

			<?php if ( have_posts() ) : ?>

				<?php //twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					
					
					
					
					
	<div class="newsItem storyFeature <?php $category = get_the_category(); 
		echo $category[0]->slug; ?>">
    	
    		<div class="previousa">
    		<div class="additionalContent">
    			
    				
    				
    				<?php 
    					
	    				if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
 
							 //echo '<img src="';
							 echo catch_that_image();
							// echo '" alt="" />';

						}
	    				
    				?>

    			
    		</div>
    		
    		<div class="text">
    			<div class="glyph"><div class="symbol"></div></div>
    			<div class="titleheading">
    			<h3><?php the_title(); ?></h3>
    			</div>
    			<div class="excerpt">
    			
	    		
			<?php the_content_rss('', FALSE, '', 150); ?>
    			
    			
    			</div>
    			<div class="dateheading">
    			<?php the_date(); ?>
    			</div>
    			<div class="hiddendate">1<?php //echo "-"; the_time('Ymd') ?></div>
    			<div class="hiddengroup"><?php $category = get_the_category(); 
echo $category[0]->slug; ?></div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		<a href="<?php the_permalink(); ?>" class="highlight">
	    		<div class="loadingSpinner" style="display: none;">
	    			<div class="progress" style="width:100%;"></div>
	    		</div>
    		</a>
    	</div>
    	
    </div>

				<?php endwhile; ?>
				
				<div class="newsItem twitter social noImage">
    	
    		<div class="previousa" >
    		<div class="additionalContent" style="height: 90px;">
    			
    				
    				
    				

    			
    		</div>
    		
    		<div class="text">
    			<div class="glyph"><a href="http://twitter.com/uw_lsc" class="symbol"></a></div>
    			<div class="titleheading">
    			<h3 id="twitter_box">Twitter</h3>
    			</div>
    			<div class="excerpt" id="firstRecentTweet">
				
				<div id="example5">
				</div>
    			
    			
    			</div>
    			<div class="dateheading">
    			
    			</div>
    			<div class="hiddendate">2</div>
    			<div class="hiddengroup">twitter</div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		
    	</div>
    	
    </div>
    
				


<?php query_posts('cat=2&showposts=1'); ?>

  <?php while (have_posts()) : the_post(); ?>
    <!-- Do special_cat stuff... -->
    <div class="newsItem storyFeature <?php $category = get_the_category(); 
		echo $category[0]->slug; ?>">
    	
    		<div class="previousa">
    		<div class="additionalContent">
    			
    				
    				
    				<?php 
    					
	    				if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
 
							 //echo '<img src="';
							 echo catch_that_image();
							// echo '" alt="" />';

						}
	    				
    				?>

    			
    		</div>

			<div class="text">
    			<div class="glyph"><div class="symbol"></div></div>
    			<div class="titleheading">
    			<h3><?php the_title(); ?></h3>
    			</div>
    			<div class="excerpt">
    			
	    		
			<?php the_content_rss('', FALSE, '', 150); ?>
    			
    			
    			</div>
    			<div class="dateheading">
    			<?php the_date(); ?>
    			</div>
    			<div class="hiddendate">3<?php //echo "-"; the_time('Ymd') ?></div>
    			<div class="hiddengroup"><?php $category = get_the_category(); 
echo $category[0]->slug; ?></div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		<a href="<?php the_permalink(); ?>" class="highlight">
	    		<div class="loadingSpinner" style="display: none;">
	    			<div class="progress" style="width:100%;"></div>
	    		</div>
    		</a>

    		</div>
    </div>
  <?php endwhile;?>


				
	
				
				
							
		
    
    	<div class="newsItem twitter social noImage">
    	
    		<div class="previousa" >
    		<div class="additionalContent" style="height: 90px;">
    			
    				
    				
    				

    			
    		</div>
    		
    		<div class="text">
    			<div class="glyph"><a href="http://twitter.com/uw_lsc" class="symbol"></a></div>
    			<div class="titleheading">
    			<h3 id="twitter_box">Twitter</h3>
    			</div>
    			<div class="excerpt" id="secondRecentTweet">
    			
    			
    			</div>
    			<div class="dateheading">
    			
    			</div>
    			<div class="hiddendate">4</div>
    			<div class="hiddengroup">twitter</div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		
    	</div>
    	
    </div>
    
    <?php query_posts('cat=5&showposts=1'); ?>

  <?php while (have_posts()) : the_post(); ?>
    <!-- Do special_cat stuff... -->
    <div class="newsItem fifth storyFeature <?php $category = get_the_category(); 
		echo $category[0]->slug; ?>">
    	
    		<div class="previousa">
    		<div class="additionalContent">
    			
    				
    				
    				<?php 
    					
	    				if ( has_post_thumbnail() ) {
		    				
		    				//the_post_thumbnail();
		    				echo get_the_post_thumbnail($page->ID, 'large');
 
		    				} else {
 
							 //echo '<img src="';
							 echo catch_that_image();
							// echo '" alt="" />';

						}
	    				
    				?>

    			
    		</div>

			<div class="text">
    			<div class="glyph"><div class="symbol"></div></div>
    			<div class="titleheading">
    			<h3><?php the_title(); ?></h3>
    			</div>
    			<div class="excerpt">
    			
	    		
			<?php the_content_rss('', FALSE, '', 150); ?>
    			
    			
    			</div>
    			<div class="dateheading">
    			<?php the_date(); ?>
    			</div>
    			<div class="hiddendate">5<?php //echo "-"; the_time('Ymd') ?></div>
    			<div class="hiddengroup"><?php $category = get_the_category(); 
echo $category[0]->slug; ?></div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		<a href="<?php the_permalink(); ?>" class="highlight">
	    		<div class="loadingSpinner" style="display: none;">
	    			<div class="progress" style="width:100%;"></div>
	    		</div>
    		</a>

    		</div>
    </div>
  <?php endwhile;?>		
    
    	<div class="newsItem twitter social noImage">
    	
    		<div class="previousa" >
    		<div class="additionalContent" style="height: 90px;">
    			
    				
    				
    				

    			
    		</div>
    		
    		<div class="text">
    			<div class="glyph"><a href="http://twitter.com/uw_lsc" class="symbol"></a></div>
    			<div class="titleheading">
    			<h3 id="twitter_box">Twitter</h3>
    			</div>
    			<div class="excerpt" id="thirdRecentTweet">
    			
			
    			
    			
    			</div>
    			<div class="dateheading">
    			
    			</div>
    			<div class="hiddendate">6</div>
    			<div class="hiddengroup">twitter</div>
    			
					
					<span class="number">10</span>
    		</div>
    		
    		
    	</div>
    	
    </div>
							
				

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
			
	<?php endif; ?>
			
</div>

		
				<?php get_sidebar( 'homepage' ); ?>
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>