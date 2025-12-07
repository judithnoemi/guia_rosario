<?php
class Modelo
{

  private $inscripciones;
  private $db;

  public function __construct()
  {
    $this->inscripciones = array();
    $this->db = new PDO('mysql:host=localhost;dbname=universidad', "root", "");
  }

 public function mostrar($tabla = "inscripcions", $condicion = "1")
{
    $consulta = "SELECT 
        inscripcions.id AS inscripcion_id,
        semestre.id AS semestre_id,
        semestre.nombre AS semestre_nombre,
        estudiantes.nombres,
        estudiantes.apellidos,
        estudiantes.ci,
        carreras.nombre AS carrera_nombre,
        estudiantes.numero,
        estudiantes.direccion,
        estudiantes.celular,
        estudiantes.fecha,
        estudiantes.procedencia,
        estudiantes.tipo_beca,
        estudiantes.descuento AS porcentaje,
        estudiantes.n_resolucion,
        estudiantes.n_expediente,
        turnos.nombre AS turno_nombre,
        inscripcions.estado
    FROM $tabla
    INNER JOIN semestre ON $tabla.semestre_id = semestre.id
    INNER JOIN estudiantes ON $tabla.estudiante_id = estudiantes.id
    INNER JOIN carreras ON estudiantes.carrera_id = carreras.id
    INNER JOIN turnos ON estudiantes.turno_id = turnos.id
    WHERE $condicion
    ORDER BY $tabla.id";

    $resultado = $this->db->query($consulta);
    return $resultado->fetchAll(PDO::FETCH_ASSOC); // devuelve un array asociativo
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
