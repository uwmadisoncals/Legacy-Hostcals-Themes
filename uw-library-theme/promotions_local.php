<?php
	$promoSlide = array();
	$promos = array();
	$promoImgs = array();
	$promosText = array();
	$args = array( 'post_type' => 'home_page_slides','posts_per_page' => 5);
	$loop = new WP_Query( $args );
	$slide = "";
	$text = "";
	$background_slide = "";
	$backgroundImg = "";
	
	while ( $loop->have_posts() ) : $loop->the_post(); 
		if( function_exists('get_field') && get_field('main_image') ): 		
			$attachment_id = get_field('main_image'); 
			$size = "large"; 
			$image = wp_get_attachment_image_src($attachment_id, $size); 
			$imageUrl = $image[0];
		endif; 
		
		if( function_exists('get_field') && (get_field('link_to_page') || get_field('external_url'))) {
			if(get_field('external_url')) 		
				$text = "<a href='" . get_field('external_url') . "' ><div><h2>" . get_the_title() . "</h2></div><div class='subCaption'>". get_the_content() . "</div></a> ";
			else
				$text = "<a href='" . get_field('link_to_page') . "' ><div><h2>" . get_the_title() . "</h2></div><div class='subCaption'>". get_the_content() . "</div></a> ";
		} else { 
				$text = "<div class='noLinkFeature'><h2>" . get_the_title() . "</h2></div><div class='subCaption'>". get_the_content() . "</div> ";
		} 
		
		array_push($promos, array('url' => $imageUrl, 'text' => $text));

	endwhile;
	
	ob_start();
	include('local-site/social.php');
	$temp = ob_get_clean();
	
	$slide = "<div id='homemain'><div class='primarySearchContainer slideDown cf'><div class='inner glassTop'>";
	$slide .= "<h2>" . get_bloginfo('name') . $temp . " </h2>";
	$slide .= "<p>" . get_bloginfo ( 'description' ). "</p></div>";	
	$slide .= "<div class='homePageSlidesExtras2' aria-hidden='true'>";
	
	foreach ($promos as $value){
		$slide .= "<div class='headerImage' style='background:url(".$value['url']."); background-size: 100% auto; background-position: center center;'></div>";
	}
	
	$slide .= "</div>";	
			
	ob_start();
	include('library_alerts.php');
	$temp = ob_get_clean();
	
	$slide .= $temp . "</div></div>";
	$slide .= "<div class='homePageSlidesImages'><div class='slidesCover'></div><div class='homePageSlidesExtras' aria-hidden='true'>";
	$slide .= "<div class='homePageSlidesGradient'></div>";
	
	foreach ($promos as $value){
		$slide .= "<div class='headerImage' style='background:url(".$value['url']."); background-size: 100% auto; background-position: center center;'></div>";
	}
	
	$slide .= "</div><div class='clearHomePageSlides'>";
	
	foreach ($promos as $value){
		$slide .= "<div class='headerImage' style='background:url(".$value['url']."); background-size: 100% auto; background-position: center center;'>";
		$slide .= "<div class='slideTextContainer'><div class='slideText'>";
		$slide .= $value['text'];
		$slide .= "</div></div><div class='bottomShade'></div></div>";
	}
	
	ob_start();
	include_svg("arrow-right-thin");
	$temp = ob_get_clean();
	
	ob_start();
	include_svg("arrow-left-thin");
	$temp2 = ob_get_clean();
		
	$slide .= "</div>";
	$slide .= "<a href='#' class='nextButton'>" . $temp . "Next Feature</a>";
	$slide .= "<a href='#' class='prevButton'>" . $temp2 . "Previous Feature</a>	</div>";
	array_push($promoSlide, $slide);
		

	
	$promoSlides = json_encode($promoSlide); 
	$backgroundImg = json_encode($backgroundImg);
?>