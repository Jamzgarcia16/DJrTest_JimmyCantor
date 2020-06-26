<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ConjuntoSeguro.com</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>
<div class="card">
  <div class="card-header">

  <div class="row">
    <div class="col-sm-9" style="text-align: center;">
      {include file="encabezado$VERSION.tpl"}
    </div>
    <div class="col-sm-3" style="text-align: center;">
    {include file="usuario$VERSION.tpl"}
    </div>
  </div>

  </div>
  <div class="card-body">
  <div class="row">
    <div class="col-sm-2" style="text-align: left;">
      {include file="menu$VERSION.tpl"}
    </div>
    <div class="col-sm-10" style="text-align: left;">
      {include file="contenido$VERSION.tpl"}
    </div>
  </div>
  </div> 
  <div class="card-footer" style="text-align: center;">
  {include file="pie$VERSION.tpl"}
  </div>
</div>
</body>
</html>