<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/POP3.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if (isset($_POST["opcion"])) {
    
   

    if ($_POST["opcion"] == "Enviar") {
        $CorreoDestino="b.morat@alumnos.duoc.cl";
        //Envio de correo recepcion
        $mail = new PHPMailer(true);
        try {
            $correo = $_POST['txtCorreo'];
            $mensaje = $_POST['txtMensaje'];
            $asunto = $_POST['txtAsunto'];
            $mail->isSMTP(); // Set mailer to use SMTP xd
            $mail->CharSet = "UTF-8";
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'webscontactos@gmail.com'; // SMTP username
            $mail->Password = 'abcd14abcd'; // SMTP password
            $mail->SMTPSecure = 'ssl';
            $mail->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465; // TCP port to connect to

            $mail->setFrom('webscontactos@gmail.com', 'Contacto Web');       

            $mail->addAddress($CorreoDestino);
            
            $mail->Subject = 'Nuevo correo de ' . $correo;
            $m = "<strong>Asunto: " . $asunto .
                "</strong> <br> <br> <strong> correo:</strong>" . $correo .
                " <br> <br>  <strong>mensaje:</strong> " . $mensaje;
            $mail->Body = $m;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        //correo al que lo envio
        $mail2 = new PHPMailer(true);
        try {
            $mail2->isSMTP(); // Set mailer to use SMTP
            $mail2->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail2->SMTPAuth = true; // Enable SMTP authentication
            $mail2->Username = 'webscontactos@gmail.com'; // SMTP username
            $mail2->Password = 'abcd14abcd'; // SMTP password
            $mail2->SMTPSecure = 'ssl';
            $mail2->CharSet = "UTF-8";
            $mail2->IsHTML(true); // Enable TLS encryption, `ssl` also accepted
            $mail2->Port = 465; // TCP port to connect to

            $mail2->setFrom('webscontactos@gmail.com', 'Contacto Full Automatización');
            $mail2->addAddress($correo);
            $mail2->Subject = 'Hemos recibido su mensaje';
            $m = "Le informamos que Full Automatización a recibido su mensaje. <br> Su mensaje será respondido dentro de las 24 horas. ";
            $mail2->Body = $m;

            if ($mail2->Send()) {

                if ($mail->Send()) {
                    echo '<script type="text/javascript">
                        alert("Su mensaje ha sido enviado");
                        window.location="index.html"
                   </script>';
                } else {
                    echo '<script type="text/javascript">
                alert("NO ENVIADO, intentar de nuevo");
                window.location="index.html"
                </script>';
                }
            } else {
                echo '<script type="text/javascript">
                    alert("NO ENVIADO, intentar de nuevo");
                    window.location="index.html"
                    </script>';
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
} else {
    echo '<script type="text/javascript">
    alert("error 404 . Pagina no encontrada");
    window.location="index.html"
    </script>';
}