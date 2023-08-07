<?php
require("./librerias/librerias.php");
session_start();




if (isset($_SESSION["ID_USUARIO"])) {
  header("location:" . url() . "paginas/login.php");
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
        <p class="login-box-msg">Regístrese para iniciar su sesión</p>


        <form action="manejador_login.php" id="frmLogin" method="post">
          <div class="input-group mb-3">
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="apellido" id="apellido" class="form-control" placeholder="apellido" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3 date" id="reservationdate" data-target-input="nearest">
            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="fecha" name="fecha" placeholder="fecha de nacimiento" />
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="text" name="cedula" id="cedula" class="form-control" minlength="11" maxlength="11" placeholder="cedula" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" name="telefono" id="telefono" class="form-control" minlength="10" maxlength="10" placeholder="telefono" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-mobile-alt"></span>
              </div>
            </div>
          </div>


          <div class="input-group mb-3">
            <input type="email" name="email" id="email" class="form-control" placeholder="correo" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pass" id="pass" class="form-control" minlength="5" placeholder="contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="conpass" id="conpass" minlength="5" class="form-control" placeholder="contraseña" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>



          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <a href="javascript:;" id="btn_iniciar_session" class="btn btn-primary btn-block">Registrarse</a>
            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->


        <p class="mb-0">
          <a href="login.php" class="text-center">Regresar al login</a>
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
  <script src="./plugins/moment/moment.min.js"></script>
  <script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

  <script>
    $('#reservationdate').datetimepicker({
      format: 'L'
    });
    var $frmLogin = $("#frmLogin");
    $frmLogin.validate({
      rules: {
        email: {
          required: true,
          email: true,
        },
        pass: {
          required: true,
        },
        conpass: {
          required: true,
          equalTo: "#pass"
        },
        nombre: {
          required: true,
        },
        apellido: {
          required: true,
        },
        cedula: {
          required: true,
        },
        telefono: {
          required: true,
          digits: true

        },
        fecha: {
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

    $("#btn_iniciar_session").on("click", function() {
      if ($frmLogin.valid()) {

        

       

        $.post("./manejadores/manejadorRegistrar.php", {
          pass: btoa($("#pass").val()),
          email: $("#email").val(),
          nombre: $("#nombre").val(),
          apellido: $("#apellido").val(),
          cedula: $("#cedula").val(),
          telefono: $("#telefono").val(),
          fecha:$("#fecha").val()
        
        
          
        
        
        
        }, function(data) {


          if (data["codigo"] == 0) {

            $(document).Toasts('create', {
              class: 'bg-success',
              title: '',

              body: data["mensaje"]
            });

            

            window.location = `./login.php`;


          } else {
            $(document).Toasts('create', {
              class: 'bg-danger',
              title: '',

              body: data["mensaje"]
            })
          }
        }, "json")


      }
    });
  </script>


</body>

</html>