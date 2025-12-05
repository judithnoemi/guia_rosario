<?php
require_once '../model/modelespecialidades.php';
class especialidadescontroller{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $especialidades=new Modelo();

        $dato=$especialidades->mostrar("especialidades", "1");
        require_once '../view/especialidades/mostrar.php';
    }
 //INSERTAR
  public  function nuevo(){
        require_once '../view/especialidades/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
                $alm->nombrees=$_POST['txtnomes'];
$this->model->insertar($alm);
     //-------------
header("Location: especialidades.php");
}
 //ELIMINAR
            function eliminar(){
                $codespe=$_REQUEST['codespe'];
                $condicion="codespe=$codespe";
                $especialidades=new Modelo();
                $dato=$especialidades->eliminar("especialidades", $condicion);
                header("location:especialidades.php");
            }

    }
