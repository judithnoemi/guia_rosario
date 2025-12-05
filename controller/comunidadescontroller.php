<?php
require_once '../model/modelcomunidades.php';
class comunidadescontroller{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $comunidades=new Modelo();

        $dato=$comunidades->mostrar("comunidad", "1");
        require_once '../view/comunidades/mostrar.php';
    }

//INSERTAR
  public  function nuevo(){
        require_once '../view/comunidades/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nombre_comunidad=$_POST['txtnombre'];
                $alm->provincia=$_POST['txtprovincia'];
  $this->model->insertar($alm);
     //-------------
header("Location: comunidades.php");
}
//ELIMINAR
            function eliminar(){
                $id_comunidad=$_REQUEST['id_comunidad'];
                $condicion="id_comunidad=$id_comunidad";
                $comunidades=new Modelo();
                $dato=$comunidades->eliminar("comunidades", $condicion);
                header("location:comunidades.php");
            }

    }
