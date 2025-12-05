<?php
require_once '../model/modelcitas.php';
class citascontroller{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $citas=new Modelo();

        $dato=$citas->mostrar("citas", "1");
        require_once '../view/citas/mostrar.php';
    }
 //INSERTAR
  public  function nuevo(){
        require_once '../view/citas/AgregarModal.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->dates=$_POST['dates'];
                $alm->hour=$_POST['hour'];
                $alm->codpaci=$_POST['codpaci'];
				$alm->coddoc=$_POST['coddoc'];
				$alm->codespe=$_POST['codespe'];
				$alm->estado=$_POST['estado'];         

     $this->model->insertar($alm);
     //-------------
header("Location: citas.php");
}
 //ELIMINAR
            function eliminar(){
                $codcit=$_REQUEST['codcit'];
                $condicion="codcit=$codcit";
                $citas=new Modelo();
                $dato=$citas->eliminar("citas", $condicion);
                header("location:citas.php");
            }
    }
