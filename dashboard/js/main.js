$(document).ready(function() {


$( "a.details" ).click(function() {

  var hash = $(this).closest(".entry-content").find(".hashLink").attr("data-hash");
  var issues = $(this).closest(".entry-content").find(".listedIssues").html();
  var url = $(this).attr("href");
  url = url + " #ajaxload";

  //console.log(hash);

$(".contentContainer").show();
  $( ".contentContainerContent" ).load( url, function() {
      $(".contentContainer").addClass("show");
      $("#container").addClass("blur");

      if(issues) {
        $(".issuesContainer").html(issues);
      }

      if(hash) {
      var latCommitUrl = $("#ajaxload a.latestCommit").attr("href");
      latCommitUrl = latCommitUrl + hash;

      $("#ajaxload a.latestCommit").attr("href",latCommitUrl);
      $("#ajaxload a.latestCommit").text(hash);
    }
  });

  return false;
});

$(".contentContainer a.close").click(function() {
  $(".contentContainer").removeClass("show");
  $(".contentContainer").addClass("hide");
$("#container").removeClass("blur");
  setTimeout(function() {

    $(".contentContainer").hide();
    $(".contentContainer").removeClass("hide");
  },500);
  return false;
});

        Highcharts.setOptions({
            global: {
                useUTC: false
            }
        });

        //var chart;




var randMessage = Math.floor((Math.random()*5)+1);

if(randMessage == 1) {
  $(".subHeading .message").text("I miss my trapper keeper.");
} else if(randMessage == 2) {
  $(".subHeading .message").text("I knew there was something I had to do...");
} else if(randMessage == 3) {
  $(".subHeading .message").text("Short term memory?");
} else if(randMessage == 4) {
  $(".subHeading .message").text("Just imagine how much you would get done if IE didn't exist.");
}

setTimeout(function() {
$(".subHeading .message").fadeIn();
},1000);


var frequencyVal = 30000;
var frequencyInterval;

  function sortItems() {

    $('.primaryHome').isotope({
      masonry: {

      },
      getSortData: {
        name: '.name',
        server: '.server',
        number: '.responseContainerData parseInt'
      },
      sortBy: 'name',
      sortAscending: sortOrder
    });

    if(sortType == "name") {

      $('.primaryHome').isotope({
        sortBy: 'name',
        sortAscending: sortOrder
      });
      $('.primaryHome').isotope('updateSortData').isotope();
    } else if(sortType == "server") {
      $('.primaryHome').isotope({
        sortBy: 'server',
        sortAscending: sortOrder
      });
      $('.primaryHome').isotope('updateSortData').isotope();
    } else {

      $('.primaryHome').isotope({
      sortBy: 'number',
      sortAscending: sortOrder
      });
      $('.primaryHome').isotope('updateSortData').isotope();

    }
  }

  var storedSortType = localStorage.getItem("sortedby");
  var storedSortOrder = localStorage.getItem("sortorder");
  var responseFrequency = localStorage.getItem("frequency");


  if(responseFrequency) {
    frequencyVal = responseFrequency;

    clearInterval(frequencyInterval);
    frequencyInterval = setInterval(function() {
      //console.log(frequencyVal);
    $( ".cardContainer" ).each(function( index ) {
        var siteurl = "http://" + $(this).attr("data-siteurl");
        var screenshoturl = "http://api.thumbalizr.com/?url=http://" + $(this).attr("data-siteurl") + "&width=350";
        pingSite(siteurl,this);
    });
    }, frequencyVal);

    $(".responseFrequency a").removeClass("selected");
    $(".responseFrequency a").each(function() {
      var currentSort = $(this).attr("data-frequency");

      if(currentSort == frequencyVal) {
        $(this).addClass("selected");
        //sortItems();
      }
    });
  } else {
    var frequencyVal = 30000;
    clearInterval(frequencyInterval);
    frequencyInterval = setInterval(function() {
      //console.log(frequencyVal);
    $( ".cardContainer" ).each(function( index ) {
        var siteurl = "http://" + $(this).attr("data-siteurl");
        var screenshoturl = "http://api.thumbalizr.com/?url=http://" + $(this).attr("data-siteurl") + "&width=350";
        pingSite(siteurl,this);
    });
    }, frequencyVal);
  }


  if(storedSortType) {
    var sortType = storedSortType;
    $(".sortingOptions a").removeClass("selected");
    $(".sortingOptions a").each(function() {
      var currentSort = $(this).attr("data-sorttype");

      if(sortType == "responseTime") {
          $(".responseFrequency").show();
      } else {
          $(".responseFrequency").hide();
      }

      if(currentSort == sortType) {
        $(this).addClass("selected");
        //sortItems();
      }
    });
  } else {
    var sortType = "name";
    $(".responseFrequency").hide();
  }

  //console.log(storedSortOrder);
  if(storedSortOrder) {
    var sortOrderVal = storedSortOrder;
    if(sortOrderVal == "asc") {
      sortOrder = true;
    } else {
      sortOrder = false;
    }
    $(".sortingOrder a").removeClass("selected");
    $(".sortingOrder a").each(function() {
      var currentSort = $(this).attr("data-sortorder");
      if(currentSort == sortOrderVal) {
        $(this).addClass("selected");
        //console.log(sortOrder);
        //sortItems();
      }
    });
  } else {

    var sortOrder = true;

  }

  sortItems();

  $(".sortingOptions a").click(function() {
    $(".sortingOptions a").removeClass("selected");
    $(this).addClass("selected");
    sortType = $(this).attr("data-sorttype");

    if(sortType == "responseTime") {
      $(".responseFrequency").show();
    } else {
      $(".responseFrequency").hide();
    }

    localStorage.setItem("sortedby", sortType);
    sortItems();
    return false;
  });

  $(".sortingOrder a").click(function() {
    $(".sortingOrder a").removeClass("selected");
    $(this).addClass("selected");
    sortOrderVal = $(this).attr("data-sortorder");
    if(sortOrderVal == "asc") {
      sortOrder = true;
    } else {
      sortOrder = false;
    }
    //console.log(sortOrderVal);
    localStorage.setItem("sortorder", sortOrderVal);
    sortItems();
    return false;
  });

  $(".responseFrequency a").click(function() {
    $(".responseFrequency a").removeClass("selected");
    $(this).addClass("selected");
    frequencyVal = $(this).attr("data-frequency");
    //console.log(sortOrderVal);
    clearInterval(frequencyInterval);
    frequencyInterval = setInterval(function() {
      //console.log(frequencyVal);
    $( ".cardContainer" ).each(function( index ) {
        var siteurl = "http://" + $(this).attr("data-siteurl");
        var screenshoturl = "http://api.thumbalizr.com/?url=http://" + $(this).attr("data-siteurl") + "&width=350";
        pingSite(siteurl,this);
    });
    }, frequencyVal);


    localStorage.setItem("frequency", frequencyVal);
    //sortItems();
    return false;
  });








  $( "a" ).mouseover(function() {
    var text = $(this).attr("data-tooltip");
    if(text) {
      $(this).closest(".cardContainer").find(".screenshot").addClass("blur");
      $(this).closest(".cardContainer").find(".overlay").addClass("darken");
      $(this).closest(".cardContainer").find(".overlaytext").text(text);
    }
  });

  $( "a" ).mouseout(function() {
    var text = $(this).attr("data-tooltip");
    if(text) {
      $(this).closest(".cardContainer").find(".screenshot").removeClass("blur");
      $(this).closest(".cardContainer").find(".overlay").removeClass("darken");
      $(this).closest(".cardContainer").find(".overlaytext").text("");
    }
  });

  $( ".responseContainer" ).mouseover(function() {
    $(this).closest(".cardContainer").find(".chart").show();
    $(this).closest(".cardContainer").find(".screenshot").addClass("blur");
    $(this).closest(".cardContainer").find(".overlay").addClass("darken");
    return false;
  });

  $( ".responseContainer" ).mouseout(function() {
    $(this).closest(".cardContainer").find(".chart").hide();
    $(this).closest(".cardContainer").find(".screenshot").removeClass("blur");
    $(this).closest(".cardContainer").find(".overlay").removeClass("darken");
    return false;
  });



var cl = 0;
var firstrun = true;

$( ".cardContainer" ).each(function( index ) {

  var siteurl = "http://" + $(this).attr("data-siteurl");
  var screenshoturl = "http://api.thumbalizr.com/?url=http://" + $(this).attr("data-siteurl") + "&width=350";

  //get response times
  pingSite(siteurl,this);

  var currentObj = $(this);

  $(this).find('.chart').highcharts({
      chart: {
          type: 'spline',
          animation: Highcharts.svg, // don't animate in old IE
          marginRight: 0,
          backgroundColor:'rgba(255, 255, 255, 0.0)',
          height: 155,
          width: 305,
          events: {
              load: function() {
                  // set up the updating of the chart each second
                  var series = this.series[0];
                  var prevY;
                  setInterval(function() {
                      var x = (new Date()).getTime(); // current time

                          //y = Math.random();
                          //y = parseInt($(this).closest(".cardContainer").attr("data-responsetime"), 10);
                          var y = parseInt($(currentObj).attr("data-responsetime"), 10);
                          //console.log(test);
                          if(prevY != y) {
                            series.addPoint([x, y], true, true);
                          }
                          prevY = y;

                  }, 15000);
              }
          }
      },

      title: {
          text: '',
          color: '#FFFFFF'
      },
      xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          color: '#FFFFFF'
      },
      yAxis: {
          title: {
              text: '',
              color: '#FFFFFF'
          },
          plotLines: [{
              value: 0,
              width: 1,
              color: '#FFFFFF'

          }]
      },
      tooltip: {
          formatter: function() {
                  return '<b>'+ this.series.name +'</b><br/>'+
                  Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                  Highcharts.numberFormat(this.y, 2);
          }
      },
      plotOptions: {
        series: {
            color: '#FFFFFF'
        }
      },
      legend: {
          enabled: false
      },
      exporting: {
          enabled: false
      },
      series: [{
          name: 'Random data',
          data: (function() {
              // generate an array of random data
              var data = [],
                  time = (new Date()).getTime(),
                  i;

              for (i = -10; i <= 0; i++) {
                  data.push({
                      x: time + i * frequencyVal,
                      y: Math.floor(Math.random()*(80-35+1)+35)
                  });
              }
              return data;
          })()
      }]
  });


});


function pingSite(siteurl,obj) {
  var sendDate = (new Date()).getTime();

  $.ajax({
      //type: "GET", //with response body
      type: "HEAD", //only headers
      url: siteurl,
      statusCode: {
        404: function() {
          //alert( "page not found" );
          $(obj).find(".responseContainerStatus").show();
          $(obj).find(".responseContainer").addClass("problem");
          $(obj).find(".responseContainerStatus").text("Error 404");
        },
        500: function() {
          //alert( "page not found" );
          $(obj).find(".responseContainerStatus").show();
          $(obj).find(".responseContainer").addClass("problem");
          $(obj).find(".responseContainerStatus").text("Database Error 500");
        },
        206: function() {
          //alert( "page not found" );
          $(obj).find(".responseContainerStatus").show();
          $(obj).find(".responseContainer").addClass("warning");
          $(obj).find(".responseContainerStatus").text("Partial Error 206");
        },
        401: function() {
          //alert( "page not found" );
          $(obj).find(".responseContainerStatus").show();
          $(obj).find(".responseContainer").addClass("problem");
          $(obj).find(".responseContainerStatus").text("Unauthorized Error 401");
        },
        403: function() {
          //alert( "page not found" );
          $(obj).find(".responseContainerStatus").show();
          $(obj).find(".responseContainer").addClass("problem");
          $(obj).find(".responseContainerStatus").text("Forbidden Error 403");
        },
        200: function() {
          //alert("pagefound");
          $(obj).find(".responseContainerStatus").hide();
          $(obj).find(".responseContainerStatus").text("All is well.");
        }
      },
      success: function(){

          var receiveDate = (new Date()).getTime();

          var responseTimeMs = receiveDate - sendDate;
          var responseTimeMsName = responseTimeMs + "ms";

          $(obj).closest(".cardContainer").attr("data-responsetime",responseTimeMs);

          if(responseTimeMs >= 120 && responseTimeMs < 300) {
              $(obj).find(".responseContainer").addClass("warning");
          } else if(responseTimeMs >= 300) {
              $(obj).find(".responseContainer").addClass("problem");
          } else {
            $(obj).find(".responseContainer").removeClass("problem");
            $(obj).find(".responseContainer").removeClass("warning");
          }
          //console.log(responseTimeMs);
          $(obj).find(".responseContainerData").text(responseTimeMsName);
          //console.log(responseTimeMs);

          cl = cl + 1;
          if(cl == $( ".cardContainer" ).length) {
            //console.log("all done");

          if(sortType == "responseTime") {


            $('.primaryHome').isotope('updateSortData').isotope();



          }

            cl = 0;
          }


      }


  });
}

});
