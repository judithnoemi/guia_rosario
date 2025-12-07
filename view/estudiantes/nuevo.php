<?php
if(isset($_POST['agregar'])){
    include_once('../view/config/dbconect.php');
    $database = new Connection();
    $db = $database->open();

    try {
        $stmt = $db->prepare("INSERT INTO estudiantes 
            (nombres, apellidos, ci, carrera_id, turno_id, numero, direccion, celular, fecha, procedencia, tipo_beca, descuento, porcentaje, n_resolucion, n_expediente)
            VALUES 
            (:nombres, :apellidos, :ci, :carrera_id, :turno_id, :numero, :direccion, :celular, :fecha, :procedencia, :tipo_beca, :descuento, :porcentaje, :n_resolucion, :n_expediente)");

        $stmt->execute([
            ':nombres' => $_POST['nombres'],
            ':apellidos' => $_POST['apellidos'],
            ':ci' => $_POST['ci'],
            ':carrera_id' => $_POST['carrera_id'],
            ':turno_id' => $_POST['turno_id'],
            ':numero' => $_POST['numero'],
            ':direccion' => $_POST['direccion'],
            ':celular' => $_POST['celular'],
            ':fecha' => $_POST['fecha'],
            ':procedencia' => $_POST['procedencia'],
            ':tipo_beca' => $_POST['tipo_beca'],
            ':descuento' => $_POST['descuento'],
            ':porcentaje' => $_POST['porcentaje'],
            ':n_resolucion' => $_POST['n_resolucion'],
            ':n_expediente' => $_POST['n_expediente']
        ]);

        $_SESSION['message'] = 'Estudiante agregado correctamente';

    } catch(PDOException $e) {
        $_SESSION['message'] = 'Error al insertar estudiante: ' . $e->getMessage();
    }

    $database->close();
    header('location: ../folder/estudiantes.php');
}
?>
