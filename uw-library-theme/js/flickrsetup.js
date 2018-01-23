jQuery( document ).ready(function( $ ) { 

	var fc = $('.flickrfeed');

	if(fc) {
		var fcid = $('.flickrfeed').attr("data-flickrid");
		var flimit = $('.flickrfeed').attr('data-limit');
		var ftag = $('.flickrfeed').attr('data-flickrtag');

		$('.flickrfeed ul').jflickrfeed({
			limit: flimit,
				qstrings: {
				id: fcid,
				tags: ftag
			}, 
			itemTemplate: '<li data-imageid="{{image}}"><a href="{{image_b}}"><img src="{{image_q}}" alt=" " /><span class="foverlay"></span></a></li>',
			itemCallback: function(){
			
				$('.flickrfeed ul li').each(function() {
					var fid = $(this).attr('data-imageid');
					fid = fid.split('/');
					fid = fid[4];
					fid = fid.split('_');
					fid = fid[0];
				
					var newURL = "https://www.flickr.com/photos/"+fcid+"/"+fid;
				
					$(this).find('a').attr("href",newURL);
				});
			
				
			}
		});	
		
		
		
	}

	
});