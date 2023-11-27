<?php
session_start(); 
if(isset($_SESSION['rl'])){
  
  
  include ("../models/tools.php");
  $objTools = new webtools();
  include "../controllers/controller_consultas_backend.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/fondo.css">
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-collapse sidebar-mini">

<?php include "includes/config.php"; ?>

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand <?php echo $headerStyle; ?>">
    <?php 
      include "includes/header.php";
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4">
    <?php 
    include "includes/lateralaside.php";
     ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Listado</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row d-none d-print-block"><!-- fila contenedora -->
        <div class="col-md-12"> <!-- fin columna de contenido -->
        
          <div class="card">                      
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <div class="card-body">
              <img src="../imgs/fondoO.JPG" width="100%">
            </div>  <!-- /.fin card-body -->
          </div>
        
        </div> <!-- ./ fin col -->
      </div><!-- ./ fin row -->

      
              <div class="row">
                <!-- COLUMNA DE TABLA DE DATOS  -->
                <div class="col-md-12"><!--  -->

                  <div  class="card">
                    <div class="card-header bg-indigo">
                        <h3  class="card-title ">Listado de Usuarios</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                       <table  class="table table-striped">
                          <thead>
                            <tr>
                            
                              <th>ID</th>
                              <th >USER</th>
                              <th >CORREO</th>
                              <th >ROL</th>
                              
                            </tr>
                          </thead>
                          </table>
                          </div>
                
                            <div id="datos"></div>
                        
                        
                         <script>
                           function obtenerDatos() {
                              return fetch('http://localhost/web_electiva_II_BASE/api/usuarioGet.php')
                                .then(response => response.json())
                                 .catch(error => console.error('Error:', error));
                             }

                            function mostrarDatos(data) {
                               const datosUl = document.getElementById('datos');
                               data.data.forEach(usuario => {  
                                const fragmentoUsuario = document.createRange().createContextualFragment(`
                            <table  class="table ">
                              <tbody>
                              <tr>
                              <td style="width: 0%"></td>
                              <td style="width: 15%">${usuario.id}</td>
                              <td style="width: 20%">${usuario.user}</td>
                              <td style="width: 28%">${usuario.email}</td>  
                              <td style="width: 10%">${usuario.rol}</td>
                          
                              <td style="width: 10%">
                                <a href="usuario_editar.php?cp=${usuario.id}" class="bnt btn-xs btn-info"><i class="fas fa-eye"></i></a>
                                
                              </td>
                            </tr>    
                            </tbody>
                            </table> 
                            `);datos.appendChild(fragmentoUsuario);
                               });
                                 } obtenerDatos().then(mostrarDatos);
                          </script>  
                      <!-- /.card-body -->
              </div><!-- Fin contenido TABLA DE DATO -->
            </div>
        </section>
                
       

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <?php 
      include "includes/footer.php";
     ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- jQuery -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../templates/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../templates/AdminLTE-3.0.5/dist/js/demo.js"></script>

</body>
</html>
<?php
}else{ // RECURSO RESTRINGIDO
    ?>

    <script>
      window.location.href = "login.php";
    </script>

    <!-- <div class="callout callout-danger">
      <h5>Acceso Indebido!</h5>
      <p>Usted no tiene permisos para acceder a esta área. </p>
    </div>
-->
<?php   
}
?>