<?php
class Modelo{

  private $comunidad;
  private $db;
  public $nombre_comunidad;
  public $provincia;
 
  public function __construct(){
      $this->comunidad=array();
      $this->db=new PDO('mysql:host=localhost;dbname=tarea1',"root","");
  }
  public function mostrar($tabla,$condicion){
    $consulta="SELECT * FROM comunidad";

    $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->comunidad[]=$tabla;
      }
      return $this->comunidad;
    }
    public function insertar(Modelo $data){
    try {
      $query="INSERT INTO comunidad(nombre_comunidad,provincia)VALUES(?)";

      $this->db->prepare($query)->execute(array($data->nombre_comunidad));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }

     public function llenarcomunidad(){
      try{
        $consulta="SELECT * FROM comunidad";
        $smt=$this->db->prepare($consulta);
        $smt->execute();
        return $smt->fetchAll(PDO::FETCH_OBJ);
      }catch(Exception $e){
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
