<?php
require_once '../model/modelestudiantes.php';
class estudiantescontroller {

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $estudiantes=new Modelo();

        $dato=$estudiantes->mostrar("estudiantes", "1");
        require_once '../view/estudiantes/mostrar.php';
    }
//INSERTAR
  public  function nuevo(){
        require_once '../view/estudiantes/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                 $alm = new Modelo();
                 $alm->nombres=$_POST['nombres'];
                 $alm->apellidos=$_POST['apellidos'];
                 $alm->ci=$_POST['ci'];
                 $alm->carrera_id=$_POST['carrera_id'];
                 $alm->turno_id=$_POST['turno_id'];
                 $alm->numero=$_POST['numero'];
                 $alm->direccion=$_POST['direccion'];
                 $alm->celular=$_POST['celular'];
                 $alm->fecha=$_POST['fecha'];
                 $alm->procedencia=$_POST['procedencia'];
                 $alm->tipo_beca=$_POST['tipo_beca'];
                 $alm->descuento=$_POST['descuento'];
                 $alm->porcentaje=$_POST['porcentaje'];
                 $alm->n_resolucion=$_POST['n_resolucion'];
                 $alm->n_expedinte=$_POST['n_expediente'];

 $this->model->insertar($alm);
     //-------------
header("Location: estudiantes.php");
 }
//ELIMINAR
            function eliminar(){
                $id=$_REQUEST['id'];
                $condicion="id=$id";
                $cestudiantes=new Modelo();
                $dato=$cestudiantes->eliminar("carreras", $condicion);
                header("location:estudiantes.php");
            }

    }
