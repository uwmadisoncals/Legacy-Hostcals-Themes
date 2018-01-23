/*
 * Used to poll Library API for alert status, and pull in broadcasts when available.
 * will re-poll the API over time, so kiosk machines get updated if they are left open.
 */

// Updates the alert area with data from the API.
function updateAlert() {
	siteid = $("#library_alerts").data("siteid");
	$("#library_alerts").load("//api.library.wisc.edu/api/alerts/" + siteid);
}

$(document).ready(function() {
	// Load alerts, 1s after page load
	// Hopefully reduce api requests from people loading the page
	// and then navigating away quickly.
	// setTimeout(function(){
	// 	updateAlert();
	// },1000);
	updateAlert();

	// Update every 10 minutes.
	window.setInterval(updateAlert, 600000);
});