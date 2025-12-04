<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$idhistoriain  = $_GET['idhistoriain']; 
			$codpac = $_POST['codpac'];
			$doctor = $_POST['coddoc'];
	        $grado_instruccion = $_POST['grado_instruccion'];
			$fecha = $_POST['fecha'];
			$diagnostico = $_POST['diagnostico'];
			$consulta = $_POST['consulta'];
			$hospital = $_POST['hospital'];
			$estado = $_POST['estado'];
			

			$sql = "UPDATE historial 
			SET  codpac = '$codpac', coddoc = '$doctor', grado_instruccion = '$grado_instruccion', fecha = '$fecha',  diagnostico = '$diagnostico', consulta = '$consulta', hospital = '$hospital', estado = '$estado' 
			WHERE idhistoriain = '$idhistoriain'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Historial actualizado correctamente' : 'No se puso actualizar el área';

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

	header('location: ../../folder/historia.php');

?>