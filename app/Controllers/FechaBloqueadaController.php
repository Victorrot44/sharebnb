<?php
namespace App\Controllers;

use App\Models\FechaBloqueadaModel;

class FechaBloqueadaController extends BaseController {
  public function __construct() {
    $this->model = new FechaBloqueadaModel();
  }

  public function guardarFechaBloqueada() {
    // Obtener los datos
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

    return $this->response->setStatusCode(201);
  }
}
