$(document).ready(function() {

  if($("body").hasClass("home")) {
      $("body").removeClass("page");
  }


  $.simpleWeather({
    location: 'Madison, WI',
    woeid: '',
    unit: 'f',
    success: function(weather) {
      html = '<h2><a href="http://www.channel3000.com/weather" target="_blank"><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+'</a></h2>';


      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
  });

function imageBoxFit() {
	$( "#page .box" ).each(function( index ) {
	  var imgS = $(this).find("img").first();
	  var imgSH = $(imgS).height();
	  var imgSW = $(imgS).width();
	  
	  var imgAR = imgSW / imgSH;
	  
	  
	  
	  
	  var boxH = $(this).height();
	  var boxW = $(this).width();
	  
	  var boxAR = boxW / boxH;
	  
	  
	  //console.log(imgAR + " " + boxAR);
	  if(boxAR >= imgAR) {
		  $(imgS).css("width","100%");
		  $(imgS).css("height","auto");
	  } else {
		  $(imgS).css("height","100%");
		  $(imgS).css("width","auto");
	  }
	  
	});
}

imageBoxFit();

setTimeout(function() {
	imageBoxFit();
},1000);
  


});
