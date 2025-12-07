<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{

		$id = $_POST['id'];
		$nombre= $_POST['nombre'];
		$semestre= $_POST['semetre'];
		$descripcion = $_POST['descripcion'];
		$turno_id = $_POST['turno_id'];

		$sql2 = "INSERT INTO carreras (nombre, semestre,  descripcion,  turno_id, WHERE id= '$id')
			VALUES ('$nombre','$semestre', '$descripcion', $descripcion',''$turno_id')";
		
		$_SESSION['message'] = ( $db->exec($sql2) ) ? ' Nueva historia insertada correctamente' : 'No se puso insertar la carrera';
	
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

header('location: ../../folder/carreras.php');
	
?>