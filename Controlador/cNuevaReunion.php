<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/ReunionDAO.php");
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

       
    $idNueva = ReunionDAO::ultimoId() + 1;   
    
    $fecha_creada = "$y-$m-$d";
    $fecha_reunion = $_POST['txtFechaR'];
    $hora = $_POST["txtHora"];
    $minuto = $_POST["txtMinuto"];

    $reunion = new Reunion($idNueva, $fecha_creada, $fecha_reunion, $hora, $minuto);
  
    
    if(ReunionDAO::agregar($reunion)){
        echo '<script type="text/javascript">
        alert("Se ha Agregado una reunion");
        window.location="../Vides/vides/reunion.php"
        </script>';            
    }
    else {   
        echo '<script type="text/javascript">
        alert("Error no se pudo agregar");
        window.location="../Vides/vides/reunion.php"
        </script>';
    }
    

?>