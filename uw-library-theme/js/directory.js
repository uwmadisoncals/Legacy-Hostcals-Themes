// Submit ajax request to API to get a list of people.

var sd;

function fetch_people(search) {
	
	clearTimeout(sd);	
	$(".spinner").show();
	
	sd = setTimeout(function() {
		// use "search" or "autocomplete" depending on desired functionality
		$.get( "//api.library.wisc.edu/api/people/search/" + search, function(data) {
				clearTimeout(sd);
				
				console.log(data.length);
				if(data.length <= 10) {
					$(".spinner").hide();
					$("#staff_list").html( "<p class='searchError'>Sorry, no results were found for your search.</p>" );
					anchoredFooter();
				} else {
					$(".spinner").hide();
					$("#staff_list").html( data );
					anchoredFooter();
				}
			}).fail(function() {
				$(".spinner").hide();
				$("#staff_list").html( "<p class='searchError'>Sorry, there was a problem with the search. Please <a href='/help/ask/'>Ask a Librarian</a> for assistance. </p>" );
				anchoredFooter();
		});
	
	},500);
}


$(document).ready(function() {
	
	$("#staff_search").on('keyup', function() {
		search = $("#staff_search").val();
		
		if (search.length > 0) {
			// Fill in contents
			fetch_people(search);	
		} else {
			clearTimeout(sd);
			$(".spinner").hide();
			$("#staff_list").html("");
		}
	});
	
	$("#staff_search").focus();
	
});