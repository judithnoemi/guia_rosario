<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$idanticoncepcion = $_GET['idanticoncepcion'];
			$codpaci = $_POST['codpaci'];
			$coddoc = $_POST['coddoc'];
			$fechaan = $_POST['fechaan'];
			$registroan = $_POST['registroan'];
			$detallean = $_POST['detallean'];
			$atencionan = $_POST['atencionan'];
			$orientacion = $_POST['orientacion'];
			$metodosantimode = $_POST['metodosantimode'];
			$insumos = $_POST['insumos'];
			$metodosnat = $_POST['metodosnat'];
			$muestraspaptom = $_POST['muestraspaptom'];
		
	$sql = "UPDATE anticoncepcion
	SET  codpaci = '$codpaci', coddoc = '$coddoc', fechaan = '$fechaan', registroan = '$registroan', detallean = '$detallean', atencionan = '$atencionan', orientacion = '$orientacion', metodosantimode = '$metodosantimode', insumos = '$insumos', metodosnat = '$metodosnat', muestraspaptom = '$muestraspaptom'
			WHERE idanticoncepcion = '$idanticoncepcion'";
			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Historial actualizado correctamente' : 'No se puso actualizar el área';

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

	header('location: ../../folder/anticoncepcion.php');

?>