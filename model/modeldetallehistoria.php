<?php
class Modelo
{

  private $detallehistorial;
  private $db;

  public function __construct()
  {
    $this->detallehistorial = array();
    $this->db = new PDO('mysql:host=localhost;dbname=tarea1', "root", "");
  }

  public function mostrar($tabla, $condicion)
  {
    $consulta =
      "SELECT detallehistorial.idhistoria,
   
      detallehistorial.hora,detallehistorial.talla,
      detallehistorial.peso,detallehistorial.imc,detallehistorial.p_a,detallehistorial.f_c,detallehistorial.f_r,detallehistorial.temp,detallehistorial.subjetivo,
      detallehistorial.objetivo,detallehistorial.analisis,detallehistorial.cie,detallehistorial.tratamiento
    FROM detallehistorial
    INNER JOIN historial ON detallehistorial.idhistoriain = historial.idhistoriain";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->detallehistorial[] = $tabla;
    }
    return $this->detallehistorial;
  }
  public function  insertar(Modelo $data)
  {
    try {
      $query = "INSERT INTO detallehistorial( hour, fecha, grado_instruccion, diagnostico, consulta, hospital, estado)
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
