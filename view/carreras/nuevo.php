<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{

		$codpaci = $_POST['codpaci'];
		$coddoc = $_POST['coddoc'];
		$grado_instruccion = $_POST['grado_instruccion'];
		$fecha = $_POST['fecha'];
	
		
		$diagnostico = $_POST['diagnostico'];
		$consulta = $_POST['consulta'];
		$hospital = $_POST['hospital'];

		$sql2 = "INSERT INTO historial (codpac, coddoc,  grado_instruccion,  fecha, diagnostico, consulta, hospital, estado)
			VALUES ('$codpaci','$coddoc','$hora','$fecha','$grado_instruccion','$diagnostico','$consulta','$hospital','1')";
		
		$_SESSION['message'] = ( $db->exec($sql2) ) ? ' Nueva historia insertada correctamente' : 'No se puso insertar el paciente';
	
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

header('location: ../../folder/historia.php');
	
?>