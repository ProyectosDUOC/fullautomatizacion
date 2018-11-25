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
              <img src="../../dist/img/user-Seba.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $nombres ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user-Seba.jpg" class="img-circle" alt="User Image">

                <p>

                  <?php echo $nombres ?> - Reporte Vaca
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
        <img src="../../dist/img/user-Seba.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $nombres ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Reporte Vaca</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu</li>
      <!-- Optionally, you can add icons to the links -->    
    
      <li class="active"><a href="alertVaca.php"><i class="fa fa-plus"></i> <span>Reporte Dron</span></a></li>
    
    </ul>
    
  </section>
</aside>