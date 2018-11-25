<?php


if (!isset($rootDir)) {
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
}
require_once ($rootDir . "/DAO/AlertaVidesDAO.php");

$mensaje = $_GET["mensaje"];
$asunto = $_GET["asunto"];

$hoy = date("Y-m-d H:i:s"); 

$id = AlertaVidesDAO::ultimoId() + 1;
$alerta = new AlertaVides($id,$asunto,$mensaje,$hoy,1);

echo $id . "se necesita ";

if(AlertaVidesDAO::agregar($alerta)){
    echo "agregado";
    
    echo $alerta->__toString();

    $adpater = new AlertaAdapter($alerta);

    echo $adpater->getHora() . " - " . $adpater->getFecha();
}else{
    echo "no agregado";
}



?>