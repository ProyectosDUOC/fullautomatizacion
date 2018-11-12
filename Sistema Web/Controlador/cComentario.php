<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/AgendaDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/ComentarioReporteDAO.php");


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

    $hoy = date("Y-m-d H:i:s");   // este entrega todos los datos.
    
    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);

    $ultima = ComentarioReporteDAO::ultimoId();
    $idNueva = $ultima + 1;
    //$fecha_creacion = "$y-$m-$d";
    $fecha_creacion = $hoy;

    $idR = $_POST['txtIdR'];
    $comentari = $_POST['txtComentario'];
    $idUsuario = $usuario->getId_usuario();
    $redireccion="";

    if($usuario->getId_tipo_u()==1){
        //cliente 1
        $redireccion="../Vides/vides/verReporte.php?id=".$idR;
    }
    if($usuario->getId_tipo_u()==2){
        //piloto 1
        $redireccion="../Vides/piloto/verReporte.php?id=".$idR;
    }
    if($usuario->getId_tipo_u()==3){
        $redireccion="../Vides/tecnico/verReporte.php?id=".$idR;
    }

    $come = new ComentarioReporte($idNueva, $idUsuario, $fecha_creacion, $comentari,1,$idR);
   
    if(ComentarioReporteDAO::agregar($come)){


        echo '<script type="text/javascript">
        window.location="'.$redireccion.'"
        </script>';

            
    }
    else {   
        echo '<script type="text/javascript">
        alert("Error");
        window.location="../Vides/vides/home.php"
        </script>';
    }
    

?>