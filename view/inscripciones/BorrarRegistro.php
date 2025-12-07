<?php
session_start();
include_once('../config/dbconect.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $database = new Connection();
    $db = $database->open();

    try {
        // Prepared statement para seguridad
        $stmt = $db->prepare("DELETE FROM inscripcions WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $_SESSION['message'] = "Inscripción borrada correctamente";
        } else {
            $_SESSION['message'] = "No se encontró la inscripción para borrar";
        }

    } catch(PDOException $e) {
        $_SESSION['message'] = "Error al borrar: " . $e->getMessage();
    }

    $database->close();

} else {
    $_SESSION['message'] = "Seleccionar inscripción para eliminar primero";
}

header('Location: ../../folder/inscripciones.php');
exit;
?>
