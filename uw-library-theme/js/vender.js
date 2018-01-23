// Primo Search Box
// Reworked for new library website.
function searchPrimo() {
	var tempQueryValue = document.getElementById("primoQueryTemp").value; 
	document.getElementById("primoQuery").value = "any,contains," + tempQueryValue.replace(/\,/g,""); 
	return true;
}

//Sage Research Methods Collection

$( "#credoMultiSearchForm3" ).submit(function( event ) {
  event.preventDefault();
	
	var f = $("#credoMultiSearchForm3");
	
	if($("#qSage").val()=='') {
		$(".formError").show().text('Please search for something');
	} else {
		$(".formError").hide();
		var qSage=escape($("#qSage").val());
		var searchURL = "http://search.credoreference.com.ezproxy.library.wisc.edu/search/advanced/?include=";
		var searchURL2 = "&books=sagemeasure,sagesurveyr,sagequalrm,sagessrm,sagerd&headingsOnly=false&sort=relevance#searchType=classic&offset=0&searchTopics=false";
		var u3 = searchURL + qSage + searchURL2;
		
		window.open(u3,"credo");
	}
});