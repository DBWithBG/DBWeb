$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param=[];
	$.each($('#js-form-login :input'),function(){
		param[$(this).attr('name')]=$(this).val();
	});
	param.mobile_token=$("#deviceId").val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	param._token= CSRF_TOKEN;

	alert(param);
    $("#infos").html(JSON.stringify(param, null, 2));
	$.ajax({
		url: 'http://dev-deliverbag.supconception.fr/register',
		type : 'POST',
		data : param,
		success: function(data){
			$("#test").val("ok");
		},
		error:function(e){

			$("#infos").append(JSON.stringify(e, null, 2));
		}
	});
	return false;
});

