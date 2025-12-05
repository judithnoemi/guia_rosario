<?php
class Modelo
{
  private $historial;
  private $db;

  public function __construct()
  {
    $this->historial = array();
    $this->db = new PDO('mysql:host=localhost;dbname=tarea1', "root", "");
  }

  public function mostrar($tabla, $condicion)
  {
    $consulta =
      "SELECT *
      FROM historial 
      
      INNER JOIN doctor ON historial.coddoc = doctor.coddoc 
      INNER JOIN especialidades ON doctor.codespe = especialidades.codespe 
      INNER JOIN pacientes ON pacientes.codpaci = historial.codpac 
      INNER JOIN comunidad ON pacientes.comunidad_id = comunidad.id_comunidad
";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->historial[] = $tabla;
    }
    return $this->historial;
  }
  public function  insertar(Modelo $data)
  {
    try {
      $query = "INSERT INTO historial(codpac, coddoc, fecha, grado_instruccion, diagnostico, consulta, hospital, estado)
      VALUES(?,?,?,?,?,?,?,?)";
    } catch (Exception $e) {

      die($e->getMessage());
    }
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
