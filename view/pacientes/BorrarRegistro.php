<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_GET['codpaci'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM pacientes WHERE codpaci  = '".$_GET['codpaci']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Paciente Borrado' : 'Hubo un error al borrar el área';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//Cerrar conexión
		$database->close();

	}
	else{
		$_SESSION['message'] = 'Seleccionar miembro para eliminar primero';
	}

	header('location: ../../folder/pacientes.php');

?>