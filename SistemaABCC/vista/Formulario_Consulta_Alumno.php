<?php 
    session_start();
    if ($_SESSION['autenticado'] == false) {
        header("location:login_usuario.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Buscar alumnos</title>
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
       <li><a href="Formulario_bajas_cambios.php">Bajas Y Consultas</a></li>
      <li class="active"><a href="Formulario_Consulta_Alumno.php">Consultas</a></li>
      <li><a href="cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>
    <div class="container">
        <h2>Buscar alumnos</h2>
        <form method="POST" action="Formulario_Consulta_Alumno.php">
            <div class="form-group">
                <div class="form-group">
                    <label><input type="radio" name="buscar" value="semestre"> Semestre: </label>
                    <input type="text" class="form-control" placeholder="I.S.C" name="txt_semestre">
                </div>
                <div class="form-group">
                    <label><input type="radio" name="buscar" value="carrera"> Carrera: </label>
                    <input type="text" class="form-control" placeholder="I.S.C" name="txt_carrera">
                </div>
                <div class="form-group">
                    <label><input type="radio" name="buscar" value="apellido"> Primer apellido: </label>
                    <input type="text" class="form-control" placeholder="De La Torre" name="txt_primerAp">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Num. Control</th>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Edad</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>    
                <?php 
                    include_once("../scripts_php/alumno_dao.php");
                    $aDAO = new AlumnoDAO();
                    $listaAlumnos=$aDAO->obtenerTodos();

                    if (isset($_REQUEST['buscar'])) {
                        $radio = $_REQUEST["buscar"];
                        $semestre = $_POST["txt_semestre"];
                        $carrera = $_POST["txt_carrera"];
                        $primerApe = $_POST["txt_primerAp"];
                        if($radio == 'semestre'){
                            $listaAlumnos=$aDAO->obtenerSemestre($semestre);
                        }
                        else if($radio == 'carrera'){
                            $listaAlumnos=$aDAO->obtenerCarrera($carrera);
                        }
                        else if($radio == 'apellido'){
                            $listaAlumnos=$aDAO->obtenerAP($primerApe);
                        }
                    }

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
                </tr>   
                <?php
                    }
                ?>  
            </tbody>
        </table>
    </div>
</body>
</html>