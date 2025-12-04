<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{

		$idhistoria  = $_GET['idhistoria']; 
			
			$edad = $_POST['edad'];
			
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
			$estado = $_POST['estado'];
			$talla = $_POST['talla'];
			$peso = $_POST['peso'];
			$imc = $_POST['imc'];
			$p_a = $_POST['p_a'];
			$f_c = $_POST['f_c'];
			$f_r = $_POST['f_r'];
			$temp = $_POST['temp'];
			$subjetivo = $_POST['subjetivo'];
			$objetivo = $_POST['objetivo'];
			$analisis = $_POST['analisis'];
			$cie = $_POST['cie'];
			$tratamiento = $_POST['tratamiento'];

		$sql2 = "INSERT INTO historial (codpac, coddoc, hour, fecha, grado_instruccion, diagnostico, consulta, hospital, estado)
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

header('location: ../../folder/detallehistoria.php');
	
?>