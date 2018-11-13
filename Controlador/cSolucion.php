<?php
    session_start();
      
    if (!isset($rootDir)) {
       $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }

    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/SolucionDAO.php");    
    require_once ($rootDir . "/Controlador/CorreoEnviar.php");    

    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);
   
    try{

    $id = SolucionDAO::ultimoId()+ 1;
    $idUsuario = $usuario->getId_usuario();
    $fechaSolucion = date("Y-m-d H:i:s");  
    $nombreC = $_POST['carpeta'];
    $URL = $_POST['url'];
    $descrip = $_POST['descripcion'];


    $solucion = new Solucion($id,$idUsuario,$fechaSolucion,$nombreC,$URL,$descrip);

    

    if( SolucionDAO::agregar($solucion) ){

        $msj = " Se ha ingresado una solución al sistema <br><br>  <a href='".$URL."' >Carpeta Compartida</a> al nombre de  " . $nombreC;


        $asunto = "Informe de ingreso de solución";             

        $usuarios = UsuarioDAO::readAll();

        $mail = false;
        foreach($usuarios as $us){
            $nombre = $us->getNombre()." ".$us->getApellido();
            $mens = CorreoEnviar::mensaje(" ".$nombre," ". $msj );
            $correo = $us->getEmail();
            $mail = CorreoEnviar::Enviar($correo, $asunto, $mens);
        }  

        if ($mail) {
            echo '<script type="text/javascript">
            alert("Solucion Registrada");
            window.location="../Vides/tecnico/soluciones.php"
            </script>';    
        } else {
            echo '<script type="text/javascript">
        alert("Solucion no Registrada");
        window.location="../Vides/tecnico/soluciones.php"
        </script>';            

        }       
    }
    else {
        echo '<script type="text/javascript">
        alert("no Registrada");
        window.location="../Vides/tecnico/soluciones.php"
        </script>';            

    }
}catch(Exception $ex){
    echo $ex . " ";
    echo '<script type="text/javascript">
    alert("no Registrada");
    window.location="../index.php"
    </script>';  
}

?>