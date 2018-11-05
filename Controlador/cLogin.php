<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    
    $usuario = $_POST['txtUsuario'];
    $pass = $_POST['txtPass'];
    $pass = hash('sha256', $pass);
    $isLogin = "0";

    $arrayAccesos = AccesoDAO::readAll();

    if(AccesoDAO::ingreso($usuario,$pass)){
        
        $usuario = UsuarioDAO::buscarName($usuario);

        $tipoU = $usuario->getId_tipo_u();

        switch ($tipoU) {
            case 1:
                // echo "cliente";
                $_SESSION['acceso']= serialize($ac);     
                $_SESSION['usuario']= serialize($usuario);  
                header('Location: ../Vides/admin/home.php');                        
                break;
            case 2:
                // echo "piloto";
                $_SESSION['acceso']= serialize($ac);     
                $_SESSION['usuario']= serialize($usuario);  
                header('Location: ../Vides/piloto/home.php');                 
                break;
            case 3:
                // echo "Tecnicos";
                $_SESSION['acceso']= serialize($ac);     
                $_SESSION['usuario']= serialize($usuario);  
                header('Location: ../Vides/tecnico/home.php');              
                break;           
        }
    }
    else {   
        $_SESSION['mensaje']= "Usuario Incorrecto";
        header('Location: ../login.php');   
    }
    

?>