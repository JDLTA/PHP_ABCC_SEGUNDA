<?php 
	
	$conexion = mysqli_connect('localhost', 'root', '', 'escuela_web');

	if ($conexion) {
		echo "Se  conecto" . "<br>";

		$u = $_POST['txt_usuario'];
		$c = $_POST['txt_clave'];
		
		$u_cifrado = sha1($u);
		$c_cifrado = sha1($c);

		$sql = "SELECT * FROM login WHERE usuario = '$u' AND contra = '$c'";

		$res = mysqli_query($conexion, $sql);

		if (mysqli_num_rows($res)==1) {
			session_start();
			$_SESSION['autenticado'] = true;
			$_SESSION['usuario'] = $u;
			header("location:../vista/formulario_altas_alumnos.php");
		}else{
			header("location:../vista/login_usuario.php");
			echo "ACCESO DENEGADO";
		}

	}else{
		header("location:../vista/login_usuario.php");
	}
?>