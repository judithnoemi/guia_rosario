<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$id_comunidad = $_GET['id_comunidad'];
			$nombre_comunidad = $_POST['nombre_comunidad'];	
			$provincia = $_POST['provincia'];	
			
$sql = "UPDATE comunidad SET nombre_comunidad = '$nombre_comunidad', provincia = '$provincia' WHERE id_comunidad = '$id_comunidad'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Comunidad actualizado correctamente' : 'No se puso actualizar la Comunidad';

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

	header('location: ../../folder/comunidades.php');

?>