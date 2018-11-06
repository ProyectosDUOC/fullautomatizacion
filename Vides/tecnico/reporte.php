<?php  
  session_start();
  if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
  require_once($rootDir . '/DAO/AccesoDAO.php'); 
  require_once($rootDir . '/DAO/UsuarioDAO.php'); 
  require_once($rootDir . '/DAO/AgendaDAO.php');   
  require_once($rootDir . '/DAO/TipoMonitoreoDAO.php'); 
  require_once($rootDir . '/DAO/ReporteVidesDAO.php'); 

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
  <title>Vides - Reunion</title>
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
          Vides - Reuniones
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
              <center>
                <h2>Reporte Piloto Dron</h2>
              </center>
              <!-- 
                  +---------------------+--------------+------+-----+---------+-------+
                  | Field               | Type         | Null | Key | Default | Extra |
                  +---------------------+--------------+------+-----+---------+-------+
                  | id_reporte          | int(11)      | NO   | PRI | NULL    |       |
                  | fecha_realizada     | datetime     | NO   |     | NULL    |       |
                  | hora_inicial        | datetime     | YES  |     | NULL    |       |
                  | hora_final          | datetime     | YES  |     | NULL    |       |
                  | temperatura         | int(11)      | YES  |     | NULL    |       |
                  | humedad             | int(11)      | YES  |     | NULL    |       |
                  | velocidad_viento    | int(11)      | YES  |     | NULL    |       |
                  | id_agenda           | int(11)      | NO   | MUL | NULL    |       |
                  | id_usuario          | int(11)      | NO   | MUL | NULL    |       |
                  | nombre_carpeta      | varchar(100) | YES  |     | NULL    |       |
                  | URL                 | varchar(200) | YES  |     | NULL    |       |
                  | id_vehiculo_volador | int(11)      | NO   | MUL | NULL    |       |
                  +---------------------+--------------+------+-----+---------+-------+
              -->
              <div class="box-body table-responsive no-padding">
              <table id="tabla1" class="table table-bordered table-hover" cellspacing="0"  width="100%">               
                  <thead>
                    <tr class="amber darken-3">
                      <th>Id reporte</th>
                      <th>Id Agenda</th>
                      <th>Fecha Realizada</th>
                      <th>Piloto</th>
                      <th>Estado</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                        $reporte = ReporteVidesDAO::readAll();
                        
                        foreach($reporte as $r){
                          $a = AgendaDAO::buscar($r->getId_agenda());
                    ?>
                    <tr>
                      <td><?php echo $r->getId_reporte() ?></td>
                      <td><?php echo $a->getId_agenda() ?></td>
                      <td><?php $fe = $a->getFecha_programada()."";
                                $date = date_create($fe);
                                echo date_format($date, 'd-m-Y');
                      ?></td>
                      <td><?php
                            $piloto = usuarioDAO::buscar($r->getId_usuario());
                            echo $piloto->getNombre();
                      ?></td>
                      <td>
                        <a href="verReporte.php?id=<?php echo $r->getId_reporte() ?>" class="btn btn-success"  >Ver</a>
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