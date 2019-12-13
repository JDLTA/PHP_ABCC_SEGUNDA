<?php 

	session_start();

	$error_usuario = "";
	$error_contra = "";

	$host="localhost:3306";
    $usuario = "root";
    $contra = "";
    $bd = "escuela_web";

    $dbs = new mysqli($host, $usuario, $contra, $bd);

    if($dbs->connect_error){
    	die("La conexión ha fallado, error número " . $db->connect_errno . ": " . $db->connect_error);
	}
	if (isset($_POST['txt_usuario']) && isset($_POST['txt_clave'])) {
		if (!empty($_POST['txt_usuario']) && !empty($_POST['txt_clave'])) {
			if (strlen($_POST['txt_usuario'])==8) {
				$u = $_POST['txt_usuario'];
				$c = $_POST['txt_clave'];
				$u = limpiarCadena($u);
				$c = limpiarCadena($c);

				//Proceso de alta de usuario
				$sql = $dbs->prepare("INSERT INTO login VALUES(sha1($u), sha1($c))");

				$sql->bind_param('ss', $u, $c);

				if ($sql->execute()) {
					$_SESSION['usuario_agregado'] = "Usuario agregado con exito";
				}else{
					$_SESSION['usuario_agregado'] = "Error al agregar el usuario";
				}

					$sql->close();

				header("location:../vista/formulario_registro_usuario.php");

				
			}else{
				//$error_usuario = "Debe ser de 8 caracteres";
				$_SESSION['error_usuario'] = "Debe ser de 8 caracteres";
				$_SESSION['valor_usuario'] = $_POST['txt_usuario'];
				$_SESSION['valor_c'] = $_POST['txt_clave'];
				header("location:../vista/formulario_registro_usuario.php");
			}
		}else{
			$error_usuario = "Usuario vacio";
			$error_contra = "Contraseña vacia";	
			header("location:../vista/formulario_registro_usuario.php");
		}
	}

	
	function limpiarCadena($cadena){
		$cadena = trim($cadena);
		$cadena = stripslashes($cadena);
		$cadena = htmlspecialchars($cadena);
		return $cadena;

	}

 ?>