(function($) {
	$(document).ready( function() {
	    $(".searchToggle").click(function() {
			$(".results").toggle();
			return false;
		});
		
		$(".results a").click(function() {
			var r = $(this).text();
			
			
			$(".searchType").text(r);
			var w = $(".searchToggle").width();
			w = w + 25 + "px";
			$("#ls").css("padding-left",w);
			/*$('#ls').animate({
			    paddingLeft: w
			  }, 600, function() {
			    // Animation complete.
			  });*/
			$(".results").toggle();
			return false;
		});
	});
})(jQuery);