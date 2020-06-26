
document.getElementById("myBtn").addEventListener("click", function(){
document.getElementById("demo").innerHTML = "Hello Friends Good Day!";
});
$(document).ready(function()
	{
	$("#boton01").click(function () {
	if($("#nombre").val() == "" || $("#nombre").val() == null){
		alert("Debe Llenar el Formulario");
	}else{
		var a = $("#nombre").val();
		a = a.charAt(0).toUpperCase() + a.slice(1);
		alert(a);	
	}	
	

	});

	$("#boton02").click(function () {
	if($("#saludo").val() == "" || $("#saludo").val() == null){
		alert("Debe Ingresar Hola ó hola en el Formulario");
	}else if($("#saludo").val() == "Hola" || $("#saludo").val() == "hola"){
		alert("TRUE, OK, Verdadero")
		
	}else{
		alert("false, False")
	}	
	

	});

});