<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('../config/dbconect.php');

if(isset($_POST['agregar'])){  // o 'editar' según tu botón
    $database = new Connection();
    $db = $database->open();

    try {
        $id = $_POST['id']; // importante: usar POST
        $semestre_id = $_POST['semestre_id'];
        $estudiante_id = $_POST['estudiante_id'];
        $estado = $_POST['estado'];

        $sql = "UPDATE inscripcions 
                SET semestre_id = :semestre_id, 
                    estudiante_id = :estudiante_id, 
                    estado = :estado 
                WHERE id = :id";

        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':semestre_id' => $semestre_id,
            ':estudiante_id' => $estudiante_id,
            ':estado' => $estado,
            ':id' => $id
        ]);

        $_SESSION['message'] = "Inscripción actualizada correctamente";

    } catch(PDOException $e) {
        $_SESSION['message'] = "Error al actualizar: " . $e->getMessage();
    }

    $database->close();

    // Redirigir al listado
    header('Location: ../../folder/inscripciones.php');
    exit;
} else {
    $_SESSION['message'] = "Formulario no enviado correctamente";
    header('Location: ../../folder/inscripciones.php');
    exit;
}
?>
