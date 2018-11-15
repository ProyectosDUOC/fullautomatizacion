<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/ReunionDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");

    require_once ($rootDir . "/Controlador/CorreoEnviar.php");
    

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

            
            $date = date_create($fecha_reunion);
            $fecha_reun = date_format($date, 'd-m-Y');      
        
            $msj = " Se ha solicitado una reunion para el día  " . $fecha_reun . " a las  " . $hora . ":" . $minuto . " hrs. <br> atentamente  Benjamin Mora";
            $asunto = "Reunión Vides";             

            $usuarios = UsuarioDAO::readAll();

            $mail = false;
            foreach($usuarios as $us){
                $nombre = $us->getNombre()." ".$us->getApellido();
                $mens = CorreoEnviar::mensaje(" ".$nombre," ". $msj );
                $correo = $us->getEmail();
                $mail = CorreoEnviar::Enviar($correo, $asunto, $mens);
            }          
        if ($mail) {                   
                $_SESSION['result'] = 1; 
                header('Location: ../Vides/vides/reunion.php');   
                } else {
                
                    
                $_SESSION['result'] = -1; 
                header('Location: ../Vides/vides/reunion.php'); 
       
            }              
    }
    else {   
        $_SESSION['result'] = -2; 
        header('Location: ../Vides/vides/reunion.php');    

    }
    

?>