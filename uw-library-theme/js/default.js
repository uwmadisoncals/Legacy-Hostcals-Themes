/**
 * Set body class if the browser is IE
 */
function getIEVersion(){
    var agent = navigator.userAgent;
    var reg = /MSIE\s?(\d+)(?:\.(\d+))?/i;
    var matches = agent.match(reg);
    if (matches != null) {
        return { major: matches[1], minor: matches[2] };
    }
    return { major: "-1", minor: "-1" };
}

var ie_version =  getIEVersion();
if(ie_version.major > 1){
	$("body").addClass("ie");
}

 if (Object.hasOwnProperty.call(window, "ActiveXObject") && !window.ActiveXObject) {
    $("body").addClass("ie");
}


/**
 * Default JavaScript for the UW Madison Theme
 */
function anchoredFooter() {
	var footerElem = $("#colophon");
	var threshHold = 150;
	var bodyH = $("#main").height();
	var headerH = $("#masthead").height();
	var viewH = $(window).height();
	var footerH = footerElem.height();
	
	  
	if(footerElem.hasClass("fixedBottom")) {
	  if((bodyH+headerH+footerH) > viewH) {
	  	footerElem.removeClass("fixedBottom");
	  } 
	} else {
	  if((bodyH + headerH + footerH) < viewH) {
	  	footerElem.addClass("fixedBottom");
	  } 
	} 
} //end anchoredFooter




( function( $ ) {

	var t;
	
	
/**
 * Clear search boxes on page load
 * ----------------------------------------------------------------------------
 */
	$(".searchInput").val("");
	$("#staff_search").val("");
	$("#group_search").val("");
	
/**
 * UW Madison Link interaction
 * ----------------------------------------------------------------------------
 */
 	
 	$(".searchInput").val("");
	 
	 	var seen = {};
		$('.homePageSlides ul li').each(function() {
		    var txt = $(this).text();
		    if (seen[txt])
		        $(this).remove();
		    else
		        seen[txt] = true;
		});
 
	$('html').click(function() {
		$(".uw_links").css("opacity","1");
		
			$( ".uw_links" ).animate({
			  	opacity: 0,
			    top: "40px"
			  }, 200, function() {
			  	$(".uw_links").hide();
			  	$(".uw_options").removeClass("open");
			    // Animation complete.
			  });
			  
		if(slidepanelopen) {
			$(".slidepanel .nav-menu li a:not(.sub-menu li a)").removeClass("currentTopNav");
			$(".slidepanel .sub-menu").slideUp(300);
			slidepanelopen = false;
		}
	});

	$(".uw_options").click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$(".uw_links").css("opacity","0");
		$(".uw_links").show();	
		$( ".uw_links" ).animate({
		  	opacity: 1,
		    top: "55px"
		  }, 200, function() {
		    // Animation complete.
		    $(".uw_options").addClass("open");
		  });
		
	});
	
	
	function hideUwlinks() {
				$(".uw_links").css("opacity","1");
				$( ".uw_links" ).animate({
				  	opacity: 0,
				    top: "40px"
				  }, 200, function() {
				  	$(".uw_links").hide();
				  	$(".uw_options").removeClass("open");
				    // Animation complete.
				  });
	}
	
	
	
	$("#uw_link_options").mouseenter(function() {
		clearTimeout(t);
	});
	
	$(".uw_options").focus(function(e) {
		e.preventDefault();	
		$(".uw_links").css("opacity","0");
		$(".uw_links").show();	
		$( ".uw_links" ).animate({
		  	opacity: 1,
		    top: "32px"
		  }, 200, function() {
		    // Animation complete.
		    $(".uw_options").addClass("open");
		  });
		clearTimeout(t);
	});
	
	$("#uw_link_options, .search_link li:last-child a").blur(function() {
		t = setTimeout(function(){
		
			$(".uw_links").css("opacity","1");
				
			$( ".uw_links" ).animate({
			  	opacity: 0,
			    top: "40px"
			  }, 200, function() {
			  	$(".uw_links").hide();
			  	$(".uw_options").removeClass("open");
			    // Animation complete.
			  });
		
			}
			,1300);
	});
	
	var slidepanelopen = false;
	var mt;
	
	
	
	
	$(".slidepanel .nav-menu li a:not(.sub-menu li a):not(.sub-menu dt a)").click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		
		hideUwlinks();
		
		var currentNavLink = $(this).hasClass("currentTopNav");
		
		if(currentNavLink) {
			$(".slidepanel .nav-menu li a:not(.sub-menu li a)").removeClass("currentTopNav");	
			$(".slidepanel .sub-menu").slideUp(200);
			slidepanelopen = false;
		} else {
		
			$(".slidepanel .nav-menu li a:not(.sub-menu li a)").removeClass("currentTopNav");
			$(this).addClass("currentTopNav");
			
			if(!slidepanelopen) {
				$(this).next(".sub-menu").slideDown(400);
			} else {
				$(".slidepanel .nav-menu .sub-menu").hide();
				$(this).next(".sub-menu").show();
			}
			slidepanelopen = true;
		
		}
	});
	
	$(".slidepanel .nav-menu .sub-menu li a").click(function(e) {
		$(".slidepanel .nav-menu li a:not(.sub-menu li a)").removeClass("currentTopNav");	
		$(".slidepanel .sub-menu").slideUp(200);
	});
	
	
	$( ".sub-menu" ).each(function( index ) {
		var count = 0;
		
		$(this).find("li").each(function( index ) {
			
			count = count + 1;
			if(count > 5) {
				$(this).closest('.sub-menu').addClass("wide");
			}
		});
	});
	
	$(".closeMenu").click(function(e) {
		e.preventDefault();
		$(".nav-menu li .sub-menu").fadeOut(400);
		$(this).hide();
	});
	
	
		
	var menushown = false;
	
		
	$(".mobile_menu_btn").click(function(event) {
		
		if(menushown) {
			$("#page").css("-webkit-transform", "");
			$("#page").css("-moz-transform", "");
			$("#page").css("transform", "");
			$(".mobile_menu_btn").removeClass("mobile_open");
			$(".mobile-nav").removeClass("mobile_open");
			menushown = false;
		} else {
			$("#page").css("-webkit-transform", "translate3d(-250px,0,0)");
			$("#page").css("-moz-transform", "translate3d(-250px,0,0)");
			$("#page").css("transform", "translate3d(-250px,0,0)");
			$(".mobile_menu_btn").addClass("mobile_open");
			$(".mobile-nav").addClass("mobile_open");
			menushown = true;
		}
    	
		return false;
		    	
	});
	
	
	//Assign a parent class to current links on child menue items
	$(".current_link").parentsUntil(".pagenav ul:first-child").last().find("a").first().addClass("parent_link");
	
	$(".slidesCover").delay(400).fadeOut(1600);
	
	
	//fix the page side on load/change
	function fixPageDiv() {
		var wH = $(window).height();
		var fH = $("footer").height();
		var hH = $("header").height();
		var nH = $("#nav_sidebar").height();
		var mH = $("#main").height();
		
		$(".home.blog .headerImage").height(wH-hH);
		$(".page #pageWrapper").css("min-height",wH-hH+10);
	}
	
	fixPageDiv();

		
/**
 * Add parallax Function
 * ----------------------------------------------------------------------------
 */
 	var arrowTimeout;
 
	function parallaxIt(obj,ratio,imgtype,following) {
      var offset = obj.offset().top;
      var objH = obj.height();
      var objW = obj.width();
      
      $(window).scroll(function() {
        paraAction();
        
        
      });
      
      $( window ).resize(function() {
      	paraAction();
      });
      
      
      
      function paraAction() {
      	var wW = $(window).width();
	    var wH = $(window).height();
		var newtop = $(window).scrollTop();
		var currentObjHeight = $(obj).attr("data-imgH");
		var currentObjWidth = $(obj).attr("data-imgW");
		var containerObjHeight = $(obj).height();
		var hH = $("header").height();
		var fit;
		var newSize;
		
		var ratioW = wH/(wW-hH);								// get the ratio of the container
		var ratioObj = currentObjWidth/currentObjHeight;	// get the ratio of the image

		
		if(ratioW <= ratioObj) {
		  	fit = "width";
	    } else {
		  	fit = "height";
	    }
        
        clearTimeout(arrowTimeout);
        
        $(".scrollArrow").fadeOut();
        
        
        arrowTimeout = setTimeout(function() {
	      $(".scrollArrow").fadeIn();
		 },500);
        
        if(imgtype == "background") {
          newtophalf = "" + ((((newtop-offset) * ratio))-hH) + "px";
          
          
          if(fit == "height") {
          	newSize = "auto " + (((containerObjHeight)*(1+ratio)))+"px";
          	headertranslate = "center " + newtophalf + "";
          } else {
	        newSize = "100% auto";
	        headertranslate = "0px " + newtophalf + ""; 
          }
        
          $(obj).css("background-size",newSize);
           
           
          if(offset<(newtop+wH) && (offset+objH)>(newtop-objH)) {
            $(obj).css("background-position",headertranslate);
            $(following).css("background-position",headertranslate);
          }
        } else {
          newtophalf = ""+(((newtop+(wH/2))-offset) * ratio) +"px";
          headertranslate = "translate(0px,"+newtophalf+")";
           
          if(offset<(newtop+wH) && (offset+objH)>(newtop-objH)) {
            $(obj).css("transform",headertranslate);
            $(following).css("transform",headertranslate);
          }
        }
      }
      	
      //Called once upon page load to set the starting position	
      paraAction();
      
  }
  
  var next;
  $(".scrollArrowContainer").click(function(e) {
  		e.preventDefault();
  		var hH = $("header").height();
  		var newtop = $(window).scrollTop();

	   $( ".headerImage" ).each(function() {
		
			var offset = $(this).offset().top;
			
			if(offset > newtop) {
				offset = offset + ($(this).height()-hH);
				$("html, body").animate({ scrollTop: offset }, 600);
				return false;
			}
			
			
		});	
  });
  
  //don't show the scroll arrow if at the bottom of the page
  function hidePromoArrow(){
  	$(".site-main .scrollArrowContainer").removeClass("hidden");
  	
	  var scrollBottom = $(document).height() - $(window).height() - $(window).scrollTop();
	  if (scrollBottom < 300){
		  $(".site-main .scrollArrowContainer").addClass("hidden");
	  }
  }
  
  hidePromoArrow();
	
	$( ".headerImagePara" ).each(function() {
		parallaxIt($(this),0.4,'background',false);
	});
	
	
	
	$( window ).resize(function() {
		
		fixPageDiv();
		
		if(menushown) {
			
			$("#page").css("-webkit-transform", "");
			$("#page").css("-moz-transform", "");
			$("#page").css("transform", "");
			$(".mobile_menu_btn").removeClass("mobile_open");
			$(".mobile-nav").removeClass("mobile_open");
			menushown = false;
		}
  	});
	 	  
	  $( window ).resize(function() {
	 		anchoredFooter();
	 		hidePromoArrow(); 
	  });
	  
	  $( window ).scroll(function(){
		 	hidePromoArrow(); 
	  });
	  
	  
	  function setContentWidth(){
		  var sidebarH = $("#nav_sidebar").height();
		  var highlightH = $(".highlights").height();
		  
		  if (sidebarH < 10 ){
			 $("#nav_sidebar").addClass("hidden");
			 
			 if (highlightH < 10){
				 $("#content").addClass("fullWidth"); 
			 }
		  }
		  else{
			 $("#content").removeClass("fullWidth");  
			 $("#nav_sidebar").removeClass("hidden"); 
		  }
	  }
	  
	   anchoredFooter();
	   
	   setTimeout(function() {
		   anchoredFooter();
	   },300);

	    
	   setContentWidth();
	 
	  
	//add css to all paragraphs after a heading   
	$('.entry-content h3').each(function(e) {
		if ($(this).next().is('p')){
			$(this).next().addClass("no-margin")
		} 
	});
	
	
     
	  
} )( jQuery );
