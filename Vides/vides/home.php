<?php  
  session_start();
  if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
  require_once($rootDir . '/DAO/AccesoDAO.php'); 
  require_once($rootDir . '/DAO/UsuarioDAO.php'); 
  require_once($rootDir . '/DAO/AgendaDAO.php');   
  require_once($rootDir . '/DAO/TipoMonitoreoDAO.php'); 

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

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
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
          Vides - Calendario
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
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Agenda </h3>
                <a class="btn btn-primary" href="nuevaEntrada.php">Nueva Entrada</a>
              </div>
              <div class="box-body table-responsive no-padding">
                <table id="tabla1" class="table table-bordered table-hover">               
                  <thead>
                    <tr class="amber darken-3">
                      <th>Id</th>
                      <th>Fecha Creacion</th>
                      <th>Fecha Programada</th>
                      <th>Estado</th>
                      <th>Tipo Monitoreo</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                        $agendas = AgendaDAO::readAll();
                        $color = "success";
                        $mensaje = "pendiente";
                        foreach($agendas as $a){
                        if($a->getId_estado_a()==1){
                          $color = "warning";
                          $mensaje = "Pendiente";
                        }
                        if($a->getId_estado_a()==2){
                          $color = "danger";
                          $mensaje = "Cancelado";
                        }
                        if($a->getId_estado_a()==3){
                          $color = "success";
                          $mensaje = "Realizado";
                        }
                    ?>
                    <tr>
                      <td><?php echo $a->getId_agenda() ?></td>
                      <td><?php $fe = $a->getFecha_creacion()."";
                                $date = date_create($fe);
                                echo date_format($date, 'd-m-Y');
                      ?></td>
                      <td><?php $fe = $a->getFecha_programada()."";
                                $date = date_create($fe);
                                echo date_format($date, 'd-m-Y');
                      ?></td>
                      <td><span class="label label-<?php echo $color ?>"><?php echo $mensaje ?></span></td>
                      <td><?php  
                          $tipo = TipoMonitoreoDAO::buscar($a->getId_tipo_monitoreo());
                          echo $tipo->getNombre_monitoreo();
                      ?>
                      </td>
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

<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script>

  $(document).ready( function () {
    $('#tabla1').DataTable();
} );
</script>

</body>

</html>