<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/AgendaDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");


    $now = time();
    $num = date("w");
    if ($num == 0)
    { $sub = 6; }
    else { $sub = ($num-1); }
    $WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation
    $todayh = getdate($WeekMon); 
    $d = $todayh["mday"];
    $m = $todayh["mon"];
    $y = $todayh["year"];

    
    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);

    $ultima = AgendaDAO::lastValue();
    $idNueva = $ultima->getId_agenda() + 1;
    
    $hoy = date("Y-m-d H:i:s");  
    $fecha_creacion = $hoy;
    $fecha_programada = $_POST['txtFechaR'];
    $descripcion = $_POST['txtDescripcion'];
    $id_tipo_monitoreo = $_POST['txtTipoReporte'];
    $idUsuario = $usuario->getId_usuario();

    $agenda = new Agenda($idNueva, $fecha_creacion, $fecha_programada, $descripcion,1, $id_tipo_monitoreo, $idUsuario) ;
  
    
    if(AgendaDAO::agregar($agenda)){


        echo '<script type="text/javascript">
        alert("Agregado");
        window.location="../Vides/vides/home.php"
        </script>';

            
    }
    else {   
        echo '<script type="text/javascript">
        alert("Error");
        window.location="../Vides/vides/home.php"
        </script>';
    }
    

?>