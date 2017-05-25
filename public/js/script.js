$( document ).ready(function() {
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$('.treeview-menu').hide();

    //Ripple effect when you click on a button
	var parent, ink, d, x, y;
	$("aside ul li a").click(function(e){
		parent = $(this).parent();
		//create .ink element if it doesn't exist
		if($(this).find(".ink").length == 0)
			$(this).prepend("<span class='ink'></span>");
			
		ink = $(this).find(".ink");
		//incase of quick double clicks stop the previous animation
		ink.removeClass("animate");
		
		//set size of .ink
		if(!ink.height() && !ink.width())
		{
			//use parent's width or height whichever is larger for the diameter to make a circle which can cover the entire element.
			d = Math.max(parent.outerWidth(), parent.outerHeight());
			ink.css({height: d, width: d});
		}
		
		//get click coordinates
		//logic = click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center;
		x = e.pageX - parent.offset().left - ink.width()/2;
		y = e.pageY - parent.offset().top - ink.height()/2;
		
		//set the position and add class .animate
		ink.css({top: y+'px', left: x+'px'}).addClass("animate");
		// ink.removeClass('animate');

	})

	var parent, ink, d, x, y;
	$(".btn-custom").click(function(e){
		parent = $(this).parent();
		//create .ink element if it doesn't exist
		if($(this).find(".ink2").length == 0)
			$(this).prepend("<span class='ink2'></span>");
			
		ink = $(this).find(".ink2");
		//incase of quick double clicks stop the previous animation
		ink.removeClass("animate");
		
		//set size of .ink
		if(!ink.height() && !ink.width())
		{
			//use parent's width or height whichever is larger for the diameter to make a circle which can cover the entire element.
			d = Math.max(parent.outerWidth(), parent.outerHeight());
			ink.css({height: d, width: d});
		}
		
		//get click coordinates
		//logic = click coordinates relative to page - parent's position relative to page - half of self height/width to make it controllable from the center;
		x = e.pageX - parent.offset().left - ink.width()/2;
		y = e.pageY - parent.offset().top - ink.height()/2;
		
		//set the position and add class .animate
		ink.css({top: y+'px', left: x+'px'}).addClass("animate");
		// ink.removeClass('animate');

	})

	//Slide animation when you click on a nested nav element
	$('.treeview').click(function(){
		$.when(
			$(this).next().stop().slideToggle(500, "swing")
		).then(function(){
			$('.treeview-menu span').remove();
		});
		$('.fa-angle-down', this).toggleClass('treeview-active');
	});

	$('.hamburger-button').click(function(){
		$('aside').toggleClass('sidenav-active');
		$('.background-fade').toggleClass('background-fade-show');
	});

	$('.background-fade').click(function(){
		$('aside').toggleClass('sidenav-active');
		$('.background-fade').toggleClass('background-fade-show');
	});

	$('.input-label-float').each(function() {
		if ($(this).val() != '') {
	    	$(this).addClass('valid');
		}
	});

	$(document).on("blur", '.input-label-float',function(){
		value = $(this).val();
		if (value.length > 0) {
			$(this).addClass('valid');
		} else if (value.length == 0 && $(this).hasClass('valid')) {
			$(this).removeClass('valid');
		} 
	});

	$(document).on("click", '.alert button.close',function(){
		$(".alert").fadeOut();
	});

	// setTimeout(function() {
 //        $(".alert").fadeOut();
 //    }, 10000);

    itemNumber = $('.grocery-items').find(".form-group").length;

    if (itemNumber <= 1) {
    	$('.delete-grocery-item').hide();
    }

    $('.extra-grocery-item').click(function(){    	
    	itemNumber = $('.grocery-items').find(".form-group").length;
    	
    	$('.grocery-items').append('<div class="form-group clearfix">\
									<div class="col-md-2">\
										<input type="number" name="quantity[]" class="form-control input-label-float">\
										<label class="label-float">Hoeveel</label>\
									</div>\
									<div class="col-md-10">\
										<input type="text" name="items[]" class="form-control input-label-float">\
										<label class="label-float">Item '+ (itemNumber+1) +'</label>\
									</div>\
								</div>');

    	if (itemNumber +1 > 1) {
    		$('.delete-grocery-item').show();
    	}
    });

    $('.delete-grocery-item').click(function(){
    	itemNumber = $('.grocery-items').find(".form-group").length;

    	if (itemNumber > 1) {
    		$('.grocery-items .form-group').last().remove();
    	}

    	if(itemNumber-1 <= 1) {
    		$('.delete-grocery-item').hide();
    	}
    });

    /* FULLCALENDAR */

    $('.draggable-events .fc-event').each(function() {
      
  		// store data so the calendar knows to render an event upon drop
  		$(this).data('event', {
  			title: $.trim($(this).text()), // use the element's text as the event title
  			stick: false // maintain when user navigates (see docs on the renderEvent method)
  		});
  
  		// make the event draggable using jQuery UI
  		$(this).draggable({
  			zIndex: 999,
  			revert: true,      // will cause the event to go back to its
  			revertDuration: 0  //  original position after the drag
  		});
  
  	});

    $('#calendar').fullCalendar({
        header: {
  			left: 'title',
  			center: 'none',
  			right: 'prev,next today'
  		},
  		events: 'taplijst/getTapList',
  		droppable: true,
  		editable: true,
  		eventClick: function(calEvent, jsEvent, view)
        {
            var r=confirm("Delete " + calEvent.title);
            if (r===true)
            {
            	$.ajax({
	        		url: 'taplijst/'+ calEvent.id +'/delete',
	        		data: {
	        			'_method': 'DELETE',
	        		},
	        		type: 'DELETE',
	        		success: function() {
	        			$('.alert.alert-success').remove();
	        			$('.alert-wrapper').append('<div class="alert alert-success">\
							<button type="button" class="close">×</button>\
							<h4>Success!</h4>\
					        Tapper succesvol verwijderd\
					    </div>');
	        		},
	        		error: function() {
	        			console.log('error');
	        		}
	        	});
                $('#calendar').fullCalendar('removeEvents', calEvent._id);
            }
        },
        eventDrop: function(event, delta, revertFunc, jsEvent, ui, view) 
        {
        	$.ajax({
        		url: 'taplijst/'+ event.id +'/update',
        		data: {
        			'start': event.start.format(),
        		},
        		type: 'POST',
        		success: function() {
        			$('.alert.alert-success').remove();
        			$('.alert-wrapper').append('<div class="alert alert-success">\
						<button type="button" class="close">×</button>\
						<h4>Success!</h4>\
				        Tapper succesvol aangepast\
				    </div>');
        		},
        		error: function() {
        			console.log('error');
        		}
        	});
        },
        drop: function(date, jsEvent, ui, resourceId)
        {
        	var originalEventObject = $(this).data('event');
        	var eventTitle = originalEventObject.title;
        	var eventDate = date.format();

        	$.ajax({
        		url: 'taplijst/save',
        		data: {
        			'start': eventDate,
        			'title': eventTitle
        		},
        		type: 'POST',
        		success: function() {
        			$('.alert.alert-success').remove();
        			$('.alert-wrapper').append('<div class="alert alert-success">\
						<button type="button" class="close">×</button>\
						<h4>Success!</h4>\
				        Tapper succesvol Toegevoegd\
				    </div>');
				    $('#calendar').fullCalendar('refetchEvents' );
        		},
        		error: function() {
        			console.log('error');
        		}
        	});
        }
    });

    /* REUPLOAD BTN */

    $('#reupload-report').click(function(){
    	$('.input-report-upload').show();
    	$(this).hide();
    });

    /* CHARTS */

    function loadChart(chartBind, xColumn, yColumn){
    	var chart = c3.generate({
		    bindto: '#'+chartBind,
		    data: {
		    	x: 'x',
		      columns: [
		      	xColumn,
		        yColumn,
		      ],
		      type: 'bar'
		    },
		    axis: {
		    	x: {
		    		type: 'category'
		    	},
		    	rotated: true
		    },
		    bar: {
		    	width:{
		    		ratio: 0.5
		    	}
		    }
		});
    }

    // numberOfCharts = $('.chart-wrapper').find(".chart").length;
    numberOfCharts = $('.chart-wrapper').find(".chart");

    

    $.each(numberOfCharts, function(chartIndex, chart){
    	// console.log('CHARTS: ', value.id);
    	console.log(chart.id.slice(-1));
    	$.ajax({
    		url: 'polls/'+ chart.id.slice(-1) +'/results',
    		type: 'GET',
    		success: function(data) {
    			xColumn = ['x'];
    			yColumn = ['Votes'];

    			$.each(data['answers'], function(answerIndex, answer){
    				xColumn.push(answer);
    			});

    			$.each(data['votes'], function(votesIndex, vote){
    				yColumn.push(vote);
    			});

    			loadChart(chart.id, xColumn, yColumn);
    		},
    		error: function() {
    			console.log('error');
    		}
    	});
    });

	/* ADD POLL QUESTION */

	itemNumber = $('.poll-answers').find(".form-group").length;

    if (itemNumber <= 1) {
    	$('.delete-poll-answer').hide();
    }

    $('.extra-poll-answer').click(function(){    	
    	console.log('clicked');
    	itemNumber = $('.poll-answers').find(".form-group").length;
    	
    	$('.poll-answers').append('<div class="form-group clearfix">\
										<input type="text" name="answers[]" class="form-control input-label-float">\
										<label class="label-float">Antwoord '+ (itemNumber+1) +'</label>\
								</div>');

    	if (itemNumber +1 > 1) {
    		$('.delete-poll-answer').show();
    	}
    });

    $('.delete-poll-answer').click(function(){
    	itemNumber = $('.poll-answers').find(".form-group").length;

    	if (itemNumber > 1) {
    		$('.poll-answers .form-group').last().remove();
    	}

    	if(itemNumber-1 <= 1) {
    		$('.delete-poll-answer').hide();
    	}
    });

    // publish event checkbox

    $(".publish").change(function(){
    	var publish = $(this).prop('checked');
    	var id = $(this).attr('id');

    	$.ajax({
    		url: 'evenementen/publish',
    		data: {
    			'publish': publish,
    			'id': id
    		},
    		type: 'POST',
    		success: function() {
    			if (publish) {
    				$('.alert.alert-success').remove();
	    			$('.alert-wrapper').append('<div class="alert alert-success">\
						<button type="button" class="close">×</button>\
						<h4>Success!</h4>\
				        Evenement succesvol gepubliceerd.\
				    </div>');
    			} else {
    				$('.alert.alert-success').remove();
	    			$('.alert-wrapper').append('<div class="alert alert-success">\
						<button type="button" class="close">×</button>\
						<h4>Success!</h4>\
				        Evenement succesvol verborgen.\
				    </div>');
    			}
    			
    		},
    		error: function() {
    			console.log('error');
    		}
    	});
    });

    /* SEARCH BUTTON */

    $('.search-button').click(function(){
    	var visible = $('.search input').toggleClass('search-active').is(':visible');
    	if (visible) {
    		$('.search input').focus();
    	}
    });

    /* USERS PAID CHECKBOX */

    $(".paid").change(function(){
        var paid = $(this).prop('checked');
        var id = $(this).attr('id');

        $.ajax({
            url: 'leden/betaald',
            data: {
                'paid': paid,
                'id': id
            },
            type: 'POST',
            success: function() {
                if (paid) {
                    $('.alert.alert-success').remove();
                    $('.alert-wrapper').append('<div class="alert alert-success">\
                        <button type="button" class="close">×</button>\
                        <h4>Success!</h4>\
                        Lid succesvol Betaald.\
                    </div>');
                } else {
                    $('.alert.alert-success').remove();
                    $('.alert-wrapper').append('<div class="alert alert-success">\
                        <button type="button" class="close">×</button>\
                        <h4>Success!</h4>\
                        Betaling lid succesvol verwijderd.\
                    </div>');
                }
                
            },
            error: function() {
                console.log('error');
            }
        });
    });
});