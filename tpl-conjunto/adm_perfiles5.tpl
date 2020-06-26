<div><h3>ADMINISTRACIÓN DE PERFILES</h3></div>
{if $crud !=""} 	{* Nivel 2 *}

	<div><h4>{$subtitulo}</h4></div>
	<!-- HTML -->
	<form action="{$PROGRAMA}" enctype="multipart/form-data" method="post">
	  <div class="form-group">
	    <label for="id_perfil">ID</label>
	    <input type="text" class="form-control" id="id_perfil" name="id_perfil" value="{$fila.id_perfil}"{$at1}>
	  </div>
	  <div class="form-group">
	    <label for="nombre_perfil">Nombre Perfil:</label>
	    <input type="text" class="form-control" id="nombre_perfil" name="nombre_perfil" value="{$fila.nombre_perfil}"{$at2}>
	  </div>


	  <button type="submit" name="aceptar" class="btn btn-primary" value="{$boton}">{$boton}</button>
	  <button type="reset" class="btn btn-primary">Reestablecer</button>
	  <button type="submit" name="aceptar" class="btn btn-primary" value="Regresar">Regresar</button>
	  
	  <input type="hidden" name="opcion" value="{$opcion}">
	  <input type="hidden" name="operacion" value="{$crud}">
	</form>

{else} 	{* Nivel 1 *}<!-- Comentario -->
  {$mensaje}
  <table class="table table-hover">
    <thead>
      <tr>
      	<th>Editar</th>
        <th>ID</th>
        <th>Nombre Perfil</th>
        <th>Borrar</th>
      </tr>
    </thead>
    <tbody>
	{foreach $tabla_perfiles as $fila}
		<tr>
			<td><a href="{$PROGRAMA}?opcion={$opcion}&crud=u&idu={$fila.id_perfil}" class="btn btn-primary" style="font-size:12px; color: white;" title="Editar"><i class="fa fa-edit"></i></a></td>
			<td>{$fila.id_perfil}</td>
			<td>{$fila.nombre_perfil}</td>
			<td><a href="{$PROGRAMA}?opcion={$opcion}&crud=d&idu={$fila.id_perfil}" class="btn btn-danger" style="font-size:12px; color: white;" title="Eliminar"><i class="fa fa-trash-o"></i></a></td>
		</tr>
	{/foreach}
	<tr>
		<td colspan="7">
			<a href="{$PROGRAMA}?opcion={$opcion}&crud=c" class="btn btn-warning" style="font-size:12px;" title="Adicionar"><i class="fa fa-plus"></i> Adicionar</a>
		</td>
	</tr>
    </tbody>
  </table>
{/if}