$("#js-form-login").on('submit',function(e){

	e.preventDefault();
	var param=[];
	$('#js-form-login :input').each(function(){

		if($(this).attr('name') && $(this).val){
		param[$(this).attr('name')]=$(this).val();
		alert(param[$(this).attr('name')]);
        }
	});
    alert(param.length);

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

