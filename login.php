<?php
require("./librerias/librerias.php");
session_start();




if (isset($_SESSION["DATOS_USUARIO"])) {
  header("location:".strtolower( $_SESSION["DATOS_USUARIO"]["NOMBRE_PERFIL"]) .".php");
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>Citas</b>Pro</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Llene los campos y pulse el boton azul iniciar su sesión</p>

        <form action="manejador_login.php" id="frmLogin" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="correo" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" id="pass" class="form-control" placeholder="contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <a href="javascript:;" id="btn_iniciar_session" class="btn btn-primary btn-block">Iniciar sesion</a>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->

      
        <p class="mb-1">
          <a href="registro.php" class="text-center">Registre un nuevo usuario</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <script src="./plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="./plugins/jquery-validation/additional-methods.min.js"></script>
  <script src="./plugins/toastr/toastr.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>

  <script>
    var $frmLogin = $("#frmLogin");
    $frmLogin.validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        pass: {
          required: true,
        }
      },
      messages: {
      email: {
        required: "ingrese direccion de correo",
        email: "debe ingresar un correo valido"
      },
      pass: {
        required: "debe ingresar una contraseña",
       
      }
      
    },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.input-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  </script>

  <script src="./js/login.js"></script>
</body>

</html>