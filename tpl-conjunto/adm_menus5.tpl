<div><h3>ADMINISTRACIÓN DE MENÚS</h3></div>
{if $crud !=""} 	{* Nivel 2 *}


	<div><h4>{$subtitulo}</h4></div>
	<!-- HTML -->
	<form action="{$PROGRAMA}" enctype="multipart/form-data" method="post">
	  <div class="form-group">
	    <label for="id_menu">ID</label>
	    <input type="text" class="form-control" id="id_menu" name="id_menu" value="{$fila.id_menu}"{$at1}>
	  </div>
	  <div class="form-group">
	    <label for="titulo">Titulo:</label>
	    <input type="text" class="form-control" id="titulo" name="titulo" value="{$fila.titulo}"{$at2}>
	  </div>

	  <div class="form-group">
	    <label for="modulo">Modulo:</label>
	    <input type="text" class="form-control" id="modulo" name="modulo" value="{$fila.modulo}"{$at3}>
	  </div>

	  <div class="form-group">
	    <label for="icono">Icono</label>
	    <input type="text" class="form-control" id="icono" name="icono" value="{$fila.icono}"{$at3}>
	  </div>

	  <div class="form-group">
	    <label for="url">URL</label>
	    <input type="text" class="form-control" id="url" name="url" value="{$fila.url}"{$at3}>
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
        <th>Titulo</th>
        <th>Modulo</th>
        <th>Icono</th>
        <th>URL</th>
        <th>Borrar</th>
      </tr>
    </thead>
    <tbody>
	{foreach $tabla_menus as $fila}
		<tr>
			<td><a href="{$PROGRAMA}?opcion={$opcion}&crud=u&idu={$fila.id_menu}" class="btn btn-primary" style="font-size:12px; color: white;" title="Editar"><i class="fa fa-edit"></i></a></td>
			<td>{$fila.id_menu}</td>
			<td>{$fila.titulo}</td>
			<td>{$fila.modulo}</td>
			<td>{$fila.icono}</td>
			<td>{$fila.url}</td>
			<td><a href="{$PROGRAMA}?opcion={$opcion}&crud=d&idu={$fila.id_menu}" class="btn btn-danger" style="font-size:12px; color: white;" title="Eliminar"><i class="fa fa-trash-o"></i></a></td>
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