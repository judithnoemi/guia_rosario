<?php
class Modelo{

  private $pacientes;
  private $db;

  public function __construct(){
      $this->pacientes=array();
      $this->db=new PDO('mysql:host=localhost;dbname=tarea1',"root","");
  }
  public function mostrar($tabla,$condicion){
    $consulta="SELECT pacientes.codpaci, pacientes.dnipa, pacientes.nombrep,pacientes.apellidop,pacientes.seguro, pacientes.tele, pacientes.usuario,
    pacientes.clave, pacientes.cargo, pacientes.estado, comunidad.nombre_comunidad, comunidad.provincia, pacientes.estadociv, pacientes.ocupacion,
    pacientes.nacimiento, pacientes.departamento, pacientes.zona_barrio, pacientes.domicilioac
     FROM pacientes 
    INNER JOIN comunidad ON pacientes.comunidad_id = comunidad.id_comunidad";

      $resultado=$this->db->query($consulta);
      while ($tabla=$resultado->fetchAll(PDO::FETCH_ASSOC)) {
          $this->pacientes[]=$tabla;
      }
      return $this->pacientes;     
    }
    public function  insertar(Modelo $data){
    try {
      $query="INSERT INTO pacientes (dnipa,nombrep,apellidop,seguro,tele,sexo,usuario,password,comunidad_id,estadociv,nacimiento,departamento,zona_barrio,domicilioac,estado)VALUES(?,?,?,?,?,?,?,?,?)";

      //$this->db->prepare($query)->execute(array($data->nombrees));

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
