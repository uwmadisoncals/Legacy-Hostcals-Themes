/**
 * ----------------------------------------------------------------------------
 *
 *  Load Campus Map from Google
 *
 * ----------------------------------------------------------------------------
 */
function loadMap() {
	var map;
	var markersArray = [];
	
	var hash = window.location.hash;
	
	function initialize() {
		var mapOptions = {
		  center: new google.maps.LatLng(43.076592, -89.412487),
		  zoom: 17,
		  panControl:false,
		  scrollwheel: false,
		  zoomControl:false,
		  scaleControl:false,
		  mapTypeControl:false,
		  disableDefaultUI:true
		};
		map = new google.maps.Map(document.getElementById("map-canvas"),
		    mapOptions);
		
		if(hash) {   
		 $(".locations a").each(function() {
			var ch = $(this).attr("href");
			if(ch == hash) {
				$(this).click();
				return false;
			}
		});
		}
	}
		      
   function clearOverlays() {
	  for (var i = 0; i < markersArray.length; i++ ) {
	   markersArray[i].setMap(null);
	  }
	}

	google.maps.event.addDomListener(window, 'load', initialize);
		 
	var t;
	
	$(".libraryDropdown a").click(function() {
		clearOverlays();
		$(".startingOverlay").fadeOut(400);
		
		var lat = $(this).attr("data-lat");
		var lng = $(this).attr("data-lng");
		
		// To add the marker to the map, use the 'map' property
		var myLatlng = new google.maps.LatLng(lat,lng);
		var marker = new google.maps.Marker({
		    position: myLatlng,
		    map: map,
		    animation: google.maps.Animation.DROP
		});
		
		if($(window).width() <= 826) {
			$(".libraryDropdown").removeClass("visible");
		}
		
		map.panTo(new google.maps.LatLng(lat,lng));
		markersArray.push(marker);
		marker.setMap(map);
		
		t = setInterval(function() {
		var contentString = $("#libraryinfo").html();
	
		  if(contentString != "") {
			  clearInterval(t);
			  fillInMarker(contentString,map,marker);
		  }
		 },200);
	});
		
	function fillInMarker(contentString,map,marker) {
		var infowindow = new google.maps.InfoWindow({
		  content: contentString
		});
		 infowindow.open(map,marker);
		google.maps.event.addListener(marker, 'click', function() {
		 infowindow.open(map,marker);
		}); 
	}
}


/**
 * ----------------------------------------------------------------------------
 *
 *  Set Map Height
 *
 * ----------------------------------------------------------------------------
 */	
 function setMapHeight() {
	var headerH = $("#masthead").height();
	var viewH = $(window).height();
	
	$("#map-canvas").css("min-height", viewH - headerH- 30);
	
	} //end setMapHeight
	
	
	$(".librariesButton ").click(function() {
		$(".startingOverlay").fadeOut(300);
		$(".libraryDropdown").toggleClass("visible");
		return false;	
});


$( document ).ready(function() {	
	setMapHeight();
});