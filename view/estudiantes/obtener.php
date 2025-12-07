<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['editar'])){
    $database = new Connection();
    $db = $database->open();

    try{
        $id = $_POST['id']; // obligatorio
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $ci = $_POST['ci'];
        $carrera_id = $_POST['carrera_id'];
        $turno_id = $_POST['turno_id'];
        $numero = $_POST['numero'];
        $direccion = $_POST['direccion'];
        $celular = $_POST['celular'];
        $fecha = $_POST['fecha'];
        $procedencia = $_POST['procedencia'];
        $tipo_beca = $_POST['tipo_beca'];
        $descuento = $_POST['descuento'];
        $porcentaje = $_POST['porcentaje'];
        $n_resolucion = $_POST['resolucion'];
        $n_expediente = $_POST['n_expediente'];

        // Prepared statement
        $sql = "UPDATE estudiantes SET 
                    nombres = :nombres,
                    apellidos = :apellidos,
                    ci = :ci,
                    carrera_id = :carrera_id,
                    turno_id = :turno_id,
                    numero = :numero,
                    direccion = :direccion,
                    celular = :celular,
                    fecha = :fecha,
                    procedencia = :procedencia,
                    tipo_beca = :tipo_beca,
                    descuento = :descuento,
                    porcentaje = :porcentaje,
                    n_resolucion = :n_resolucion,
                    n_expediente = :n_expediente
                WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':ci', $ci);
        $stmt->bindParam(':carrera_id', $carrera_id);
        $stmt->bindParam(':turno_id', $turno_id);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':procedencia', $procedencia);
        $stmt->bindParam(':tipo_beca', $tipo_beca);
        $stmt->bindParam(':descuento', $descuento);
        $stmt->bindParam(':porcentaje', $porcentaje);
        $stmt->bindParam(':n_resolucion', $n_resolucion);
        $stmt->bindParam(':n_expediente', $n_expediente);
        $stmt->bindParam(':id', $id);

        $_SESSION['message'] = ($stmt->execute()) ? 'Registro actualizado correctamente' : 'No se pudo actualizar el registro';

    } catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    $database->close();

} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: ../../folder/estudiantes.php');
?>
