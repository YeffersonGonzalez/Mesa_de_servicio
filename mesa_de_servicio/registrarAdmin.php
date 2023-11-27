<?php
session_start(); 
if(isset($_SESSION['rl'])){

  include ("../models/tools.php");
  $objTools = new webtools();
  require ("../models/models_admin.php");
  date_default_timezone_set("America/Bogota");
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/fondo.css">
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-collapse sidebar-mini">

<?php include "includes/config.php"; ?>
<?php
if(isset($_SESSION['rl'])) 
?>

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
          <div class="col-sm-11">
            <h1 align="center">Crear Usuarios</h1>
          </div>
          <div class="col-sm-0">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        
 <!-- COLUMNA DE FORMULARIO  -->
      <div class="col-md-3"></div>
        <div class="col-md-5"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="boton">
              <h4 >Crear nuevo Usuario</h4>
            </div>
            <div class="card2">
            
            
            
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            
                  
        <form role="form" name="frm_registrar" id="frm_registrar" method="POST" enctype="multipart/form-data">
          <div class="row card2">
                  <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                      
                      <input type="Number" class="form-control" id="ced" name="ced" placeholder="Cedula">
                    </div> 
                  </div>  

                  <!-- Control Inputbox ejemplo -->
                  <div class=" col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                      
                      <input  type="text" class="form-control" id="nom" name="nom" placeholder="Nombre y Apellido">
                    </div> 
                  </div>  
                              

                 <!-- Control cantidad  -->
                  <div class=" col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                     
                      <input type="text" class="form-control" id="dir" name="dir" placeholder="Direccion">
                    </div> 
                  </div> 

                  <!-- Control VALOR -->
                  <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                     
                      <input type="Number" class="form-control" id="tel" name="tel" placeholder="Telefono">
                    </div> 
                  </div> 

            <div class="input-group mb-3 col-md-6 col-sm-6 col-6">

              <input required type="text" class="form-control" id="user" name="user" placeholder="User">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
           
              <div class="input-group mb-3 col-md-6 col-sm-6 col-6">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3 col-md-6 col-sm-6 col-6">
                <input required type="password" class="form-control" id="pass" name="pass"  placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3 col-md-6 col-sm-6 col-6">
                <input required type="password" class="form-control" id="txt_clave_repetida" name="txt_clave_repetida"  placeholder="Repetir password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              
              <div class=" mb-3 col-md-6 col-sm-6 col-6">
                
              <div class="form-group">  

                  <div class="input-group-append">
                    <select class="form-control" name="rol" id="rol">
                        <option value="3">Usuario</option>
                        <option value="2">Admin N-2</option>
                        <option value="1">Admin N-1</option>           
                    </select>
                    <div class="input-group-text"> 
                      <span class="fas fa-user"></span>
                    </div>
                 </div>
                      
                   </div> 
              </div>
            
                
                <!-- /.col -->
                <div class="col-2">
                  
                </div>
                <div class="col-4">
                  <button type="submit" class="boton btn-block ">Registrar</button>
                </div>
                <!-- /.col -->
              </div>

          </form>
         
          <script>
            document.getElementById('frm_registrar').addEventListener('submit', function(event) {
              var clave = document.getElementById('pass').value;
              var claveRepeat = document.getElementById('txt_clave_repetida').value;
              var formulario = document.getElementById('frm_registrar');
              if (!formulario.checkValidity()) {
                // Si el formulario no es válido, mostrar un mensaje de error y salir de la función
                alert('Por favor, llena todos los campos requeridos.');
                event.preventDefault();
              }
              if (clave !== claveRepeat) {
                alert('Las contraseñas no coinciden');
                event.preventDefault();
              }
               //Para guardar los datos
                var ced = document.getElementById('ced').value;
                var nom = document.getElementById('nom').value;
                var dir = document.getElementById('dir').value;
                var tel = document.getElementById('tel').value;
                //Servicio
                var user = document.getElementById('user').value;
                var email = document.getElementById('email').value;
                var pass = document.getElementById('pass').value;
                var rol = document.getElementById('rol').value;
               

                var data = {
                  ced: ced,
                  nom: nom,
                  dir: dir,
                  tel: tel
                };
                var dataP = {
                  user: user,
                  email: email,
                  pass: pass,
                  rol: rol
                };

                fetch('http://localhost/web_electiva_II_BASE/api/clientesCrear.php', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify(data),
                  
                })
                .then(response => response.json())
                .then(data => {
                  console.log('Success:', data);
                })
                .catch((error) => {
                            console.error('Error:', error);
                });

                
                fetch('http://localhost/web_electiva_II_BASE/api/usuarioCrear.php', {
                  method: 'POST',
                  headers: {
                    'Content-Type': 'application/json',
                  },
                  body: JSON.stringify(dataP),
                  
                })
                .then(response => response.json())
                .then(dataP => {
                  console.log('Success:', dataP);
                })
                .catch((error) => {
                            console.error('Error:', error);
                });
             
              
              });
          </script>
       
        </div>

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