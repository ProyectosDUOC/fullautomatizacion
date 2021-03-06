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
    
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user-paty.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo  $nombres?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user-paty.jpg" class="img-circle" alt="User Image">

                <p>
                <?php echo  $nombres?> - Técnico en Termodinámica
               
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../../index.html" class="btn btn-danger btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
  </nav>
</header>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../../dist/img/user-paty.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $nombres ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i>  Técnico en Termodinámica</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
     <li class="treeview active">
        <a href="#"><i class="fa fa-book"></i> <span>Reportes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="home.php">Ver Reuniones</a></li>
        </ul>
       
      </li>     
      <li class="treeview active">
        <a href="#"><i class="fa fa-calendar"></i> <span>Reunión</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="reunion.php">Ver Reuniones</a></li>
        </ul>
      </li>    
      <li class="treeview active">
        <a href="#"><i class="fa fa-calendar"></i> <span>Soluciones</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="generarSoluciones.php">Crear Soluciones</a></li>
        <li><a href="soluciones.php">ver Soluciones</a></li>
        </ul>
      </li>      
    </ul>
  </section>
</aside>