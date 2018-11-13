<?php
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/Controlador/CorreoEnviar.php");

    $nombre = $_GET["n"];
    $correo = $_GET["c"];
    $mensaje = $_GET["m"];
    $asunto = $_GET["a"];


    $mens = CorreoEnviar::mensaje2($nombre,$mensaje);
    $mail = CorreoEnviar::Enviar($correo, $asunto, $mens);

    ?>

    