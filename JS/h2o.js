/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

var alert_id = 0;
var notify_delay = 3000;
var notifyStack = [];
var liveNotifications = 0;
var maxParallelNotify = 2;
var emailRegex = /\S+@\S+\.\S+/;


// Notification functions
var openNotification = function() {
	if(notifyStack.length > 0 && liveNotifications <= maxParallelNotify) {
		var thisMessage = notifyStack.shift(); // Get the latest message
		var thisType = thisMessage.split('|')[1]; // Separate the message type and message
		thisMessage = thisMessage.split('|')[0];
		$('div#notifier').append('<div id="m'+alert_id+'" class="'+(thisType == '1' ? 'notification' : 'alert')+'">'+thisMessage+'</div>') // Create control string to output to JS
		var this_id = '#m' + alert_id++;
		$(this_id).animate({height: 2+'em'}, function(){
			liveNotifications++;
			if(liveNotifications < maxParallelNotify) { // Open notifications in parallel, until limit reached
				openNotification();
			}
			setTimeout(function(){
				$(this_id).queue('fx', []).animate({height: 0}, function(){
					$(this).hide().remove();
					if(liveNotifications == maxParallelNotify)
						openNotification(); // Check stack and repeat when last message is fired
					liveNotifications--;
				});
			}, notify_delay);
		});
	}
}

var stackNotify = function(message, type) {
	notifyStack.push(message + '|' + type);
}

// Navigation functions
var toggleNav = function(){
	$('#navWrap > nav').queue('fx', []).slideToggle(100);
}

jQuery(document).ready(function($){

	// Notification scriptlet?!?! Sets up the notifier on each page and handles notifications...like a boss. :D
	$('body').append('<div id="notifier"></div>');

	// Diagnostic Code
	$('body').append('<div id="diagConsole" style="position: absolute; top: 0; left: 0;"></div>');
	$('#diagConsole').append('<div id="screenSize"></div><div id="userAgent"></div>');
	//$('div#userAgent').html(navigator.appName);
	$('div#screenSize').html($(window).width() + 'x' + $(window).height());
	$(window).resize(function(){
		$('div#screenSize').html($(window).width() + 'x' + $(window).height());
	});
	// End Diagnostic Code

	// Navigation Code
	$('div#navPulldown').click(function(){
		toggleNav();
	});
});