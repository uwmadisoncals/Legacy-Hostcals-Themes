/**
 * ----------------------------------------------------------------------------
 *
 *  Main JavaScript file for the Library Website
 *
 * ----------------------------------------------------------------------------
 */
 
( function( $ ) {

	var t;
	
	var navtop = $("#navbar").offset().top;

	
	 function stickyNavBar() {
	      var windowtop = $(window).scrollTop();
	      
	      if(windowtop >= navtop) {
		      $("#navbarContainer").addClass("fixedNav");
	      } else {
		      $("#navbarContainer").removeClass("fixedNav");
	      }
      }
      
      $(window).scroll(function() {
       
       	if($(window).width() > 825) {
       		if($("body").hasClass("home")) {
	       		
       		} else {
       			
        		stickyNavBar();
        	}
        }
      });


/**
 * ----------------------------------------------------------------------------
 *
 *  Home: feature slides
 *
 * ----------------------------------------------------------------------------
 */
 	var slidesCount = -1;
 	

 	$( "#local-site-home .homePageSlidesImages .clearHomePageSlides .headerImage" ).each(function( index ) {
	 	$(this).css("z-index", 20-index);
	 	$(this).attr("data-slidenum",index);
	 	slidesCount = slidesCount + 1;
  	});
  	
  	
  	
  	
  	$( "#local-site-home .homePageSlidesExtras .headerImage" ).each(function( index ) {
	 	$(this).css("z-index", 20-index);
	 	$(this).attr("data-slidenum",index);
  	});
  	
  	$( "#local-site-home .homePageSlidesExtras2 .headerImage" ).each(function( index ) {
	 	$(this).css("z-index", 20-index);
	 	$(this).attr("data-slidenum",index);
  	});
  	
  	$("#local-site-home .clearHomePageSlides .headerImage").first().addClass("current");
  	
  	$("#local-site-home .homePageSlidesExtras .headerImage").first().addClass("current");
  	$("#local-site-home .homePageSlidesExtras2 .headerImage").first().addClass("current");

  	if (slidesCount <= 0) {
	  	$( ".nextButton").addClass("hidden");
	  	$( ".prevButton").addClass("hidden");
	  	
  	} else {
	  	$(".homePageSlidesImages .nextButton").click(function(e) {
			e.preventDefault();
			
			$( ".clearHomePageSlides .headerImage" ).each(function( index ) {
				
		 		if($(this).hasClass("current")) {
		 		
		 			if($(this).attr("data-slidenum") == slidesCount) {
			 			$( ".clearHomePageSlides .headerImage" ).first().addClass("current").css("z-index","1").show();
			 			
			 			$(this).fadeOut(400, function() {
				 			$( ".clearHomePageSlides .headerImage" ).first().css("z-index","20");
				 			$( ".clearHomePageSlides .headerImage" ).show();
			 			});
			 			
				 		$(this).removeClass("current");
				 		
			 			
		 			} else {
		 			
				 		$(this).fadeOut(400);
				 		$(this).removeClass("current");
				 		$(this).next().addClass("current");
			 		
			 		}
			 		
			 		return false;
		 		}
		 	});
		 	
		 	
		 	
		 	$( ".homePageSlidesExtras .headerImage" ).each(function( index ) {
		 		if($(this).hasClass("current")) {
			 		if($(this).attr("data-slidenum") == slidesCount) {
			 			$( ".homePageSlidesExtras .headerImage" ).first().addClass("current").css("z-index","1").show();
			 			
			 			$(this).fadeOut(400, function() {
				 			$( ".homePageSlidesExtras .headerImage" ).first().css("z-index","20");
				 			$( ".homePageSlidesExtras .headerImage" ).show();
			 			});
			 			
				 		$(this).removeClass("current");
				 		
			 			
		 			} else {
		 			
				 		$(this).fadeOut(400);
				 		$(this).removeClass("current");
				 		$(this).next().addClass("current");
			 		
			 		}
			 		
			 		return false;
		 		}
		 	});
		 	
		 	$( ".homePageSlidesExtras2 .headerImage" ).each(function( index ) {
		 		if($(this).hasClass("current")) {
			 		if($(this).attr("data-slidenum") == slidesCount) {
			 			$( ".homePageSlidesExtras2 .headerImage" ).first().addClass("current").css("z-index","1").show();
			 			
			 			$(this).fadeOut(400, function() {
				 			$( ".homePageSlidesExtras2 .headerImage" ).first().css("z-index","20");
				 			$( ".homePageSlidesExtras2 .headerImage" ).show();
			 			});
			 			
				 		$(this).removeClass("current");
				 		
			 			
		 			} else {
		 			
				 		$(this).fadeOut(400);
				 		$(this).removeClass("current");
				 		$(this).next().addClass("current");
			 		
			 		}
			 		
			 		return false;
		 		}
		 	});
			
		});
		
		
		
		$(".homePageSlidesImages .prevButton").click(function(e) {
			e.preventDefault();
			
			$( ".clearHomePageSlides .headerImage" ).each(function( index ) {
				
		 		if($(this).hasClass("current")) {
		 		
		 			if($(this).attr("data-slidenum") == 0) {
		 				
		 				
		 				$( ".clearHomePageSlides .headerImage" ).hide();
		 				$( ".clearHomePageSlides .headerImage" ).first().show();
			 			$( ".clearHomePageSlides .headerImage" ).last().addClass("current").show();
			 			
			 			$(this).fadeOut(400);
			 			
				 		$(this).removeClass("current");
				 		
			 			
		 			} else {
		 			
				 		$(this).prev().fadeIn(400);
				 		$(this).removeClass("current");
				 		$(this).prev().addClass("current");
			 		
			 		}
			 		
			 		return false;
		 		}
		 	});
		 	
		 	
		 	
		 	$( ".homePageSlidesExtras .headerImage" ).each(function( index ) {
		 		if($(this).hasClass("current")) {
			 		if($(this).attr("data-slidenum") == 0) {
			 			$( ".homePageSlidesExtras .headerImage" ).hide();
		 				$( ".homePageSlidesExtras .headerImage" ).first().show();
			 			$( ".homePageSlidesExtras .headerImage" ).last().addClass("current").show();
			 			
			 			$(this).fadeOut(400);				 		
			 			$(this).removeClass("current");
				 		
			 			
		 			} else {
		 			
				 		$(this).prev().fadeIn(400);
				 		$(this).removeClass("current");
				 		$(this).prev().addClass("current");
			 		
			 		}
			 		
			 		return false;
		 		}
		 	});
		 	
		 	$( ".homePageSlidesExtras2 .headerImage" ).each(function( index ) {
		 		if($(this).hasClass("current")) {
			 		if($(this).attr("data-slidenum") == 0) {
			 			$( ".homePageSlidesExtras2 .headerImage" ).hide();
		 				$( ".homePageSlidesExtras2 .headerImage" ).first().show();
			 			$( ".homePageSlidesExtras2 .headerImage" ).last().addClass("current").show();
			 			
			 			$(this).fadeOut(400);				 		
			 			$(this).removeClass("current");
				 		
			 			
		 			} else {
		 			
				 		$(this).prev().fadeIn(400);
				 		$(this).removeClass("current");
				 		$(this).prev().addClass("current");
			 		
			 		}
			 		
			 		return false;
		 		}
		 	});
			
		});
		
		
	}
  	
  	
	

/**
 * ----------------------------------------------------------------------------
 *
 *  Heading: ASK a Librarian
 *
 * ----------------------------------------------------------------------------
 */
	$('html').click(function() {
		$(".ask_links").css("opacity","1");
		
		$( ".ask_links" ).animate({
	  		opacity: 0,
	  		top: "40px"
	  	}, 200, function() {
		  	$(".ask_links").hide();
		  	$(".ask_options").removeClass("open");
		    // Animation complete.
		});
	});

	$(".ask_options").click(function(e) {
		//e.preventDefault();
		//e.stopPropagation();
		$(".ask_links").css("opacity","0");
		$(".ask_links").show();	
		$(".ask_links" ).animate({
		  	opacity: 1,
		    top: "32px"
		}, 200, function() {
		    // Animation complete.
		    $(".ask_options").addClass("open");
		});
	});
	
	$("#ask").mouseleave(function() {
		t = setTimeout(function(){
			$(".ask_links").css("opacity","1");
				
			$( ".ask_links" ).animate({
			  	opacity: 0,
			    top: "40px"
			}, 200, function() {
			  	$(".ask_links").hide();
			  	$(".ask_options").removeClass("open");
			    // Animation complete.
			});
		},1300);
	});
	
	$("#ask").mouseenter(function() {
		clearTimeout(t);
	});
	
	$(".ask_options").focus(function(e) {
		e.preventDefault();	
		$(".ask_links").css("opacity","0");
		$(".ask_links").show();	
		$( ".ask_links" ).animate({
		  	opacity: 1,
		    top: "32px"
		}, 200, function() {
		    // Animation complete.
		    $(".ask_options").addClass("open");
		});
		clearTimeout(t);
	});
	
	$("#ask").blur(function() {
		t = setTimeout(function(){
			$(".ask_links").css("opacity","1");
				
			$( ".ask_links" ).animate({
			  	opacity: 0,
			    top: "40px"
			}, 200, function() {
			  	$(".ask_links").hide();
			  	$(".ask_options").removeClass("open");
			    // Animation complete.
			});
		},1300);
	});
	
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Library Search
 *
 * ----------------------------------------------------------------------------
 */

 	$('html').click(function() {
		$(".search_options").css("opacity","1");
		
		$( ".search_options" ).animate({
		  	opacity: 0,
		    top: "60px"
		  }, 200, function() {
		  	$(".search_options").hide();
		  	$(".search_options").removeClass("open");
		    // Animation complete.
		    $(".primarySearchContainer .selected_search").attr("data-shown","false");
		  });
	});
	
	$(".primarySearchContainer .selected_search").attr("data-shown","false");

 	$(".primarySearchContainer .selected_search").click(function(e) {
 		e.preventDefault();
 		e.stopPropagation();
 		var isShown = $(".primarySearchContainer .selected_search").attr("data-shown");
 		
 		if(isShown == "false") {
 		$(".primarySearchContainer .selected_search").attr("data-shown","true");
	    $(".primarySearchContainer .search_options").show();
	    
	    $(".primarySearchContainer .search_options").css("opacity","0");
	    $(".primarySearchContainer .search_options").css("top","60px");
		$(".primarySearchContainer .search_options").show();	
		$(".primarySearchContainer .search_options").animate({
		  	opacity: 1,
		    top: "45px"
		  }, 200, function() {
		    // Animation complete.
		    $(".primarySearchContainer .search_options").addClass("open");
		  });
		  
		} else {
			
			$(".primarySearchContainer .selected_search").attr("data-shown","false");
		    $(".search_options").css("opacity","1");
		
			$( ".search_options" ).animate({
			  	opacity: 0,
			    top: "60px"
			  }, 200, function() {
			  	$(".search_options").hide();
			  	$(".search_options").removeClass("open");
			    // Animation complete.
			  });
		}
	});
	
	function setSearchContainerSize(){
		$(".searchFormsContainer").css("margin-left",$(".searchSelect").width());
	}
	
	setSearchContainerSize();

	
	$(".search_options a").click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$(".primarySearchContainer .selected_search").attr("data-shown","false");
		$(".selected_search .btnLabel").text($(this).find(".title").text());
		$(".search_options").hide();
		
		var selectedObj = $(this).attr("class");
		
		$(".searchFormsContainer").css("margin-left",$(".searchSelect").width());
		
		$(".searchForms").hide().attr("aria-hidden","true");
		$("#"+selectedObj).show().attr("aria-hidden","false");
		
		$("input.searchInput").focus();
		
		
		//add hash to url
		link = $(this).attr("href");
		window.location.hash = link;
	});
	
		
	$( "input.searchInput" ).keyup(function() {
	  	var v = $(this).val();
	  	$("input.searchInput").val(v);
	});
	
	$(".search_box").click(function(e) {
		$(".site-header .library").hide();
	});


/**
 * ----------------------------------------------------------------------------
 *
 *  Default Page Height
 *
 * ----------------------------------------------------------------------------
 */
 	function setPageHeight(){
	 	var wH = $(window).height();
		var fH = $("footer").height();
		var hH = $("header").height();
	 
	 	$(".site-main").css("min-height",wH-(hH));
	 }
	 
	 //call once on pageload
	 setPageHeight();
	 
	 $( window ).resize(function() {
	 	setPageHeight();
	 	homePageColumns();
	 	setSearchContainerSize();
	 	setMapHeight();
	 });
	
/**
 * ----------------------------------------------------------------------------
 *
 *  Right Content Links
 *
 * ----------------------------------------------------------------------------
 */
	function homePageColumns() {
		$(".rightCol").css("height","auto");
		$(".leftCol").css("height","auto");
	
		var lH = $(".leftCol").outerHeight();
		var rH = $(".rightCol").outerHeight();
		
		if(lH >= rH) {
			$(".rightCol").height(lH);
		} 
	}
	
	homePageColumns();


/**
 * ----------------------------------------------------------------------------
 *
 *  Add class to Gravity Forms so they can be re-styled
 *  Plus tracking of referring pages
 *
 * ----------------------------------------------------------------------------
 */	
 $(".gform_wrapper").addClass("gf_libraryForm");
 
 $(".gform_wrapper .gform_body .gf_referring_url .ginput_container input").val(document.referrer);

 
 /**
 * ----------------------------------------------------------------------------
 *
 *  Hide/Show description text in gravity forms
 *
 * ----------------------------------------------------------------------------
 */	
 $(".ginput_container input, .ginput_container select, .ginput_container textarea").focus(function(){
	$(this).parent().parent().addClass("show");
	$(this).parent().parent().removeClass("hide");
 });
 
 $(".ginput_container input, .ginput_container select, .ginput_container textarea").blur(function(){
	$(this).parent().parent().removeClass("show");
	$(this).parent().parent().addClass("hide");
 });
 
 
  /**
 * ----------------------------------------------------------------------------
 *
 *  Display text if there is no library events
 *
 * ----------------------------------------------------------------------------
 */	
 var eventstr = $(".library_events").text();
 eventstr = $.trim(eventstr);
 if(eventstr == "") {
	 $(".library_events").html("<p class='noEvents'>Sorry, there are no library events at this time.</p>");
	 $(".see_more_events").addClass("hide");
 }

 
/**
 * ----------------------------------------------------------------------------
 *
 *  On local sites, display "no events" message if none listed.
 *
 * ----------------------------------------------------------------------------
 */	 
 if ($('.local_events .uwmadison_events').is(':empty')) {
 	$('.local_events .span-50').text("No events avalable at this time.");
 	$('.local_events .span-50 h3').css( "display", "none" );
 }


/**
 * ----------------------------------------------------------------------------
 *
 *  Show more information on loan periods when clicked
 *
 * ----------------------------------------------------------------------------
 */	 
var loan_period = "collapsed";

$(".loan_period_select").click(function(e) {
	e.preventDefault();
	
	$("#loan_period_info").slideToggle(300);
	$(this).toggleClass("expanded");
	
	
});

$("#loan_period_info li a").click(function(e) {
		e.preventDefault();
		
		var itemtext = $(this).text();
		$(".loan_period_select span").text(itemtext);
		$("#loan_period_info").slideUp(300);
		$(".loan_period_select").removeClass("expanded");
		
		$("#libInfo").html($(this).next('.loan_periods').html());
});

/**
 * ----------------------------------------------------------------------------
 *
 *  General link dropdown expand/colapse. TODO: Replace loan period above
 *
 * ----------------------------------------------------------------------------
 */	 

$(".item_select").click(function(e) {
	e.preventDefault();
	
	$("#select_info").slideToggle(300);
	$(this).toggleClass("expanded");
	
	
});

$("#select_info li a").click(function(e) {
		e.preventDefault();
		
		var itemtext = $(this).text();
		$(".item_select span").text(itemtext);
		$("#select_info").slideUp(300);
		$(".item_select").removeClass("expanded");
		
		
		if($("#libInfo").html($(this).hasClass('.person_list'))){
			$("#libInfo").html($(this).next('.person_list').html());
		} else{
			$("#libInfo").html($(this).next('.hidden-info').html());
		}
		
		window.location.hash = $(this).attr('href');
		
		
});

/**
 * ----------------------------------------------------------------------------
 *
 *  Google Search Filter URL Update
 *
 * ----------------------------------------------------------------------------
 */
 function updateFacetURL(){
 	$(".search_results .facets ul li a").each(function() {
 		$(this).parent().removeClass("current-filter");
 		var hval = $(this).attr("href").split("more%3A");
 		var nval = hval[0] + "more%3A" + hval[hval.length-1];
	    $(this).attr("href", nval);
	
		var sval = $("#main_sitesearch").val();
		
		if (sval.indexOf("more") !== -1){
			arr = sval.split("more:");
			if($(this).attr("href").indexOf(arr[arr.length-1]) !== -1){
				$(this).parent().addClass("current-filter");
			}
		}
	});
 }
 
 $("#main_sitesearch").click(function () {
   $(this).select();
 });
 
 
  updateFacetURL();
  
/**
 * ----------------------------------------------------------------------------
 *
 *  Get Staff Page Email
 *
 * ----------------------------------------------------------------------------
 */	
 
 if($(".entry-content").hasClass("staff_details_pg")) { 
	 var mailaddr = $(".mail").text();
	 $("#input_23_4").val(mailaddr);
 }
 

/**
 * ----------------------------------------------------------------------------
 *
 *  Hide/Show exceptons
 *
 * ----------------------------------------------------------------------------
 */	
 setTimeout(function() {
	 
 
 $(".to_expand").click(function(e){
 	e.preventDefault();
 	
 	//console.log("chking");
 	$(this).toggleClass("open");
 	$(this).next(".expand_this").slideToggle(300);
 	
 	
 });
 },100);
 
 /**
 * ----------------------------------------------------------------------------
 *
 *  Set Staff locaion if coming from local site
 *
 * ----------------------------------------------------------------------------
 */	
 
 var hash = window.location.hash;
 
 if(hash) {   
	 $("#select_container a").each(function() {
		var ch = $(this).attr("href");
		if(ch == hash) {
			$(this).click();
			return false;
		}
	});
 }
 
 
/**
 * ----------------------------------------------------------------------------
 *
 *  Set page hash on homepage
 *
 * ----------------------------------------------------------------------------
 */
 	var hash = window.location.hash;
 	
 	if(hash){
	 	$("#homemain .search_options ul li a").each(function() {
	 		var currenthref = $(this).attr("href");
	 		if(currenthref == hash) {
		 		$(this).click();
		 		return false;
	 		}
	 	});
 	}
 	
/**
 * ----------------------------------------------------------------------------
 *
 *  Wrap hours exceptions
 *
 * ----------------------------------------------------------------------------
 */
 	$(".regular_hours > div").each(function(index) {
		var itemclass = $(this).attr("class");
		
		if(itemclass == "pri0") {
			
		
			$(this).removeClass("mostRecentpri0");
			$(this).addClass("mostRecentpri0");
			
			$(this).addClass("expand_this");
			var itemh3 = $(this).find(".to_expand");
			$(this).find(".to_expand").remove();
			$(this).before(itemh3);
		}
		
		if(itemclass == "pri2") {
			var submarkup = $(this).html();
			$(".mostRecentpri0").append("<div class='exception'>"+submarkup+"</div>");
			
			$(this).remove();
		}
		
	});
	
	setTimeout(function() {
		$(".regular_hours .to_expand").first().click();
	},500);


 } )( jQuery );



