<?php
class Modelo{

  private $turnos;
  private $db;

  public function __construct(){
      $this->turnos=array();
      $this->db=new PDO('mysql:host=localhost;dbname=universidad',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT  turnos.id, turnos.nombre, turnos.descripcion FROM turnos";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->turnos[]=$tabla;
      }
      return $this->turnos;
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
