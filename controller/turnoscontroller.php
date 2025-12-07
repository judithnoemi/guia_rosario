<?php
require_once '../model/modelturnos.php';
class turnoscontroller{

    public $model;
  public function __construct() {
        $this->model=new Modelo();
    }
    function mostrar(){
        $turnos=new Modelo();

        $dato=$turnos->mostrar("turnos", "1");
        require_once '../view/turnos/mostrar.php';
    }

//INSERTAR
  public  function nuevo(){
        require_once '../view/turnos/nuevo.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();
				$alm->nombre=$_POST['nombre'];
				$alm->descripcion=$_POST['descripcion'];
                
                

     $this->model->insertar($alm);
     //-------------
header("Location: turnos.php");

          }

            //ELIMINAR
            function eliminar(){
                $id=$_REQUEST['id'];
                $condicion="id=$id";
                $pacientes=new Modelo();
                $dato=$pacientes->eliminar("turnos", $condicion);
                header("location:turnos.php");
            }
    }
