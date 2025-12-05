<?php
require_once '../model/modelhistoria.php';
class historiacontroller
{
    public $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    function mostrar()
    {
        $historia = new Modelo();
        $dato = $historia->mostrar("historial", "1");
        require_once '../view/historia/mostrar1.php';
    }

    //INSERTAR
    public  function nuevo()
    {
        require_once '../view/historia/AgregarModal.php';
    }
    //aca ando haciendo
    public function recibir()
    {
        $alm = new Modelo();
        $alm->codpaci = $_POST['cbocodpaci'];
        $alm->coddoc = $_POST['cbocoddoc'];
        $alm->grado_instruccion = $_POST['grado_instruccion'];
        $alm->fecha = $_POST['txtfecha'];
        $alm->diagnostico = $_POST['diagnostico'];
        $alm->consulta = $_POST['consulta'];
        $alm->hospital = $_POST['hospital'];

        $this->model->insertar($alm);
        //-------------
        header("Location: historia.php");
    }
    //ELIMINAR
    function eliminar()
    {
        $idhistoria = $_REQUEST['idhistoriain'];
        $condicion = "idhistoriain=$idhistoria";
        $historial = new Modelo();
        $dato = $historial->eliminar("historial", $condicion);
        header("location:historia.php");
    }
}
