<?php

namespace App\Controllers;

use App\Models\PropietarioModel;

class PropietarioController extends BaseController {
  /**
   * Costructor
   */
  public function __construct() {
    $this->model = new PropietarioModel();
    $this->db = \Config\Database::connect();
  }

	public function index() {
    return view('');
  }

  public function propietarios() {
    $data['title'] = 'Propietarios';
    return view('propietarios', $data);
  }

  public function nuevoPropietario() {
    $data['title'] = 'Registrar Propietario';
    return view('registrarPropietario', $data);
  }

  public function editarPropietario(int $id) {
    $data['title'] = 'Actualizar Propietario';
    $data['info'] = $this->model->getInfoById($id);
    return view('actualizarPropietario', $data);
  }

  public function actualizarPropietario(int $id) {
    if (!$this->validate(
      [
        'nombre'    => 'required|min_length[2]|max_length[50]',
        'paterno'   => 'required|min_length[2]|max_length[50]',
        'materno'   => 'required|min_length[2]|max_length[50]',
        'calle'     => 'required|max_length[150]',
        'externo'   => 'required',
        'cp'        => 'required|integer|exact_length[5]',
        'colonia'   => 'required',
        'correo'    => 'required',
        'rfc'       => 'required',
        'cuenta'    => 'required|integer|min_length[15]|max_length[16]',
        'clabe'     => 'required',
        'ine'       => 'required',
      ]
    )):
      return redirect()->back()->withInput();
    endif;

    // Obtener los datos (Tabla propietario)
    $data = [
      'propietarioNombre'     => trim(strtoupper(filter_var($this->request->getPost('nombre'), FILTER_SANITIZE_STRING))),
      'propietarioApePaterno' => trim(strtoupper(filter_var($this->request->getPost('paterno'), FILTER_SANITIZE_STRING))),
      'propietarioApeMaterno' => trim(strtoupper(filter_var($this->request->getPost('materno'), FILTER_SANITIZE_STRING))),
      'propietarioCalle'      => trim(strtoupper(filter_var($this->request->getPost('calle'), FILTER_SANITIZE_STRING))),
      'propietarioCorreo'     => trim(filter_var($this->request->getPost('correo'), FILTER_SANITIZE_STRING)),
      'propietarioExt'        => trim(filter_var($this->request->getPost('externo'), FILTER_SANITIZE_STRING)),
      'propietarioInt'        => trim(filter_var($this->request->getPost('interno'), FILTER_SANITIZE_STRING)),
      'propietarioColoniaId'  => trim(filter_var($this->request->getPost('colonia'), FILTER_SANITIZE_STRING))
    ];

    $password = trim(strtoupper(filter_var($this->request->getPost('password'))));
    if (empty($password)):
      $data['propietarioPassword'] = $password;
    endif;
    // Guardar Cambios
    $this->model->updateRegister($id, $data);

    // Obtener los datos (Tabla datos_bancarios)
    $dataBank = [
      'bancariosClabe'  => trim(strtoupper(filter_var($this->request->getPost('clabe'), FILTER_SANITIZE_STRING))),
      'bancariosCuenta' => trim(filter_var($this->request->getPost('cuenta'), FILTER_SANITIZE_STRING)),
      'bancariosINE	'   => trim(strtoupper(filter_var($this->request->getPost('ine'), FILTER_SANITIZE_STRING))),
      'bancariosRFC'    => trim(strtoupper(filter_var($this->request->getPost('rfc'), FILTER_SANITIZE_STRING))),
    ];

    // Guardar Cambios
    $this->model->updateDataBank($id, $dataBank);

    // Obtener los datos (Tabla telefono)
    $telefonos  = $this->request->getPost('telefono');
    $tipo       = $this->request->getPost('tipo');
    // Eliminiar telefonos
    try {
      $this->db->query("DELETE FROM telefono WHERE telefonoPropietarioId = ". $id);
    } catch (\Throwable $th) {
      var_dump($th);
    }
    // Guardar telefonso
    for ($i=0; $i < count($telefonos) ; $i++) { 
      $dataContact = [
        'telefonoPropietarioId' => $id,
        'telefonoNumero'        => $telefonos[$i],
        'telefonoTipoTelefono'  => $tipo[$i]
      ];
      $this->model->dataContact($dataContact);
    }
    // redireccionar
    return redirect()->to('/propietarios');
  }

  public function guardarNuevoPropietario() {
    // Validar Datos.
    if (!$this->validate(
      [
        'nombre'    => 'required|min_length[2]|max_length[50]',
        'paterno'   => 'required|min_length[2]|max_length[50]',
        'materno'   => 'required|min_length[2]|max_length[50]',
        'calle'     => 'required|max_length[150]',
        'externo'   => 'required',
        'cp'        => 'required|integer|exact_length[5]',
        'colonia'   => 'required',
        'rfc'       => 'required',
        'cuenta'    => 'required|integer|min_length[15]|max_length[16]',
        'clabe'     => 'required',
        'ine'       => 'required',
        'correo'    => 'required|valid_email|is_unique[propietario.propietarioCorreo]',
        'password'  => 'required|min_length[8]|max_length[20]'
      ]
    )):
      return redirect()->back()->withInput();
    endif;

    //  Obtener Datos (Tabla Propietario)
    $data = [
      'propietarioNombre'     => trim(strtoupper(filter_var($this->request->getPost('nombre'), FILTER_SANITIZE_STRING))),
      'propietarioApePaterno' => trim(strtoupper(filter_var($this->request->getPost('paterno'), FILTER_SANITIZE_STRING))),
      'propietarioApeMaterno' => trim(strtoupper(filter_var($this->request->getPost('materno'), FILTER_SANITIZE_STRING))),
      'propietarioCorreo'     => trim(filter_var($this->request->getPost('correo'), FILTER_SANITIZE_STRING)),
      'propietarioCalle'      => trim(strtoupper(filter_var($this->request->getPost('calle'), FILTER_SANITIZE_STRING))),
      'propietarioExt'        => trim(filter_var($this->request->getPost('externo'), FILTER_SANITIZE_STRING)),
      'propietarioInt'        => trim(filter_var($this->request->getPost('interno'), FILTER_SANITIZE_STRING)),
      'propietarioColoniaId'  => trim(filter_var($this->request->getPost('colonia'), FILTER_SANITIZE_STRING)),
      'propietarioPassword'   => trim(filter_var($this->request->getPost('password'), FILTER_SANITIZE_STRING)),
    ];

    $id = $this->model->newRegister($data);

    // Obtener Datos (Datos Bancarios)
    $dataBank = [
      'bancariosPropietarioId'  => $id,
      'bancariosClabe'  => trim(strtoupper(filter_var($this->request->getPost('clabe'), FILTER_SANITIZE_STRING))),
      'bancariosCuenta' => trim(filter_var($this->request->getPost('cuenta'), FILTER_SANITIZE_STRING)),
      'bancariosINE	'   => trim(strtoupper(filter_var($this->request->getPost('ine'), FILTER_SANITIZE_STRING))),
      'bancariosRFC'    => trim(strtoupper(filter_var($this->request->getPost('rfc'), FILTER_SANITIZE_STRING))),
    ];

    $this->model->dataBank($dataBank);

    //  Obtener Datos (Teléfonos)
    $telefonos = $this->request->getPost('telefono');
    $tipo_telefonos = $this->request->getPost('tipo');
    for ($i=0; $i < count($telefonos) ; $i++) { 
      $dataContact = [
        'telefonoPropietarioId' => $id,
        'telefonoNumero'        => $telefonos[$i],
        'telefonoTipoTelefono'  => $tipo_telefonos[$i]
      ];
      $this->model->dataContact($dataContact);
    }

    return redirect()->to('/propietarios');
  }

  public function crearTabla() {
    $data = $this->model->paraTabla();
    $tabla = '';
    foreach($data as $item):
      $accion = '<div class=\"custom-control custom-radio\">';
      $accion .= '<input type=\"radio\" id=\"row-'.$item->id.'\" name=\"id\" class=\"custom-control-input\" value=\"'.$item->id.'\">';
      $accion .= '<label class=\"custom-control-label\" for=\"row-'.$item->id.'\"> Seleccionar </label> </div>';
      $tabla .= '{
        "propietario" : "'.$item->propietario.'",
        "direccion" : "'.$item->direccion.'",
        "telefonos" : "'.$item->telefonos.'",
        "acciones" : "'.$accion.'"
      },';
    endforeach;
    $tabla = substr($tabla, 0, strlen($tabla) - 1);
    $result = '{"data" : ['. $tabla .']}';
    return $this->response->setStatusCode(200)->setBody($result);
  }

  public function eleminarPropietario(int $id) {
    $this->model->deleteRegister($id);
    return $this->response->setStatusCode(200);
  }

  public function infoPropietarioId(int $id) {
    $data = $this->model->info($id);
    return $this->response->setStatusCode(200)->setJSON($data);
  }

  public function propietarioFullname() {
    $data = $this->model->paraTabla();
    return $this->response->setStatusCode(200)->setJSON($data);
  }
}
