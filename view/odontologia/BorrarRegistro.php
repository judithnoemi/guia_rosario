<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_GET['idodontologia'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM odontologia WHERE idodontologia = '".$_GET['idodontologia']."'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? ' borrada' : 'Hubo un error al borrar la odontologia';
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

	header('location: ../../folder/odontologia.php');

?>