$(document).ready(function(){    
	$("form.mailform").submit(function(){
		var form = $(this);
		form.find(".form-loader").fadeIn();
		$.ajax({
			type: 'POST', 
			url: '/mailforms/send-message/',
			data: form.serialize(),
			//async: false,
			success: function(data) {
				form.find(".form-result").fadeIn();
				form.find(".form-result").html(data);
				form.find(".form-loader").fadeOut();
			},
			error: function(error) {
				console.log(error);
				alert("Произошла ошибка!");
				form.find(".form-loader").fadeOut();
			}
		});	
		return false;
	})
})