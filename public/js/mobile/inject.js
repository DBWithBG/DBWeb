$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param=[];
	alert('start');
	$.each($('#js-form-login :input'),function(){
		alert($(this).val());
		alert($(this)[0].val());

		param[$(this).attr('name')]=$(this).val();
	});
	alert('end');
	param["mobile_token"]=$("#deviceId").val();
	alert('start');
	alert(param['mobile_token']);
	alert($("#deviceId").val());
	alert('end');
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	param["_token"]= CSRF_TOKEN;

	param[0]="fdp";
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

