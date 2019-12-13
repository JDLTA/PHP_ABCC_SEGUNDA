<?php

	include("alumno_DAO.php");
	
	if(isset($_GET) && !empty($_GET)){
		$nc = $_GET["nc"];
		$aDAO = new AlumnoDAO();
		$aDAO->eliminar($_GET['nc']);
	}else{
		echo "Datos Faltantes";
	}


?>