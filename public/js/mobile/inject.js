$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param=[];
	$.each($('#js-form-login :input'),function(){

		param[$(this).attr('name')]=$(this).val();
		alert(param[$(this).attr('name')]);
	});
	param["mobile_token"]=$("#deviceId").val();
    alert(param);

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');;
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

