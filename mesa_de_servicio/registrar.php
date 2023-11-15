<?php 
  require ("../models/models_admin.php");
  date_default_timezone_set("America/Bogota");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="google-signin-client_id" content="105259260269-qaaa6s2vk8cm51lsg0mm7l3hed1ibulf.apps.googleusercontent.com">
  
  <title>OSIRIS | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/fondo.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>
<body class="fondo register-page2">
<div class="register-box2 semi-transparent hold-transition ">
    <div class="login-logo " >
      <b class="b-white">OSIRIS
      <br><h5>Mesa de servicio</h5></b>
    </div>
    <!-- /.login-logo -->

   
    <div class="card2 ">
      
      <?php 
        // Obtén la contraseña del formulario
        $password = $_POST['txt_clave'];

        $hashedPassword = sha1($password);

        ?>

      <?php 
            if(isset($_POST["txt_Nombre"])){//verificar la existencia de envio de datos

              $cedu = $_POST["txt_cc"];
              $nombre = $_POST["txt_Nombre"];
              $direcc = $_POST["txt_direc"]; 
              $tele = $_POST["txt_Tele"];
              $nombr = $_POST["txt_user"];
              $corre = $_POST["txt_correo"]; 
              $$hashedPassword = $_POST["txt_clave"];
              $rol=$_POST["tipoR"];
               

              //Verificamos que el usuario halla seleccionado archivos
              //y se procede a subir al servidor y elazarlo a la base de datos    
              $ext =""; $msgfile = ""; $logError="";
              

              //echo $msgfile;

              $objDBO = new DBConfig();
              $objDBO->config();
              $objDBO->conexion();
              $ejecucion = $objDBO->Operaciones("INSERT INTO cliente(cedula, nombre, direccion, telefono) 
                                                             values('$cedu','$nombre', '$direcc', '$tele')  ");
              $ejecucion = $objDBO->Operaciones("INSERT INTO usuario( user, correo, pass, rol) 
                                                             values('$nombr', '$corre', '$hashedPassword', '$rol')  ");

              if($ejecucion){ // Tod se ejecuto correctamente
                echo "<div class='alert alert-success'>
                         ha sido creado correctamente, regrese a la pagina de inicio
                      </div>";
              }else{ // Algo paso mal
                echo "<div class='alert alert-danger'>
                         Ha ocurrido un error inexperado
                      </div>";
              }

              $objDBO->close();
            }
            ?>

      
          <form role="form" name="frm_registrar" id="frm_registrar" method="POST" action="registrar.php" enctype="multipart/form-data">
          <div class="row">
                  <div class="col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                      
                      <input type="Number" class="form-control" id="txt_cc" name="txt_cc" placeholder="Cedula">
                    </div> 
                  </div>  

                  <!-- Control Inputbox ejemplo -->
                  <div class="input-group col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                      
                      <input  type="text" class="form-control" id="txt_Nombre" name="txt_Nombre" placeholder="Nombre y Apellido">
                    </div> 
                  </div>  
                              

                 <!-- Control cantidad  -->
                  <div class="input-group col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                     
                      <input type="text" class="form-control" id="txt_direc" name="txt_direc" placeholder="Direccion">
                    </div> 
                  </div> 

                  <!-- Control VALOR -->
                  <div class="input-group col-md-6 col-sm-6 col-6">
                    <div class="form-group">
                     
                      <input type="Number" class="form-control" id="txt_Tele" name="txt_Tele" placeholder="Telefono">
                    </div> 
                  </div> 

            <div class="input-group mb-3 col-md-6 col-sm-6 col-6">

              <input required type="text" class="form-control" id="txt_user" name="txt_user" placeholder="User">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
           
              <div class="input-group mb-3 col-md-6 col-sm-6 col-6">
                <input type="email" class="form-control" id="txt_correo" name="txt_correo" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3 col-md-6 col-sm-6 col-6">
                <input required type="password" class="form-control" id="txt_clave" name="txt_clave"  placeholder="Password">
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
              <div class="input-group mb-3 col-md-6 col-sm-6 col-6">
                
              <div class="form-group">  

                  <div class="input-group-append">
                    <select class="form-control" name="tipoR" id="tipoR">
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
            
                <div class=" col-md-6 col-sm-6 col-6">
                  <div class="icheck-primary">
                    <input required  type="checkbox" id="agreeTerms" name="terms" value="agree">
                    <label for="agreeTerms"></label>
                     Acepto los <a  href="#">terminos</a>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit"  class="boton btn-block ">Registrar</button>
                </div>
                <!-- /.col -->
              </div>
              <p></p>
              <b>
              <a  href="login.php" class="text-center b-white">Regresar a la pagina de inicio</a>
          </b>
          </form>

              <!--
            <div class="social-auth-links text-center">
              <p>- OR -</p>
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i>
                Sign up using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i>
                Sign up using Google+
              </a>
            </div>-->

      <script>
      document.getElementById('frm_registrar').addEventListener('submit', function(event) {
        var clave = document.getElementById('txt_clave').value;
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
        
      });
      </script>
      
  </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div></div>


<!-- /.register-box -->

<!-- jQuery -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>
