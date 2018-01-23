<?php
	$promoSlide = array();
	$args = array( 'post_type' => 'home_page_slides','posts_per_page' => 5);
	$loop = new WP_Query( $args );
	$slide = "";
	$backgroundImg = "";
	
	while ( $loop->have_posts() ) : $loop->the_post(); 
		if( function_exists('get_field') && get_field('main_image') ): 
			$attachment_id = get_field('main_image'); $size = "large"; 
			$image = wp_get_attachment_image_src($attachment_id, $size); 
			
			$backgroundImg = "background: url('" . str_replace("http://","//",$image[0]) . "') no-repeat; background-size: auto 100%; background-position: center center";
			$slide = '<li class="headerImage headerImagePara" data-imgH="' . $image[1] . '" data-imgW="' . $image[2] . '" style="' . $backgroundImg . '">';
		endif; 
		
		$slide .= "<div class='slideText'>";

			if( function_exists('get_field') && (get_field('link_to_page') || get_field('external_url'))) {
				if(get_field('external_url')) {			
					$slide .= "<a href='" . get_field('external_url') . "' ><div><h2>" . get_the_title() . "</h2></div><div class='subCaption'>". get_the_content() . "</div></a> ";
				} else {
					$slide .= "<a href='" . get_field('link_to_page') . "' ><div><h2>" . get_the_title() . "</h2></div><div class='subCaption'>". get_the_content() . "</div></a> ";
				}
			} else { 
					$slide .= "<div class='noLinkFeature'><div><h2>" . get_the_title() . "</h2></div><div class='subCaption'>". get_the_content() . "</div></a> ";
			} 
		$slide .= "</div><div class='bottomShade'></div></li>";
		array_push($promoSlide, $slide);
		
	endwhile;
	
	
	$promoSlides = json_encode($promoSlide); 
	$backgroundImg = json_encode($backgroundImg);
?>