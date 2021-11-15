<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Ecommerce</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>My</b>Ecommerce
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Registrarse</p>
      <?php
        if(isset($_REQUEST['registro'])){
          session_start();
          $email= $_REQUEST['email']??'';
          $nombre= $_REQUEST['nombre']??'';
          $password= $_REQUEST['pass']??'';
          $password=md5($password);
          include_once "admin/db_ecommerce.php";
          $con=mysqli_connect($host,$user,$pass,$db);
        //   if ($con == false){
        //     die(
        //       "Error de conexión"
        //     );
        //   }
          $query = "INSERT into clientes (nombre,email,pass) values ('$nombre','$email','$password') ";
          $res=mysqli_query($con,$query);
          if($res){
            ?>
                <div class="alert alert-primary" role="alert">
                    <strong>Registro existoso! </strong> <a href="login.php"> Iniciar sesión </a>
                </div>
            <?php
          }else{
        ?>
            <div class="alert alert-danger" role="alert">
              Error al registrarse.
            </div>
        <?php
          }
        }
        ?>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nombre" name="nombre"> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email"> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
            <a href="login.php" class="text-success float-right">Iniciar sesión</a>
          </div>
          <!-- /.col -->
        </div>
      </form>


    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>
