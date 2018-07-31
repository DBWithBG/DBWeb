$("form").on('submit',function(e){

	var formulaire=$(this);
	var idFormulaire=$(this).attr('id');
	alert(idFormulaire);
	e.preventDefault();
	var param={};

	$('#'+idFormulaire+' :input').each(function(){

		if($(this).attr('name') && $(this).val){
		param[$(this).attr('name')]=$(this).val();
        }
	});

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');;
	$.ajax({
		url: formulaire.attr('url'),
		type : 'POST',
		data : param,
		success: function(data){
			alert(data);
			$("#test").val("ok");
		},
		error:function(e){

			alert('ok');
			alert(JSON.stringify(e));
			alert(e);
			$("#infos").append(JSON.stringify(e, null, 2));
		}
	});
	return false;
});

