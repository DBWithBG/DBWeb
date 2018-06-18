var response = {
    "mobile_token" : $("#deviceId").val()
};

$.ajax({
    url: 'http://dev-deliverbag.supconception.fr/deliveries/customers/',
    type : 'POST',
    data : {"response" : response},
    success: function(data){
        alert(data);
    },
    error:function(e){
        alert('erreur de connexion');
    }
});
