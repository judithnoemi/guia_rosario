<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$idhistoria  = $_GET['idhistoria']; 
			$edad = $_POST['edad'];
			$fecha = $_POST['fecha'];
			$hora = $_POST['hora'];
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
         
		 $sql = "UPDATE detallehistorial 
			SET edad = '$edad', fecha = '$fecha', hora = '$hora', talla = '$talla', peso = '$peso', imc = '$imc', p_a = '$p_a', f_c ='$f_c', f_r ='$f_r', temp ='$temp', subjetivo ='$subjetivo', objetivo ='$objetivo', analisis ='$analisis', cie ='$cie', tratamiento ='$tratamiento'
			WHERE idhistoria = '$idhistoria'";
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

	header('location: ../../folder/detallehistoria.php');

?>