<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{

		$codpaci = $_POST['codpaci'];
		$coddocod = $_POST['coddocod'];
		$fechaod = $_POST['fechaod'];
		$registrodon = $_POST['registrodon'];
		$detalleodon = $_POST['detalleodon'];
		$atencion = $_POST['atencion'];
		$diagnostico = $_POST['diagnostico'];
		$primeracon = $_POST['primeracon'];
		$piezaden = $_POST['piezaden'];
		$mujeresem = $_POST['mujeresem'];
		$nujerespost = $_POST['mujerespost'];
		$medidaspreven = $_POST['medidaspreven'];
		$restauraciones = $_POST['restauraciones'];
		$endodoncia = $_POST['endodoncia'];
		$periodoncia = $_POST['periodoncia'];
		$cir_bucalmenor = $_POST['cir_bucalmenor'];
		$otrasacc = $_POST['otrasacc'];
		$rx = $_POST['rx'];
		$refycontraref = $_POST['refycontraref '];
		$tratamiento = $_POST['tratamiento'];
		

		$sql2 = "INSERT INTO odontologia (codpac, coddocod,  grado_instruccion,  fecha, diagnostico, consulta, hospital, estado)
			VALUES ('$codpaci','$coddocod','$hora','$fecha','$grado_instruccion','$diagnostico','$consulta','$hospital','1')";
		
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

header('location: ../../folder/odontologia.php');
	
?>