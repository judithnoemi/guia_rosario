<?php
class Modelo
{
  private $carreras;
  private $db;

  public function __construct()
  {
    $this->carreras = array();
    $this->db = new PDO('mysql:host=localhost;dbname=universidad', "root", "");
  }

  public function mostrar($tabla, $condicion)
  {
    $consulta =
      "SELECT *
      FROM carreras
      INNER JOIN turnos ON carreras.turno_id=turnos.id";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->carreras[] = $tabla;
    }
    return $this->carreras;
  }


  public function actualizar($tabla, $data, $condicion)
  {
    $consulta = "UPDATE $tabla SET $data WHERE $condicion";
    $resultado = $this->db->query($consulta);
    if ($resultado) {
      return true;
    } else {
      return false;
    }
  }
  public function eliminar($tabla, $condicion)
  {
    $consulta = "DELETE FROM $tabla WHERE $condicion";
    $resultado = $this->db->query($consulta);
    if ($resultado) {
      return true;
    } else {
      return false;
    }
  }
}
