<?php 

//session_start for caching, if desired
session_start();

function cals_ga_most_viewed($cals_site_profile_id, $echo = true){

global $wpdb;

//get the class
require 'ga/analytics.class.php';
//sign in and grab profile
$analytics = new analytics('uwcals', 'commprogram');
$analytics->setProfileById('ga:'.$cals_site_profile_id);

// set it up to use caching (default (10 min))
$analytics->useCache();

//set the date range for which I want stats for (could also be $analytics->setDateRange('YYYY-MM-DD', 'YYYY-MM-DD'))
$date_ranges = array('week' => array(date('Y-m-d',time() - 86400*6), date('Y-m-d',time())));


try{
	
	$analytics->setDateRange(date('Y-m-d',time() - 86400*6), date('Y-m-d',time()));	
	
	//get paths/views in current date range 
	$data = $analytics->getData(array('dimensions' => 'ga:pagePath',
									'metrics'    => 'ga:visits',
									'sort'       => 'ga:visits'));

	
	//sort array from most viewed to least viewed
	arsort($data);
	
	if(current_user_can('level_10')){
		//echo  '<pre>';
		//print_r($data);
		//echo '</pre>';
		//echo count($data);
	}
	
	
	//take out home, pages and specific categories,so they don't appear in list
	
		//get $data keys into array to be matched
		$data_keys = array_keys($data);
		
		//Unset items in $data whose keys match the undesired patterns
		$patterns = array('404', '\/category\/');
		foreach($data_keys as $data_key){
			foreach($patterns as $pattern){
				if (preg_match('/'.$pattern.'/', $data_key)>0){
					unset($data[$data_key]);
				}
			}
		}

	
	//reduce array to top-five entries only
	$data = array_slice($data, 0, 5);
	
	//get post_paths and generate array with post_names 
	$post_names = array();
	$post_paths = array_keys($data);
	
	foreach($post_paths as $post_path){
		$pp = explode('/', $post_path);
		$post_names[]= $pp[count($pp)-2];
	}
	
//get posts by post_name
					
	//build "or" condition
	for ($i=0; $i<count($post_names); $i++){
		$or.= 'post_name = "'.$post_names[$i].'" ';
		if ($i<(count($post_names)-1))
			$or.=' OR ';
	}
					
	$query = 'SELECT * FROM '.$wpdb->posts.' 
			    WHERE ('.$or.')
				AND `post_status` = "publish"
				AND `post_type` = "post"'
				;
				
	$most_viewed = $wpdb->get_results($query);

	if(current_user_can('level_10')){
		//echo $query.'<br>';
		//print_r($most_viewed);
	}

	if ($most_viewed){
		if ($echo==true){
			foreach($most_viewed as $mv){
				echo '<li><a title="Permanent Link to '.$mv->post_title.'" href="'.get_permalink($mv->ID).'" rel="bookmark">'.$mv->post_title.'</a></li>';
			}
		} else {
			return $most_viewed;
		}
	} else {
		echo "<li>No data available yet. Please check back soon.</li>";
	}
} //end try 

catch (Exception $e) { 
      echo 'Caught exception: ' . $e->getMessage(); 
}

} //EOF

?>