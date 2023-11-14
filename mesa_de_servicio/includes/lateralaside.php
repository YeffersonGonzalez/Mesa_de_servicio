<!-- Brand Logo -->
<a href="index.php" class="brand-link">
  <img src="../imgs/logo.JPG"
       alt="OSIRIS Logo"
       class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">OSIRIS<b></b></span>
</a>

<!-- Sidebar -->
<div class="sidebar ">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../imgs/usuarios/user.png" class="img-circle elevation-2" alt="Usuario">
    </div>
    <div class="info">
      <a href="#" class="d-block"><?php echo $_SESSION['us']; ?></a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- MENU latarar-->
      
      <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active ">
              <i class="nav-icon fas fa-edit "></i>
              <p>
                Formularios
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview"><?php
            if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
                              ?>
              <li class="nav-item">
                <a href="crear.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear CLiente y Producto</p>
                </a>
              </li>
              <?php }?>
              <?php
              if($objTools->userAuthorizad($_SESSION['rl'], 3)){
                              ?>
              <li class="nav-item">
                <a href="crear.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Crear Producto</p>
                </a>
              </li><?php }?>
              <li class="nav-item">
                <a href="listados_libros.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Listado de libros</p>
                </a>
              </li>
              



              <li class="nav-item">
                <a href="productos_informes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Informe de Servicios</p>
                </a>
              </li>
              <li class="nav-item">
              <?php if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
                              ?>
                <a href="cliente_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a><?php }?>
              </li>
              <li class="nav-item">
              <?php if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
                              ?>
                <a href="empleados_list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Empleados</p>
                </a><?php }?>
              </li>
              
              
            </ul>
          </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->