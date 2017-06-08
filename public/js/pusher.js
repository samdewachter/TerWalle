$( document ).ready(function() {
	Pusher.logToConsole = true;

    var pusher = new Pusher('0a8fcbf6da321a3ef863', {
      cluster: 'eu',
      encrypted: true,
      authEndpoint: 'pusherauth',
	  auth: {
	    headers: {
	      'X-CSRF-Token': document.getElementById("csrf_token").getAttribute("content")
	    }
	  }
    });

    // var channel = pusher.subscribe('my-channel');
    // channel.bind('my-event', function(data) {
    //   alert(data.message);
    // });
    var channel = pusher.subscribe('private-activity');
    channel.bind('App\\Events\\ActivityLogged', function(data) {
		// alert(data->data.description);

		$("#feed").prepend('<li>\
								<div class="timeline-panel">\
									<div class="timeline-heading">\
										<h4 class="timeline-title">'+ data.data.title +'</h4>\
									</div>\
									<div class="timeline-body">\
										<p>'+ data.data.description +'</p>\
										<small>\
											<i class="fa fa-clock-o"></i>\
											'+ data.data.lapse +'\
										</small>\
									</div>\
								</div>\
							</li>');
    });
});