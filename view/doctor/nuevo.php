<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['agregar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$dnidoc = $_GET['dnidoc'];
			$nomdoc = $_GET['nomdoc'];
			$apedoc =$_GET['apedoc'];
			$codespe =$_GET['codespe'];
			$sexo =$_GET['sexo'];
			$telefo =$_GET['telefo'];
			$fechanaci =$_GET['fechanaci'];
			$correo =$_GET['correo'];
			$usuario =$_GET['usuario'];
			$clave =$_GET['clave'];

			$sql2 = "INSERT INTO doctor (dnidoc, nomdoc, apedoc, codespe, sexo, telefo, fechanaci, correo, fecha_create, usuariod, claved, cargo, estado)
			VALUES ('$dnidoc','$nomdoc','$apedoc','$codespe','$sexo','$telefo','$fechanaci','$correo','$fecha_create','$usuariod','$claved','3','1')";
				$_SESSION['message'] = ( $db->exec($sql2) ) ? 'Nuevo Medico insertado correctamente'

		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar la conexión
		$database->close();
	}
	else{
		$_SESSION['message'] = 'Complete el formulario de edición';
	}

	header('location: ../../folder/doctor.php');

?>