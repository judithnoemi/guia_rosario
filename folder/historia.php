<?php
require_once '../controller/historiacontroller.php';
$objapp=new historiacontroller();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objapp->mostrar();
    elseif ($op=="nuevo")
        $objapp->nuevo();
    elseif ($op=="guardar")
        $objapp->guardar();
    elseif ($op=="editar")
        $objapp->editar();
    elseif($op=="update")
        $objapp->update();
        elseif($op=="insertar")
            $objapp->insertar();
        elseif($op=="recibir")
            $objapp->recibir();
            elseif($op=="eliminar")
                $objapp->eliminar();
?>