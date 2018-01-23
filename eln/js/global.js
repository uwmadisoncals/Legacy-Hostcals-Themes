jQuery (document ).ready(function($){


/**
 * ----------------------------------------------------------------------------
 *
 *  Mobile Menu Logic
 *
 * ----------------------------------------------------------------------------
 */
 

 var menuWidth = $(".site-navigation-container .menu-eln-menu-system-container").width();
 var totalWidth = 0;
 $(".site-navigation-container .menu-eln-menu-system-container > ul > li").each(function() {
		totalWidth = totalWidth  + $(this).width();
 });


 function mobileMenu() {
	  var windowWidth = $(window).width();
	  var menuWidth = $(".site-navigation-container .menu-eln-menu-system-container").width();

	 if(windowWidth < 600) {		
		$(".navcornerleft").css("visibility","hidden");
		$(".navcornerright").css("visibility","hidden");
		$(".mobileTrigger").show();
		$(".logoImage").addClass("mobileMenuOn");
		$("#access").css("visibility","hidden").css("position", "absolute");
		$(".logoImage").css("height","90px").css("margin-left", "3.5em").css("margin-top","1em");
	 } else {
	 
		 if(totalWidth > menuWidth) {
			 $(".navcornerleft").css("visibility","hidden");
			 $(".navcornerright").css("visibility","hidden");
			 $(".mobileTrigger").show();
			 $(".logoImage").addClass("mobileMenuOn");
			 $("#access").css("visibility","hidden").css("position", "absolute");
			 $(".logoImage").css("height","90px").css("margin-left", "3.5em").css("margin-top","1em");
		 } else {
			 if(totalWidth == 0) {
				 $(".navcornerleft").css("visibility","hidden");
				 $(".navcornerright").css("visibility","hidden");
				 $(".mobileTrigger").show();
				 $(".logoImage").addClass("mobileMenuOn");
				 $("#access").css("visibility","hidden").css("position", "absolute");
				 $(".logoImage").css("height","90px").css("margin-left", "3.5em").css("margin-top","1em");
			 } else {
				 $(".navcornerleft").css("visibility","visible");
				 $(".navcornerright").css("visibility","visible");
				 $(".mobileTrigger").hide();
				 $(".logoImage").removeClass("mobileMenuOn");
				 $("#access").css("visibility","visible").css("position", "relative");	
				 $(".logoImage").css("height","99px").css("margin-left", "0").css("margin-top","0");;

			 }
		 }
	 
	 }
	
}

mobileMenu();

$(window).resize(function() {
	mobileMenu();
});

$(".mobileTrigger, .menuOverlay").click(function(e) {
	e.preventDefault();
	
	$(".mobileMenu").toggleClass("mobileMenuShown");
	$(".menuOverlay").toggleClass("mobileMenuShown");
	$("#page").toggleClass("blur");
}); 


/**
 * ----------------------------------------------------------------------------
 *
 *  Sub Menu Logic
 *
 * ----------------------------------------------------------------------------
 */
function subMobileMenu(){

//SUB-LEVEL 1
$('.mobileMenu a').click(function(event){
		
		//Create variable for current element
		var elem = $(this);

		//Check if the parent container of div has children links
		if ($(elem).parent().hasClass('menu-item-has-children')){
		event.preventDefault();
		
		//Grab submenu content and links
		var subMenu = $(elem).next().html();
		var elemText = $(elem).text() + " Overview";
		var elemHref = $(elem).attr("href");

		//Creating a label for overview link and back link
		var overviewLink = "<li class=menu-item><a href='"+elemHref+"'>"+elemText+"</a></li>";
		var backLink = "<li class=menu-item><a href='#' class='backLevel1'>Back</a></li>";

		//Adding sub menu divs ontop of mobile menu div
		$(".mobileMenu").append("<div class='subLevel1'></div>");
		$(".subLevel1").append(subMenu).prepend(overviewLink).prepend(backLink);

		//Delays the adding in sublevel for css transitions
		setTimeout(function() {
			//adds visible class
			$(".subLevel1").addClass("visible");	
			},500);
		

		//implement back link
		$(".backLevel1").click(function(b) {
			b.preventDefault();

			$(".subLevel1").removeClass("visible");
			//Delays the removal for sublevel for css transitions
			setTimeout(function() {
				$(".subLevel1").remove();
			},300);

		});

		//SUB-LEVEL 2
		$('.subLevel1 a').click(function(event){
		
			//Create variable for current element
			var elem = $(this);

			//Check if the parent container of div has children links
			if ($(elem).parent().hasClass('menu-item-has-children')){
			event.preventDefault();
		
			//Grab submenu content and links
			var subMenu = $(elem).next().html();
			var elemText = $(elem).text() + " Overview";
			var elemHref = $(elem).attr("href");

			//Creating a label for overview link and back link
			var overviewLink = "<li class=menu-item><a href='"+elemHref+"'>"+elemText+"</a></li>";
			var backLink = "<li class=menu-item><a href='#' class='backLevel1'>Back</a></li>";

			//Adding sub menu divs ontop of mobile menu div
			$(".subLevel1").append("<div class='subLevel2'></div>");
			$(".subLevel2").append(subMenu).prepend(overviewLink).prepend(backLink);

			//Delays the adding in sublevel for css transitions
			setTimeout(function() {
				//adds visible class
				$(".subLevel2").addClass("visible");	
				},300);
		

			//implement back link
			$(".backLevel1").click(function(b) {
				b.preventDefault();

				$(".subLevel2").removeClass("visible");
				//Delays the removal for sublevel for css transitions
				setTimeout(function() {
					$(".subLevel2").remove();
				},300);

			});
 			}

		});

 	}
});

 }
subMobileMenu();

});