<?php
    session_start();
      
    if (!isset($rootDir)) {
       $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/AgendaDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/ReporteVidesDAO.php");

    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);

    $vehiculo = $_POST['vehiculo'];
    $fRealizada = $_POST['fRealizada'];
    $hInicial = $_POST['hInicial'];
    $hFinal = $_POST['hFinal'];
    $temp = $_POST['temp'];
    $humedad = $_POST['humedad'];
    $viento = $_POST['viento'];
    $url = $_POST['url'];
    $carpeta = $_POST['carpeta'];

    $nuevoId = ReporteVidesDAO::lastId() + 1;
    $idAgenda = $_POST['idAg'];
    $idUsuario = $usuario->getId_usuario();

    $reporte = new ReporteVides($nuevoId, $fRealizada, $hInicial, $hFinal, $temp, $humedad, $viento, $idAgenda, $idUsuario, $carpeta, $url, $vehiculo);

    if( ReporteVidesDAO::agregar($reporte) ){
        echo 'hola';
    }
    else {
        echo 'ou';
    }

?>