<?php
class Modelo{

  private $citas;
  private $db;
  public $codcit;
  public $dates;
  public $hour;
  public $codpaci;
  public $coddoc;
  public $codespe;
  public $estado;

  public function __construct(){
      $this->citas=array();
      $this->db=new PDO('mysql:host=localhost;dbname=tarea1',"root","");
  }
  public function mostrar($tabla,$condicion){
      $consulta="SELECT citas.codcit, citas.dates, citas.hour,pacientes.nombrep,doctor.nomdoc, especialidades.nombrees, citas.estado, citas.fecha_create 
      FROM citas 
      INNER JOIN pacientes ON citas.codpaci = pacientes.codpaci 
      INNER JOIN doctor ON citas.coddoc = doctor.coddoc 
      INNER JOIN especialidades ON citas.codespe = especialidades.codespe";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->citas[]=$tabla;
      }
      return $this->citas;
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO citas (dates,hour,codpaci,coddoc,codespe,estado)VALUES(?,?,?,?,?,?)";

      $this->db->prepare($query)->execute(array($data->dates,$data->hour,$data->codpaci,
	  $data->coddoc,$data->codespe,$data->estado));

    }catch (Exception $e) {

      die($e->getMessage());
    }
    }
    public function llenarespecialidad(){

    try{
      $consulta="SELECT * FROM especialidades";
      $smt=$this->db->prepare($consulta);
      $smt->execute();
      return $smt->fetchAll(PDO::FETCH_OBJ);
    }catch(Exception $e){
  }
}
	
	public function llenardoctor(){
   try{
      $consulta="SELECT * FROM doctor";
      $smt=$this->db->prepare($consulta);
      $smt->execute();
      return $smt->fetchAll(PDO::FETCH_OBJ);
    }catch(Exception $e){
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
