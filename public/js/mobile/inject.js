$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param=[];
	$.each($('input'),function(){
		param[$(this).attr('name')]=$(this).val();
	});
	param.mobile_token=$("#deviceId").val();

	$.ajax({
		url: 'http://dev-deliverbag.supconception.fr/register',
		type : 'POST',
		data : param,
		success: function(data){
			$("#test").val("ok");
		},
		error:function(e){

			$("#infos").html(JSON.stringify(e, null, 2));
		}
	});
	return false;
});

