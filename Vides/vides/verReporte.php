<?php  
  session_start();
  if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
  require_once($rootDir . '/DAO/AccesoDAO.php'); 
  require_once($rootDir . '/DAO/UsuarioDAO.php'); 
  require_once($rootDir . '/DAO/ReporteVidesDAO.php');



  $nombres="";
  $reporte;

  if(isset($_SESSION['acceso'])){
    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);


    if(isset($_GET['id'])){
           
      $nombres = $usuario->getNombre() . " " . $usuario->getApellido();

      $reporte = ReporteVidesDAO::buscar($_GET['id']);
      
    }
    else{
        header('Location: home.php');
    }
  }else{
    header('Location: ../../index.html');
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vides - Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">

  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    
     <?php require_once("Navbar.php"); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Vides - Ver Reporte
          <small>Sistema de gestión</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level 1</a></li>
          <li class="active">Reportes</li>
        </ol>
      </section>
      <section class="content container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-warning">
              <div class="box-header">
                <h3 class="box-title">Reporte</h3>
                <div class="box-tools">
                </div>
              </div>
              <div class="box-body table-responsive no-padding">
                <table id="tabla1" class="table table-bordered table-hover" cellspacing="0"  width="100%">
                    <tr>
                        <td>Id Reporte</td>
                        <td><?php echo $reporte->getId_reporte() ?></td>
                    </tr>
                    <tr>
                        <td>Fecha realizado</td>
                        <td><?php echo $reporte->getFecha_realizada() ?></td>
                    </tr>
                    <tr>
                        <td>Hora Inicial</td>
                        <td><?php echo $reporte->getHora_inicial() ?></td>
                    </tr>
                    <tr>
                        <td>Hora Final</td>
                        <td><?php echo $reporte->getHora_final() ?></td>
                    </tr>
                    <tr>
                        <td>Temperatura °C</td>
                        <td><?php echo $reporte->getTemperatura() ?></td>
                    </tr>
                    <tr>
                        <td>Humedad %</td>
                        <td><?php echo $reporte->getHumedad() ?></td>
                    </tr>
                    <tr>
                        <td>Velocidad del viento (km/h)</td>
                        <td><?php echo $reporte->getVelocidad_viento() ?></td>
                    </tr>
                    <tr>
                        <td>Id Agenda</td>
                        <td><?php echo $reporte->getId_agenda() ?></td>
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        <td><?php echo UsuarioDAO::buscar($reporte->getId_usuario())->getNombre() ?></td>
                    </tr>
                    <tr>
                        <td>Nombre de carpeta</td>
                        <td><?php echo $reporte->getNombre_carpeta() ?></td>
                    </tr>
                    <tr>
                        <td>URL</td>
                        <td><?php echo $reporte->getURL() ?></td>
                    </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

      </section>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2018 <a href="#">FullAutomatización</a>.</strong>.
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="../../bower_components/datatables.net/js/traductor.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script>

  $(document).ready( function () {
    $('#tabla1').DataTable();
} );
</script>
</body>
</html>