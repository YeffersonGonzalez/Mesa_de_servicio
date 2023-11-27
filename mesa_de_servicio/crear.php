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
            <h1 align="center">Crear Servicio</h1>
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
              <h4 >Crear nuevo Servicio </h4>
            </div>
            <div class="card">
       
              
            <form role="form" name="frm_crear" id="frm_crear" method="POST" enctype="multipart/form-data">
              <div class="card-body">

                <div class="row">
                <?php
                   if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
                 ?>
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="ced">Cedula</label>
                      <input type="Number" class="form-control" id="ced" name="ced" placeholder="Cedula">
                    </div> 
                  </div>  

                  <!-- Control Inputbox ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="nom">Nombre y Apellido</label>
                      <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre y Apellido">
                    </div> 
                  </div>  
                              

                 <!-- Control cantidad  -->
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="dir">Direccion</label>
                      <input type="text" class="form-control" id="dir" name="dir" placeholder="Direccion">
                    </div> 
                  </div> 

                  <!-- Control VALOR -->
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="tel">Telefono</label>
                      <input type="Number" class="form-control" id="tel" name="tel" placeholder="Telefono">
                    </div> 
                  </div> 
                  <?php }?>
                  <?php
                 if($objTools->userAuthorizad($_SESSION['rl'], 3)|| $objTools->userAuthorizad($_SESSION['rl'], 2)|| $objTools->userAuthorizad($_SESSION['rl'], 1)){
                              ?>
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="refer">Referencia</label>
                      <input type="text" class="form-control" id="refer" name="refer" placeholder="Referencia">
                    </div> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Tipo de Equipo</label>
                      <select class="form-control" name="tipoPC" id="tipoPC">
                        <option value="N/A">Seleccionar...</option>
                        <option value="ESCRITORIO">Escritorio</option>
                        <option value="TODO EN UNO">Todo en Uno</option>
                        <option value="LAPTOP">Portatil</option>                    
                        <option value="OTROS">Otro</option>                    
                      </select>
                    </div> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Tamaño de Pantalla</label>
                      <select class="form-control" name="tipoPa" id="tipoPa">
                        <option value="N/A">Seleccionar...</option>
                        <option value="13,3">13,3"</option>
                        <option value="14">14"</option>
                        <option value="15,6">15,6</option>                    
                        <option value="OTRO">Otro</option>                    
                      </select>
                    </div> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Tamaño de Almacenamiento</label>
                      <select class="form-control" name="tipoAl" id="tipoAl">
                        <option value="N/A">Seleccionar...</option>
                        <option value="500GB">500GB</option>
                        <option value="1TB">1TB</option>
                        <option value="2TB">2TB</option>                    
                        <option value="OTRO">Otro</option>                    
                      </select>
                    </div> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label>Tamaño de RAM</label>
                      <select class="form-control" name="tipoRam" id="tipoRam">
                        <option value="N/A">Seleccionar...</option>
                        <option value="4GB">4GB</option>
                        <option value="8GB">8GB</option>
                        <option value="16GB">16GB</option>                    
                        <option value="Ot">Otro</option>                    
                      </select>
                    </div> 
                  </div>

                  
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="cant">Cantidad</label>
                      <input type="Number" class="form-control" id="cant" name="cant" placeholder="">
                    </div> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">                    
                    <div class="form-group">
                      <label for="descri">Descripción y Datos adicionales</label>
                      <textarea class="form-control" rows="3"  placeholder="Describa..." name="descri" id="descri"></textarea>
                    </div>  
                  </div> 
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="vlrCom">Valor Consulta</label>
                      <input type="Number" class="form-control" id="vlrCom" name="vlrCom" placeholder="">
                    </div> 
                  </div>
           
                </div>  <!-- /.fin row -->   
                
              </div>  <!-- /.fin card-body -->

              <div class="card-footer">
              
           
                <button type="submit" id="btn_regist" class="btn btn-success">Crear</button>
                <button type="reset" href="crear.php" class="btn btn-default">Limpiar</button>
              </div>

            </form> <!-- /.fin Form -->
          </div>

      </div>
      <?php }?>
           
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
            document.getElementById('frm_crear').addEventListener('submit', function(event) {
              
              var formulario = document.getElementById('frm_crear');
              if (!formulario.checkValidity()) {
                // Si el formulario no es válido, mostrar un mensaje de error y salir de la función
                alert('Por favor, llena todos los campos requeridos.');
                event.preventDefault();
              }
            
               //Para guardar los datos
                var ced = document.getElementById('ced').value;
                var nom = document.getElementById('nom').value;
                var dir = document.getElementById('dir').value;
                var tel = document.getElementById('tel').value;
                //Servicio
                var refer = document.getElementById('refer').value;
                var tipoPC = document.getElementById('tipoPC').value;
                var tipoPa = document.getElementById('tipoPa').value;
                var tipoAl = document.getElementById('tipoAl').value;
                var tipoRam = document.getElementById('tipoRam').value;
                var cant = document.getElementById('cant').value;
                var descri = document.getElementById('descri').value;
                var vlrCom = document.getElementById('vlrCom').value;
               

                var data = {
                  ced: ced,
                  nom: nom,
                  dir: dir,
                  tel: tel
                  
                };
                var dataP = {
                 refer : refer,
                 tipoPC: tipoPC,
                 tipoPa: tipoPa,
                 tipoAl: tipoAl,
                 tipoRam:tipoRam,
                 cant  : cant,
                 descri: descri,
                 vlrCom: vlrCom
                 
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

                
                fetch('http://localhost/web_electiva_II_BASE/api/productoCreate.php', {
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