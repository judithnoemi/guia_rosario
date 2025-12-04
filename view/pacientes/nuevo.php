<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){
	$database = new Connection();
	$db = $database->open();
	try{
		$dnipa = $_POST['dnipa'];
		$nombrep = $_POST['nombrep'];
		$apellidop = $_POST['apellidop'];
		$seguro = $_POST['seguro'];
		$tele = $_POST['tele'];
		$sexo = $_POST['sexo'];
		$comunidad = $_POST['comunidad'];
		$estadociv = $_POST['estadociv'];
		$ocupacion = $_POST['ocupacion'];
		$nacimiento = $_POST['nacimiento'];
		$departamento = $_POST['departamento'];
		$zona_barrio = $_POST['zona_barrio'];
		$domicilioac = $_POST['domicilioac'];
		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		
		$sql2 = "INSERT INTO customers (dnipa, nombrep, apellidop,seguro,tele,sexo,estadociv,ocupacion,nacimiento,departamento,zona_barrio,domicilioac,usuario,clave,comunidad_id,cargo, estado)
		 VALUES ('$dnipa', '$nombrep', '$apellidop', '$seguro', '$tele', '$sexo', '$comunidad', '$estadociv', '$ocupacion', '$nacimiento', '$departamento', '$zona_barrio', '$domicilioac', '$usuario', '$clave', '2','1')";
		
		$_SESSION['message'] = ( $db->exec($sql2) ) ? ' Nuevo Paciente insertado correctamente' : 'No se puso insertar el paciente';

		/*
		//hacer uso de una declaración preparada para prevenir la inyección de sql
		$stmt = $db->prepare("INSERT INTO customers (dnipa, nombrep,apellidop,seguro,tele,sexo,usuario,clave,comunidad_id) 
		VALUES (:dnipa, :nombrep, :apellidop, :seguro, :tele,:sexo,:usuario, :clave,:cargo,:estado,:comunidad_id)");
		//instrucción if-else en la ejecución de nuestra declaración preparada
		
		$_SESSION['message'] = 
		( $stmt->execute
			(array
				(':dnipa' => $_POST['dnipa'] , ':nombrep' => $_POST['nombrep'] , ':apellidop' => $_POST['apellidop'], ':seguro' => $_POST['seguro'], ':tele' => $_POST['tele'], ':sexo' => $_POST['sexo'], ':usuario' => $_POST['usuario'], ':clave' => MD5($_POST['clave']), ':comunidad_id' => $_POST['comunidad_id'])
			) 
		) 
			? 'Paciente guardado correctamente' 
			: 'Algo salió mal. No se puede agregar miembro';
		*/	
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

header('location: ../../folder/pacientes.php');
	
?>