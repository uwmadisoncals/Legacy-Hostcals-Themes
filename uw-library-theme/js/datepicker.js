/**
 * ----------------------------------------------------------------------------
 *
 *  Date Picker
 *
 * ----------------------------------------------------------------------------
 */
  $(function() {
  
	window.onpopstate = function(e){
	   changeDate();
	};
		
	$(".content-hours .display-all-hours").click(function(e) {
		e.preventDefault();
	
		$(this).toggleClass("clicked-to-show");
		
		if($(this).hasClass("clicked-to-show")){
			$(this).html("Hide Closed Libraries");
		}else{
			$(this).html("Show Closed Libraries");
		}
		
		$(".hours-details ul li").each(function(){
			if($(this).hasClass("closed")){
				$(this).slideToggle( 300, function() {
				    // Animation complete
				});
			}
		});
		
	});

		
	function changeDate() {
  		var wl = new String(window.location);
  		wl = wl.substr(-9).substring(0,8);
  		
	  $("#datepicker").datepicker({
	    dateFormat: "yymmdd",
	    defaultDate: wl,
	    onSelect: function(dateText){
	    	url = "/libraries/hours/" + dateText + "/ .hours-details";
	    	pushstate = "/libraries/hours/" + dateText + "/";
	    	window.history.pushState(null, null, pushstate);
	    	$( ".hours-details" ).load( url, function() {
			  //Loaded the data
			  
			});
	    }
	  });
	  
	  }
	  
	  changeDate();
  });