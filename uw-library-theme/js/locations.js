// listener for the library map
$(document).ready(function() {
	$(".linfo").click(function() {
		link = $(this).attr("href");
		loc_id = link.replace('#','');
		$("#libraryinfo").html($(this).next().html());
	});
	
	$("#libInfo li .loc").each(function() {
		if ($(this).text().trim() == ""){
			$(this).addClass("hidden");
		}
	});
});