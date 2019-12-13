<?php 
	session_start();
	if ($_SESSION['autenticado'] == false) {
		header("location:login_usuario.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bajas Y Modificaciones</title>

	<style type="text/css">
		table, th, td{
			 border: 1px solid navy;
		}
	</style>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Ménu principal</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="formulario_altas_alumnos.php">Altas</a></li>
      <li class="active"><a href="Formulario_bajas_cambios.php">Bajas Y Consultas</a></li>
      <li><a href="Formulario_Consulta_Alumno.php">Consultas</a></li>
      <li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>
	
	<!-- ------------------------------------------------------------------------------------------ -->

	<div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Eliminar Y Modificar Alumno</h2></div>
                    <div class="col-sm-4">
                        <a href="formulario_altas_alumnos.php" class="btn btn-info add-new">
                        	<i class="fa fa-plus"></i> 
                        	Agregar ALUMNO
                        </a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Numero de Control</th>
                        <th>Nombre(s)</th>
                        <th>Primer Ap.</th>
						<th>Segundo Ap.</th>
                        <th>Edad</th>
                        <th>Semestre</th>
                        <th>Carrera</th>
                        <th>REALIZAR</th>
                    </tr>
                </thead>
                 
                <tbody>    
                        <?php 
                        	include_once("../scripts_php/alumno_dao.php");
							$aDAO = new AlumnoDAO();
							$listaAlumnos=$aDAO->obtenerTodos();

							while ($fila=mysqli_fetch_object($listaAlumnos)){
									$nc = $fila->Num_Control;
									$n = $fila->Nombre_Alumno;
									$pa = $fila->Primer_Ap_Alumno;
									$sa = $fila->Segundo_Ap_Alumno;
									$e = $fila->Edad;
									$s = $fila->Semestre;
									$c = $fila->Carrera;
								?>
								<tr>
									<td><?php echo $nc;?></td>
									<td><?php echo $n;?></td>
									<td><?php echo $pa;?></td>
									<td><?php echo $sa;?></td>
									<td><?php echo $e;?></td>
									<td><?php echo $s;?></td>
									<td><?php echo $c;?></td>
									
									<td style="text-align: center;">
										<a href="actualizar.php?nc=<?php echo $nc;?>" class="edit" title="Edición" data-toggle="tooltip">
											<i class="fa fa-pencil" style="font-size:30px;color:orange;"></i>
										</a>
										<a href="../scripts_php/procesar_baja.php?nc=<?php echo $nc;?>" class="delete" title="Eliminación" data-toggle="tooltip">
											<i class="fa fa-trash" style="font-size:30px;color:red; padding-left: 30px;"></i>									
										</a>
									</td>
								</tr>	
						<?php
							}
						?>  
                </tbody>
            </table>
        </div>
    </div>
	</body>
</html>