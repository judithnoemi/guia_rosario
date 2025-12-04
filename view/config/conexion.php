<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'tarea1');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>