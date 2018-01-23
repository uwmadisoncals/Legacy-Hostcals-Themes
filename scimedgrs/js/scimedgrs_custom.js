(function($) {
	//alert("testing");
	$("#prof_s").keyup(function(){
		var filter = $(this).val(), count=0;

		$(".profileSummary").each(function(){

			if($(this).text().search(new RegExp(filter,"i"))<0){
				$(this).addClass("hidden"); 
		        $(this).removeClass("visible"); 
			}else {
				 $(this).removeClass("hidden");
		         $(this).addClass("visible");

		         $(".profileSummary .visible").each(function (index){
		         	$(this).attr("data-counted");
		         	$(this).attr("data-counted",resultscounted);
					resultscounted = resultscounted + 1;
		         });
		         count++;
			}
		});
	});

})( jQuery );