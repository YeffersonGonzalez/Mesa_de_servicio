<?php 
session_start();
  include "../controllers/controller_consultas_backend.php";
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

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
<body class="fondo login-page2">
<div class="login-box semi-transparent hold-transition ">
    <div class="login-logo " >
      <b class="b-white">OSIRIS
      <br><h5>Mesa de servicio</h5></b>
    </div>
    <!-- /.login-logo -->

    <div class="card2">
    <div class=" ">
      
      <?php 


      if(isset($_POST["txtuser"]) && isset($_POST["txtpass"])){
        $objDB = new ExtraerDatos();

        $user = array();
        $user = $objDB->consultaLogin($_POST["txtuser"]);

        if($user){
            if($user[0]["pass"] == sha1($_POST["txtpass"])){
                //Login correcto
                           
              $_SESSION['us'] = $user[0]["user"];
              $_SESSION['rl'] = $user[0]["rol"];
              $_SESSION['img'] = $user[0]["img"];
              //Vaerificamos quien se conecto
              if($user[0]["tipo"==3]) 
                $idu = $user[0]["id"]; 
              if($user[0]["tipo"==1] || $user[0]["tipo"==2])  
                $idu = $user[0]["id"]; 
              $_SESSION['idua'] = $idu;


        ?>
                <script >
                    location.href = "productos_informes.php";
                </script>
        <?php

            }else{
                echo "Sus credenciales de contraseña no coinciden";
            }
        }else{
            echo "Sus credenciales de usuario no coinciden";
        }
      }
      ?>


      <form action="login.php" method="POST">
        <div class="input-group mb-3">

          <input class="input" type="text" id="txtuser" name="txtuser" required class="form-control2" placeholder="usuario">

          <div class="input-group-append">
            <div class="input-group-text2">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group  mb-3">

          <input class="input" type="password" id="txtpass" name="txtpass" class="form-control2" placeholder="Password">

          <div class="input-group-append">
            <div class="input-group-text2">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary ">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4 ">
            
            <button type="submit" class="boton btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
       <!--
      <div  class="social-auth-links text-center mb-3">
        <p>- OR -</p>

        
        

         <script src="https://apis.google.com/js/platform.js" async defer></script>
         
          <div class="g-signin2" data-onsuccess="onSignInWithProfile">Iniciar sesión con Google</div>

                <script>
                  function onSignInWithProfile(googleUser) {
                    var profile = googleUser.getBasicProfile();
                    console.log('ID: ' + profile.getId());
                    console.log('Nombre: ' + profile.getName());
                    console.log('URL de la imagen: ' + profile.getImageUrl());
                    console.log('Correo electrónico: ' + profile.getEmail());
                  }

                  function onSignInWithToken(googleUser) {
                    var id_token = googleUser.getAuthResponse().id_token;
                    // ...
                  }
                </script>

          
         </div>
       -->
      <!-- /.social-auth-links -->
      <p></p>
      <div class="row">
        <div class="col-8">
          <a href="../templates/AdminLTE-3.0.5/pages/examples/forgot-password.html" class="b-white">Olvide mi clave</a>
        </div>
        <div class="col-4">
          <a class="mb-1 b-white" href="registrar.php">Registrar</a>
        </div>
      </div>
    </div>   
    <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.min.js"></script>

</body>
</html>