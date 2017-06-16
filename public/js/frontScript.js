$( document ).ready(function() {
	/* MASONRY ALBUMS */

	$('.grid').masonry({
		itemSelector: '.grid-item',
		columnWidth: 1,
	});

	/* CLOSE ALERT */

	$(document).on("click", '.alert button.close',function(){
		$(".alert").fadeOut();
	});

	if ($('.alert').length != 0) {
		setTimeout(function(){
		    $('.alert').fadeOut();
		}, 6000);
	}	

	/* PROFILE PICTURE EDIT */

	$('.new-cover-photo').hide();
	$('.cancel-cover-photo').hide();

	$('.new-cover-btn').click(function(){
		$('.new-cover-photo').show();
		$('.cancel-cover-photo').show();
		$('.current-cover-wrapper').slideUp();
		$(this).hide();
	});

	$('.cancel-cover-photo').click(function(){
		$('.new-cover-photo').hide();
		$('.new-cover-btn').show();
		$('.current-cover-wrapper').slideDown();
		$(this).hide();
	});

	/* INPUT LABEL */

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

});