<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/AccesoDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");

        
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/POP3.php';
    require '../PHPMailer/SMTP.php';
    require '../PHPMailer/Exception.php';
        
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
       
        $mail = new PHPMailer(true);
        try {
            $mensaje = "Estimado Usuario se ha solicitado la recuperación de su contraseña <br><br> <strong>Usuario</strong> " .
                        $acces->getUsername()  . "<br> <strong>Clave</strong> " . $passO ;
            $asunto = "Recuperar Contraseña Full Automatización";
            $mail->isSMTP(); // Set mailer to use SMTP xd
            $mail->CharSet = "UTF-8";
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'webscontactos@gmail.com'; // SMTP username
            $mail->Password = 'abcd14abcd'; // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to

            $mail->setFrom('webscontactos@gmail.com', 'Contacto Web Full Automatizacion');       

            $mail->addAddress($correo);
            
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        //correo al que lo envio
       
        if ($mail->Send()) {
                    echo '<script type="text/javascript">
                        alert("Su mensaje ha sido enviado");
                      
                   </script>';
                } else {
                    echo '<script type="text/javascript">
                alert("NO ENVIADO, intentar de nuevo");
               
                </script>';            
       
            }
    }