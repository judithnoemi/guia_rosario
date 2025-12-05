<?php
require_once '../model/modeldetallehistoria.php';
class detallehistoriacontroller{
public $model;
public function __construct() {
$this->model=new Modelo();
    }
    function mostrar(){
        $historia=new Modelo();
        $dato=$historia->mostrar("detallehistorial", "1");
        require_once '../view/detallehistoria/mostrar1.php';
    }

    //INSERTAR
    public  function nuevo(){
        require_once '../view/historia/AgregarModal.php';
    }
    //aca ando haciendo
    public function recibir(){
                $alm = new Modelo();

                $alm->fecha=$_POST['fecha'];
                $alm->hora=$_POST['hora'];
                
				    

     $this->model->insertar($alm);
     //-------------
header("Location: detallehistoria.php");

          }
           //ELIMINAR
           function eliminar(){
            $idhistoria=$_REQUEST['idhistoria'];
            $condicion="idhistoria=$idhistoria";
            $historia=new Modelo();
            $dato=$historia->eliminar("historia", $condicion);
            header("location:historia.php");
        }

        //BUSQUEDA POR FECHAS

}