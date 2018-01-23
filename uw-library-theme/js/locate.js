// Used to pull in library customization in header, based on IP address.

// Update dom to library name and path read in from cookie
function setLibraryName() {
	data = $.cookie('library_location');
	if(data) { 
		val = data.split("|");
		$("<div class=\"library\">Welcome to <a href=\"" + val[1] + "\">" + val[0] + "</a></div>").insertBefore(".search_top");
	}
}

// Make API call, to determine what library this is
function classify_ip(value_callback) {
	url = "https://classify.library.wisc.edu/api/classify.json";
	$.get( url, function(data) {
		var tags = data["tags"];
		if($.inArray("location_19", tags) != -1) {
			value_callback("Memorial Library", "http://memorial.library.wisc.edu/");
			return;
		}
		if($.inArray("location_5", tags) != -1) {
			value_callback("Chemistry Library", "http://www.library.wisc.edu/chemistry/");
			return;
		}
		if($.inArray("location_29", tags) != -1) {
			value_callback("Steenbock Library", "http://www.library.wisc.edu/steenbock/");
			return;
		}
		if($.inArray("location_6", tags) != -1) {
			value_callback("College Library", "http://www.library.wisc.edu/college/");
			return;
		}
	});
}

// Sets the value of the library in the cookie
// Then, calls function to update the dom.
function setLibraryCookie(name, path) {
	$.cookie('library_location', name + "|" + path, {expires: 30});
	setLibraryName();
}

// Call this function on page load.
// Checks to see if we're on the index page of www
// Then, check if a location cookie already exists
// if so, update DOM.
// If not, call api to set cookie, then update DOM.
function check_library_location() {
	if($("#library_alerts").data("siteid") == 56) {	
		if($.cookie('library_location')) {
			setLibraryName();
		} else {
			console.log("Cookie not set");
			classify_ip(setLibraryCookie);
		}
	}
}