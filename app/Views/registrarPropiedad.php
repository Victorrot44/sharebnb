<?= $this->extend('layouts/main') ?>

<?= $this->section('css') ?>
  <!-- dropify css-->
  <link href="<?= base_url('public/libs/dropify/dropify.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Time Picker css -->
  <link href="<?= base_url('public/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') ?>" rel="stylesheet">
  <!-- Bootstrap Datepicker css -->
  <link href="<?= base_url('public/libs/bootstrap-datepicker/bootstrap-datepicker.css') ?>" rel="stylesheet" type="text/css" />
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
                <li class="breadcrumb-item"> <a href="<?= base_url('propiedades') ?>"> Propiedades </a> </li>
                <li class="breadcrumb-item active"> <?= $title ?> </li>
              </ol>
            </div>
            <h4 class="page-title"> <?= $title ?> </h4>
          </div>
        </div>
        <div class="col-12">
          <div class="card-box">
            <div id="rootwizard">

              <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">

                <li class="nav-item">
                  <a href="#section-propiedad" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="fa fa-home"></i>
                    <span class="d-none d-sm-inline"> Propiedad </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#section-recamaras" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="fa fa-door-closed"></i>
                    <span class="d-none d-sm-inline"> Recamaras </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#section-reglamento" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="fa fa-balance-scale"></i>
                    <span class="d-none d-sm-inline"> Reglamento </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#section-fechas" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="mdi mdi-calendar-remove-outline"></i>
                    <span class="d-none d-sm-inline"> No disponible </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#section-administrador" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="fa fa-user-circle"></i>
                    <span class="d-none d-sm-inline"> Administrador </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#section-servicios" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="fa fa-concierge-bell"></i>
                    <span class="d-none d-sm-inline"> Servicios </span>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="#section-mobiliario" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                    <i class="fa fa-couch"></i>
                    <span class="d-none d-sm-inline"> Mobiliario </span>
                  </a>
                </li>

              </ul>

              <div class="progress" style="height: 1.5rem;">
                <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                  <span> 0% </span>
                </div>
              </div>

              <div class="tab-content border-0 mb-0">
                <div class="tab-pane" id="section-propiedad">
                  <?= form_open('', ['id' => 'form-1', 'autocomplete' => 'off']) ?>
                    <p class="text-muted font-14 pb-3">
                      Los campos con <code>asterisco (*)</code> son <code>"Obligatorios"</code>.
                    </p>
                    <div class="form-group row mb-3">
                      <label for="propietario" class="col-sm-3 col-form-label">* Propietario </label>
                      <div class="col-md-9">
                        <select name="propietario" id="propietario" class="custom-select"></select>
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="mapa" class="col-sm-3 col-form-label"> Mapa </label>
                      <div class="col-md-9">
                        <input type="url" id="mapa" name="mapa" class="form-control text-uppercase" placeholder="url">
                      </div>
                    </div>
                    <div class="form-group row mb-3">
                      <label for="calle" class="col-sm-3 col-form-label">* Calle </label>
                      <div class="col-md-9">
                        <input type="text" id="calle" name="calle" class="form-control text-uppercase" placeholder="Calle">
                      </div>
                    </div>
                    <div class="form-row mb-3">
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="externo" class="col-form-label">* No. Ext</label>
                        <input type="text" id="externo" name="externo" class="form-control" placeholder="No. Externo" value="">
                      </div>
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="interno" class="col-form-label">No. Int</label>
                        <input type="text" id="interno" name="interno" class="form-control" placeholder="No. Interior" value="">
                      </div>
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="cp" class="col-form-label">* C.P.</label>
                        <input type="text" id="cp" name="cp" class="form-control" placeholder="Codigo Postal" value="">
                      </div>
                    </div>
                    <div class="form-row mb-3">
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="colonia" class="col form-label">* Colonia</label>
                        <select name="colonia" id="colonia" class="custom-select"></select>
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
                    <div class="form-row mb-3">
                      <div class="form-group col-sm-12 col-md-6">
                        <label for="regadera" class="col form-label">No. de Baños con Regaderas</label>
                        <input type="number" id="regadera" name="regadera" class="form-control" placeholder="0" min="0" max="100">
                        <span class="help-block ml-2"> <small>Baños comunales.</small> </span>
                      </div>
                      <div class="form-group col-sm-12 col-md-6">
                        <label for="bano" class="col form-label">No. de Baños sin Regaderas</label>
                        <input type="number" id="bano" name="bano" class="form-control" placeholder="0" min="0" max="100">
                        <span class="help-block ml-2"> <small>Baños comunales.</small> </span>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="" class="col-sm-6 col-form-label"> Desarrollo Residencial </label>
                          <div class="col-md-6">
                            <div class="custom-control custom-radio">
                              <input type="radio" id="residencial1" name="residencial" value="1" class="custom-control-input">
                              <label class="custom-control-label" for="residencial1"> Si </label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input type="radio" id="residencial2" name="residencial" value="0" class="custom-control-input" checked>
                              <label class="custom-control-label" for="residencial2"> No </label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="mapa" class="col-sm-3 col-form-label"> Club de Golf </label>
                          <div class="col-md-9">
                            <div class="custom-control custom-radio">
                              <input type="radio" id="golf1" name="golf" value="1" class="custom-control-input">
                              <label class="custom-control-label" for="golf1"> Si </label>
                            </div>
                            <div class="custom-control custom-radio">
                              <input type="radio" id="golf2" name="golf" value="0" class="custom-control-input" checked>
                              <label class="custom-control-label" for="golf2"> No </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-row mb-3">
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="centro" class="col form-label">* Distancia al centro (km)</label>
                        <input type="number" id="centro" name="centro" class="form-control" placeholder="0" min="0" max="100">
                      </div>
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="superficie" class="col form-label">* Superficie de la construccion (m<sup>2</sup>)</label>
                        <input type="number" id="superficie" name="superficie" class="form-control" placeholder="0" min="0" max="500">
                      </div>
                      <div class="form-group col-sm-12 col-md-4">
                        <label for="estacionamiento" class="col form-label">Número de cajones de estacionamiento</label>
                        <input type="number" id="estacionamiento" name="estacionamiento" class="form-control" placeholder="0" min="0" max="100">
                      </div>
                    </div>
                  <?= form_close() ?>
                </div>

                <div class="tab-pane" id="section-recamaras">
                  <?= form_open('', ['id' => 'form-2', 'autocomplete' => 'off']) ?>
                    <input type="hidden" name="id" value="">
                    <div class="form-row mb-3">
                      <div class="col-sm-3">
                        <h3>Recamara 1</h3>
                      </div>
                      <div class="form-group col-md-3 row">
                        <label for="municipio" class="col-12 col-form-label">Baño con Regaderas</label>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="regadera-si-1" name="recamaraRegadera[1]" value="1" class="custom-control-input">
                          <label class="custom-control-label" for="regadera-si-1"> Si </label>
                        </div>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="regadera-no-1" name="recamaraRegadera[1]" value="0" class="custom-control-input" checked>
                          <label class="custom-control-label" for="regadera-no-1"> No </label>
                        </div>
                      </div>
                      <div class="form-group col-md-3 row">
                        <label for="municipio" class="col-12 col-form-label">Baño sin Regaderas</label>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="bano-si-1" name="recamaraBano[1]" value="1" class="custom-control-input">
                          <label class="custom-control-label" for="bano-si-1"> Si </label>
                        </div>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="bano-no-1" name="recamaraBano[1]" value="0" class="custom-control-input" checked>
                          <label class="custom-control-label" for="bano-no-1"> No </label>
                        </div>
                      </div>
                      <div class="form-group col-sm-12 col-md-3">
                        <label for="individual-1" class="col form-label">No. de Camas Individuales</label>
                        <input type="number" id="individual-1" name="individual[]" class="form-control" placeholder="0" min="1" max="100">
                      </div>
                      <div class="form-group col-sm-12 col-md-3">
                        <label for="matrimonial-1" class="col form-label">No. de Camas Matrimoniales</label>
                        <input type="number" id="matrimonial-1" name="matrimonial[]" class="form-control" placeholder="0" min="1" max="100">
                      </div>
                      <div class="form-group col-sm-12 col-md-3">
                        <label for="queen-1" class="col form-label">No. de Camas Queen size</label>
                        <input type="number" id="queen-1" name="queen[]" class="form-control" placeholder="0" min="1" max="100">
                      </div>
                      <div class="form-group col-sm-12 col-md-3">
                        <label for="king-1" class="col form-label">No. de Camas King size</label>
                        <input type="number" id="king-1" name="king[]" class="form-control" placeholder="0" min="1" max="100">
                      </div>
                      <div class="form-group col-sm-12 col-md-3">
                        <label for="sofa-1" class="col form-label">No. de Sofa Cama</label>
                        <input type="number" id="sofa-1" name="sofa[]" class="form-control" placeholder="0" min="1" max="100">
                      </div>
                    </div>
                    <div id="add-recamara"></div>
                    <div class="col-12 d-flex justify-content-end mb-3 mr-3">
                      <button type="button" class="btn btn-primary" onclick="addRoom();">
                        <i class="fa fa-plus"></i> Añadir Recamara 
                      </button>
                    </div>
                  <?= form_close() ?>
                </div>
                
                <div class="tab-pane" id="section-reglamento">
                  <?= form_open('', ['id' => 'form-3', 'autocomplete' => 'off']) ?>
                    <input type="hidden" name="id" value="">
                    <div class="form-group row mb-3">
                      <label for="hora-inicio" class="col-form-label"> Horario de acceso: de </label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <input id="hora-inicio" name="horaInicio" type="text" class="form-control timepicker">
                          <div class="input-group-append">
                            <span class="input-group-text"> <i class="mdi mdi-clock-outline"></i> </span>
                          </div>
                        </div>
                      </div>
                      <label for="hora-fin" class="col-form-label ml-2"> a </label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <input id="hora-fin" name="horaFin" type="text" class="form-control timepicker">
                          <div class="input-group-append">
                            <span class="input-group-text"> <i class="mdi mdi-clock-outline"></i> </span>
                          </div>
                        </div>
                      </div>
                      <label for="anticipacion" class="col-form-label ml-2"> Tiempo de Anticipación de renta de la Propiedad </label>
                      <div class="col-md-2">
                        <div class="input-group">
                          <input id="anticipacion" name="anticipacion" type="number" min="0" max="12" class="form-control" placeholder="0">
                          <div class="input-group-append">
                            <span class="input-group-text"> meses </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="form-group col-md-4 row">
                        <label for="municipio" class="col-12 col-form-label">¿Se Puede fumar en el interior de la propiedad?</label>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="fumar-si" name="fumar" value="1" class="custom-control-input">
                          <label class="custom-control-label" for="fumar-si"> Si </label>
                        </div>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="fumar-no" name="fumar" value="0" class="custom-control-input" checked>
                          <label class="custom-control-label" for="fumar-no"> No </label>
                        </div>
                      </div>
                      <div class="form-group col-md-4 row">
                        <label for="municipio" class="col-12 col-form-label">¿Se permiten mascotas?</label>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="mascota-si" name="mascota" value="1" class="custom-control-input">
                          <label class="custom-control-label" for="mascota-si"> Si </label>
                        </div>
                        <div class="custom-control custom-radio col-sm-6">
                          <input type="radio" id="mascota-no" name="mascota" value="0" class="custom-control-input" checked>
                          <label class="custom-control-label" for="mascota-no"> No </label>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="municipio" class="col-12 col-form-label">¿Se pueden hacer fiestas?</label>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="fiesta-no" name="fiesta" value="0" class="custom-control-input" checked>
                          <label class="custom-control-label" for="fiesta-no-1"> No </label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="fiesta-si-1" name="fiesta" value="1" class="custom-control-input">
                          <label class="custom-control-label" for="fiesta-si-1"> Si </label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="fiesta-si-2" name="fiesta" value="3" class="custom-control-input">
                          <label class="custom-control-label" for="fiesta-si-2"> Si, no se permite música después de las 10pm. </label>
                        </div>
                        <div class="custom-control custom-radio">
                          <input type="radio" id="fiesta-si-3" name="fiesta" value="4" class="custom-control-input">
                          <label class="custom-control-label" for="fiesta-si-3"> Si, no se permite música después de las</label>
                          <input type="text" id="hora" name="hora" class="timepicker" placeholder="Música permitida Hasta" disabled> 
                        </div>
                      </div>
                    </div>
                  <?= form_close() ?>
                </div>

                <div class="tab-pane" id="section-fechas">
                  <?= form_open('', ['id' => 'form-4', 'autocomplete' => 'off']) ?>
                    <input type="hidden" name="id" value="">
                    <div class="row">
                      <div class="col-12 col-md-9">
                        <div class="form-group row mb-3">
                          <label for="inicio-1" class="col-form-label"> Fecha Bloqueada 1: del </label>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input type="text" id="inicio-1" name="inicio[]" class="form-control datepicker">
                              <div class="input-group-append">
                                <span class="input-group-text"> <i class="mdi mdi-calendar-remove-outline"></i> </span>
                              </div>
                            </div>
                          </div>
                          <label for="fin-1" class="col-form-label ml-2"> al </label>
                          <div class="col-md-4">
                            <div class="input-group">
                              <input type="text" id="fin-1" name="fin[]" class="form-control datepicker">
                              <div class="input-group-append">
                                <span class="input-group-text"> <i class="mdi mdi-calendar-remove-outline"></i> </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="add-fecha"></div>
                      </div>
                      <div class="col-12 col-md-3">
                        <div class="d-flex justify-content-center align-items-end mb-3 mr-3">
                          <button type="button" class="btn btn-blue" onclick="addBloqueada();">
                            <i class="fa fa-plus"></i> Añadir Fecha 
                          </button>
                        </div>
                      </div>
                    </div>
                  <?= form_close() ?>
                </div>

                <div class="tab-pane" id="section-administrador">
                  <form action="" method="POST" id="form-5" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <p class="text-muted font-14 pb-3">
                      Los campos con <code>asterisco (*)</code> son <code>"Obligatorios"</code>.
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="nombre" class="col-sm-4 col-form-label">* Nombre</label>
                          <div class="col-sm-8">
                            <input type="text" id="nombre" name="nombre" class="form-control text-uppercase">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="paterno" class="col-sm-4 col-form-label">* Apellido Paterno</label>
                          <div class="col-sm-8">
                            <input type="text" id="paterno" name="paterno" class="form-control text-uppercase">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="materno" class="col-sm-4 col-form-label">* Apellido Materno</label>
                          <div class="col-sm-8">
                            <input type="text" id="materno" name="materno" class="form-control text-uppercase">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label for="correo" class="col-sm-2 col-form-label">* Correo</label>
                          <div class="col-sm-10">
                            <input type="email" id="correo" name="correo" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="telefono" class="col-sm-2 col-form-label">* Telefono</label>
                          <div class="col-sm-10">
                            <input type="text" id="telefono" name="telefono" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="form-group row">
                          <label for="foto" class="col-sm-3 col-form-label">* Fotografía del Administrador</label>
                          <div class="col-sm-9">
                            <input type="file" id="foto" name="foto" class="dropify"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                
                <div class="tab-pane" id="section-servicios">
                  <?= form_open('', ['id' => 'form-6', 'autocomplete' => 'off']) ?>
                    <input type="hidden" name="id" value="">
                    <div class="d-flex justify-content-center row mb-3">
                      <div class="col-md-8">
                        <div class="row">
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="internet" name="internet" type="checkbox" value="1">
                            <label for="internet"> Internet </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="cable" name="cable" type="checkbox" value="1">
                            <label for="cable"> Cable </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="luz" name="luz" type="checkbox" value="1">
                            <label for="luz"> Luz </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="agua" name="agua" type="checkbox" value="1">
                            <label for="agua"> Agua </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="gas" name="gas" type="checkbox" value="1">
                            <label for="gas"> Gas </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="cosina" name="cosina" type="checkbox" value="1">
                            <label for="cosina"> Cosina </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="basura" name="basura" type="checkbox" value="1">
                            <label for="basura"> Botes de Basura </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="toallas" name="toallas" type="checkbox" value="1">
                            <label for="toallas"> Toallas </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="papel" name="papel" type="checkbox" value="1">
                            <label for="papel"> Papel Higienico </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="sj" name="sj" type="checkbox" value="1">
                            <label for="sj"> Shampo y Jabon </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="asador" name="asador" type="checkbox" value="1">
                            <label for="asador"> Asador </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="alberca" name="alberca" type="checkbox" value="1">
                            <label for="alberca"> Alberca </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="vigilancia" name="vigilancia" type="checkbox" value="1">
                            <label for="vigilancia"> Vigilancia las 24hrs. </label>
                          </div>
                          <div class="col-sm-3 checkbox checkbox-primary">
                            <input id="jacuzzi" name="jacuzzi" type="checkbox" value="1">
                            <label for="jacuzzi"> Jacuzzi </label>
                          </div>
                          <div class="col-sm-4 checkbox checkbox-primary">
                            <input id="limpieza" name="limpieza" type="checkbox" value="1">
                            <label for="limpieza"> Personal de Limpieza </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?= form_close() ?>
                </div>

                <div class="tab-pane" id="section-mobiliario">
                  <?= form_open('', ['id' => 'form-7', 'autocomplete' => 'off']) ?>
                    <input type="hidden" name="id" value="">
                    <div class="d-flex justify-content-center row mb-3">
                      <div class="col-md-10">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label for="refriguerador" class="col-sm-4 col-form-label"> Refriguerador </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="refriguerador" name="refriguerador" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="frigobar" class="col-sm-4 col-form-label"> Frigobar </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="frigobar" name="frigobar" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="lavadora" class="col-sm-4 col-form-label"> Lavadora </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="lavadora" name="lavadora" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="tv" class="col-sm-4 col-form-label"> Sala TV </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="tv" name="tv" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="cafetera" class="col-sm-4 col-form-label"> Cafetera </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="cafetera" name="cafetera" placeholder="0">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label for="estar" class="col-sm-6 col-form-label"> Sala de Estar </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="estar" name="estar" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="pantalla" class="col-sm-6 col-form-label"> Pantallas de TV </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="pantalla" name="pantalla" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="clima" class="col-sm-6 col-form-label"> Aire Acondicionado </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="clima" name="clima" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="comedor" class="col-sm-6 col-form-label"> Comedor para 6 <br> personas o más </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="comedor" name="comedor" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="licuadora" class="col-sm-6 col-form-label"> Licuadora </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100" id="licuadora" name="licuadora" placeholder="0">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group row">
                              <label for="microondas" class="col-sm-6 col-form-label"> Microondas </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100"id="microondas" name="microondas" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="humo" class="col-sm-6 col-form-label"> Detector de Humo </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100"id="humo" name="humo" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="botiquin" class="col-sm-6 col-form-label"> Botiquín de Primeros Auxilios </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100"id="botiquin" name="botiquin" placeholder="0">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="extintor" class="col-sm-6 col-form-label"> Extintor de Fuego </label>
                              <div class="col-sm-4">
                                <input type="number" class="form-control" min="0" max="100"id="extintor" name="extintor" placeholder="0">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?= form_close() ?>
                </div>

                <ul class="list-inline wizard mb-0">
                  <li class="previous list-inline-item">
                    <button type="button" class="btn btn-secondary">
                      <i class="fa fa-arrow-left"></i> Anterior
                    </button>
                  </li>
                  <li class="next list-inline-item float-right">
                    <button type="button" class="btn btn-secondary">
                      Siguiente <i class="fa fa-arrow-right ml-1"></i>
                    </button>
                  </li>
                  <li class="finish list-inline-item float-right mx-2">
                    <button type="button" class="btn btn-primary">
                      <i class="fa fa-save"></i> Guardar
                    </button>
                  </li>
                </ul>
              </div>
            </div>
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
  <!-- Wizard js-->
  <script src="<?= base_url('public/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') ?>"></script>
  <!-- dropify js -->
  <script src="<?= base_url('public/libs/dropify/dropify.min.js') ?>"></script>
  <!-- Moment js -->
  <script src="<?= base_url('public/libs/moment/moment.js') ?>"></script>
  <!-- Time Picker js -->
  <script src="<?= base_url('public/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') ?>"></script>
  <!-- Bootstrap Datepicker js -->
  <script src="<?= base_url('public/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/bootstrap-datepicker/bootstrap-datepicker.es.js') ?>"></script>
  <!-- JQuery Validation js -->
  <script src="<?= base_url('public/libs/jquery-validation/jquery.validate.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/jquery-validation/additional-methods.min.js') ?>"></script>
  <script src="<?= base_url('public/libs/jquery-validation/localization/messages_es.min.js') ?>"></script>
  <!-- Sweet Alerts js -->
  <script src="<?= base_url('public/libs/sweetalert2/sweetalert2.min.js') ?>"></script>
  <!-- Page Registrar Propiedad js -->
  <script>
    var cantidad = 1;
    var fecha = 1;
    // input radio fiesta input text hora
    $("input[name='fiesta']:radio").on('click', function () {
      if ($("input[id='fiesta-si-3']:radio").is(':checked')) {
        $('#hora').prop("disabled", false);
      } else {
        $('#hora').prop("disabled", true);
      }
    });

    $(document).ready(function() {
      // JQuery Validattion
      $('#form-1').validate({
        lang : 'es',
        rules : {
          propietario : { required : true },
          calle : { required : true },
          externo : { required : true },
          cp : { required : true },
          colonia : { required : true },
          centro : { required : true },
          superficie : { required : true, min: 1 }
        },
        errorPlacement: function (error, element) {
          error.addClass("invalid-feedback");
          error.insertAfter(element);
        },
        highlight: function ( element, errorClass, validClass ) { $( element ).addClass( "is-invalid" ).removeClass( "is-valid" ); },
        unhighlight: function (element, errorClass, validClass) { $( element ).addClass( "is-valid" ).removeClass( "is-invalid" ); },
      });

      $('#form-5').validate({
        lang : 'es',
        rules : {
          nombre : { required : true, minlength : 2, maxlength : 50 },
          paterno : { required : true, minlength : 2, maxlength : 50 },
          materno : { required : true, minlength : 2, maxlength : 50 },
          correo : { required : true },
          telefono : { required : true },
          foto : { required : true }
        },
        errorPlacement: function (error, element) {
          error.addClass("invalid-feedback");
          error.insertAfter(element);
        },
        highlight: function ( element, errorClass, validClass ) { $( element ).addClass( "is-invalid" ).removeClass( "is-valid" ); },
        unhighlight: function (element, errorClass, validClass) { $( element ).addClass( "is-valid" ).removeClass( "is-invalid" ); },
      });

      // Dropify
      $(".dropify").dropify({
        messages : {
          default : "Arrastre y suelte un archivo aquí o haga clic aquí",
          replace : "Arrastra y suelta o haz clic para reemplazar",
          remove : "Quitar",
          error : "Vaya, se agregó algo mal."
        },
        error : {
          fileSize : "El tamaño del archivo es demasiado grande (1 M máx.)"
        }
      });

      // Datepicker
      var getDate = function(input) { return new Date(input.date.valueOf()); }

      $('body').on('focus',".datepicker", function(){
        $(this).datepicker({
          language: 'es',
          format : 'yyyy-mm-dd'
        });
      });

      // Timepicker
      $(".timepicker").timepicker({
        showMeridian : false,
        icons : {
          up : "mdi mdi-chevron-up",
          down : "mdi mdi-chevron-down"
        }
      });

      $(".timepicker").timepicker('setTime', '0:00');

      $('#hora-fin').on('hide.timepicker', function(){
        var inicio = $('#hora-inicio').val();
        var fin = $(this).val();
        inicio = inicio.split(':');
        fin = fin.split(':');
        var horaI = parseInt(inicio[0], 10) == 0 ? 24 : parseInt(inicio[0], 10);
        var minuI = parseInt(inicio[1], 10);
        var horaF = parseInt(fin[0], 10) == 0 ? 24 : parseInt(fin[0], 10);
        var minuF = parseInt(fin[1], 10);

        if (horaF < horaI) {
          Swal.fire(
            '',
            'La Hora de Teminino debe de ser mayor a la Hora de Inicio',
            'warning'
          );
        }

        if (horaI == horaF && minuF >= minuI) {
          Swal.fire(
            '',
            'La Hora de Teminino debe de ser mayor a la Hora de Inicio',
            'warning'
          );
        }
      });

      // Winzard
      $('#rootwizard').bootstrapWizard({
        onTabClick: function(tab, navigation, index) {
          return false;
        },
        onTabShow: function(tab, navigation, index) {
          var $total = navigation.find('li').length;
          var $current = index+1;
          var $percent = ($current/$total) * 100;
          $('#rootwizard .progress-bar').css({width:$percent+'%'});
          $('#rootwizard .progress-bar span').html(Math.round($percent)+'%');

          if(index == 0)
            $('.previous>button').addClass('disabled');
          else
            $('.previous>button').removeClass('disabled');

          if (index == (navigation.find('li').length -1)){ 
            $('.next>button').addClass('d-none');
            $('.finish>button').removeClass('d-none');
          }else{
            $('.next>button').removeClass('d-none');
            $('.finish>button').addClass('d-none');
          }
        },
        onNext : function (tab, navigation, index){
          var wizard = this;
          if (index == 1) {
            if ($("#form-1").valid() === true) {
              $.ajax({
                url : '<?= base_url('api/propiedades') ?>',
                method : 'POST',
                headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: $("#form-1").serialize(),
                success : function (res){
                  var data = res;
                  $('input[name="id"]').val(data.response.propiedadId);
                  $('#rootwizard').bootstrapWizard('show', 1);
                },
                statusCode : {
                  400 : function (res){
                    var data = res;
                    $('#rootwizard').bootstrapWizard('show', index - 1);
                    Swal.fire(
                      data.responseJSON.error_title,
                      data.responseJSON.error_message,
                      'warning'
                    );
                  }, 
                  500 : function (res) {
                    var data = res;
                    $('#rootwizard').bootstrapWizard('show', index - 1);
                    Swal.fire(
                      ''+data.responseJSON.error_title,
                      ''+data.responseJSON.error_message,
                      'warning'
                    );
                    // return false;
                  }
                }
              });
              return false;
            } else {
              $("#form-1").focusInvalid;
              return false;
            }  
          } else if (index == 2) {
            var individual, matrimonial, queen, king, sofacama;
            for (let i = 0; i < cantidad; i++) {
              individual  = $('#individual-'+(i+1)).val();
              matrimonial = $('#matrimonial-'+(i+1)).val();
              queen       = $('#queen-'+(i+1)).val();
              king        = $('#king-'+(i+1)).val();
              sofacama    = $('#sofa-'+(i+1)).val();
              if ( individual == '' && matrimonial == '' && queen == '' && king == '' && sofacama == '') {
                Swal.fire(
                  '',
                  'La recamara '+(i+1)+' debe de tener minimo un tipo de cama.',
                  'warning'
                );
                return false;
              }
            }
            $.ajax({
              url : '<?= base_url('api/propiedades/recamaras') ?>',
              method : 'POST',
              headers: {'X-Requested-With': 'XMLHttpRequest'},
              data: $("#form-2").serialize(),
              success : function (res){
                var data = res;
                console.log(data);
                $('#rootwizard').bootstrapWizard('show', 2);
              },
              statusCode : {
                400 : function (res){
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    data.responseJSON.error_title,
                    data.responseJSON.error_message,
                    'warning'
                  );
                }, 
                500 : function (res) {
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    ''+data.responseJSON.error_title,
                    ''+data.responseJSON.error_message,
                    'warning'
                  );
                }
              }
            });
            return false;
          } else if (index == 3) {
            $.ajax({
              url : '<?= base_url('api/propiedades/reglamento') ?>',
              method : 'POST',
              headers: {'X-Requested-With': 'XMLHttpRequest'},
              data: $("#form-3").serialize(),
              success : function (res){
                var data = res;
                console.log(data);
                $('#rootwizard').bootstrapWizard('show', 3);
              },
              statusCode : {
                400 : function (res){
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    data.responseJSON.error_title,
                    data.responseJSON.error_message,
                    'warning'
                  );
                }, 
                500 : function (res) {
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    ''+data.responseJSON.error_title,
                    ''+data.responseJSON.error_message,
                    'warning'
                  );
                }
              }
            });
            return false;
          } else if (index == 4){
            for (let i = 0; i < cantidad; i++) {
              inicio  = $('#inicio-'+(i+1)).val();
              fin = $('#fin-'+(i+1)).val();
              if (inicio == '' && fin != '') {
                Swal.fire(
                  '',
                  'En Fecha Bloqueada '+(i+1)+' Ingrese una fecha de inicio.',
                  'warning'
                );
                return false;
              } else if (inicio != '' && fin == '') {
                Swal.fire(
                  '',
                  'En Fecha Bloqueada '+(i+1)+' Ingrese una fecha de finalización.',
                  'warning'
                );
                return false;
              }
            }
            $.ajax({
              url : '<?= base_url('api/propiedades/fechas-bloqueadas') ?>',
              method : 'POST',
              headers: {'X-Requested-With': 'XMLHttpRequest'},
              data: $("#form-4").serialize(),
              success : function (res){
                var data = res;
                console.log(data);
                $('#rootwizard').bootstrapWizard('show', 4);
              },
              statusCode : {
                400 : function (res){
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    data.responseJSON.error_title,
                    data.responseJSON.error_message,
                    'warning'
                  );
                }, 
                500 : function (res) {
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    ''+data.responseJSON.error_title,
                    ''+data.responseJSON.error_message,
                    'warning'
                  );
                }
              }
            });
            return false;
          } else if (index == 5) {
            if($("#form-5").valid() === true) {
              var fd = new FormData();
              var file = $('#foto')[0].files;

              fd.append('foto', file[0]);
              fd.append('nombre', $('#nombre').val());
              fd.append('paterno', $('#paterno').val());
              fd.append('materno', $('#materno').val());
              fd.append('correo', $('#correo').val());
              fd.append('telefono', $('#telefono').val());

              $.ajax({
                url : '<?= base_url('api/propiedades/administrador') ?>',
                method : 'POST',
                // headers: {'X-Requested-With': 'XMLHttpRequest'},
                data: fd,
                contentType: false,
                processData: false,
                success : function (res){
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', 5);
                },
                statusCode : {
                  400 : function (res){
                    var data = res;
                    console.log(data);
                    $('#rootwizard').bootstrapWizard('show', index - 1);
                    Swal.fire(
                      data.responseJSON.error_title,
                      data.responseJSON.error_message,
                      'warning'
                    );
                  }, 
                  500 : function (res) {
                    var data = res;
                    console.log(data);
                    $('#rootwizard').bootstrapWizard('show', index - 1);
                    Swal.fire(
                      ''+data.responseJSON.error_title,
                      ''+data.responseJSON.error_message,
                      'warning'
                    );
                  }
                }
              });
              return false;
            } else {
              $("#form-5").focusInvalid;
              return false;
            }
          } else if (index == 6) {
            $.ajax({
              url : '<?= base_url('api/propiedades/servicios') ?>',
              method : 'POST',
              headers: {'X-Requested-With': 'XMLHttpRequest'},
              data: $("#form-6").serialize(),
              success : function (res){
                var data = res;
                console.log(data);
                $('#rootwizard').bootstrapWizard('show', 6);
              },
              statusCode : {
                400 : function (res){
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    data.responseJSON.error_title,
                    data.responseJSON.error_message,
                    'warning'
                  );
                }, 
                500 : function (res) {
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    ''+data.responseJSON.error_title,
                    ''+data.responseJSON.error_message,
                    'warning'
                  );
                }
              }
            });
          } else if (index == 7) {
            $.ajax({
              url : '<?= base_url('api/propiedades/mobiliario') ?>',
              method : 'POST',
              headers: {'X-Requested-With': 'XMLHttpRequest'},
              data: $("#form-7").serialize(),
              success : function (res){
                var data = res;
                console.log(data);
                location.href ="<?= base_url('propiedades') ?>";
              },
              statusCode : {
                400 : function (res){
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    data.responseJSON.error_title,
                    data.responseJSON.error_message,
                    'warning'
                  );
                }, 
                500 : function (res) {
                  var data = res;
                  console.log(data);
                  $('#rootwizard').bootstrapWizard('show', index - 1);
                  Swal.fire(
                    ''+data.responseJSON.error_title,
                    ''+data.responseJSON.error_message,
                    'warning'
                  );
                }
              }
            });
          }
        }
      });

      $('#rootwizard .finish').click(function() {
        alert('Guardar Información');
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

      $.ajax({
        type : 'GET',
        url : "<?= base_url('api/propietarios') ?>",
        headers: {'X-Requested-With': 'XMLHttpRequest'},
        success : function (res) {
          var data = res;
          var opciones = $('#propietario');
          opciones.append($("<option />").val('').text('SELECCIONE'));
          $.each(data, function () {
            opciones.append($("<option />").val(this.id).text(this.propietario));
          });
        }
      });
    });

    // Añadir Recamara
    function addRoom(){
      cantidad = cantidad + 1;
      var html = `
      <div class="form-row mb-3">
        <div class="col-sm-3">
          <h3>Recamara ${cantidad}</h3>
        </div>
        <div class="form-group col-md-3 row">
          <label for="municipio" class="col-12 col-form-label">Baño con Regaderas</label>
          <div class="custom-control custom-radio col-sm-6">
            <input type="radio" id="regadera-si-${cantidad}" name="recamaraRegadera[${cantidad}]" value="1" class="custom-control-input">
            <label class="custom-control-label" for="regadera-si-${cantidad}"> Si </label>
          </div>
          <div class="custom-control custom-radio col-sm-6">
            <input type="radio" id="regadera-no-${cantidad}" name="recamaraRegadera[${cantidad}]" value="0" class="custom-control-input" checked>
            <label class="custom-control-label" for="regadera-no-${cantidad}"> No </label>
          </div>
        </div>
        <div class="form-group col-md-3 row">
          <label for="municipio" class="col-12 col-form-label">Baño sin Regaderas</label>
          <div class="custom-control custom-radio col-sm-6">
            <input type="radio" id="bano-si-${cantidad}" name="recamaraBano[${cantidad}]" value="1" class="custom-control-input">
            <label class="custom-control-label" for="bano-si-${cantidad}"> Si </label>
          </div>
          <div class="custom-control custom-radio col-sm-6">
            <input type="radio" id="bano-no-${cantidad}" name="recamaraBano[${cantidad}]" value="0" class="custom-control-input" checked>
            <label class="custom-control-label" for="bano-no-${cantidad}"> No </label>
          </div>
        </div>
        <div class="form-group col-sm-12 col-md-3">
          <label for="individual-${cantidad}" class="col form-label">No. de Camas Individuales</label>
          <input type="number" id="individual-${cantidad}" name="individual[]" class="form-control" placeholder="0" min="1" max="100">
        </div>
        <div class="form-group col-sm-12 col-md-3">
          <label for="matrimonial-${cantidad}" class="col form-label">No. de Camas Matrimoniales</label>
          <input type="number" id="matrimonial-${cantidad}" name="matrimonial[]" class="form-control" placeholder="0" min="1" max="100">
        </div>
        <div class="form-group col-sm-12 col-md-3">
          <label for="queen-${cantidad}" class="col form-label">No. de Camas Queen size</label>
          <input type="number" id="queen-${cantidad}" name="queen[]" class="form-control" placeholder="0" min="1" max="100">
        </div>
        <div class="form-group col-sm-12 col-md-3">
          <label for="king-${cantidad}" class="col form-label">No. de Camas King size</label>
          <input type="number" id="king-${cantidad}" name="king[]" class="form-control" placeholder="0" min="1" max="100">
        </div>
        <div class="form-group col-sm-12 col-md-3">
          <label for="sofa-${cantidad}" class="col form-label">No. de Sofa Cama</label>
          <input type="number" id="sofa-${cantidad}" name="sofa[]" class="form-control" placeholder="0" min="1" max="100">
        </div>
      </div>`;
      $('#add-recamara').append(html);
    }

    // Añadir Fecha Bloqueada
    function addBloqueada(){
      fecha = fecha + 1;
      var html = `
      <div class="form-group row mb-3">
        <label for="inicio-${fecha}" class="col-form-label"> Fecha Bloqueada ${fecha}: del </label>
        <div class="col-md-4">
          <div class="input-group">
            <input type="text" id="inicio-${fecha}" name="inicio[]" class="form-control datepicker">
            <div class="input-group-append">
              <span class="input-group-text"> <i class="mdi mdi-calendar-remove-outline"></i> </span>
            </div>
          </div>
        </div>
        <label for="fin-${fecha}" class="col-form-label ml-2"> al </label>
        <div class="col-md-4">
          <div class="input-group">
            <input type="text" id="fin-${fecha}" name="fin[]" class="form-control datepicker">
            <div class="input-group-append">
              <span class="input-group-text"> <i class="mdi mdi-calendar-remove-outline"></i> </span>
            </div>
          </div>
        </div>
      </div>`;
      $('#add-fecha').append(html);
    }
  </script>
<?= $this->endSection() ?>