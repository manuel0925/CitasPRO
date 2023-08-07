<?php
require("./librerias/librerias.php");
session_start();


if (!isset($_SESSION["DATOS_USUARIO"])) {
  header("location:login.php");

  


}

if($_SESSION["DATOS_USUARIO"]["ID_PERFIL"] !== '4'){
  header("location:".strtolower( $_SESSION["DATOS_USUARIO"]["NOMBRE_PERFIL"]) .".php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CitasPro | Pacientes</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="./plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->


        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="javascript:;" id="btn_cerrar_session">
            Salir &nbsp;&nbsp;&nbsp;<i class="fas fa-sign-out-alt"></i>

          </a>

        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link">

        <span class="brand-text font-weight-light">CitasPro</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="javascript:;" class="d-block text-center"><?php echo $_SESSION["DATOS_USUARIO"]["NOMBRE_PERFIL"] ?>:</a>
          </div>
          <div class="info">
            <a href="javascript:;" class="d-block text-center"><?php echo $_SESSION["DATOS_USUARIO"]["NOMBRE"] ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">

            <li class="nav-item">
              <a href="./paciente.php" class="nav-link">
                <i class="fas fa-user-injured"></i>
                <p>
                  Paciente
                </p>
              </a>
            </li>
            </li>

          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Paciente</h1>
            </div>

          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">


              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Citas del paciente</h3>
                </div>
                <a href="javascript:;" id="agendar_cita" class="btn btn-primary">Agendar Cita</a>

                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ESPECIALIDAD</th>
                        <th>DOCTOR</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>ESTADO</th>
                        <th>ESTADO</th>

                      </tr>
                    </thead>
                    <tbody>

                    </tbody>

                    <tfoot>
                      <tr>
                        <th>ESPECIALIDAD</th>
                        <th>DOCTOR</th>
                        <th>FECHA</th>
                        <th>HORA</th>
                        <th>ESTADO</th>
                        <th>OPCIONES</th>

                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <div class="modal fade" id="modal_paciente">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Default Modal</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="frmCitas" name="frmCitas">
              <input type="hidden" name="id_cita" id="id_cita" value="">
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Especialidades</label>

                  <div class="input-group mb-3">
                    <select class="form-control" id="especialidades" name="especialidades">
                      <option value="">Selecione una especialidad</option>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                  </div>
                </div>
                <div class="form-group d-none" id="doctores_group">
                  <label for="exampleInputEmail1">Doctor</label>

                  <div class="input-group mb-3">
                    <select class="form-control" id="doctores" name="doctores">
                      <option id="doctor_cero" value="">Selecione un doctor</option>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Fecha</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="fecha" name="fecha" />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Hora</label>
                  <div class="input-group date" id="timepicker" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" id="hora" name="hora" />
                    <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                      <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                  </div>

                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Estado</label>

                  <div class="input-group mb-3">
                    <select class="form-control" id="estado" name="estado">
                      <option value="1">POR CONFIRMAR</option>
                      <option value="5">CANCELAR</option>
                    </select>
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="fas fa-check"></i></span>
                    </div>
                  </div>
                </div>



              </div>
              <!-- /.card-body -->


            </form>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar y cancelar</button>
            <button type="button" id="btn_guardar_cambios" class="btn btn-primary">Guarda Cambios</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0
      </div>
      <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->

  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="./plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="./plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="./plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="./plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="./plugins/jszip/jszip.min.js"></script>
  <script src="./plugins/pdfmake/pdfmake.min.js"></script>
  <script src="./plugins/pdfmake/vfs_fonts.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="./plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="./plugins/moment/moment.min.js"></script>
  <script src="./plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <script src="./plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="./plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {

      $("#btn_cerrar_session").on("click", function() {
        console.log("ss");
        $.post("./manejadores/manejadorCierreSesion.php", function(data) {
          if(data.codigo==0){
            console.log(data.mensaje);
            window.location="./login.php";
          }
        }, "json");
      })



      $("#agendar_cita").on("click", function() {
        $("#frmCitas").trigger("reset");
        $("#id_cita").val("0");
        console.log($("#id_cita"));

        $("#doctor_cero").prop("selected", true);
        $("#modal_paciente").modal("show");

      })




      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      $.post("./manejadores/manejadorEspecialidades.php", function(data) {

        $(data).each(function(index, value) {
          $("#especialidades").append(`<option value="${value.ID}">${value.NOMBRE}</option>`);
        })

      }, "json")


      var tbl_paciente = $("#example1").DataTable({
        "responsive": true,
        "lengthChange": true,
        "autoWidth": true,
        "ajax": "./manejadores/manejadorPacientes.php",
        "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        columns: [{
            data: "ESPECIALIDAD",
            className: "text-center"
          },
          {
            data: "DOCTOR",
            className: "text-center"
          },
          {
            data: "FECHA",
            className: "text-center"
          },
          {
            data: "HORA",
            className: "text-center"
          },
          {
            data: null,
            className: "text-center"
          },
          {
            data: null,
            className: "text-center"
          },
        ],
        columnDefs: [{
            targets: [4],
            render: function(data, type, full) {

              return `<span class="badge badge-primary">${full.ESTADO}</span>`;

            },
          },
          {
            targets: [5],
            render: function(data, type, full) {
              return (
                '<a href="javascript:void(0);" id="' +
                full.ID +
                '"  class="btn btn-primary btn_editar_cita_paciente" ><i class="fa fa-edit"></a>'
              );
            },
          }

        ],

      })






      $("#example1").on("click", ".btn_editar_cita_paciente", function() {


        let id_cita = $(this).attr("id");




       

        $.post("./manejadores/manejadorEditarCita.php", {
          ID_CITA: id_cita
        }, function(data) {
          $("#doctores_group").removeClass("d-none");

          $("#id_cita").val(`${data[0]['ID']}`);
          $(`#especialidades option[value="${data[0]['ID_ESPECIALIDAD']}"]`).prop('selected', true);


          //$(`#especialidades`).trigger('change');

          $(`#doctores option[value="${data[0]['ID_DOCTOR']}"]`).prop('selected', true);

          let fecha = moment(`${data[0]['FECHA']}`, "YYYY-MM-DD").format("DD/MM/YYYY");

          $(`#fecha`).val(`${fecha}`);

          let hora = moment(`${data[0]['HORA']}`, "hh:mm:ss").format("hh:mm A");
          $(`#hora`).val(`${hora}`);
          $(`#estado option[value="${data[0]['ESTADO']}"]`).prop('selected', true);



          $.post("./manejadores/manejadorDoctor.php", {
            especialidad: $(`#especialidades`).val()
          }, function(dataDOCTOR) {

            $(".dinamic_doctor").remove();

            $(dataDOCTOR).each(function(index, value) {
              let selecionado = value.ID === data[0]['ID_DOCTOR'] ? "selected" : "";
              $("#doctores").append(`<option class="dinamic_doctor" value="${value.ID}" ${selecionado}>${value.DOCTOR}</option>`);
            })


          }, "json");

        }, "json");

        $("#modal_paciente").modal("show");
      })

      $("#especialidades").on("change", function() {

        let especialidad = $(this).val();

        $.post("./manejadores/manejadorDoctor.php", {
          especialidad: especialidad
        }, function(data) {

          $(".dinamic_doctor").remove();

          $(data).each(function(index, value) {
            $("#doctores").append(`<option class="dinamic_doctor" value="${value.ID}">${value.DOCTOR}</option>`);
          })

        }, "json");

        if ($(this).val() !== "0") {
          $("#doctores_group").removeClass("d-none");

        } else {
          $("#doctores_group").addClass("d-none");
        }
      })

      $('#timepicker').datetimepicker({
        format: 'LT'
      });



      var $frmCitas = $("#frmCitas");
      $frmCitas.validate({
        rules: {
          especialidades: {
            required: true,

          },
          doctores: {
            required: true,
          },
          hora: {
            required: true,
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




      $("#btn_guardar_cambios").on("click", function() {
        let url = "";
        if ($("#id_cita").val() == "0") {
          url = "./manejadores/manejadorAgregarCitas.php";
        } else {
          url = "./manejadores/manejadorGuardarEditarCitas.php"
        }

        console.log(url);
        if ($frmCitas.valid()) {
         
          $hora = moment($("#hora").val(), 'hh:mm A').format('hh:mm:ss');
          
          console
          

          let especialidad = $("#especialidades").val();
          let doctor = $("#doctores").val();
          let fecha = $("#fecha").val();
          let hora = $hora;
          let estado = $("#estado").val();

          $.post(url, {
            id: $("#id_cita").val(),
            especialidad: especialidad,
            doctor: doctor,
            fecha: fecha,
            hora: hora,
            estado: estado
          }, function(data) {


            if (data["codigo"] == 0) {

              $(document).Toasts('create', {
                class: 'bg-success',
                title: '',

                body: data["mensaje"]
              });

              $("#modal_paciente").modal("hide");
              tbl_paciente.ajax.reload();


            } else {
              $(document).Toasts('create', {
                class: 'bg-danger',
                title: '',

                body: data["mensaje"]
              })
            }
          }, "json")


        }
      })

    });
  </script>
</body>

</html>