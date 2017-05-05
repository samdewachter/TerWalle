$( document ).ready(function() {
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

	$('.input-label-float').blur(function(){
		value = $(this).val();
		if (value.length > 0) {
			$(this).addClass('valid');
		} else if (value.length == 0 && $(this).hasClass('valid')) {
			$(this).removeClass('valid');
		} 
	});

	$('.alert button.close').click(function(){
		$(".alert").fadeOut();
	});

	setTimeout(function() {
        $(".alert").fadeOut();
    }, 10000);

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
});