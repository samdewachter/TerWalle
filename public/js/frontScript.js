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

});