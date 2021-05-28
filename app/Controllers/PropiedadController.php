<?php
namespace App\Controllers;

use App\Models\PropiedadModel;

class PropiedadController extends BaseController {
  /**
   * Costructor
   */
  public function __construct() {
    $this->model = new PropiedadModel();
  }

	public function index() {
    $data['title'] = 'Propiedades';
    return view('propiedades', $data);
  }

  public function nuevaPropiedad() {
    $data['title'] = 'Nueva Propiedad';
    return view('registrarPropiedad', $data);
  }

  public function modificarPropiedad(int $id) {
    $data['title'] = 'Actualizar Información';
    return view('actualizarPropiedad', $data);
  }

  public function infoPropiedad(int $id) {
    $data['title'] = 'Información Detallada de la Propiedad';
    return view('infoPropiedad');
  }

  public function guardarNuevaPropiedad() {
    // Validar Datos
    if (!$this->validate(
      [
        'propietario' => 'required|is_natural_no_zero',
        'calle'       => 'required|max_length[150]',
        'externo'     => 'required',
        'colonia'     => 'required',
        'centro'      => 'required|is_natural',
        'superficie'  => 'required|is_natural_no_zero'
      ]
    )):
      $res = [
        'error'         => true,
        'code_error'    => 400,
        'error_title'   => 'Invalid Form Validation',
        'error_message' => null,
        'response'      => $this->validator->getErrors()
      ];
      return $this->response->setStatusCode(400)->setJSON($res);
    endif;
    // Obtener los datos
    $data = [
      'propiedadPropietarioId'  => trim(filter_var($this->request->getPost('propietario'), FILTER_SANITIZE_STRING)),
      'propiedadCalle'          => trim(strtoupper(filter_var($this->request->getPost('calle'), FILTER_SANITIZE_STRING))),
      'propiedadExt'            => trim(filter_var($this->request->getPost('externo'), FILTER_SANITIZE_STRING)),
      'propiedadInt'            => trim(filter_var($this->request->getPost('interno'), FILTER_SANITIZE_STRING)),
      'propiedadColoniaId'      => trim(filter_var($this->request->getPost('colonia'), FILTER_SANITIZE_STRING)),
      'propiedadMapa'           => trim($this->request->getPost('mapa')),
      'propiedadDistanciaCentro'=> trim($this->request->getPost('centro')),
      'propiedadRegadera'       => trim($this->request->getPost('regadera')),
      'propiedadMedioBano'      => trim($this->request->getPost('bano')),
      'propiedadResidencial'    => $this->request->getPost('residencial'),
      'propiedadGolf'           => $this->request->getPost('golf'),
      'propiedadEstacionamiento'=> $this->request->getPost('estacionamiento'),
      'propiedadSuperficie'     => $this->request->getPost('superficie')
    ];
    // Guardar Información
    $id['propiedadId'] = $this->model->nuevoRegistro($data);
    if ($id['propiedadId'] > 0):
      $res = [
        'error'         => false,
        'code_error'    => 0,
        'error_title'   => '',
        'error_message' => '',
        'response'      => $id
      ];
      return $this->response->setStatusCode(200)->setJSON($res);
    else:
      $res = [
        'error'         => true,
        'code_error'    => 500,
        'error_title'   => 'Internal Server Error',
        'error_message' => 'Ha ocurrido un problema al guardar la información',
      ];
      return $this->response->setStatusCode(500)->setJSON($res);
    endif;
  }
}
