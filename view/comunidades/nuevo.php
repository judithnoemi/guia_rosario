<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO comunidad (nombre_comunidad, provincia) VALUES (:nombre_comunidad, :provincia)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':nombre_comunidad' => $_POST['nombre_comunidad'] , ':provincia' => $_POST['provincia'])) ) ? 'Comunidad guardada correctamente' : 'Algo salió mal. No se puede agregar a la comunidad';	
	
	}
	catch(PDOException $e){
		$_SESSION['message'] = $e->getMessage();
	}

	//cerrar la conexion
	$database->close();
}

else{
	$_SESSION['message'] = 'Llene el formulario';
}

header('location: ../../folder/comunidades.php');
	
?>