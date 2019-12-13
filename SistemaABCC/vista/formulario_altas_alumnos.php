<?php 
	session_start();
	if ($_SESSION['autenticado'] == false) {
		header("location:login_usuario.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Altas alumnos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ménu principal</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="formulario_altas_alumnos.php">Altas</a></li>
       <li><a href="Formulario_bajas_cambios.php">Bajas Y Consultas</a></li>
      <li><a href="Formulario_Consulta_Alumno.php">Consultas</a></li>
       <li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>

<div class="container">
  <h2>Altas alumnos</h2>
  <form  method="POST" action="../scripts_php/procesar_alta.php">
    <div class="form-group">
     
         <div class="form-group">
          <label>Num. Control:</label>
          <input type="text" class="form-control" placeholder="S15070125" name="txt_num_control">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

       <div class="form-group">
          <label>Nombre:</label>
          <input type="text" class="form-control" placeholder="Jose" name="txt_nombre">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

        <div class="form-group">
          <label>Primera apellido:</label>
          <input type="text" class="form-control" placeholder="De La Torre" name="txt_primer_ap">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

        <div class="form-group">
          <label>Segundo apellido:</label>
          <input type="text" class="form-control" placeholder="Arellano" name="txt_segundo_ap">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

        <div class="form-group">
          <label>Edad:</label>
          <input type="text" class="form-control" placeholder="22" name="txt_edad">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>

         <div class="form-group">
          <label>Semestre:</label>
          <input type="text" class="form-control" placeholder="9" name="txt_semestre">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>
        
         <div class="form-group">
          <label>Carrera:</label>
          <input type="text" class="form-control" placeholder="Ingenieria En Sistemas" name="txt_carrera">
          <small class="form-text text-muted">Campo obligatorio</small>
        </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
    <button type="reset" class = "btn btn-warning">Borrar información</button>
  </form>

</div>

</body>
</html>
