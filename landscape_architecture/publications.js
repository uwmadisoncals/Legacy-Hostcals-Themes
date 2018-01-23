$( document ).ready(function() {
	var cCheck = $(".publicationsCheck").text();
	
	if(cCheck.length == 6) {
		$(".publicationsLink").hide();
	}

  $( ".publicationsLink" ).click(function() {
  	$(".publicationsContainer").show();
  	
  		setTimeout(function() {
	  		
  		
  		$('html, body').animate({
        	scrollTop: $(".publicationsContainer").offset().top
		}, 1000);
  	},500);
  	
  });
});