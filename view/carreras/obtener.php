<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['editar'])){
    $database = new Connection();
    $db = $database->open();

    try {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $semestre = $_POST['semestre'];
        $descripcion = $_POST['descripcion'];
        $turno_id = $_POST['turno_id'];

        // Prepared statement seguro
        $sql = "UPDATE carreras 
                SET nombre = :nombre, semestre = :semestre, descripcion = :descripcion, turno_id = :turno_id 
                WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':semestre', $semestre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':turno_id', $turno_id);
        $stmt->bindParam(':id', $id);

        $_SESSION['message'] = ($stmt->execute()) ? 'Registro actualizado correctamente' : 'No se pudo actualizar el registro';

    } catch(PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    $database->close();
} else {
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: ../../folder/carreras.php');
?>
