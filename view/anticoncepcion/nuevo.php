<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{

		$codpaci = $_POST['codpaci'];
		$coddoc = $_POST['coddoc'];
		$fechaan = $_POST['fechaan'];
		$registroan = $_POST['registro'];
		$detallean = $_POST['detallean'];
		$atencionan = $_POST['atencionan'];
		$orientacion = $_POST['orientacion'];
		$metodosantimode = $_POST['metodosantimode'];
		$insumos = $_POST['insumos'];
		$metodosnat = $_POST['metodosnat'];
		$muestraspaptom = $_POST['muestraspaptom'];
		$estado = $_POST['estado'];

		$sql2 = "INSERT INTO anticoncepcion (codpac, coddoc, fechaan, registroan, detallean,atencionan,orientacion,metodosantimode,insumos,metodosnat,muestraspaptom)
			VALUES ('$codpaci','$coddoc','$fechaan','$registroan','$detallean','$atencionan',''$orientacion','$metodosantimode','$insumos','$metodosnat','$muestraspaptom)";
		
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

header('location: ../../folder/anticoncepcion.php');
	
?>