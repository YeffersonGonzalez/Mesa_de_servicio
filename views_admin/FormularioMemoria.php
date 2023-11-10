
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
           
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Formulario</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row"><!-- fila contenedora -->

        <!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-3"></div>
        <div  class="col-md-6"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div  class="card-header bg-indigo">
              <h4 align="center" >Reporte de Emergencia </h4>
            </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <form role="form" name="" id="miFormulario" method="POST" action="Formulario - Reportes.php">
              <div class="card-body">

                <div class="row " >

                  <!-- Control Inputbox ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group" >
                      <label for="nombre">Nombres y apellidos</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y apellido" autocomplete="on">
                    </div> 
                  </div>  

                  <!-- Control de Lista Desplegable -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label>Tipo de Documento</label>
                      <select class="form-control" name="lstTipoc" id="lstTipoc">
                        <option value="0">Seleccionar...</option>
                        <option value="1">Cedula</option>
                        <option value="2">Tarjeta Identidad</option>
                        <option value="3">Cedula extranjeria</option>                    
                        <option value="4">Otro</option>                    
                      </select>
                    </div> 
                  </div>
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group" >
                      <label for="number">Numero de identidad</label>
                      <input type="number" class="form-control" id="number" name="number" placeholder="Numero" >
                    </div> 
                  </div>  

                  <!-- Control FileUpload ejemplo                
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="txtFile">Subir Archivos</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="txtFile" name="txtFile">
                          <label class="custom-file-label" for="txtFile">Seleccionar</label>
                        </div>                    
                      </div>
                    </div>
                  </div> -->

                  <!-- Control CheckBox ejemplo 
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label >Seleccines las que corresponda</label>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp1" name="chkDisp1" >
                        <label for="chkDisp1" class="custom-control-label">SISBEN</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp1" name="chkDisp1" >
                        <label for="chkDisp1" class="custom-control-label">Victima del coflicto armado</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp1" name="chkDisp1" >
                        <label for="chkDisp1" class="custom-control-label">EPS</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp2" name="chkDisp2" >
                        <label for="chkDisp2" class="custom-control-label">Condicion especial</label>
                      </div> 
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp2" name="chkDisp2" >
                        <label for="chkDisp2" class="custom-control-label">Alergias</label>
                      </div>                                   
                    </div>
                  </div>-->

                  <!-- Control RadioButton ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">                    
                    <div class="form-group">
                      <label>Sexo</label>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="rdbSexo1" name="rdbSexo">
                        <label for="rdbSexo1" class="custom-control-label">Hombre</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="rdbSexo2" name="rdbSexo">
                        <label for="rdbSexo2" class="custom-control-label">Mujer</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="rdbSexo1" name="rdbSexo">
                        <label for="rdbSexo1" class="custom-control-label">LGBTQ+</label>
                      </div>
                    </div>
                  </div>   

                  <div class="col-md-12 col-sm-12 col-12">                    
                    <div class="form-group">
                      <label>Descripción de la situacion</label>
                      <textarea class="form-control" rows="3"  placeholder="Describa ..." name="txtDesc" id="txtDesc"></textarea>
                    </div>  
                  </div>
                <div class="card-footer">
                    <input type="button" value="Enviar" onclick="guardarDatos()" class="btn btn-success"> 
                    <button type="reset" class="btn btn-default">Limpiar</button>

                </div>

                </div>  <!-- /.fin row -->   
                
              </div>  <!-- /.fin card-body -->

            </form> <!-- /.fin Form -->

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