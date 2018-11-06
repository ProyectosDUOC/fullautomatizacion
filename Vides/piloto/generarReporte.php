<?php
session_start();
if (!isset($rootDir)) {
    $rootDir = $_SERVER['DOCUMENT_ROOT'];
}

require_once $rootDir . '/DAO/AccesoDAO.php';
require_once $rootDir . '/DAO/UsuarioDAO.php';
require_once $rootDir . '/DAO/AgendaDAO.php';
require_once $rootDir . '/DAO/TipoMonitoreoDAO.php';
require_once $rootDir . '/DAO/EstadoAgendaDAO.php';
require_once $rootDir . '/DAO/VehiculoVoladorDAO.php';

$nombres;
$idAgenda = -1;
$drones;

if (isset($_SESSION['acceso'])) {
    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);

    if ($usuario->getId_tipo_u() == 2) { //Piloto 2

        $nombres = $usuario->getNombre() . " " . $usuario->getApellido();
        $drones = VehiculoVoladorDAO::readAll();

        if (isset($_GET['id'])) {
            $idAgenda = $_GET['id'];
        }
    }
} else {
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

  <link rel="stylesheet" href="../../plugins/timepicker/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css">

  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">

    <?php require_once "Navbar.php";?>

    <div class="content-wrapper">
      
      <section class="content-header">
        <h1>
          Vides - Generar Reporte
          <small>Sistema de gestión</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Piloto</a></li>
          <li class="active">Generar Reporte</li>
        </ol>
      </section>

      <form role="form" method="POST" action="../../Controlador/cNuevoReporte.php">
        <section class="content">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Informacion de vuelo</h3>
              </div>
              <div class="box-body">

                <div class="form-group">
                  <label>Vehiculo Volador</label>
                  <select name="vehiculo" class="form-control">
                    <?php
                    foreach ($drones as $drone){
                      $idDrone = $drone->getId_vehiculo_volador();
                      $nDrone = $drone->getModelo();
                      echo "<option value='$idDrone'> $nDrone </option>";
                    }
                    ?>
                  </select>
                </div>

                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora inicial:</label>
                        <div class="input-group">
                            <input name="hInicial" type="text" class="form-control timepicker">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bootstrap-timepicker">
                    <div class="form-group">
                        <label>Hora final:</label>
                        <div class="input-group">
                            <input name="hFinal" type="text" class="form-control timepicker">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Fecha Realizada</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input name="fRealizada" type="text" class="form-control pull-right" id="datepicker">
                    </div>
                </div>

                <input type="hidden" name="idAg" value="<?php echo $idAgenda ?>" >

              </div>
            </div>

          </div>

          <div class="col-md-6">

            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Datos Recolectados</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label>Temperatura:</label>
                        <div class="input-group">
                            <input name="temp" type="text" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-thermometer-empty"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Humedad:</label>
                        <div class="input-group">
                            <input name="humedad" type="text" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-cloud"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Velocidad Viento:</label>
                        <div class="input-group">
                            <input name="viento" type="text" class="form-control">
                            <div class="input-group-addon">
                                <i class="fa fa-align-left"></i>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label>URL Fotos</label>
                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-laptop"></i>
                          </div>
                          <input name="url" type="text" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Nombre Carpeta</label>                    
                      <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-folder"></i>
                          </div>
                        <input name="carpeta" type="text" class="form-control">
                      </div>
                    </div>

                </div>
            </div>

          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-md-offset-3">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Enviar Reporte</h3>
              </div>
              <div class="box-body">
                <a href="home.php" class="btn btn-default">Cancelar</a>
                <button type="submit" class="btn btn-info pull-right">Confirmar</button>
              </div>
            </div>
          </div>
        </div>
        </section>
      </form>
    </div>

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
      </div>
      <strong>Copyright &copy; 2018 <a href="#">FullAutomatización</a>.</strong>.
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>
  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
  <script src="../../bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <script>
    $(function () {
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
          //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  </script>
</body>

</html>