<?php
	session_start();
	include_once('../config/dbconect.php');

	if(isset($_POST['editar'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$idodontologia  = $_GET['idodontologia']; 
			$codpaci = $_POST['codpaci'];
			$coddocod = $_POST['coddocod'];
			$fechaod = $_POST['fechaod'];
			$registrodon = $_POST['registrodon'];
			$detalleodon = $_POST['detalleodon'];
			$atencionod = $_POST['atencionod'];
			$diagnosticood = $_POST['diagnosticood'];
			$primeraconod = $_POST['primeraconod'];
			$piezadenod = $_POST['piezadenod'];
			$mujeresemod = $_POST['mujeresemod'];
			$mujerespostod = $_POST['mujerespostod'];
			$medidasprevenod = $_POST['medidasprevenod'];
			$restauracionesod = $_POST['restauracionesod'];
			$endodonciaod = $_POST['endodonciaod'];
			$periodonciaod  = $_POST['periodonciaod'];
			$cir_bucalmenorod = $_POST['cir_bucalmenorod'];
			$otrasaccod = $_POST['otrasaccod'];
			$rxod = $_POST['rxod'];
			$refycontrarefod = $_POST['refycontrarefod'];
			$tratamientood = $_POST['tratamientood'];

			
			$sql =  "UPDATE odontologia
			SET codpaci='$codpaci', coddocod='$coddocod', fechaod = '$fechaod', registrodon = '$registrodon', 
			detalleodon = '$detalleodon', atencionod = '$atencionod', diagnosticood = '$diagnosticood', 
			primeraconod = '$primeraconod', piezadenod = '$piezadenod', mujeresemod = '$mujeresemod',
			 mujerespostod = '$mujerespostod', medidasprevenod = '$medidasprevenod', restauracionesod = '$restauracionesod', 
			endodonciaod = '$endodonciaod', periodonciaod = '$periodonciaod', cir_bucalmenorod = '$cir_bucalmenorod', 
			otrasaccod = '$otrasaccod', rxod = '$rxod', refycontrarefod = '$refycontrarefod', tratamientood = '$tratamientood'
			WHERE idodontologia = '$idodontologia'";
			

			//if-else statement in executing our query
			$_SESSION['message'] = ( $db->exec($sql) ) ? 'Odontologia actualizado correctamente' : 'No se puso actualizar el área';

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

	header('location: ../../folder/odontologia.php');

?>