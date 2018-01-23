
( function( $ ) {

	var t;
	
	function setMapHeight() {
		var headerH = $("#masthead").height();
		var viewH = $(window).height();
		
		$("#map-canvas").css("min-height", viewH - headerH);
		
	} //end setMapHeight
	
	setMapHeight();
	
} )( jQuery );