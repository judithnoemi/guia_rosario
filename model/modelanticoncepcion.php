<?php
class Modelo
{
  private $anticoncepcion;
  private $db;

  public function __construct()
  {
    $this->anticoncepcion = array();
    $this->db = new PDO('mysql:host=localhost;dbname=tarea1', "root", "");
  }

  public function mostrar($tabla, $condicion)
  {
    $consulta =
      "SELECT * 
      FROM pacientes
          INNER JOIN anticoncepcion ON pacientes.codpaci=anticoncepcion.codpaci
          INNER JOIN doctor ON anticoncepcion.coddoc=doctor.coddoc
          INNER JOIN comunidad ON pacientes.comunidad_id=comunidad.id_comunidad
          INNER JOIN especialidades ON especialidades.codespe=doctor.codespe
      ORDER BY anticoncepcion.idanticoncepcion
";

    $resultado = $this->db->query($consulta);
    while ($tabla = $resultado->fetchAll(PDO::FETCH_ASSOC)) {
      $this->anticoncepcion[] = $tabla;
    }
    return $this->anticoncepcion;
  }
  public function  insertar(Modelo $data)
  {
    try {
      $query = "INSERT INTO anticoncepcion(codpac, coddoc, fechaan, grado_instruccion, diagnostico, consulta, hospital, estado)
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
