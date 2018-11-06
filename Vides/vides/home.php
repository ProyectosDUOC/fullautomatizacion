<?php  
  session_start();
  if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
  require_once($rootDir . '/DAO/AccesoDAO.php'); 
  require_once($rootDir . '/DAO/UsuarioDAO.php'); 
  
  require_once($rootDir . '/DAO/AgendaDAO.php'); 

  $nombres="";
  if(isset($_SESSION['acceso'])){
    $acceso = $_SESSION['acceso'];
    $acceso = unserialize($acceso);
    $usuario = $_SESSION['usuario'];
    $usuario = unserialize($usuario);


    if($usuario->getId_tipo_u()==1){ //Cliente 1
           
      $nombres = $usuario->getNombre() . " " . $usuario->getApellido();            
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

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">

    <?php require_once("Navbar.php"); ?>

    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Vides - Calendario
          <small>Sistema de gestión</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level 1</a></li>
          <li class="active">Reportes</li>
        </ol>
      </section>
      </section>
      <section class="content container-fluid">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Agenda </h3>
                <a class="btn btn-primary" href="nuevaEntrada.php">Nueva Entrada</a>
                <div class="box-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="box-body table-responsive no-padding">
                <table id="example" class="striped grey lighten-2 table table-striped table-bordered" cellspacing="0"
                  width="100%">
                  <thead>
                    <tr class="amber darken-3">
                      <th>Nombre Asignatura</th>
                      <th>Asignatura/sección</th>
                      <th>Rut Alumno</th>
                      <th>Fecha Inasistencia</th>
                      <th>Acción</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                        $agendas = AgendaDAO::readAll();

                        foreach($agendas as $a){
                          echo $a->getId_agenda();
                    ?>
                    <tr>
                      <td><?php echo $a->getId_agenda() ?></td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="label label-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                        <?php  } ?>
                  </tbody>

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
    <div class="control-sidebar-bg">
    </div>
  </div>
  <script src="../../bower_components/jquery/dist/js/jquery.min.js"></script>
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="../../plugins/datatables/data.js"></script>

  <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../../plugins/datatables/script.js"></script>
  <!-- AdminLTE App -->
  <script src="../../bower_components/dist/js/adminlte.min.js"></script>

</body>

</html>