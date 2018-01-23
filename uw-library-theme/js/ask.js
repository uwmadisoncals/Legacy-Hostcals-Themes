// Handles library help chat.

// 1) Determine if a location is online. Find all chat-button class links
//    and check status.


// Fetch account to check from data-account attribute


// Change "Offline" to "Chat Now"  (offline is default when page loads?)

// Remove offline class, add button class

// if online, also attach proper click listener.

// Returns a URL that opens a chat window for a given account.
function url_for_chat(acct, skin) {
	return "http://libraryhelp.library.wisc.edu/chat/" + acct + "@chat.libraryhelp.library.wisc.edu?skin=" + skin;
}

// Checks to see if account is online
function check_chat_online(obj, acct, skin) {
	url = "//api.library.wisc.edu/api/chat/status_cached/" + acct;
	$.get( url, function(data) {		
		if ( data.indexOf("online") > -1 ) {
			$(obj).html("Chat Now");
			$(obj).removeClass("offline");
			$(obj).addClass("button");
			$(obj).click(function() {
				window.open(url_for_chat(acct, skin), "chat", 'resizable=1,width=450,height=500');
				return false;
			});
		} else {
			$(obj).html("Offline");
			$(obj).removeClass("button");
			$(obj).addClass("offline");
		}
	});
}

// Checks to see if account is online
function check_chat_online_global(obj, acct, skin) {
	url = "//api.library.wisc.edu/api/chat/status_cached/" + acct;
	$.get( url, function(data) {		
		if ( data.indexOf("online") > -1 ) {
			$(obj).removeClass("offline");
			$(obj).click(function() {
				window.open(url_for_chat(acct, skin), "chat", 'resizable=1,width=450,height=500');
				return false;
			});
		} else {
			if(acct == "askuwlibrary") {
				// We already checked above, don't bother checking again.
				$(obj).parent().addClass("offline");
			} else {
				url = "//api.library.wisc.edu/api/chat/status_cached/askuwlibrary";
				$.get( url, function(data) {		
					if ( data.indexOf("online") > -1 ) {
						$(obj).removeClass("offline");
						$(obj).click(function() {
							window.open(url_for_chat("askuwlibrary", "134"), "chat", 'resizable=1,width=450,height=500');
							return false;
						});
					} else {
						$(obj).parent().addClass("offline");
					}
				});
			}
		}
	});
}


$(document).ready(function() {
	function askPageCheck() {
		$(".chat-button").each(function() {
			acct = $(this).data('account');
			skin = $(this).data('skin');
			
			if (skin == undefined) {
				skin = "134";
			}
			
			if (acct !== undefined) {
				check_chat_online($(this), acct, skin);
				
				
			}
		});
	}
	
	function askHeadingCheck() {
		$(".ask-chat-link").each(function() { 
			acct = $(this).data('account');
			skin = $(this).data('skin');
			
			if (skin == undefined) {
				skin = "134";
			}
			
			if (acct !== undefined) {
				check_chat_online_global($(this), acct, skin);
			}
			
		});
	}
	
	// Load initial state, 600ms after page load
	// Hopefully reduce api requests from people loading the page
	// and then navigating away quickly.
	// setTimeout(function(){
	// 	askHeadingCheck();
	// 	askPageCheck();
	// },600);
	askHeadingCheck();
	askPageCheck();

	
	//check for the ASK option in the heading
	setInterval(function() {	
		askHeadingCheck();
		askPageCheck();
	},300000);
});