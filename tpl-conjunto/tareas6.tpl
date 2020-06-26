<div><h3>ADMINISTRACIÓN DE TAREAS</h3></div>
<table id="tabla1" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Editar</th>
            <th>ID</th>
            <th>Tarea</th>
            <th>Descripcion Tarea</th>
            <th>Estado</th>
            <th>Observacion</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
  {foreach $tabla_tareas as $fila}
  <tr>
    <td style="text-align: center;">
      <a href="#" title="Editar" data-toggle="modal" data-target="#myModal"  onclick="return editar({$fila.id_tarea},this.parentNode.parentNode.id);"><i class="fa fa-edit" style="font-size:24px; color:blue;"></i></a>
    </td>
    <td>{$fila.id_tarea}</td>
    <td>{$fila.nombre_tarea}</td>
    <td>{$fila.descripcion_tarea}</td>
    <td>{$fila.estado}</td>
    <td>{$fila.observacion}</td>

    <td style="text-align: center;">
      <a href="#" title="Eliminar" data-toggle="modal" data-target="#myModal" onclick="return eliminar({$fila.id_tarea},this.parentNode.parentNode.id);"><i class="fa fa-trash-o" style="font-size:24px; color:red;"></i></a>
    </td>
  </tr>
  {/foreach}
  </tbody>
    <tfoot>
        <tr>
            <th>Editar</th>
            <th>ID</th>
            <th>Tarea</th>
            <th>Descripcion Tarea</th>
            <th>Estado</th>
            <th>Observacion</th>
            <th>Borrar</th>
        </tr>
        <tr>
            <th colspan="2" style="text-align: center;"><a href="#"  data-toggle="modal" data-target="#myModal" onclick="return adicionar();"><i class="fa fa-plus-square" style="font-size:24px;color:green"></i> Adicionar </a></th>
            <th colspan="2">
            <button onclick="cargar_reporte();"><i class="fa fa-file-pdf-o" style="font-size:24px;color:red"></i> Show Saludo </button>
            </th>
            <th colspan="3"></th>
        </tr>
    </tfoot>
</table>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 id="subtitulo_modal" class="modal-title">Modal Heading</h4>
        <span onclick="$('#myModal').modal(&quot;hide&quot;);" class="close text-muted" title="Cerrar">X</span>
      </div>    
      <!-- Modal body -->
      <div id="body_modal" class="modal-body">

         <form action="/action_page.php">
          <div class="form-group">
            <label for="id_tarea">ID:</label>
            <input type="text" class="form-control" id="id_tarea">
          </div>
          <div class="form-group">
            <label for="nombre_tarea">Tarea:</label>
            <input type="text" class="form-control" id="nombre_tarea">
          </div>
          <div class="form-group">
            <label for="descripcion_tarea">descripcion_tarea:</label>
            <input type="text" class="form-control" id="descripcion_tarea">
          </div>
          <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" class="form-control" id="estado">
          </div>
          
          <div class="form-group">
            <label for="observacion">Observacion:</label>
            <input type="text" class="form-control" id="observacion">
          </div>

          <button id="boton" type="submit" class="btn btn-primary" onclick="return grabar();">Grabar</button>
          <input type="hidden" id="crud" value="">
          <input type="hidden" name="row_crud" id="row_crud" value="">
        </form>
      </div>      
      <!-- Modal footer -->
      <div id="footer-modal" class="modal-footer">
        <span onclick="$('#myModal').modal(&quot;hide&quot;);" class="close text-muted" title="Cerrar">X</span>
      </div>
      
    </div>
  </div>
</div>

<script src="js/CAPP/tareas.js"></script>