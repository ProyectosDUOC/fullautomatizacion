<?php
    session_start();
      
    if (!isset($rootDir)) {
        $rootDir = $_SERVER['DOCUMENT_ROOT'];
    }
    require_once ($rootDir . "/DAO/ReunionDAO.php");
    require_once ($rootDir . "/DAO/UsuarioDAO.php");
    require_once ($rootDir . "/DAO/AccesoDAO.php");

    
        
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;

    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/POP3.php';
    require '../PHPMailer/SMTP.php';
    require '../PHPMailer/Exception.php';

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

         
        $mail = new PHPMailer(true);
        try {
            $mensaje = "Estimado Usuario se ha solicitado una reunion para el día  " . $fecha_reun . " a las  " . $hora . ":" . $minuto . " hrs. <br> atentamente  Benjamin Mora";
            $asunto = "Reunión Vides";
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

            $usuarios = UsuarioDAO::readAll();

            foreach($usuarios as $us){
                $mail->addAddress($us->getEmail());
            }
            
            
            $mail->Subject = $asunto;
            $mail->Body = $mensaje;
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }

        //correo al que lo envio
       
        if ($mail->Send()) {
                    echo '<script type="text/javascript">
                    alert("Se ha Agregado una reunion");
                    window.location="../Vides/vides/reunion.php"
                    </script>';    
                } else {
                    echo '<script type="text/javascript">
                alert("NO ENVIADO, intentar de nuevo");
               
                </script>';            
       
            }


              
    }
    else {   
        echo '<script type="text/javascript">
        alert("Error no se pudo agregar");
        window.location="../Vides/vides/reunion.php"
        </script>';
    }
    

?>