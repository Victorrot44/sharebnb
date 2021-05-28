<?php
namespace App\Controllers;

use App\Models\RecamaraModel;

class RecamaraController extends BaseController {
  public function __construct() {
    $this->model = new RecamaraModel();
  }

  public function guardarRecamaras() {
    // Obtener los datos
    $id           = $this->request->getPost('id');
    $regadera     = $this->request->getPost('recamaraRegadera');
    $medioBano    = $this->request->getPost('recamaraBano');
    $individual   = $this->request->getPost('individual');
    $metrimonial  = $this->request->getPost('matrimonial');
    $queen        = $this->request->getPost('queen');
    $king         = $this->request->getPost('king');
    $sofa         = $this->request->getPost('sofa');

    for ($i=0; $i < count($regadera) ; $i++):
      $data = [
        'recamaraPropiedadId' => $id,
        'recamaraRegadera'    => $regadera[($i+1)],
        'recamaraBano'        => $medioBano[($i+1)],
        'recamaraIndividual'  => $individual[$i],
        'recamaraMatrimonial' => $metrimonial[$i],
        'recamaraQueen'       => $queen[$i],
        'recamaraKing'        => $king[$i],
        'recamaraSofaCama'    => $sofa[$i],
      ];
      $this->model->nuevoRegistro($data);
    endfor;

    return $this->response->setStatusCode(201);
  }
}
