<?= $this->extend('layouts/main') ?>

<?= $this->section('css') ?>
  <!-- Data Table css -->
  <link href="<?= base_url('public/libs/datatables/dataTables.bootstrap4.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/libs/datatables/responsive.bootstrap4.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Notification css (Toastr) -->
  <link href="<?= base_url('public/libs/toastr/toastr.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Sweet Alert css -->
  <link href="<?= base_url('public/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Bootstrap Datepicker css -->
  <link href="<?= base_url('public/libs/bootstrap-datepicker/bootstrap-datepicker.css') ?>" rel="stylesheet" type="text/css" />
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
                    <th>Concepto</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
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
            <h3 class="mb-3">Nuevo Registro</h3>
            <?= form_open('', ['id' => 'form-add', 'autocomplete' => 'off']) ?>
              <div class="form-group row">
                <label for="concepto" class="col-12 col-sm-3 col-form-label">Concepto</label>
                <div class="col-12 col-sm-9">
                  <input type="text" id="concepto" name="concepto" class="form-control" placeholder="Concepto">
                </div>
              </div>
              <div class="form-group row">
                <label for="inicio" class="col-12 col-sm-3 col-form-label">Fecha de Inicio</label>
                <div class="col-12 col-sm-9">
                  <input type="text" id="inicio" name="inicio" class="form-control datepicker">
                  <span class="help-block ml-2"> Día/Mes </span>
                </div>
              </div>
              <div class="form-group row">
                <label for="fin" class="col-12 col-sm-3 col-form-label">Fecha de Finalización</label>
                <div class="col-12 col-sm-9">
                  <input type="text" id="fin" name="fin" class="form-control datepicker">
                  <span class="help-block ml-2"> Día/Mes </span>
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
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="resetCss();">×</button>
        </div>
        <div class="modal-body">
          <?= form_open('', ['id' => 'form-edit', 'autocomplete' => 'off']) ?>
            <div class="form-group row">
              <label for="edit-concepto" class="col-12 col-sm-3 col-form-label">Concepto</label>
              <div class="col-12 col-sm-9">
                <input type="text" id="edit-concepto" name="concepto" class="form-control" placeholder="Concepto">
              </div>
            </div>
            <div class="form-group row">
              <label for="edit-inicio" class="col-12 col-sm-3 col-form-label">Fecha de Inicio</label>
              <div class="col-12 col-sm-9">
                <input type="text" id="edit-inicio" name="inicio" class="form-control datepicker">
                <span class="help-block ml-2"> Día/Mes </span>
              </div>
            </div>
            <div class="form-group row">
              <label for="edit-fin" class="col-12 col-sm-3 col-form-label">Fecha de Finalización</label>
              <div class="col-12 col-sm-9">
                <input type="text" id="edit-fin" name="fin" class="form-control datepicker">
                <span class="help-block ml-2"> Día/Mes </span>
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
  <!-- Mement js -->
  <script src="<?= base_url('public/libs/moment/moment.js') ?>"></script>
  <!-- Bootstrap Datepicker js -->
  <script src="<?= base_url('public/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/bootstrap-datepicker/bootstrap-datepicker.es.js') ?>"></script>
  <!-- Page Fechas-Especiales js  -->
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
    // JQuery Validation Config
    var config_form = {
      lang: 'es',
      rules: { 
        concepto: { 
          required: true, 
          minlength: 4, 
          maxlength: 50,
          remote: {
            url : "<?= base_url('api/validaciones-asincronas/fecha-especial/concepto-unico') ?>",
            type : "post",
            dataType : 'json',
            data : {
              concepto : function() {
                if ($("#concepto").val() != '') {
                  return $("#concepto").val();
                }

                if ($("#edit-concepto").val() != '') {
                  return $("#edit-concepto").val();
                }
              }
            }
          }
        },
        inicio: { required: true},
        fin: { required: true}
      },
      messages : {
        concepto : {
          remote : "El concepto ya se encuentra registrada."
        }
      },
      errorPlacement: function (error, element) {
        error.addClass("invalid-feedback");
        error.insertAfter(element);
      },
      highlight: function ( element, errorClass, validClass ) { $( element ).addClass( "is-invalid" ).removeClass( "is-valid" ); },
      unhighlight: function (element, errorClass, validClass) { $( element ).addClass( "is-valid" ).removeClass( "is-invalid" ); },
    }

    $(document).ready(function(){

      creaTabla();

      // Date Picker
      var getDate = function(input) { return new Date(input.date.valueOf()); }

      $('.datepicker').datepicker({
        format: "dd/mm",
        language: 'es'
      });

      $('#inicio').datepicker({
        startDate: '+5d',
        endDate: '+35d',
      }).on('changeDate', function (selected) {
        console.log('Hola');
        $('#fin').datepicker('setStartDate', getDate(selected));
      });

      $('#edit-inicio').datepicker({
        startDate: '+5d',
        endDate: '+35d',
      }).on('changeDate', function (selected) {
        $('#edit-fin').datepicker('setStartDate', getDate(selected));
      });

      $('#fin').datepicker({
        startDate: '+6d',
        endDate: '+36d',
      });

      $('#edit-fin').datepicker({
        startDate: '+6d',
        endDate: '+36d',
      });

      // Validar Formulario Añadir
      $('#form-add').validate(config_form);

      // Validar Formulario Actualizar
      $('#form-edit').validate(config_form);

      // Guardar
      $('#form-add').submit(function (e){
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "<?= base_url('api/catalogos/fecha-especial') ?>",
          headers: {'X-Requested-With': 'XMLHttpRequest'},
          data: $("#form-add").serialize(),
          success: function(res) {
            resetCss();
            $("#form-add")[0].reset();
            table.ajax.reload();
            toastr["success"]("El registro guardado exitosamente", "Nuevo Registro");
          },
          statusCode: {
            500 : function (res) {
              var data = res;
              toastr["error"](data.responseJSON.error_message, data.responseJSON.error_title);
            }
          }
        });
      });

      // Editar
      $('#form-edit').submit(function (e){
        e.preventDefault();
        var radioValue = $("input[name='id']:checked").val();
        $.ajax('<?= base_url('api/catalogos/fecha-especial') ?>/'+ radioValue, {
          method : "PUT",
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          contentType: 'application/json',
          dataType: 'json',
          data: JSON.stringify({ 
            "concepto" : ""+ $("#edit-concepto").val() +"",
            "inicio" : ""+ $('#edit-inicio').val() +"",
            "fin" : ""+ $('#edit-fin').val() +""
          }),
          success : function(res) {
            table.ajax.reload();
            resetCss();
            $("#form-edit")[0].reset();
            toastr["success"]("El registro ha sido actualizado exitosamente", "Actualización");
            $('#modelEdit').modal('hide');
          },
          statusCode : {
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
            "url" : "<?= base_url('api/catalogos/fecha-especial/tabla') ?>",
            "type" : "GET"
          },
          "columns" : [
            {'data' : 'concepto'},
            {'data' : 'inicio'},
            {'data' : 'fin'},
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
            Swal.fire( '¡Acción Cancelada!', '', 'error');
          } else {
            $.ajax('<?= base_url('api/catalogos/fecha-especial') ?>/'+ radioValue, {
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
        $.ajax('<?= base_url('api/catalogos/fecha-especial')?>/'+ radioValue, {
          method : "GET",
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          success : function(res) {
            var data = res, inicio = '', fin = '', year = new Date();
            inicio = data.response.especialDiaInicio+'/'+data.response.especialMesInicio;
            if (data.response.especialMesFin < data.response.especialMesInicio) {
              fin = data.response.especialMesFin+'/'+data.response.especialDiaFin+'/'+(year.getFullYear() + 1);
            } else if (data.response.especialMesFin == data.response.especialMesInicio){
              fin = data.response.especialMesFin+'/'+data.response.especialDiaFin+'/'+year.getFullYear();
            } else {
              fin = data.response.especialMesFin+'/'+data.response.especialDiaFin+'/'+year.getFullYear();
            }
            $('#edit-concepto').val(data.response.especialConcepto);
            $('#edit-inicio').datepicker("setDate", inicio);
            $('#edit-fin').datepicker("setDate", new Date(fin));
          }
        })
        $('#modelEdit').modal('show');
      }
    }
  </script>
<?= $this->endSection() ?>