<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO turnos (id, nombre,descripcion) VALUES (:id, :nombre, :descripcion)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		$_SESSION['message'] = ( $stmt->execute(array(':id' => $_POST['id'] , ':nombre' => $_POST['nombre'] , ':descripcion' => $_POST['descripcion'])) ) ? 'Turno guardado correctamente' : 'Algo salió mal. No se puede agregar miembro';	
	
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

header('location: ../../folder/turnos.php');
	
?>