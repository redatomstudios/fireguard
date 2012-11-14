/* Javascript Document */
/* Created by redAtom Studios @ 2012 */

var alert_id = 0;
var notify_delay = 3000;
var notifyStack = [];
var liveNotifications = 0;
var maxParallelNotify = 2;
var emailRegex = /\S+@\S+\.\S+/;

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

jQuery(document).ready(function($){

	if(document.getElementById('email').value != 'Email') {
		document.getElementById('email').value = 'Email';
	}

	$('input[type="text"], input[type="password"]').focus(function(){
		var cElement = $(this)[0];
		if(cElement.value.toLowerCase() == "email" || cElement.value.toLowerCase() == "password") {
			cElement.value = '';
			cElement.style.color = "#000";
		}
	}).blur(function(){
		var cElement = $(this)[0];
		if(cElement.value == "") {
			cElement.value = cElement.name;
			cElement.style.color = "rgba(0, 0, 0, 0.3)";
		}
	});

	$('div#signup').click(function(){
		$('#splashButtons').hide();
		$('#password').hide();
		document.getElementById('submitButton').value = 'Sign Up';
		document.getElementById('submitType').value = 's';
		$('#inputs').show();
	});

	$('div#login').click(function(){
		$('#splashButtons').hide();
		$('#password').show();
		document.getElementById('submitButton').value = 'Login';
		document.getElementById('submitType').value = 'l';
		$('#inputs').show();
	});

	$('#cancelButton').click(function(){
		$('#inputs').hide();
		$('#splashButtons').show();
	});

	$('form#access').submit(function(e) {
		e.preventDefault();
		var errorMessages = [];
		if(!emailRegex.test(document.getElementById('email').value)) {
			errorMessages.push(['Please enter a valid email address.', 0]);
		}
		if(document.getElementById('submitType').value == 'l') {
			if(document.getElementById('password').value.length <= 5)
				errorMessages.push(['Password is too short.', 0]);
		}
		if(errorMessages.length == 0) {
			this.submit();
		} else {
			$.each(errorMessages, function(index, value){
				stackNotify(value[0], value[1]);
			});
			openNotification();
		}
	});

	// Notification scriptlet?!?! Sets up the notifier on each page and handles notifications...like a boss. :D
	$('body').append('<div id="notifier"></div>')
});