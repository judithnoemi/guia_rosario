<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_GET['id_comunidad'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM comunidad WHERE id_comunidad  = '".$_GET['id_comunidad']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Comunidad borrado' : 'Hubo un error al borrar el Comunidad';
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

	header('location: ../../folder/comunidades.php');

?>