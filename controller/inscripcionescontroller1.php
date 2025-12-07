<?php
require_once '../model/modelinscripciones.php';
class inscripcionescontroller
{
    public $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    function mostrar()
    {
        $inscripciones= new Modelo();
        $dato=$inscripciones->mostrar("inscripcions", "1");
        require_once'../view/inscripciones/mostrar.php';
    }

    //INSERTAR
    public  function nuevo()
    {
        require_once '../view/inscripciones/nuevo.php';
    }
    //aca ando haciendo
    public function recibir()
    {
       $alm = new Modelo();
      
     $alm->id= $_POST['id'];
 
    $alm->semestre_id =$_POST['semestre_id'];
    $alm->estudiante_id = $_POST['estudiante_id'];
   
    $alm->estado = $_POST['estado'];
    }
    //ELIMINAR
    function eliminar()
    {
        $id = $_REQUEST['id'];
        $condicion = "id=$id";
        $inscripciones = new Modelo();
        $dato = $inscripciones->eliminar("inscripciones", $condicion);
        header("location:inscripciones.php");
    }
}
