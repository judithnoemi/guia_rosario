<?php

$conexion = mysqli_connect("localhost","root","","tarea1");

$query = $conexion->query("SELECT * FROM especialidad");

echo '<option value="0">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['codespe']. '">' . $row['nombrees'] . '</option>' . "\n";
}
