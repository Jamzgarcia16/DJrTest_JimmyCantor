{if $opcion != ""}
	{* Cargar un módulo/opción de la aplicación *}
	{if $modulo != ""}
		{include file="$modulo$VERSION.tpl"}
	{else}
		<img src="imagenes/perro_bravo.jpg" width="40%">
	{/if}
{else}
		<!--
		<div id="banner">
			<img class="slider" id="animacion-a" src="img/Conjunto.jpg" alt="">
			<img class="slider" id="animacion-b" src="img/Conjunto2.jpg" alt="">
			<img class="slider" id="animacion-c" src="img/Conjunto3.jpg" alt="">
		</div> -->
	 <img src="imagenes/fondo.jpg" width="70%"> 
{/if}