<?php
	// Our main site does not have an id defined. Perhaps we should define one?
	// We should probably set it to "general library system" whatever ID that is.

	// This will require re-working a number of other places in the code.

	// Default to the General Library System, if nothing is defined.
	$api_site_id = get_theme_mod('api_site_id', "56");

?>
<div id="library_alerts" data-siteid="<?php echo $api_site_id; ?>"></div>