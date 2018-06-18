$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var response = {
	"email" : $("#email").val(),
	"password":$("#password").val(),
	"mobile_token" : $("#deviceId").val()
	};

	$.ajax({
		url: 'http://dev-deliverbag.supconception.fr/mobile/login',
		type : 'POST',
		data : {"response" : response},
		success: function(data){
			alert(data);
			$("#test").val("ok");
		},
		error:function(e){
			alert('erreur de connexion');
		}
	});
	return false;
});

