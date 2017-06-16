$( document ).ready(function() {
	var scroll = $(window).scrollTop();

	if ($('.alert').length != 0) {
		setTimeout(function(){
		    $('.alert').fadeOut();
		}, 6000);
	}

     //>=, not <=
    if (scroll >= 100) {
        $(".navbar").addClass('fixMargin');
    } else {
    	
    	$(".navbar").removeClass('fixMargin');
    }

    if (scroll >= 60) {	    	
    	$(".navbar").addClass("showNavbar");	        
        $(".background").addClass("fixBackground");
    } else {
    	$(".navbar").removeClass("showNavbar");
    	$(".background").removeClass("fixBackground");
    }
	$(window).scroll(function() {    
	    var scroll = $(window).scrollTop();

	     //>=, not <=
	    if (scroll >= 100) {
	        $(".navbar").addClass('fixMargin');
	    } else {
	    	
	    	$(".navbar").removeClass('fixMargin');
	    }

	    if (scroll >= 60) {	    	
	    	$(".navbar").addClass("showNavbar");	        
	        $(".background").addClass("fixBackground");
	    } else {
	    	$(".navbar").removeClass("showNavbar");
	    	$(".background").removeClass("fixBackground");
	    }
	});

});