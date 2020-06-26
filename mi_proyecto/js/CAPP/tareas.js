function editar(argument,obj) {
    //alert(obj);
    yy=obj.split("-");  // En PHP:   explode
    //alert(yy[1]);
    $("#row_crud").val(yy[1]);
    // $("#row_crud").val(obj);
    $("#subtitulo_modal").text("Edición de Tareas");
    $("#id_tarea").val(argument);
    $("#boton").text("Grabar").removeClass("btn-danger btn-warning").addClass("btn-primary");
    $("#crud").val("u");

    $.post("trae_tareas.php",
    {
        id_tarea: argument
    },
    function(data, status) { // Callback
        objson = JSON.parse(data);
        // alert("Data: " + objson.titulo + "\nStatus: " + status);
        $("#id_tarea").val(objson.id_tarea).attr("readonly", true);
        $("#nombre_tarea").val(objson.nombre_tarea).attr("readonly", false);
        $("#descripcion_tarea").val(objson.descripcion_tarea).attr("readonly", false);
        $("#estado").val(objson.estado).attr("readonly", false);
        $("#observacion").val(objson.observacion).attr("readonly", false);        
    });

 }
 function eliminar(argument,obj) {
     yy=obj.split("-");  // En PHP:   explode
    //alert(yy[1]);
    $("#row_crud").val(yy[1]);
    $("#subtitulo_modal").text("Eliminación Tareas");
    $("#id_tarea").val(argument);
    $("#boton").text("Eliminar").addClass("btn-danger").removeClass("btn-primary btn-warning");
    $("#crud").val("d");

    $.post("trae_tareas.php",
    {
        id_tarea: argument
    },
    function(data, status){ // Callback
        objson = JSON.parse(data);
        // alert("Data: " + objson.titulo + "\nStatus: " + status);
        $("#id_tarea").val(objson.id_tarea).attr("readonly", true);
        $("#nombre_tarea").val(objson.nombre_tarea).attr("readonly", true);
        $("#descripcion_tarea").val(objson.descripcion_tarea).attr("readonly", true);
        $("#estado").val(objson.estado).attr("readonly", true);
        $("#observacion").val(objson.observacion).attr("readonly", true);   
    });
    
 }

  function adicionar(argument,obj) {
    $("#row_crud").val("");
    $("#subtitulo_modal").text("Creación de Tareas");
    $("#boton").text("Crear Tarea").addClass("btn-warning").removeClass("btn-primary btn-danger");
    $("#crud").val("c");
    $("#id_tarea").val("").attr("disabled", true);

  $.post("trae_tareas.php",
    {
      
    },
    function(data, status){ // Callback
      objson = JSON.parse(data);
      alert(data);
      $("#id_tarea").val("").attr("readonly", true);
      $("#nombre_tarea").val("").attr("readonly", false);
      $("#descripcion_tarea").val("").attr("readonly", false);
      $("#estado").val("").attr("readonly", false);
      $("#observacion").val("").attr("readonly", false);
    });
}
 function cargar_reporte() {
    alert("Js Te Saluda, Hello Friend!!");
 }

 function grabar() {
    // alert("Se dió click");
    $.post("graba_tareas.php",
    {
        crud: $("#crud").val(),
        id_tarea: $("#id_tarea").val(),
        nombre_tarea: $("#nombre_tarea").val(),
        descripcion_tarea: $("#descripcion_tarea").val(),
        estado: $("#estado").val(),
        observacion: $("#observacion").val()
    },
    function(data, status) { // Callback
        // objson = JSON.parse(data);
        // alert("Data: " + data + "\nStatus: " + status);
        var t = $('#tabla1').DataTable();
        //console.log(t);
        //t.on( 'draw', function () {
        //    console.log( 'Redraw occurred at: '+new Date().getTime() );
        //} );

        switch ($("#crud").val()) {
          case 'u': // Update
            t.row($("#row_crud").val()).data(new Array(
            '<a href="#" title="Editar" data-toggle="modal" data-target="#myModal" onclick="return editar('+$("#id_tarea").val()+',this.parentNode.parentNode.id);"><i class="fa fa-edit" style="font-size:24px;color:blue;"></i></a>',
            $("#id_tarea").val(),
            $("#nombre_tarea").val(),
            $("#descripcion_tarea").val(),
            $("#estado").val(),
            $("#observacion ").val(),
            '<a href="#" title="Eliminar" data-toggle="modal" data-target="#myModal" onclick="return eliminar('+$("#id_tarea").val()+',this.parentNode.parentNode.id);"><i class="fa fa-trash-o" style="font-size:24px;color:red;"></i></a>')).draw( false );
            //t.row($("#row_crud").val()).draw();
            alert("Se Actualiza registro exitosamente");
            break;
          case 'd': // Delete
            if ($("#row_crud").val()!="") {
              t.row($("#row_crud").val()).remove().draw( false );
              alert("Se Elimina registro exitosamente");
            }
            break;
          case 'c': // Create
            objson = JSON.parse(data);
            var uu = t.row.add( [
              '<a href="#" data-toggle="modal" data-target="#myModal" onclick="return editar('+objson.id_tarea+',this.parentNode.parentNode.id);"><i class="fa fa-edit" style="font-size:24px;color:blue;"></i></a>',
              objson.id_tarea,
              $("#nombre_tarea").val(),
              $("#descripcion_tarea").val(),
              $("#estado").val(),
              $("#observacion").val(),
              '<a href="#" data-toggle="modal" data-target="#myModal" onclick="return eliminar('+objson.id_tarea+',this.parentNode.parentNode.id);"><i class="fa fa-trash-o" style="font-size:24px;color:red;"></i></a>'
            ] ).draw( false );
            alert("Se Grabo registro exitosamente");
            // console.log( y.rows().data() );
            break;
        }

        //alert("Data: " + data);
        $('#myModal').modal("hide");
        return(false);
    });
    return(false);
 }