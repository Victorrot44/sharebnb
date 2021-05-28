<?= $this->extend('layouts/main') ?>

<?= $this->section('css') ?>
  <!-- Data Table css -->
  <link href="<?= base_url('public/libs/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/libs/datatables/responsive.bootstrap4.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Notification css (Toastr) -->
  <link href="<?= base_url('public/libs/toastr/toastr.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Sweet Alert css -->
  <link href="<?= base_url('public/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"> <a href="<?= base_url('dashboard') ?>"> Dashboard </a> </li>
                <li class="breadcrumb-item"> Catalogos </li>
                <li class="breadcrumb-item active"> <?= $title ?> </li>
              </ol>
            </div>
            <h4 class="page-title"> <?= $title ?> </h4>
          </div>
        </div>
        <div class="col-sm-12 col-md-8">
          <div class="card-box">
            <div class="dropdown float-right">
              <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item" onClick="editar();"> <i class="fa fa-edit mr-1"></i> Modificar</a>
                <a href="javascript:void(0);" class="dropdown-item" onClick="borrar();"> <i class="fa fa-trash-alt mr-1"></i> Eliminar</a>
              </div>
            </div>

            <p class="text-muted font-13">Para editar algun registro, <code>seleccione la fila</code> y elija la acción del <code>menú desplegable (tres puntos)</code> en la parte superior derecha</p>

            <div class="card-box table-responsive">
              <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap text-center">
                <thead>
                  <tr class="text-center">
                    <th>Tipo de Teléfono</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="card-box">
            <?= form_open('api/catalogos/tipo-telefono', ['id' => 'tipo-tel']) ?>
              <div class="form-group row">
                <label for="concepto" class="col-12 col-sm-3 col-form-label">Tipo de Teléfono</label>
                <div class="col-12 col-sm-9">
                  <input type="text" id="concepto" name="concepto" class="form-control" placeholder="Concepto">
                  <div class="invalid-feedback"></div>
                </div>
              </div>
              <div class="form-group mb-0 justify-content-end row">
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-info waves-effect waves-light">
                    <i class="fa fa-save mr-1"></i> Guardar
                  </button>
                </div>
              </div>
            <?= form_close() ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-center" id="modelEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myCenterModalLabel"><i class="fas fa-edit"></i> Editar Registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <?= form_open('api/catalogos/tipo-telefono', ['id' => 'edit-tipo-tel']) ?>
            <div class="form-group row">
              <label for="consepto" class="col-12 col-sm-3 col-form-label">Tipo de Teléfono</label>
              <div class="col-12 col-sm-9">
                <input type="text" id="consepto" name="concepto" class="form-control" placeholder="Concepto">
                <div class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group mb-0 justify-content-end row">
              <div class="col-sm-9">
                <button type="submit" class="btn btn-info waves-effect waves-light">
                  <i class="fa fa-save mr-1"></i> Guardar
                </button>
              </div>
            </div>
          <?= form_close() ?>

        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
  <!-- Data Table js -->
  <script src="<?= base_url('public/libs/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/datatables/dataTables.bootstrap4.js') ?>"></script>
  <script src="<?= base_url('public/libs/datatables/dataTables.responsive.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/datatables/responsive.bootstrap4.min.js') ?>"></script>
  <!-- JQuery Validation js -->
  <script src="<?= base_url('public/libs/jquery-validation/jquery.validate.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/jquery-validation/additional-methods.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/jquery-validation/localization/messages_es.min.js') ?>"></script>
  <!-- Toastr js -->
  <script src="<?= base_url('public/libs/toastr/toastr.min.js') ?>"></script>
  <!-- Sweet Alerts js -->
  <script src="<?= base_url('public/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
  <!-- Page Tipo-Telefono js  -->
  <script>
    var table;
    // Alert options
    toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": true,
      "progressBar": true,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

    var config_form = {
      lang: 'es',
      rules: { concepto: { required: true, minlength: 4, maxlength: 10 }, },
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        error.insertAfter(element);
      },
      highlight: function ( element, errorClass, validClass ) { $( element ).addClass( "is-invalid" ).removeClass( "is-valid" ); },
      unhighlight: function (element, errorClass, validClass) { $( element ).addClass( "is-valid" ).removeClass( "is-invalid" ); },
    }

    $(document).ready(function(){

      creaTabla();

      // Validar Formulario Añadir
      $('#tipo-tel').validate(config_form);

      // Validar Formulario Actualizar
      $('#edit-tipo-tel').validate(config_form);

      // Guardar
      $('#tipo-tel').submit(function (e){
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "<?= base_url('api/catalogos/tipo-telefono') ?>",
          headers: {'X-Requested-With': 'XMLHttpRequest'},
          data: $("#tipo-tel").serialize(),
          success: function(res) {
            $('#concepto').removeClass("is-invalid").removeClass('is-valid');
            $("#tipo-tel")[0].reset();
            table.ajax.reload();
            toastr["success"]("El registro guardado exitosamente", "Nuevo Registro");
          },
          statusCode: {
            400 : function (res) {
              var data = res;
              $('#concepto').addClass("is-invalid").removeClass('is-valid');
              $('.invalid-feedback').html(`<p>${data.responseJSON.response.concepto}</p>`);
            },
            500 : function (res) {
              var data = res;
              toastr["error"](data.responseJSON.error_message, data.responseJSON.error_title);
            }
          }
        });
      });

      // Editar
      $('#edit-tipo-tel').submit(function (e){
        e.preventDefault();
        var radioValue = $("input[name='id']:checked").val();
        $.ajax('<?= base_url('api/catalogos/tipo-telefono') ?>/'+ radioValue, {
          method : "PUT",
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          contentType: 'application/json',
          dataType: 'json',
          data: JSON.stringify({ "concepto" : ""+ $("#consepto").val() +"" }),
          success : function(res) {
            console.log('Success', res);
            table.ajax.reload(); // Recargar Tabla
            $('#consepto').removeClass("is-invalid").removeClass('is-valid'); // Remover Clases CSS
            $("#edit-tipo-tel")[0].reset(); // Resetear Formulario
            toastr["success"]("El registro ha sido actualizado exitosamente", "Actualización"); // Mensaje de exito
            $('#modelEdit').modal('hide'); // Cerrar Modal
          },
          statusCode : {
            400 : function (res) {
              var data = res;
              $('#consepto').addClass("is-invalid").removeClass('is-valid');
              $('.invalid-feedback').html(`<p>${data.responseJSON.response.concepto}</p>`);
            },
            500 : function (res) {
              var data = res;
              toastr["error"](data.responseJSON.error_message, data.responseJSON.error_title);
              $('#modelEdit').modal('hide');
            }
          }
        });
      });

      // Data Table
      function creaTabla(){
        table =  $('#responsive-datatable').DataTable({
          "language": { "url": "<?= base_url('public/libs/datatables/es_es.json') ?>" },
          "ajax" : {
            "url" : "<?= base_url('api/catalogos/tipo-telefono/tabla') ?>",
            "type" : "GET"
          },
          "columns" : [
            {'data' : 'concepto'},
            {'data' : 'acciones'}
          ]
        });
      }
    });

    // Eliminar Registros
    function borrar() {
      var radioValue = $("input[name='id']:checked").val();
      if(radioValue) {
        Swal.fire({
          title: 'Eliminar Registro',
          text: '¿Estas seguro de eliminar el registro?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Si, ¡Eliminalo!',
          cancelButtonText: 'No, ¡Cancelar!',
          confirmButtonClass: "btn btn-success mt-2",
          cancelButtonClass: "btn btn-danger ml-2 mt-2",
          buttonsStyling: false,
        }).then((res ) => {
          if (res .dismiss) {
            Swal.fire(
              '¡Acción Cancelada!',
              '',
              'error'
            );
          } else {
            $.ajax('<?= base_url('api/catalogos/tipo-telefono') ?>/'+ radioValue, {
              method: "DELETE",
              headers: { 'X-Requested-With': 'XMLHttpRequest' },
              success : function(res) {
                Swal.fire(
                  '¡Registro Eliminado!',
                  'El registro a sido eliminado con exito.',
                  'success'
                );
                table.ajax.reload();
              },
              error: function (err) {
                Swal.fire(
                  'Internal Server Error!',
                  'Ha ocurrido un error al intendar eliminar el registro.',
                  'warning'
                );
                table.ajax.reload();
              }
            });
          }
        });
      }
    }

    // Actualizar Registros
    function editar() {
      var radioValue = $("input[name='id']:checked").val();
      if (radioValue) {
        $('#modelEdit').modal('show'); // Abrir Model
      }
    }
  </script>
<?= $this->endSection() ?>