$( document ).ready(function() {
	
	$(".find-a-library .list a").click(function(event) {
		event.stopPropagation();
		
		var notEmpty = false;
		var featureIds = [];
		
		$(this).toggleClass("checked");
		
		$("#features-options li a").each(function() {
			
			if($(this).hasClass("checked")) {
				notEmpty = true;
				var itemtxt = $(this).text();
				var itemid = $(this).closest("li").attr("data-eid");
				featureIds.push(itemid);
			} 
			
		});

		
		$(".librariesList li .linfo").each(function() {
			var listTemp = $(this);
			var dataFeatures = $(this).attr("data-features");
			var isFound = 0;
			dataFeatures = eval(dataFeatures);
			
			if(notEmpty) {
				
				$.each( featureIds, function( index, value ){
				    var requestId = value;
				    
				    $.each( dataFeatures, function( index2, value2 ){
				    	if(requestId == value2) {
				    		isFound ++;
				    	} 
					});
				});
				
				if(isFound == featureIds.length){
					$(listTemp).closest("li").show("slow");
				}
				else{
					$(listTemp).closest("li").hide("slow");
				}
			} 
			else{
				$(listTemp).closest("li").show("slow");
			}
		});	
		
		
		
		var subjectsStr = "";
		var subjectnotEmpty = false;
		
		$("#subjects-options li a").each(function() {
			if($(this).hasClass("checked")) {
				subjectnotEmpty = true;
				var itemtxt = $(this).text();
				
					if(subjectsStr == "") {
						subjectsStr = itemtxt;
					} else {
						subjectsStr = subjectsStr + " & " + itemtxt;
					}
				
				$("#subjects-options .drop_down").text(subjectsStr);
			} 
			
		});
		
		if(!subjectnotEmpty) {
			$("#subjects-options .drop_down").text("Any Subject");
		}
		
	});
	
	$(".find-a-library .drop_down").click(function(event) {
		event.stopPropagation();
		
		$(this).next(".list").slideToggle(300);
		$(this).toggleClass("active");
		
		
		
	});
	
});