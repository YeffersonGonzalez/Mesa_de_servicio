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
                        <h3  class="card-title ">Listado de libros registrados</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body p-0">
                       <table  class="table table-striped">
                          <thead>
                            <tr>
                            
                              <th style="width: 6%" >ID</th>
                              <th style="width: 10%">ISBN</th>
                              <th style="width: 13%">TITULO</th>
                              <th style="width: 8%">AUTOR</th>
                              
                              
                              <th style="width: 3%">EDICION</th>
                              <th style="width: 0%">EJEMPLARES</th>
                              <th style="width: 15%">CATEGORIA</th>
                              <th style="width: 18%">DESCRIPCION</th>
                              <th style="width: 7%">ESTADO</th>
                              <th style="width: 0%">DETALLES</th>
                              
                            </tr>
                          </thead>
                          </table>
                          </div>
                
                            <div id="datos"></div>
                        
                        
                         <script>
                           function obtenerDatos() {
                              return fetch('http://localhost/web_electiva_II_BASE/api/libros_listado_api.php')
                                .then(response => response.json())
                                 .catch(error => console.error('Error:', error));
                             }

                            function mostrarDatos(data) {
                               const datosUl = document.getElementById('datos');
                               data.datos.forEach(libro => {  
                                const fragmentoLibro = document.createRange().createContextualFragment(`
                            <table  class="table">
                              <tbody>
                              <tr>
                              <td style="width: 0% "></td>
                              <td style="width: 1% ">${libro.id}</td>
                              <td style="width: 2%">${libro.isbn}</td>
                              <td style="width: 16%">${libro.titulo}</td>  
                              <td style="width: 10%">${libro.autor}</td>
                              
                              
                              <td style="width: 10%">${libro.edicion}</td>
                              <td style="width: 8%">${libro.ejemplar}</td>
                              <td style="width: 12%">${libro.categoria}</td>
                              <td style="width: 24%">${libro.descrip}</td>

                              <td style="width: 10%"><span class="badge badge-success">${libro.estado}</span></td>

                              
                              <td style="width: 10%"">
                                <a href="productos_informes2.php?cp=${libro.id}" class="bnt btn-xs btn-info"><i class="fas fa-eye"></i></a>
                                
                              </td>
                            </tr>    
                            </tbody>
                            </table> 
                            `);datos.appendChild(fragmentoLibro);
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