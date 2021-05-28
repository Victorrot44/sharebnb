<?php

namespace App\Controllers;

class DireccionController extends BaseController {
  public function __construct() {
    $this->db = \Config\Database::connect();
    $this->table = 'tipo_telefono';
  }

  public function obtenerColoniasPorCP(int $cp) {
    // Consultar en la Base de Datos
    $builder = $this->db->table('colonia');
    $builder->select('coloniaId AS id, UPPER(coloniaNombre) AS colonia');
    $builder->where('coloniaCp', $cp);
    
    $res = [
      'error'         => false,
      'code_error'    => 0,
      'error_title'   => '',
      'error_message' => '',
      'response'      => $builder->get()->getResult()
    ];

    return $this->response->setStatusCode(200)->setJSON($res);
  }

  public function obtenerEstadoPorColonia() {
    $colonia = $this->request->getGet('colonia');

    $sql = "SELECT estadoNombre AS estado FROM estado WHERE estadoId = (SELECT ColoniaEstadoId FROM colonia WHERE coloniaId = ". $colonia .")";
    // Consultar en la Base de Datos
    $builder = $this->db->query($sql);

    $res = [
      'error'         => false,
      'code_error'    => 0,
      'error_title'   => '',
      'error_message' => '',
      'response'      => $builder->getResult()
    ];

    return $this->response->setStatusCode(200)->setJSON($res);
  }

  public function obtenerMunicipioPorColonia() {
    // Consultar en la Base de Datos
    $colonia = $this->request->getGet('colonia');

    $sql = "SELECT municipioNombre AS municipio FROM municipio WHERE municipioId = (SELECT ColoniaMunicipioId FROM colonia WHERE coloniaId = ". $colonia .")";
    // Consultar en la Base de Datos
    $builder = $this->db->query($sql);

    $res = [
      'error'         => false,
      'code_error'    => 0,
      'error_title'   => '',
      'error_message' => '',
      'response'      => $builder->getResult()
    ];

    return $this->response->setStatusCode(200)->setJSON($res);
  }
}
