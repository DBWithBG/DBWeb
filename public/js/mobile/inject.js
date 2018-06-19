$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param = {
	"email" : $("#email").val(),
	"password":$("#password").val(),
	"mobile_token" : $("#deviceId").val()
	};

	alert(param);
	$.ajax({
		url: 'http://dev-deliverbag.supconception.fr/mobile/login',
		type : 'POST',
		data : param,
		success: function(data){
			$("#test").val("ok");
		},
		error:function(e){
			alert('erreur de connexion');
		}
	});
	return false;
});

