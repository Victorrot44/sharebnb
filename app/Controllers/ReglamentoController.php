<?php
namespace App\Controllers;

use App\Models\ReglamentoModel;

class ReglamentoController extends BaseController {
  public function __construct() {
    $this->model = new ReglamentoModel();
  }

  public function guardarReglamento() {
    // Obtener los datos
    $id         = $this->request->getPost('id');
    $horaInicio = $this->request->getPost('horaInicio');
    $horaFin    = $this->request->getPost('horaFin');
    $anticipo   = $this->request->getPost('anticipacion');
    $fumar      = $this->request->getPost('fumar');
    $mascota    = $this->request->getPost('mascota');
    $fiesta     = $this->request->getPost('fiesta');
    $hora       = $this->request->getPost('hora');

    $data = [
      'reglamentoPropiedadId'       => $id, 
      'reglamentoAccesoIncio'       => $horaInicio, 
      'reglamentoAccesoFin'         => $horaFin,
      'reglamentoFumar'             => $fumar, 
      'reglamentoMascotas'          => $mascota, 
      'reglamentoFiesta'            => $fiesta,
      'reglamentoHoraMusica'        => $hora, 
      'reglamentoAnticipacionRenta' => $anticipo
    ];

    $this->model->nuevoRegistro($data);

    return $this->response->setStatusCode(201);
  }
}
