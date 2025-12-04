<?php

$conexion = mysqli_connect("localhost","root","","tarea1");

$query = $conexion->query("SELECT * FROM pacientes");

echo '<option value="0">Seleccione el paciente</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codpaci']. '">' . $row['nombrep'] . '</option>' . "\n";
}



