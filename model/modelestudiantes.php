<?php
class Modelo{

  private $estudiantes;
  private $db;

  public function __construct(){
      $this->estudiantes=array();
      $this->db=new PDO('mysql:host=localhost;dbname=universidad',"root","");
  }
public function mostrar($tabla,$condicion){

    $consulta = "SELECT 
        estudiantes.id AS estudiante_id,
        estudiantes.nombres,
        estudiantes.apellidos,
        estudiantes.ci,
        carreras.id AS carrera_id,
        carreras.nombre AS carrera_nombre,
        estudiantes.numero,
        estudiantes.direccion,
        estudiantes.celular,
        estudiantes.fecha,
        estudiantes.procedencia,
        estudiantes.tipo_beca,
        estudiantes.descuento,
        estudiantes.n_resolucion,
        estudiantes.n_expediente,
        turnos.nombre AS turno_nombre
    FROM estudiantes
    INNER JOIN carreras ON estudiantes.carrera_id = carreras.id
    INNER JOIN turnos   ON estudiantes.turno_id = turnos.id";

    $resultado = $this->db->query($consulta);
    return $resultado->fetchAll(PDO::FETCH_ASSOC);
}

   
  public function actualizar($tabla,$data,$condicion){
      $consulta="UPDATE $tabla SET $data WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
  public function eliminar($tabla,$condicion){
      $consulta="DELETE FROM $tabla WHERE $condicion";
      $resultado=$this->db->query($consulta);
      if($resultado){
          return true;
      }else{
          return false;
      }
  }
}

 ?>
