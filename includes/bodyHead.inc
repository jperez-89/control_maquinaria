<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-danger sidebar toggled sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand shadow-lg d-flex align-items-center justify-content-center" href="dashboard.php">
        <img class=" rounded-circle" src="img/icono.jpg" alt="Logo">
        <div class="sidebar-brand-text mx-3">DASHBOARD</div>
      </a>

      <!-- Division - Linea blanca -->
      <hr class="sidebar-divider">

      <!-- PLANILLA 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePlanilla"
          aria-expanded="true" aria-controls="collapsePlanilla">
          <i class="fas fa-tasks"></i>
          <span>Planilla</span>
        </a>
        <div id="collapsePlanilla" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Registro de Planilla</a>
          </div>
        </div>
      </li> -->

      <!-- MAQUINARIA-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaquinaria"
          aria-expanded="true" aria-controls="collapseMaquinaria">
          <i class="fas fa-truck-pickup"></i>
          <span>Maquinaria</span>
        </a>
        <div id="collapseMaquinaria" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="RegistroMaq.php">Registro de Maquinaria</a>
          </div>
        </div>
      </li>

      <!-- MATERIAL QUEBRADOR 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaterial"
          aria-expanded="true" aria-controls="collapseMaterial">
          <i class="fas fa-cheese"></i>
          <span>Material</span>
        </a>
        <div id="collapseMaterial" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="utilities-color.html">Salidas de Material</a>
          </div>
        </div>
      </li> -->

      <!-- COMBUSTIBLE 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCombustible"
          aria-expanded="true" aria-controls="collapseCombustible">
          <i class="fas fa-gas-pump"></i>
          <span>Combustible</span>
        </a>
        <div id="collapseCombustible" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="utilities-animation.html">Registro Facturas</a>
            <a class="collapse-item" href="utilities-color.html">Solicitud</a>
            <a class="collapse-item" href="utilities-border.html">Cierres</a>
          </div>
        </div>
      </li> -->

      <!-- PEDIDOS REPUESTOS Y MATERIALES 
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePedidos"
          aria-expanded="true" aria-controls="collapsePedidos">
          <i class="fas fa-search-plus"></i>
          <span>Pedidos</span>
        </a>
        <div id="collapsePedidos" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="utilities-color.html">Materiales - Randall V</a>
            <a class="collapse-item" href="utilities-border.html">Repuestos - Pamela S</a>
          </div>
        </div>
      </li> -->

      <!-- BODEGA REPUESTOS Y MATERIALES -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBodega" aria-expanded="true"
          aria-controls="collapseBodega">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Bodega</span>
        </a>
        <div id="collapseBodega" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="RegistroRep.php">Registro de Repuestos</a>
            <a class="collapse-item" href="SalidaRep.php">Salida de Repuestos</a>
            <a class="collapse-item" href="ReportesRep.php">Reporte</a>            
          </div>
        </div>
      </li>

      <!-- Division - Linea blanca -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler OCULTA EL MENU -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- LADO DERECHO -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- CONTENIDO PRINCIPAL -->
      <div id="content">
        <!--BARRA SUPERIOR -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar)  OCULTAR MENU, APARECE ACORDE AL ANCHO DE LA PANTALLA-->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- BARRA ARRIBA -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- INFORMACION DE USUARIO -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $Uname ?> - <?php echo $Urol ?> </span>
                <img class="img-profile rounded-circle"
                  src="http://www.upr.edu/red-ici/wp-content/uploads/sites/66/2017/05/1211811759.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> 
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>
          </ul>
          <!-- FIN BARRA ARRIBA -->
        </nav>
        <!-- FIN BARRA SUPERIOR -->
        