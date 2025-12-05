<?php
require_once '../model/modelodontologia.php';
class odontologiacontroller
{
    public $model;
    public function __construct()
    {
        $this->model = new Modelo();
    }
    function mostrar()
    {
        $historia = new Modelo();
        $dato = $historia->mostrar("odontologia", "1");
        require_once '../view/odontologia/mostrar.php';
    }

    //INSERTAR
    public  function nuevo(){
        require_once '../view/odontologia/nuevo.php';
    }

    public function recibir()
    {
        $alm = new Modelo();

        $alm->codpaci = $_POST['codpaci'];
		$alm->coddocod = $_POST['coddocod'];
		$alm->fecha = $_POST['fecha'];
		$alm->registro = $_POST['registro'];
		$alm->detalle = $_POST['detalle'];
		$alm->atencion = $_POST['atencion'];
		$alm->diagnostico = $_POST['diagnostico'];
		$alm->primeracon = $_POST['primeracon'];
		$alm->piezaden = $_POST['piezaden'];
		$alm->mujeresem = $_POST['mujeresem'];
		$alm->mujerespost = $_POST['mujerespost'];
		$alm->medidaspreven = $_POST['medidaspreven'];
		$alm->restauraciones = $_POST['restauraciones'];
		$alm->endodoncia = $_POST['endodoncia'];
		$alm->periodoncia  = $_POST['periodoncia'];
		$alm->cir_bucalmenor = $_POST['cir_bucalmenor'];
		$alm->otrasacc = $_POST['otrasacc'];
		$alm->rx = $_POST['rx'];
		$alm->refycontraref = $_POST['refycontraref'];
		$alm->tratamiento = $_POST['tratamiento'];

        $this->model->insertar($alm);
        //-------------
        header("Location: odontologia.php");
    }
    //ELIMINAR
    function eliminar()
    {
        $idodontologia = $_REQUEST['idodontologia'];
        $condicion = "idodontologia=$idodontologia";
        $odontologia = new Modelo();
        $dato = $odontologia->eliminar("odontologia", $condicion);
        header("location:odontologia.php");
    }
}
