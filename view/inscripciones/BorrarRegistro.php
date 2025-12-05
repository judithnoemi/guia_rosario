<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_GET['idanticoncepcion'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM anticoncepcion WHERE idanticoncepcion = '".$_GET['idanticoncepcion']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? ' borrada' : 'Hubo un error al borrar el área';
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

	header('location: ../../folder/anticoncepcion.php');

?>