<?php 
  include "../controllers/controller_consultas_backend.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/fondo.css">
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
            <h1>Informe de Servicios</h1>
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

  <?php
    
    $objDB = new ExtraerDatos();

    $prods = array();

     if(isset($_POST["txtBuscar"])){ //se filtro algo
      $prods = $objDB->productosDetalle($_POST["txtBuscar"]); //filtramos coincidencia
      //filtramos coincidencia
       
     }elseif(isset($_POST["txtBuscar"])){
      $prods = $objDB->usuariosDetalle($_POST["txtBuscar"]);}

     else{$prods = $objDB->listadoProductos();}
      //traemos todo
      
      
  ?>
    <section class="content">
      <!-- ZONA ENCABEZADO DE IMPRESION SOLAMENTE -->
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

      <div class="row d-print-none"><!-- fila contenedora -->
        <div class="col-md-12"> <!-- fin columna de contenido -->
        <form name="frm_filtro" id="frm_filtro" method="POST" action="productos_informes.php">
            <div class="card">
              <div class=" btn btn-info ">
                <h3 class="card-title">Filtrar Datos </h3>
              </div>
              <!-- /.card-header -->
              
              <!-- Para controles de formularios siempre usar etiqueta FORM -->
              <div class="card-body">
                <label for="txtBuscar">Codigo del dispositivo</label>
                <div class="input-group input-group-sm">                  
                  <input type="text" id="txtBuscar" name="txtBuscar" class="form-control">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-success">Buscar</button>
                    <a href="productos_informes.php" class="btn btn-info">Ver Todo</a>
                  </span>
                </div>
              </div>  <!-- /.fin card-body -->              

            </div>
          </form>
        </div> <!-- ./ fin col -->
      </div><!-- ./ fin row -->

         <!-- COLUMNA DE TABLA DE DATOS  -->
        
              <div class="btn btn-info col-md-12">
                <h3 class="card-title">Datos en Tabla</h3>
                <a  href="#" id="btn_print" class=" float-right d-print-none b-white "><i class="fa fa-print"></i>IMPRIMIR</a>
              </div>

      <div class="content card bg-light">
        <div class="container-fluid">
            <div class="row">
                <?php session_start(); if(isset($_SESSION['productos'])){
                    $productos = $_SESSION['productos'];//verifica si hay registros de datos ?>
                    <?php 
                        //RECORRIDO DE ELEMENTOS DE FORMA REPETITIVA
                        foreach($productos as $producto){              
                    ?>
                <div class="col-md-6 p-3">
                     <div class="card bg-light"> 
                        <div class="card-body pt-1">
                          <table class="table table-striped">
                            <thead  class="card-header text-muted  card-title">
                              <tr>
                                <th style="width: 11%">COD</th>
                                <th style="width: 14%">REFERENCIA</th>
                                <th style="width: 15%">CANTIDAD</th>
                              </tr><tr> 
                              <td style="width: 11%"><?php echo $producto["cod"]; ?></td>
                              <td style="width: 14%"><?php echo $producto["referencia"]; ?></td>
                              <td style="width: 15%"><?php echo $producto["cantidad"]; ?></td>
                              </tr><tr>
                                <th style="width: 11%" >TIPO DE PC</th>
                                <th style="width: 14%">T. PANTALLA</th>
                                <th style="width: 15%">ALMACENAMIENTO</th>
                              </tr><tr>
                              <td style="width: 11%"><?php echo $producto["tipoPC"]; ?></td>
                              <td style="width: 14%"><?php echo $producto["pantalla"]; ?></td>
                              <td style="width: 15%"><?php echo $producto["discoduro"]; ?></td> 
                              </tr><tr>
                                <th style="width: 10%">RAM</th>
                                <th style="width: 50%">V. CONSULTA</th>
                                <th style="width: 14%">DESCRIPCION</th>
                              </tr><tr>
                              <td style="width: 11%"><?php echo $producto["ram"]; ?></td>
                                <td style="width: 14%"><?php echo $producto["valorcomercial"]; ?></td>  
                                <td style="width: 15%" ><?php echo $producto["descripcion"]; ?></td> 
                              </tr>
                              <th></th>
                              <th></th>
                              <th></th>
                              <tr>
                                <td style="width: 50%" ><a href="productos_editar.php?cp=<?php echo $producto['cod']; ?>" class="bnt btn-xs btn-info"> <i class="fa fa-edit"> EDITAR </i></a></td>
                                <td style="width: 10%"><a href="productos_eliminar.php?cp=<?php echo $producto['cod']; ?>" class="bnt btn-xs btn-danger"><i class="fa fa-trash"> ELIMINAR</i></a> </td>  


                                        
                            </thead>
                                  
                          </table>
                        </div>
                      </div>
                    </div>
                    <?php 
                        }//FIN CICLO REPETITIVO DE DATOS
                    ?>
                <?php 
                }else{
                    echo "<div class='alert alert-secondary col-md-12'>
                            No hay datos de productos. Registre uno<br>
                            <a href='crear.php' class='btn btn-info' >Registro</a> 
                          </div>";
                }
                ?>
            </div>
        </div>  
      </div>    
        <!-- Fin contenido TABLA DE DATO -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper 

  

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

<script type="text/javascript">
  
  $("#btn_print").click(function(){ //Capturamos el click
    window.print();
  })

</script>

</body>
</html>
