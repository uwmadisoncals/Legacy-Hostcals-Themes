<?php 

add_action('after_setup_theme', 'remove_customHeader_fromChild');

function remove_customHeader_fromChild(){
remove_theme_support( 'custom-header' );
}
 


?>