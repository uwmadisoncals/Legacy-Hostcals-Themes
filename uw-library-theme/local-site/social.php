<?php

	// Returns a string of HTML text that will render the
	// Appropriate social media icon with link. Service name is
	// Title Cased in code, refers to svg icon of lowercase name.
	// Only return a block of text if url exists.
	function social_media_icon_block($name,$url) {
		$service = strtolower($name);		//Sanitize name
		$output = "";
		if ($url != "") {
			$output .= "<a href=\"$url\" class=\"${service}\">";
			$output .= "<span class=\"screen-reader-text\">".ucfirst($service)."</span>";
			$output .= file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/img/social/${service}.svg");
			$output .= "</a>";
		}
		return $output;
	}

	# Prints output of social media icons for a given library ID.
	# prints out nothing if no social media icons exist.
	function print_social_api($library) {
		$json = json_decode(lib_api("locations/$library/social.json"), true);
		
		if($json) { 
			$elements = $json['social'];
			$keys = array_keys($elements);
			$i = 0; $size = count($keys);
			while($i < $size) {
				$key = $keys[$i];
				print social_media_icon_block($key, $elements[$key]);
				print "\n";
				$i++;
			}
		} 
		
		
	}


?>
<span class="social-media">	
	<?php
		print_social_api(get_theme_mod('api_site_id'));
	?>
</span>
