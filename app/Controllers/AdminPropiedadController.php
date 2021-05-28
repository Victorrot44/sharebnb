<?php
namespace App\Controllers;

use App\Models\AdminPropiedadModel;

class AdminPropiedadController extends BaseController {
  public function __construct() {
    $this->model = new AdminPropiedadModel();
  }

  public function guardarAdmin() {
    // Validar Datos
    if (!$this->validate(
      [
        'nombre'    => 'required|max_length[60]|min_length[2]',
        'paterno'   => 'required|max_length[60]|min_length[2]',
        'materno'   => 'required|max_length[60]|min_length[2]',
        'telefono'  => 'required',
        'correo'    => 'required|valid_email|is_unique[propietario.propietarioCorreo]|is_unique[administradorPropiedad.administradorCorreo]',
        'foto'      => 'uploaded[foto]|max_size[foto,1024]'
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
    /*
    $id     = $this->request->getPost('id');
    $inicio = $this->request->getPost('inicio');
    $fin    = $this->request->getPost('fin');

    for ($i = 0; $i < count($inicio); $i++):
      $data = [
        'bloqueoPropiedadId' => $id,
        'bloqueoInicio'     => $inicio[$i],
        'bloqueoFin'        => $fin[$i],
      ];

      $this->model->nuevoRegistro($data);
    endfor;
    */

    return $this->response->setStatusCode(201)->setJSON($_POST);
  }
}
