<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vides - Nueva entrada</title>
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
  <?php 
    $now = time();
    $num = date("w");
    if ($num == 0)
    { $sub = 6; }
    else { $sub = ($num-1); }
    $WeekMon  = mktime(0, 0, 0, date("m", $now)  , date("d", $now)-$sub, date("Y", $now));    //monday week begin calculation
    $todayh = getdate($WeekMon); //monday week begin reconvert
    
    $d = $todayh["mday"];
    $m = $todayh["mon"];
    $y = $todayh["year"];
    $fecha = "$d/$m/$y";
  ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">
    <header class="main-header">

      <a href="home.php" class="logo">
        <span class="logo-mini"><b>F</b>A</span>
        <span class="logo-lg"><b>Full</b>Automatización</span>
      </a>

      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
      </nav>
    </header>
    <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Administrador</a>
        </div>
      </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">Menu</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="treeview active">
            <a href="#"><i class="fa fa-calendar"></i> <span>Agenda</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="nuevaEntrada.php">Nueva entrada</a></li>
              <li><a href="home.php">Ver Agenda</a></li>
            </ul>
          </li>

          <li class="active"><a href="reporte.php"><i class="fa fa-book"></i> <span>Reportes</span></a></li>
        </ul>
      </section>
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Vides - Nueva entrada
          <small>Sistema de gestión</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Level 1</a></li>
          <li class="active">Nueva Entrada</li>
        </ol>
      </section>

    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Agendar</h3>
            </div>
            <form role="form" method="POST" action="">
              <div class="box-body">
                <div class="form-group">
                  <label for="fecha1">Fecha Creación <?php echo $fecha ?></label>
                </div>
                <div class="form-group">
                  <label for="fecha1">Fecha Planificación</label>
                  <input type="date" class="form-control" id="fecha1" name="txtFechaR" value="<?php echo $fecha ?>">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" placeholder="Comentarios" name="txtDescripcion" require>
                </div>
                <div class="form-group">
                  <label>Tipo Monitoreo</label>
                  <select class="form-control"  name="txtEstado" require>
                    <option>Fertilizandte</option>
                    <option>Scan Dron</option>
                  </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a class="btn btn-danger" href="home.php">Volver</a>
              </div>
            </form>
          </div>
        </div>        
      </div>
      <div>
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
  <!-- Bootstrap 3.3.7 -->
  <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>