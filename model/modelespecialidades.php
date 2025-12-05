<?php
class Modelo{

  private $especialidades;
  private $db;

  public function __construct(){
      $this->especialidades=array();
      $this->db=new PDO('mysql:host=localhost;dbname=tarea1',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT * FROM especialidades";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->especialidades[]=$tabla;
      }
      return $this->especialidades;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO especialidades (nombrees)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->nombrees));

    }catch (Exception $e) {

      die($e->getMessage());
    }
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
