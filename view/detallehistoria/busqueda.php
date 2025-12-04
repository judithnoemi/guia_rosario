<?php
session_start();
// Validamos que exista una sesión y además que el cargo sea igual a 1 o 3
if (!isset($_SESSION['cargo']) || ($_SESSION['cargo'] != 1 && $_SESSION['cargo'] != 3)) {
    header('location: ../login.php');
    exit; // Asegúrate de terminar el script después de redirigir
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador en Base de Datos</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'/>
    <link rel="icon" href="../../assets/img/icon.ico" type="image/x-icon" />


</head>
<body>


    <h1>Buscador segun fechas</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="start_date">Fecha de Inicio:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">Fecha Final:</label>
        <input type="date" id="end_date" name="end_date" required>

        <button type="submit">Buscar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $conn = new mysqli("localhost", "root", "", "tarea1");

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];

        $sql = "SELECT * 
                FROM detallehistorial
                INNER JOIN pacientes ON detallehistorial.codpac=pacientes.codpaci	
                INNER JOIN doctor ON detallehistorial.coddoc=doctor.coddoc
                    WHERE (detallehistorial.fecha BETWEEN '$start_date' AND '$end_date')
                    ORDER BY detallehistorial.fecha ASC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Resultados:</h2>";
            echo "<table border='1'>";
            echo "<tr>
                    <th>ID historial</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Datos_pacientes</th>
                    <th>Edad</th>
                    <th>Doctor</th>
                    <th>Talla</th>
                    <th>Peso</th>
                    <th>IMC</th>
                    <th>PA</th>
                    <th>FC</th>
                    <th>FR</th>
                    <th>Temperatura</th>
                    <th>Subjetivo</th>
                    <th>Objetivo</th>
                    <th>Analisis</th>
                    <th>CIE</th>
                    <th>Tratamiento</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["idhistoria"] . "</td>
                        <td>" . $row["fecha"] . "</td>
                        <td>" . $row["hora"] . "</td>
                        <td>" . $row["nombrep"]." ".$row["apellidop"]. "</td>
                        <td>" . $row["edad"] . " años</td>
                        <td>" . $row["nomdoc"]." ".$row["apedoc"]. "</td>
                        <td>" . $row["talla"] . "</td>
                        <td>" . $row["peso"] . "</td>
                        <td>" . $row["imc"] . "</td>
                        <td>" . $row["p_a"] . " mmHg</td>
                        <td>" . $row["f_c"] . " ppm</td>
                        <td>" . $row["f_r"] . " por min</td>
                        <td>" . $row["temp"] . " °C</td>
                        <td>" . $row["subjetivo"] . "</td>
                        <td>" . $row["objetivo"] . "</td>
                        <td>" . $row["analisis"] . "</td>
                        <td>" . $row["cie"] . "</td>
                        <td>" . $row["tratamiento"] . "</td>
                    </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No se encontraron resultados.</p>";
        }

        $conn->close();
    }
    ?>

</body>
</html>
