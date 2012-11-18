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
						openNotification(); // When last message is fired, check stack and repeat if there are more messages.
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

	// Navigation Code
	$('div#navPulldown').click(function(){
		toggleNav();
	});

	// Form Hinting Scriptlet || Uses the data-hint attribute 
	$.each($('input[type="text"], input[type="password"]'), function(){
		if(this.attributes['data-hint']) {
			this.value = this.attributes['data-hint'].value;
			this.style.color = "rgba(0, 0, 0, 0.3)";
		}
	});

	$('input[type="text"], input[type="password"]').focus(function(){
		if(this.value == this.attributes['data-hint'].value) {
			this.value = "";
			this.style.color = "#000";
		}
	}).blur(function(){
		if(this.value == '') {
			this.value = this.attributes['data-hint'].value;
			this.style.color = "rgba(0, 0, 0, 0.3)";
		}
	});

});