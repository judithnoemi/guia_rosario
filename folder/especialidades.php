<?php
require_once '../controller/especialidadescontroller.php';
$objespe=new especialidadescontroller();
$op="mostrar";
if(isset($_REQUEST['op']))
    $op=$_REQUEST['op'];
    if($op=="mostrar")
    $objespe->mostrar();
    elseif ($op=="nuevo")
        $objespe->nuevo();
    elseif ($op=="guardar")
        $objespe->guardar();
    elseif ($op=="editar")
        $objespe->editar();
    elseif($op=="update")
        $objespe->update();
        elseif($op=="insertar")
            $objespe->insertar();
        elseif($op=="recibir")
            $objespe->recibir();
            elseif($op=="eliminar")
                $objespe->eliminar();
?>
