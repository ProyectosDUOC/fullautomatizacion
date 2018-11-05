<?php  
  session_start();
  if (!isset($rootDir)) $rootDir = $_SERVER['DOCUMENT_ROOT'];
  require_once($rootDir . '/DAO/AccesoDAO.php'); 
  require_once($rootDir . '/DAO/UsuarioDAO.php'); 
  require_once($rootDir . '/DAO/TipoMonitoreoDAO.php'); 

  $nombres="";
  if(isset($_SESSION['acceso'])){
      $acceso = $_SESSION['acceso'];
      $acceso = unserialize($acceso);
      if($c->getIdTipo()==1){ //Cliente 1
        $usuario = $_SESSION['usuario'];
        $usuario = unserialize($usuario);
        $nombres = $usuario->getNombre() . " " . $usuario->getApellido();       
          
         
      }
    }else{
      header('Location: ../../index.html');
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
    $todayh = getdate($WeekMon); 
    $d = $todayh["mday"];
    $m = $todayh["mon"];
    $y = $todayh["year"];
    $fecha = "$d/$m/$y";
  ?>
</head>
<body class="hold-transition skin-purple sidebar-mini">
  <div class="wrapper">   
    <?php require_once("Navbar.php"); ?>

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
                  <input type="date" class="form-control" id="fecha1" name="txtFechaR" value="">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" placeholder="Comentarios" name="txtDescripcion" require>
                </div>
                <div class="form-group">
                  <label>Tipo Monitoreo</label>

                    <select class="custom-select d-block w-100" id="tipoUsuario" name="txtTipoUsuario" required="">
                      <?php 
                        $tipoMonitoreo = CategoriaDAO::sqlSelectAll();
                        foreach($cate as $c){                                                   
                          echo "<option value=" . $c->getIdCate() . " >" . $c->getNombreCate() . "</option>";                                                      
                        }?>                                            
                    </select>


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