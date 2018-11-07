<?php 


use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/POP3.php';
require '../PHPMailer/SMTP.php';
require '../PHPMailer/Exception.php';

class cCorreo{
    public static function enviarCorreo($correoD, $asunto, $mensaje){
        $mail = new PHPMailer(true);
        try {
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
            $mail->addAddress($correoD);
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;

            if ($mail->Send()) {
                return true;    
            }
            else{
               return false;            
            }

        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            return false;
        }
        

    }


    public static function mensajeReporte($nombre,$nombre2) {
        //mensaje que retorna algo especifico

        return "";
    }




}