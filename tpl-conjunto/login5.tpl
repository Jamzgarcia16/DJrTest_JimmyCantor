<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Acceso</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="js/rollups/hmac-sha3.js"></script>
	<script type="text/javascript" src="js/components/sha3.js"></script>
	<script type="text/javascript">
		function validar() {
			// DOM: Document Objects Model
			// $("#pwd").val( CryptoJS.SHA3( $("#pwd").val() ) ); // JQuery

			// JavaScript
			if (document.forms[0].email.value == "") {
				alert("Se requiere el email");
				document.forms[0].email.focus();
				return false;
			}
			if (document.forms[0].pwd.value == "") {
				alert("Se requiere la contraseña");
				document.forms[0].pwd.focus();
				return false;
			}

			document.forms[0].pwd.value = CryptoJS.SHA3( document.forms[0].pwd.value ); 
		}
	</script>
</head>
<body>
	<div class="container">
		<div class="card">
  		<div class="card-header"><h1>{$SOFTWARE}</h1></div>
  		<div class="card-body">
		  	<form action="{$LOGINI}" method="post" onsubmit="return validar();">
		  		<div class="form-group">
		    		<label for="email">Cuenta:</label>
		    		<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico">
		  		</div>
		  		<div class="form-group">
		    		<label for="pwd">Contraseña:</label>
		    		<input type="password" class="form-control" id="pwd" name="pwd" placeholder="Clave">
		  		</div>
		  		<div class="form-group form-check">
		    		<label class="form-check-label">
		      		<input class="form-check-input" type="checkbox"> Recordar
		    		</label>
  				</div>
  			<button type="submit" class="btn btn-primary">Aceptar</button>
		</form>
		<hr/>
		{$error1}
  		</div> 
  		<div class="card-footer">{$EMPRESA}<br/>
  			<small><strong>Autor: {$AUTOR}</strong></small>
  		</div>
	</div>
	</div>
</body>
</html>