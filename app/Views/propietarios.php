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
  <div class="wrapper container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <div class="page-title-right">
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item"> <a href="<?= base_url('dashboard') ?>"> Dashboard </a> </li>
              <li class="breadcrumb-item active"> <?= $title ?> </li>
            </ol>
          </div>
          <h4 class="page-title"> <?= $title ?> </h4>
        </div>
      </div>
      <div class="col-12">
        <div class="card-box table-responsive">
          <div class="dropdown float-right">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="javascript:void(0);" class="dropdown-item" onClick="info();"> <i class="fa fa-info mr-1"></i> Info. Detallada </a>
              <a href="javascript:void(0);" class="dropdown-item" onClick="editar();"> <i class="fa fa-edit mr-1"></i> Modificar</a>
              <a href="javascript:void(0);" class="dropdown-item" onClick="borrar();"> <i class="fa fa-trash-alt mr-1"></i> Eliminar</a>
            </div>
          </div>

          <p class="text-muted font-13">Para editar algun registro, <code>seleccione la fila</code> y elija la acción del <code>menú desplegable (tres puntos)</code> en la parte superior derecha</p>

          <a href="<?= base_url('propietarios/nuevo-propietario') ?>" class="btn btn-primary btn-rounded mb-2 float-right"> <i class="fa fa-plus"></i> Nuevo Registro </a>

          <div class="table-responsive">
            <table id="responsive-datatable" class="table table-bordered table-bordered nowrap">
              <thead>
                <tr class="text-center">
                  <th>Propietario</th>
                  <th>Direccion</th>
                  <th>Telefonos</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade bs-example-modal-center" id="modelInfo" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="myCenterModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myCenterModalLabel"><i class="fas fa-info"></i> Informacion Detallada del Registro</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <div class="form-horizontal" id="panel-info">
              <div class="form-group row">
                <label for="propietario" class="col-sm-3 col-form-label text-right"> Propietario : </label>
                <div class="col-sm-9">
                  <input type="text" id="propietario" name="propietario" class="form-control-plaintext" placeholder="Propietario" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="direccion" class="col-sm-3 col-form-label text-right"> Dirección : </label>
                <div class="col-sm-9">
                  <input type="text" id="direccion" name="direccion" class="form-control-plaintext" placeholder="Dirección" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="telefonos" class="col-sm-3 col-form-label text-right"> Teléfonos : </label>
                <div class="col-sm-9">
                  <textarea name="telefonos" id="telefonos" class="form-control-plaintext" placeholder="Teléfonos" cols="30" rows="5" readonly></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="clabe" class="col-sm-3 col-form-label text-right"> Clabe Bancaria : </label>
                <div class="col-sm-9">
                  <input type="text" id="clabe" name="clabe" class="form-control-plaintext" placeholder="Clabe Bancaria" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="cuenta" class="col-sm-3 col-form-label text-right"> Cuenta Bancaria : </label>
                <div class="col-sm-9">
                  <input type="text" id="cuenta" name="cuenta" class="form-control-plaintext" placeholder="Cuenta Bancaria" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="ine" class="col-sm-3 col-form-label text-right"> INE : </label>
                <div class="col-sm-9">
                  <input type="text" id="ine" name="ine" class="form-control-plaintext" placeholder="INE" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="rfc" class="col-sm-3 col-form-label text-right"> RFC : </label>
                <div class="col-sm-9">
                  <input type="text" id="rfc" name="rfc" class="form-control-plaintext" placeholder="RFC" readonly>
                </div>
              </div>
          </div>
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
  <!-- Toastr js -->
  <script src="<?= base_url('public/libs/toastr/toastr.min.js') ?>"></script>
  <!-- Sweet Alerts js -->
  <script src="<?= base_url('public/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
  <!-- Page Propietario js -->
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

    $(document).ready(function() {

      creaTabla();

      function creaTabla(){
        table = $('#responsive-datatable').DataTable({
          language: {
            url: "<?= base_url('public/libs/datatables/es_es.json') ?>"
          },
          "ajax" : {
              "url" : "<?= base_url('api/propietarios/tabla') ?>",
              "type" : "GET"
            },
            "columns" : [
              {'data' : 'propietario'},
              {'data' : 'direccion'},
              {'data' : 'telefonos'},
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
            $.ajax('<?= base_url('api/propietarios') ?>/'+ radioValue, {
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

    // Editar
    function editar() {
      var radioValue = $("input[name='id']:checked").val();
      if (radioValue) {
        url = '<?= base_url("propietarios/actualizar-propietario") ?>/'+ radioValue;
        $(location).attr('href',url);
      }
    }

    // Informacion Detallada
    function info() {
      var radioValue = $("input[name='id']:checked").val();
      if (radioValue) {
        $('#modelInfo').modal('show'); // Abrir Model
        $.ajax('<?= base_url('api/propietarios/propietario') ?>/'+ radioValue, {
          method: "GET",
          headers: { 'X-Requested-With': 'XMLHttpRequest' },
          success : function(res) {
            var data = res[0];
            $("#propietario").val(data.propietario);
            $('#direccion').val(data.direccion);
            $('#telefonos').val(data.telefonos);
            $('#clabe').val(data.bancariosClabe);
            $('#cuenta').val(data.bancariosCuenta);
            $('#ine').val(data.bancariosINE);
            $('#rfc').val(data.bancariosRFC);
          }
        });
      }
    }
  </script>
<?= $this->endSection() ?>