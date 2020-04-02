$('#addCont').on('click', function(){
	$.ajax({
		url:'interaction.php',
		type:'GET',
		data:{
			interaction: 'add_contact',
			report: getUrlVars()["userID"]
		},
		success:function(response, status){
			alert('Контакт успешно добавлен');
			window.location.href = "http://bs?userID=" + getUrlVars()["userID"];
		}
	})
});

function getUrlVars() {
var vars = {};

var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
		vars[key] = value;
	});

	return vars;
}