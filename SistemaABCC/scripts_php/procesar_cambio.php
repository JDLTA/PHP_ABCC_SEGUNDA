<?php

	include("alumno_DAO.php");
	
	$alumnoDAO=new AlumnoDAO();
	if(isset($_POST) && !empty($_POST)){
		 

		$nc=htmlspecialchars($_POST['numcontrol']);
		$nom=htmlspecialchars($_POST['nombre']);
		$app=htmlspecialchars($_POST['app']);
		$apm=htmlspecialchars($_POST['apm']);
		$edad=htmlspecialchars($_POST['edad']);
		$sem=htmlspecialchars($_POST['semestre']);
		$carr=htmlspecialchars($_POST['carrera']);

		$alumnoDAO->cambiar($nc,$nom,$app,$apm,$edad,$sem,$carr);

	}else{
		echo "Datos Faltantes";
	}


?>