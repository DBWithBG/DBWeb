$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param=[];
	$.each($('input'),function(){
		param[$(this).attr('name')]=$(this).val();
	});
	param.mobile_token=$("#deviceId").val();

	alert(param);
	console.log(param);
	$.ajax({
		url: 'http://dev-deliverbag.supconception.fr/register',
		type : 'POST',
		data : param,
		success: function(data){
			$("#test").val("ok");
		},
		error:function(e){
            $("#infos").html('Informations incorrectes');
		}
	});
	return false;
});

