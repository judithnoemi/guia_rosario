<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_POST['editar'])){
    $database = new Connection();
    $db = $database->open();
    try{
        // Obtenemos los datos desde POST
        $id = $_POST['id']; // <-- input hidden en el formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        // Consulta de actualización
        $sql = "UPDATE turnos SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id', $id);

        $_SESSION['message'] = ($stmt->execute()) ? 'Turno actualizado correctamente' : 'No se pudo actualizar el turno';
    }
    catch(PDOException $e){
        $_SESSION['message'] = $e->getMessage();
    }

    $database->close();
}
else{
    $_SESSION['message'] = 'Complete el formulario de edición';
}

header('location: ../../folder/turnos.php');
?>
