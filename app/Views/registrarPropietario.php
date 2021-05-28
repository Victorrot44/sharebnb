<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"> <a href="<?= base_url('dashboard') ?>"> Dashboard </a> </li>
                <li class="breadcrumb-item"> <a href="<?= base_url('propietarios') ?>"> Propietarios </a> </li>
                <li class="breadcrumb-item active"> <?= $title ?> </li>
              </ol>
            </div>
            <h4 class="page-title"> <?= $title ?> </h4>
          </div>
        </div>
        <div class="col-12">
          <div class="card-box">
            <?= form_open('propietarios/nuevo-propietario', ['id' => 'propietario']) ?>
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="name" class="col-form-label">Nombre</label>
                  <input type="text" id="name" name="nombre" class="form-control text-uppercase" placeholder="Nombre" value="<?= old('nombre') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="paterno" class="col-form-label">Apellido Paterno</label>
                  <input type="text" id="paterno" name="paterno" class="form-control text-uppercase" placeholder="Apellido Paterno" value="<?= old('paterno') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="materno" class="col-form-label">Apellido Materno</label>
                  <input type="text" id="materno" name="materno" class="form-control text-uppercase" placeholder="Apellido Materno" value="<?= old('materno') ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="telefono" class="col-form-label">Teléfono</label>
                  <input type="text" id="telefono" name="telefono[]" class="form-control phone-1" placeholder="Teléfono">
                </div>
                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="type" class="col-form-label">Tipo de Teléfono</label>
                  <select name="tipo[]" id="type" class="custom-select target">
                    <option value=""> Seleccione una Opción </option>
                    <option value="1"> Movil </option>
                    <option value="2"> Fijo </option>
                    <option value="3"> WhatsApp </option>
                  </select>
                </div>
                <div class="col-sm-12 col-md-4 col-xl-4 d-flex justify-content-center align-items-center">
                  <button type="button" class="btn btn-primary btn-rounded add-phone">
                    <i class="fas fa-plus-circle"></i> Añadir Teléfono
                  </button>
                </div>
              </div>
              <div class="form-row" id="add-phone"></div>
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-3">
                  <label for="calle" class="col-form-label">Calle</label>
                  <input type="text" id="calle" name="calle" class="form-control text-uppercase" placeholder="Calle" value="<?= old('calle') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                  <label for="externo" class="col-form-label">No. Ext</label>
                  <input type="text" id="externo" name="externo" class="form-control" placeholder="No. Externo" value="<?= old('externo') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                  <label for="interno" class="col-form-label">No. Int</label>
                  <input type="text" id="interno" name="interno" class="form-control" placeholder="No. Interior" value="<?= old('interno') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                  <label for="cp" class="col-form-label">C.P.</label>
                  <input type="text" id="cp" name="cp" class="form-control" placeholder="Codigo Postal" value="<?= old('cp') ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4">
                  <label for="colonia" class="col form-label">Colonia</label>
                  <select name="colonia" id="colonia" class="custom-select">
                    <option value=""> Seleccione... </option>
                  </select>
                </div>
                <div class="form-group col-sm-12 col-md-4">
                  <label for="municipio" class="col form-label">Municipio</label>
                  <input type="text" id="municipio" name="municipio" class="form-control-plaintext" placeholder="Municipio" readonly>
                </div>
                <div class="form-group col-sm-12 col-md-4">
                  <label for="estado" class="col form-label">Estado</label>
                  <input type="text" id="estado" name="estado" class="form-control-plaintext" placeholder="Estado" readonly>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-3">
                  <label for="clabe" class="col form-label">CLABE</label>
                  <input type="text" id="clabe" name="clabe" class="form-control text-uppercase" placeholder="CLABE" value="<?= old('clabe') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                  <label for="cuenta" class="col form-label">Cuenta</label>
                  <input type="text" id="cuenta" name="cuenta" class="form-control" placeholder="Cuenta" value="<?= old('cuenta') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                  <label for="ine" class="col form-label">INE</label>
                  <input type="text" id="ine" name="ine" class="form-control text-uppercase" placeholder="INE" value="<?= old('ine') ?>">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                  <label for="rfc" class="col form-label">RFC</label>
                  <input type="text" id="rfc" name="rfc" class="form-control text-uppercase" placeholder="RFC" value="<?= old('rfc') ?>">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-sm-12 col-md-4">
                  <label for="email" class="col form-label">Correl Electronico</label>
                  <input type="text" id="email" name="correo" class="form-control" placeholder="Correl Electronico" value="<?= old('correo') ?>">
                  <div class="invalid-feedback"></div>
                </div>
                <div class="form-group col-sm-12 col-md-4">
                  <label for="password" class="col form-label">Contraseña</label>
                  <input type="text" id="password" name="password" class="form-control" placeholder="Contraseña" value="<?= old('password') ?>">
                </div>
                <div class="col-sm-12 col-md-4  d-flex justify-content-center align-items-center">
                  <button type="submit" class="btn btn-primary"> <i class="fa fa-save mr-1"></i> Guardar </button>
                </div>
              </div>
            <?= form_close() ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
  <!-- JQuery Mask js -->
  <script src="<?= base_url('public/libs/jquery-mask-plugin/jquery.mask.min.js') ?>"></script>
  <!-- JQuery Validation js -->
  <script src="<?= base_url('public/libs/jquery-validation/jquery.validate.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/jquery-validation/additional-methods.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/jquery-validation/localization/messages_es.min.js') ?>"></script>
  <script>
    var cantidad = 1;

    // Reglas Personales
    $.validator.addMethod('is_rfc', function(value, element){
      const rule = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
      var rfc = value.trim().toUpperCase();
      var aceptarGenerico = true;
      var validado = rfc.match(rule);
      
      if(!validado) //Coincide con el formato general del regex?
        return false;

      //Separar el dígito verificador del resto del RFC
      const digitoVerificador = validado.pop();
      const rfcSinDigito      = validado.slice(1).join('');
      const longitud          = rfcSinDigito.length;
      const diccionario       = "0123456789ABCDEFGHIJKLMN&OPQRSTUVWXYZ Ñ";
      const indice            = longitud + 1;

      var suma, digitoEsperado;

      if (longitud == 12)
        suma = 0;
      else
        suma = 481; // Ajuste para persona moral
      
      for (let i = 0; i < longitud; i++) {
        suma += diccionario.indexOf(rfcSinDigito.charAt(i)) * (indice - i);
      }

      digitoEsperado = 11 - suma % 11;

      if (digitoEsperado == 11) digitoEsperado = 0;
      else if (digitoEsperado == 10) digitoEsperado = "A";

      // El dígito verificador coincide con el esperado o es un RFC Genérico (Ventas a público en general)
      if ((digitoVerificador != digitoEsperado) && (!aceptarGenerico || rfcSinDigito + digitoVerificador != "XAXX010101000"))
        return false;
      else if (!aceptarGenerico && rfcSinDigito + digitoVerificador == "XEXX010101000")
        return false;
      
      return true;
    }, 'Ingrese un RFC Valido');

    $.validator.addMethod("exactlength", function(value, element, param) {
      return this.optional(element) || value.length == param;
    }, $.validator.format("Ingrese exactamente {0} caracteres."));

    $(document).ready(function(){
      // Select Tipo de Telélono
      $.getJSON("<?= base_url('api/catalogos/tipo-telefono') ?>", function(data) {
        var opciones = $('.target');
        $('.target').empty();
        opciones.append($("<option />").val('').text('SELECCIONE'));
        $.each(data.response, function () {
          opciones.append($("<option />").val(this.tipoTelefonoId).text(this.tipoTelefonoTipo));
        });
      });

      // Validación del Formulario
      $('#propietario').validate({
        lang: 'es',
        rules: {
          nombre: { required: true, minlength: 2, maxlength: 30 },
          paterno: { required: true, minlength: 2, maxlength: 30 },
          materno: { required: true, minlength: 2, maxlength: 30 },
          "telefono[]": "required",
          "tipo[]": "required",
          calle: { required: true, maxlength: 150},
          externo: { required: true},
          cp: { required: true, digits: true, exactlength: 5},
          colonia: { required: true},
          rfc: { required: true, is_rfc: true},
          cuenta: { required: true, digits: true, minlength: 15, maxlength: 16},
          clabe: { required: true},
          ine: { required: true},
          correo: { required: true, email: true},
          password: { required: true}
        },
        errorPlacement: function (error, element) {
          error.addClass("invalid-feedback");
          error.insertAfter(element);
        },
        highlight: function ( element, errorClass, validClass ) {
          $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
        },
        unhighlight: function (element, errorClass, validClass) {
          $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );  
        }
      });

      // Validacion asingrona
      $('#email').on('change', function(e) {
        var email = (this).value;
        $.ajax({
          type: "POST",
          url: "<?= base_url('api/validaciones-asincronas/propietario/email-unique') ?>",
          headers: {'X-Requested-With': 'XMLHttpRequest'},
          contentType: 'application/json',
          dataType: 'json',
          data: JSON.stringify({ "email" : ""+ email +"" }),
          success: function(res) {
            var data = res;
            if (!data.response) {
              $( "#email" ).addClass( "is-invalid" ).removeClass( "is-valid" );
              $('.invalid-feedback').html(`<p>El correo ya esta registrado.</p>`);
            }
          }
        });
      });

      // Buscar Colonia por C.P.
      var cp = $('#cp').val();
      if(cp.length > 0){
        busquedaCP(cp);
      } 

      $('#cp').on('change', function(){
        var cp = $(this).val();
        busquedaCP(cp);
      });
      
      function busquedaCP(cp) {
        $.getJSON("<?= base_url('api/direccion/cp') ?>/"+ cp, function(data) {
          var opciones = $('#colonia');
          $('#colonia').empty();
          $('#municipio').val('');
          $('#estado').val('');
          opciones.append($("<option />").val('').text('SELECCIONE'));
          $.each(data.response, function () {
            opciones.append($("<option />").val(this.id).text(this.colonia));
          });
        });
      }

      $('#colonia').on('change',function() {
        var valores = $(this).val();
        $.getJSON("<?= base_url('api/direccion/municipio/?colonia=') ?>"+valores,function(data) {
          $('#municipio').val(data.response[0].municipio);
        });
        
        $.getJSON("<?= base_url('api/direccion/estado/?colonia=') ?>"+ valores, function(data) {
          $('#estado').val(data.response[0].estado);
        });
      });
    });

    // Añadir Teléfono
    $('.add-phone').on('click', addInputs);

    function addInputs() {
      cantidad = cantidad + 1;
      // var html = $('#add-phone').html();
      var html = `<div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="phone-${cantidad}" class="col-form-label">Teléfono ${cantidad}</label>
                  <input type="text" id="phone-${cantidad}" name="telefono[]" class="form-control phone-${cantidad}" placeholder="Teléfono">
                </div>
                <div class="form-group col-sm-12 col-md-4 col-xl-4">
                  <label for="type-${cantidad}" class="col-form-label">Tipo de Teléfono</label>
                  <select name="tipo[]" id="type-${cantidad}" class="custom-select target">
                  </select>
                </div>
                <div class="col-md-4"></div>`;
      $('#add-phone').append(html);
      $.getJSON("<?= base_url('api/catalogos/tipo-telefono') ?>", function(data) {
        var opciones = $('.target');
        $('.target').empty();
        opciones.append($("<option />").val('').text('SELECCIONE'));
        $.each(data.response, function () {
          opciones.append($("<option />").val(this.tipoTelefonoId).text(this.tipoTelefonoTipo));
        });
      });
    }
  </script>
<?= $this->endSection() ?>