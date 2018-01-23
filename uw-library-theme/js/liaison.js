// Submit ajax request to API to get a list of people.

var sd;

function fetch_groups(search) {
	clearTimeout(sd);	
	$(".spinner").show();
	
	sd = setTimeout(function() {
		$.get( "//api.library.wisc.edu/api/groups/autocomplete/" + search, function(data) {
			
			if(data.length == 0) {
				$("#group_list").html( "<p class='searchError'>Sorry, no results were found for your search.</p>" );
				anchoredFooter();
				$(".spinner").hide();
			} else {
				$("#group_list").html( data );
				anchoredFooter();
				$(".spinner").hide();
				
				$( "#group_list .group .name" ).each(function() {
				  var ulg = $( this ).next().html();
				  if(ulg == undefined) {
					  $(this).parent().remove();
				  }
				});
				
			}
		}).fail(function() {
				$(".spinner").hide();
				$("#group_list").html( "<p class='searchError'>Sorry, there was a problem with the search. Please <a href='/help/ask/'>Ask a Librarian</a> for assistance. </p>" );
				anchoredFooter();
		});
	
	},500);
}

$(document).ready(function() {

	$("#group_search").on('keyup', function() {
		search = $("#group_search").val();
		
		
		if (search.length > 1) {
			// Fill in contents
			fetch_groups(search);
		} else {
			clearTimeout(sd);
			$(".spinner").hide();
			$("#group_list").html("");
		}
	});
	
	$("#group_search").focus();
	
});