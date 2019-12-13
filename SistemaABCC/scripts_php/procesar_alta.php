<?php

	include("alumno_DAO.php");
	
	$alumnoDAO=new AlumnoDAO();
	if(isset($_POST) && !empty($_POST)){
		 

		$nc=htmlspecialchars($_POST['txt_num_control']);
		$nom=htmlspecialchars($_POST['txt_nombre']);
		$app=htmlspecialchars($_POST['txt_primer_ap']);
		$apm=htmlspecialchars($_POST['txt_segundo_ap']);
		$edad=htmlspecialchars($_POST['txt_edad']);
		$sem=htmlspecialchars($_POST['txt_semestre']);
		$carr=htmlspecialchars($_POST['txt_carrera']);

		// echo "<br>".$nc;
		// echo "<br>".$nom;
		// echo "<br>".$app;
		// echo "<br>".$apm;
		// echo "<br>".$edad;
		// echo "<br>".$sem;
		// echo "<br>".$carr;
		
		

		$alumnoDAO->agregar($nc,$nom,$app,$apm,$edad,$sem,$carr);
		
				


	}else{
		echo "Datos Faltantes";
	}


?>