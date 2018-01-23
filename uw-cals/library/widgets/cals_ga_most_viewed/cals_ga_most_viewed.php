<?php 
/*todo:
- hash password http://codex.wordpress.org/Function_Reference/wp_hash_password
- Write function documentation


*/

//CALS GA MOST VIEWED WIDGET

function widget_cals_ga_most_viewed_register(){

	//session_start for caching, if desired 
	session_start();
	
	function widget_cals_ga_most_viewed(){
		
		//get vars
		$title = get_option('widget_cals_ga_most_viewed-title')!='' ? get_option('widget_cals_ga_most_viewed-title') : 'Most Viewed';
		$username = get_option('widget_cals_ga_most_viewed-username');
		$password = get_option('widget_cals_ga_most_viewed-password');
		$profile_id = get_option('widget_cals_ga_most_viewed-profile_id');
		$number = get_option('widget_cals_ga_most_viewed-number')!='' ? get_option('widget_cals_ga_most_viewed-number') : 5;
		
		//if any of these parameters are missing, don't display anything
		if($username == '' || $password == '' || $profile_id =='')
			return false;
		
		echo '<li id="ga_most_viewed" class="widget-container widget_ga_most_viewed">';
	   	
			echo '<h3 class="widget-title">'.$title.'</h3>';
			
			echo '<ul>';
			
			//get most viewed posts
			$posts = get_cals_ga_most_viewed($username, $password, $profile_id, $number, $echo = false);
		   
			if(count($posts)>0){
			   foreach($posts as $post){?>
					<li><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'cals_news' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo '<span class="kicker_title">'.cals_news_print_subcat_title('Departments', $exclude_subcats=array('Featured Articles', 'Highlights'), $after = ":").'</span> '.get_the_title();?></a></li>	
		<?php	}
			} 
		
			echo '</ul>';
		
		echo '</li>';
		
   } //EOF widget_cals_ga_most_viewed
	
	
	function widget_ga_most_viewed_control(){

			
		
		$option_fields = array('title', 'username','password', 'profile_id','number');
		
		foreach ($option_fields as $field){
			
			$options['ga_most_viewed-'.$field] = $newoptions['ga_most_viewed-'.$field] = get_option('widget_cals_ga_most_viewed-'.$field);
		
			if ( $_POST["ga_most_viewed-submit"] ) {
				$newoptions['ga_most_viewed-'.$field] = strip_tags(stripslashes($_POST['ga_most_viewed-'.$field]));
			}
			
			if ( $options['ga_most_viewed-'.$field] != $newoptions['ga_most_viewed-'.$field] ) {
				$options['ga_most_viewed-'.$field] = $newoptions['ga_most_viewed-'.$field];
				update_option('widget_cals_ga_most_viewed-'.$field, $options['ga_most_viewed-'.$field]);
			}
			
		}
	?>
				<p>
                	<label for="ga_most_viewed-title"><?php _e('Title:'); ?><br /> <input id="ga_most_viewed-title" name="ga_most_viewed-title" type="text" value="<?php echo $options['ga_most_viewed-title'];?>" /></label>
           		</p>
                <p>
                	<label for="ga_most_viewed-username"><?php _e('Username:'); ?> <input id="ga_most_viewed-username" name="ga_most_viewed-username" type="text" value="<?php echo $options['ga_most_viewed-username']; ?>" /></label>                    
                </p>                
                <p>
                	<label for="ga_most_viewed-password"><?php _e('Password:'); ?> <input id="ga_most_viewed-password" name="ga_most_viewed-password" type="password" value="<?php echo $options['ga_most_viewed-password'];; ?>"   /></label>
                </p>

                <p>
                	<label for="ga_most_viewed-profile_id"><?php _e('Site profile ID:'); ?> <input id="ga_most_viewed-profile_id" name="ga_most_viewed-profile_id" type="text" value="<?php echo $options['ga_most_viewed-profile_id']; ?>" /></label>
                </p>
                <p>
                	<label for="ga_most_viewed-number"><?php _e('Number of posts to show:'); ?> <br /><input id="ga_most_viewed-number" name="ga_most_viewed-number" type="text" value="<?php //echo $options['ga_most_viewed-number']; ?> <?php $number = isset($options['ga_most_viewed-number']) && $options['ga_most_viewed-number'] != 0 ? absint($options['ga_most_viewed-number']) : 5; echo $number;?>" size="3" /></label>
                </p>
				<input type="hidden" id="ga_most_viewed-submit" name="ga_most_viewed-submit" value="1" />
	<?php	
	
	}
	
	function get_cals_ga_most_viewed($username, $password, $profile_id, $number, $echo = true){
	
		global $wpdb;
		
		//get the class
		require 'analytics.class.php';
		//sign in and grab profile
		$analytics = new analytics($username, $password);
		$analytics->setProfileById('ga:'.$profile_id);
		
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
			$or = '';
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
	
	} //EOF get_cals_ga_most_viewed*/


   
	//register widget
	wp_register_sidebar_widget('widget_cals_ga_most_viewed', 'CALS Most Viewed (Google Analytics)', 'widget_cals_ga_most_viewed',	array('description' => 'Displays a list of most viewed posts, based on Google Analytics data'));

	//register widget controls
	wp_register_widget_control('widget_cals_ga_most_viewed', 'Cals Most Viewed (Google Analytics)', 'widget_ga_most_viewed_control');

} // EOF widget_cals_ga_most_viewed_register

add_action('widgets_init', 'widget_cals_ga_most_viewed_register');


?>