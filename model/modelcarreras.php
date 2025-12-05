<?php
class Modelo
{
  private $odontologia;
  private $db;

  public function __construct()
  {
    $this->odontologia = array();
    $this->db = new PDO('mysql:host=localhost;dbname=tarea1', "root", "");
  }

  public function mostrar($tabla, $condicion)
  {
    $consulta =
      "SELECT *
      FROM odontologia
      INNER JOIN pacientes ON odontologia.codpaci=pacientes.codpaci
      INNER JOIN doctor ON odontologia.coddocod=doctor.coddoc
      INNER JOIN especialidades ON especialidades.codespe=doctor.codespe";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->odontologia[] = $tabla;
    }
    return $this->odontologia;
  }

  public function  insertar(Modelo $data)
  {
    try {
    $query="INSERT INTO odontologia (codpaci, coddocod, fecha, registro, detalle, atencion, diagnostico, primeracon, piezaden, mujeresem, mujerespost, medidaspreven, restauraciones, endodoncia, periodoncia, cir_bucalmenor, otrasacc, rx, refycontraref, tratamiento, estado) 
    VALUES (?, ?, ?,?, ?, ?, ?,?, ?, ?',?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?);";	 

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
