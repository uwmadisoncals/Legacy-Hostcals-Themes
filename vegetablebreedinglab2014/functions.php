<?php function catch_that_vbl_image() {
  global $post, $posts;
  $first_img = '';
  $first_vid = '';
  
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $imgmatches);
  $output = preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $post->post_content, $vidmatches);
  
 
  
  $first_img = $imgmatches[1][0];
  $first_vid = $vidmatches[0];
  
  //var_dump($output);
  
  $url = "http://www.youtube.com/watch?v=C4kxS1ksqtw&feature=relate";
  parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
  $videoimg = "http://img.youtube.com/vi/".$my_array_of_vars['v']."/0.jpg";
      
  // Output: C4kxS1ksqtw
  //http://img.youtube.com/vi/<insert-youtube-video-id-here>/0.jpg
  /*if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post->post_content, $vidmatch)) {
  	$video = "yes";
    $first_img = $vidmatch[1][0];
}*/

  if(empty($first_img) && empty($first_vid)) {
    //placeholder
    $first_img = "<div class='noImageSpacer2'></div>";
    return $first_img;
  }  else {
	//$first_vid = "<img src='".$first_vid;
	//return $first_vid;
 
	// placeholder image
	if(empty($first_vid)) {
		$first_img = "<img src='".$first_img."' alt=' '>";
		return $first_img;
	} else {
		return $first_vid;
	}
	
	
  }
  
} ?>