<!-- Brand Logo -->
<a href="index.php" class="brand-link">
  <img src="../imgs/logo.JPG"
       alt="AdminLTE Logo"
       class="brand-image img-circle elevation-3"
       style="opacity: .8">
  <span class="brand-text font-weight-light">INFO<b>APS</b></span>
</a>

<!-- Sidebar -->
<div class="sidebar ">
  <!-- Sidebar user (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="../imgs/usuarios/user.png" class="img-circle elevation-2" alt="Usuario">
    </div>
    <div class="info">
      <a href="#" class="d-block">Usuario Nombre</a>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- MENU MEDICINAS -->
      <li class="nav-item ">
        <a href="index_Admin.php" class="nav-link ">
          <i class="nav-icon fas fa-tasks"></i>
          <p>
            BOARD            
          </p>
        </a>

      </li> 

      <!-- MENU CON ENFERMOS -->
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link ">
          <i class="nav-icon fas fa-users"></i>
          <p>
            USUARIOS
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="usuario_admin.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Listado</p>
            </a>
          </li>
          <?php
          if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
          ?>
          <li class="nav-item">
            <a href="usuarios_crear.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Nuevo Usuario</p>
            </a>
          </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a href="usario_detalle.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Mi perfil</p>
            </a>
          </li>
        </ul>
      </li> 

  

    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->