<?php
session_start();

if(isset($_SESSION['rl'])){

include ("../models/tools.php");
$objTools = new webtools();
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
            <h1>Crear Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Crear</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <?php
    if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
    ?>
        <form role="form" name="frm_prods" id="frm_prods" method="POST" action="productos_crear2.php" enctype="multipart/form-data">
            <div class="card-body">

            <div class="row">

                <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="txt_refer">Referencia</label>
                    <input type="text" class="form-control" id="txt_refer" name="txt_refer" placeholder="Nombre">
                </div> 
                </div>  

                <!-- Control Inputbox ejemplo -->
                <div class="col-md-12 col-sm-12 col-12">
                <div class="form-group">
                    <label for="txt_Nombre">Nombre del Producto</label>
                    <input type="text" class="form-control" id="txt_Nombre" name="txt_Nombre" placeholder="Nombre">
                </div> 
                </div>  
                                    
                <div class="col-md-12 col-sm-12 col-12">                    
                <div class="form-group">
                    <label for="txt_Descri">Coloque una Descripción</label>
                    <textarea class="form-control" rows="3"  placeholder="Describa ..." name="txt_Descri" id="txt_Descri"></textarea>
                </div>  
                </div>

                <!-- Control cantidad  -->
                <div class="col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="txt_cantEx">Cantidad Existente</label>
                    <input type="text" class="form-control" id="txt_cantEx" name="txt_cantEx" placeholder="Nombre">
                </div> 
                </div> 

                <!-- Control VALOR -->
                <div class="col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label for="txt_vlrCom">Valor Comercial</label>
                    <input type="text" class="form-control" id="txt_vlrCom" name="txt_vlrCom" placeholder="Nombre">
                </div> 
                </div> 


                <!-- Control FileUpload ejemplo -->                
                <div class="col-md- col-sm-12 col-12">
                <div class="form-group">
                    <label for="txtFile">Subir Foto</label>
                    <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="txt_File" name="txt_File">
                        <label class="custom-file-label" for="txt_File">Seleccionar</label>
                    </div>                    
                    </div>
                </div>
                </div>


            </div>  <!-- /.fin row -->   
            
            </div>  <!-- /.fin card-body -->

            <div class="card-footer">
            <?php
            if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
            ?>
              <button type="submit" id="btn_regist" class="btn btn-success">Registrar Producto</button>
            <?php
            }
            ?>
            <button type="reset" class="btn btn-default">Limpiar</button>
            </div>
            

        </form> <!-- /.fin Form -->
    <?php
    }else{ // RECURSO RESTRINGIDO
        ?>
        <div class="callout callout-danger">
          <h5>Acceso Indebido!</h5>
          <p>Usted no tiene permisos para acceder a esta área. </p>
        </div>
    <?php   
    }
    ?>
    
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