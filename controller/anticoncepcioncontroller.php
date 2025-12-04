<?php
require_once '../model/modelanticoncepcion.php';
class anticoncepcioncontroller
{
    public $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    function mostrar()
    {
        $anticoncepcion = new Modelo();
        $dato = $anticoncepcion->mostrar("anticoncepcion", "1");
        require_once '../view/anticoncepcion/mostrar1.php';
    }

    //INSERTAR
    public  function nuevo()
    {
        require_once '../view/anticoncepcion/AgregarModal.php';
    }
    //aca ando haciendo
    public function recibir()
    {
        $alm = new Modelo();
        $alm->codpaci = $_POST['codpaci'];
        $alm->coddoc = $_POST['coddoc'];
        $alm->fechaan = $_POST['fechaan'];
        $alm->registroan = $_POST['registroan'];
        $alm->detallean = $_POST['detallean'];
        $alm->atencionan = $_POST['atencionan'];
        $alm->orientacion = $_POST['orientacion'];
        $alm->metodosantimode = $_POST['metodosantimode'];
        $alm->insumos = $_POST['insumos'];
        $alm->metodosnat = $_POST['metodosnat'];
        $alm->muestraspaptom = $_POST['muestraspaptom'];
        $alm->estado = $_POST['estado'];
        

        $this->model->insertar($alm);
        //-------------
        header("Location: anticoncepcion.php");
    }
    //ELIMINAR
    function eliminar()
    {
        $idanticoncepcion = $_REQUEST['idanticoncepcion'];
        $condicion = "idanticoncepcion=$idanticoncepcion";
        $anticoncepcion = new Modelo();
        $dato = $anticoncepcion->eliminar("anticoncepcion", $condicion);
        header("location:anticoncepcion.php");
    }
}
