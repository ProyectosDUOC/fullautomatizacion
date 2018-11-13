<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    
    require_once ($rootDir . "/Controlador/CorreoEnviar.php");

 
        
    $correo = $_POST['txtCorreo'];
    $passO = "1234";
    //$pass = hash('sha256', $passO);

    $usuarios = UsuarioDAO::readAll();
    $acc = AccesoDAO::readAll();

    $user = null;
    $acces =null;

    foreach($usuarios as $u){
        if($u->getEmail()==$correo){
            $user = $u;
            break;
        }
    }

    if($user!=null){
        foreach($acc as $ac){
            if($ac->getId_usuario()==$user->getId_usuario()){
                $acces = $ac;
                break;
            }
        }

        //$acces->getPassword($pass);
        //AccesoDAO::actualizar($acces);
       
        
            $msj = " Se ha solicitado la recuperación de su contraseña <br><br> <strong>Usuario</strong> " .
                        $acces->getUsername()  . "<br> <strong>Clave</strong> " . $passO ;


            $nombre = $user->getNombre()." ".$user->getApellido();
            
            $mens = CorreoEnviar::mensaje(" ".$nombre," ". $msj );

            $asunto = "Recuperar Contraseña Full Automatización";
           

            $mail = CorreoEnviar::Enviar($correo, $asunto, $mens);
        if ($mail) {
                    echo '<script type="text/javascript">
                        alert("Su mensaje ha sido enviado");
                        window.location="../index.html"
                   </script>';
        } else {
                    echo '<script type="text/javascript">
                alert("NO ENVIADO, intentar de nuevo");
                window.location="../index.html"
                </script>';            
       
            }
    }else{
        echo '<script type="text/javascript">
        alert("NO ENVIADO, intentar de nuevo");
        window.location="../index.html"
        </script>';
    }