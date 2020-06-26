{if $opcion != ""}
	{* Cargar un módulo/opción de la aplicación *}
	{if $modulo != ""}
		{include file="$modulo$VERSION.tpl"}
	{else}
		<img src="imagenes/perro_bravo.jpg" width="80%">
	{/if}
{else}
	 	<!-- 	<img src="fotos/fondo.jpg" width="80%"> -->
		<div class="container">
		<h2>Comercial App.</h2>
		<p>Aplicacion DEMO.</p>

		<!-- Button to Open the Modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		Abrir Perfil
		</button>

		<!-- The Modal -->
		<div class="modal fade" id="myModal">
		<div class="modal-dialog">
		  <div class="modal-content">
		  
		    <!-- Modal Header -->
		    <div class="modal-header">
		      <h4 class="modal-title">{$SOFTWARE}</h4>
		          <br>
		          <div class="card" style="width:400px">
		            <img class="card-img-top" src="fotos/bugs.jpg" alt="Card image" style="width: 100px; heigth: 200px;">
		          </div>
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		    </div>
		    
		    <!-- Modal body -->
		    <div class="modal-body">
		       <div class="card-body">
		          <p class="card-text">Bienvenidos a el Software {$SOFTWARE} Version {$VERSION}, Estan en el <strong>{$NOMBRE_DROGUERIA} </strong>
		          <br> 
		          Quiero Expresarles mis mas sinceros agradecimientos por haber ingresado y leido este comentario, 
		          <strong> de ante mano que todo lo que quiera le sea consedido si es con disciplina y esfuerzo que lucho por ello. <strong>
		          <br>
		          By. Jamz Garcia
		          <br>
		          <strong>Feliz Dia.</strong>
		          <br>
		          <small> Publicacado el 26 de Junio de 2020.</small></p>
		        </div>
		    </div>
		    
		    <!-- Modal footer -->
		    <div class="modal-footer">
		      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		    </div>
		    
		  </div>
		</div>
		</div>

		</div>
		<br>

		<div class="container">
			<h2>Instituto Tecnico de Capacitacion INTECAP</h2>
			<p>#SmartyPHP</p>
			<div class="card img-fluid" style="width:300px height: 600px">
			<img class="card-img-top" src="images/php.jpg" alt="Card image" style="width:100%">
				<div class="card-img-top">
				  <h4 class="card-title">#WEB_AVANZADO</h4>
				  <p class="card-text" style="color: red;">#PHP</p>
				</div>
				<div>
				<p> otro div en el inicio </p>
					
				</div>
			</div>
		</div>

		<br>
{/if}

