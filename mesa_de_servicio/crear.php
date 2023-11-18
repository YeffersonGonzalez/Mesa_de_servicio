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
            
            
            
            <!-- Para controles de formularios siempre usar etiqueta FORM -->

            <?php 
            if(isset($_POST["txt_refer"])){//verificar la existencia de envio de datos

              $cedu = $_POST["txt_cc"];
              $nombre = $_POST["txt_Nombre"];
              $direcc = $_POST["txt_direc"]; 
              $tele = $_POST["txt_Tele"];
              $refer = $_POST["txt_refer"];
              $descr = $_POST["txt_Descri"];
              $canti = $_POST["txt_cantEx"];
              $tipo = $_POST["tipoPC"];
              $tipoP = $_POST["tipoPa"];
              $tipoA = $_POST["tipoAl"];
              $tipoR = $_POST["tipoRam"];
              $vlrcm = $_POST["txt_vlrCom"];   
              $idusu = $_SESSION['id'];  

              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              if(isset($_FILES["txt_File"]['name']) && $_FILES["txt_File"]['name']!=null ){           
                $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                $ext = strrchr(basename($_FILES["txt_File"]['name']),".");        
                if($extens[$ext]){            
                  if($_FILES["txt_File"]['error'] == UPLOAD_ERR_OK ){ //Si el archivo se paso correctamente Continuamos 
                    $docruta = "imgs/productos/";
                    $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                    $fullname = explode(".",basename($_FILES["txt_File"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                    $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                    $temporal = $_FILES["txt_File"]['tmp_name']; //Obtenemos la ruta Original del archivo
                    $Destino = "../".$docruta.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                    $docruta = $docruta.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
                    if(copy($temporal, $Destino)){ //Movemos el archivo temporal a la ruta especificada               
                      $msgfile = "Imagen subida.";
                    }else{
                      $msgfile .= "<span class='label label-danger'>la imagen del Producto .</span>";
                      $logError = "No se pudo subir la imagen del Producto, puede ser por tamaño. \n";
                    }  
                  }else{
                    $msgfile .= "<span class='label label-danger'>Error al transferirse el archivo.</span> ";
                  }

                }else{
                  $msgfile .= "<span class='label label-danger'><i class='fa fa-file-o'></i> Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext].</span>"  ;  
                  $logError .="Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext]. \n";
                } 
              }

              //echo $msgfile;

              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();

              $ejecucion = $objDBO->Operaciones("INSERT INTO cliente(cedula, nombre, direccion, telefono) 
                                                             values('$cedu','$nombre', '$direcc', '$tele')  ");
              $ejecucion = $objDBO->Operaciones("INSERT INTO producto(referencia, descripcion, cantidad, valorcomercial, tipoPC, pantalla, discoduro, ram, id) 
                                                                values('$refer', '$descr', $canti, $vlrcm,'$tipo','$tipoP','$tipoA','$tipoR','$idusu' )  ");

              if($ejecucion){ // Tod se ejecuto correctamente
                echo "<div class='alert alert-success'>
                         ha sido creado correctamente
                      </div>";
              }else{ // Algo paso mal
                echo "<div class='alert alert-danger'>
                         Ha ocurrido un error inexperado
                      </div>";
              }

              $objDBO->close();
            }
            ?>
              
            <form role="form" name="frm_crear" id="frm_crear" method="POST" action="crear.php" enctype="multipart/form-data">
              <div class="card-body">

                <div class="row">
                <?php
                   if($objTools->userAuthorizad($_SESSION['rl'], 1) || $objTools->userAuthorizad($_SESSION['rl'], 2)){
                 ?>
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="txt_cc">Cedula</label>
                      <input type="Number" class="form-control" id="txt_cc" name="txt_cc" placeholder="Cedula">
                    </div> 
                  </div>  

                  <!-- Control Inputbox ejemplo -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label for="txt_Nombre">Nombre y Apellido</label>
                      <input type="text" class="form-control" id="txt_Nombre" name="txt_Nombre" placeholder="Nombre y Apellido">
                    </div> 
                  </div>  
                              

                 <!-- Control cantidad  -->
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="txt_direc">Direccion</label>
                      <input type="text" class="form-control" id="txt_direc" name="txt_direc" placeholder="Direccion">
                    </div> 
                  </div> 

                  <!-- Control VALOR -->
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="txt_Tele">Telefono</label>
                      <input type="Number" class="form-control" id="txt_Tele" name="txt_Tele" placeholder="Telefono">
                    </div> 
                  </div> 
                  <?php }?>
                  <?php
                 if($objTools->userAuthorizad($_SESSION['rl'], 3)|| $objTools->userAuthorizad($_SESSION['rl'], 2)|| $objTools->userAuthorizad($_SESSION['rl'], 1)){
                              ?>
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="txt_refer">Referencia</label>
                      <input type="text" class="form-control" id="txt_refer" name="txt_refer" placeholder="Referencia">
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
                      <label for="txt_cantEx">Cantidad</label>
                      <input type="Number" class="form-control" id="txt_cantEx" name="txt_cantEx" placeholder="">
                    </div> 
                  </div>
                  <div class="col-md-6 col-sm-6 col-12">                    
                    <div class="form-group">
                      <label for="txt_Descri">Descripción y Datos adicionales</label>
                      <textarea class="form-control" rows="3"  placeholder="Describa..." name="txt_Descri" id="txt_Descri"></textarea>
                    </div>  
                  </div> 
                  <div class="col-md-6 col-sm-6 col-12">
                    <div class="form-group">
                      <label for="txt_vlrCom">Valor Consulta</label>
                      <input type="Number" class="form-control" id="txt_vlrCom" name="txt_vlrCom" placeholder="">
                    </div> 
                  </div>
                  <!--<div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label >Seleccines las que corresponda</label>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="chkDisp1" name="chkDisp1" >
                        <label for="chkDisp1" class="custom-control-label">15</label>
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

             
                  <!-- Control FileUpload ejemplo                
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
                  </div>--> 


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