$(document).ready(function() {
	$('#contactform').on('submit', function(event) {
		event.preventDefault();
		$.ajaxSetup({
		   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});
		var url = '/contact-form';

		$.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: {
				 _token: $('meta[name="csrf-token"]').attr('content'),
				 message: $('form#contactform').serialize();
			}
		})
		.success(function){
			console.log('success');
			$('.ui.hidden.success.message').removeClass('hidden');
		}
		.fail(function() {
			console.log("error");
			$('.ui.hidden.error.message').removeClass('hidden');
		})
		
		


	});


});