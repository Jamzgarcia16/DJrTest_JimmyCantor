{foreach $tabla_menus as $fila}
	<a href="{$PROGRAMA}?opcion={$fila.id_menu}">{$fila.titulo}</a><br/>
{/foreach}