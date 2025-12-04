<?php

function connect(){
	return new mysqli("localhost","root","","tarea1");
}

function get_categorias(){
	$con = connect();
	$sql = "SELECT historial.idhistoria, pacientes.codpaci,pacientes.nombrep,pacientes.apellidop,pacientes.nacimiento,
	doctor.nomdoc,doctor.apedoc,especialidades.nombrees,
	historial.fecha,historial.fecha,historial.talla,
	historial.peso,historial.imc,historial.p_a,historial.f_c,historial.f_r,historial.temp,historial.subjetivo,
	historial.objetivo,historial.analisis,historial.cie,historial.tratamiento
  FROM historial 

  INNER JOIN doctor ON historial.coddoc = doctor.coddoc 
  INNER JOIN especialidades ON doctor.codespe = especialidades.codespe 
  INNER JOIN pacientes ON pacientes.codpaci = historial.codpac";
	$query  =$con->query($sql);
	$data =  array();
	if($query){
		while($r = $query->fetch_object()){
			$data[] = $r;
		}
	}
	return $data;
}

?>