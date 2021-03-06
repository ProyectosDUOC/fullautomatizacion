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
    $agenda = AgendaDAO::buscar($idAgenda);
    $agenda->setId_estado_a(3);
    AgendaDAO::actualizar($agenda);
    $reporte = new ReporteVides($nuevoId, $fRealizada, $hInicial, $hFinal, $temp, $humedad, $viento, $idAgenda, $idUsuario, $carpeta, $url, $vehiculo);

    if( ReporteVidesDAO::agregar($reporte) ){
        $_SESSION['result'] = 1; 
        header('Location: ../Vides/piloto/reporte.php'); 
    }
    else {
        $_SESSION['result'] = -1; 
        header('Location: ../Vides/piloto/reporte.php'); 
    }

?>