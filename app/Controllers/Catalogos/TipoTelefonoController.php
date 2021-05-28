<?php

namespace App\Controllers\Catalogos;

use App\Controllers\BaseController;

class TipoTelefonoController extends BaseController {

  public function __construct() {
    $this->db = \Config\Database::connect();
    $this->table = 'tipo_telefono';
  }

	public function index() {
    $data['title'] = 'Tipos de Teléfono';
    return view('Catalogos/tipo-telefono', $data);
  }

  public function guardarTipoTelefono() {
    // Obtener datos
    $tipo_telefono = trim(strip_tags($this->request->getPost('concepto')));

    // Validar Datos.
    if (!$this->validate(['concepto' => 'required|is_unique[tipo_telefono.tipoTelefonoTipo]'])):
      $res = [
        'error'         => true,
        'code_error'    => 400,
        'error_title'   => 'Invalid Form Validation',
        'error_message' => null,
        'response'      => $this->validator->getErrors()
      ];
      return $this->response->setStatusCode(400)->setJSON($res);
    endif;

    // Guardar Información en la Base de Datos
    $builder = $this->db->table($this->table);
    $data = ['tipoTelefonoTipo' => $tipo_telefono];

    try {
      $builder->insert($data);
    } catch (\Throwable $th) {
      $res = [
        'error'         => true,
        'code_error'    => 500,
        'error_title'   => 'Internal Server Error',
        'error_message' => 'Ha ocurrido un problema al guardar la información',
        'response'      => null
      ];
      return $this->response->setStatusCode(500)->setJSON($res);
    }

    return $this->response->setStatusCode(201);
  }

  public function obtenerTiposDeTelefonos() {
    // Consultar en la Base de Datos
    $builder = $this->db->table($this->table);
    $res = [
      'error'         => false,
      'code_error'    => null,
      'error_title'   => null,
      'error_message' => null,
      'response'      => $builder->get()->getResult()
    ];
    return $this->response->setStatusCode(200)->setJSON($res);
  }

  public function obtenerTabla() {
    // Consultar en la Base de Datos
    $builder = $this->db->table($this->table);
    $data = $builder->get()->getResult();
    $tabla = '';
    foreach($data as $item):
      $accion = '<div class=\"custom-control custom-radio\">';
      $accion .= '<input type=\"radio\" id=\"row-'.$item->tipoTelefonoId.'\" name=\"id\" class=\"custom-control-input radio-edit\" value=\"'.$item->tipoTelefonoId.'\">';
      $accion .= '<label class=\"custom-control-label\" for=\"row-'.$item->tipoTelefonoId.'\"> </label> </div>';
      $tabla .= '{
        "concepto" : "'.$item->tipoTelefonoTipo.'",
        "acciones" : "'.$accion.'"
      },';
    endforeach;
    $tabla = substr($tabla, 0, strlen($tabla) - 1);
    $result = '{"data" : ['. $tabla .']}';
    return $this->response->setStatusCode(200)->setBody($result);
  }

  public function eleminarTipoTelefono(int $id) {
    try {
      $this->db->query("DELETE FROM tipo_telefono WHERE tipoTelefonoId = ". $id);
    } catch (\Throwable $th) {
      $res = [
        'error'         => true,
        'code_error'    => 404,
        'error_title'   => 'Info Not Found',
        'error_message' => 'EL registro no existe',
        'response'      => $th
      ];
      return $this->response->setStatusCode(404)->setJSON($res);
    }
    return $this->response->setStatusCode(200);
  }

  public function actualizarTipoTelefono(int $id) {
    // Obtener datos
    $tipo_telefono = trim(strip_tags(strtoupper($this->request->getJsonVar('concepto', true))));

    // Validar Datos.
    if (!$this->validate(['concepto' => 'required|is_unique[tipo_telefono.tipoTelefonoTipo]'])):
      $res = [
        'error'         => true,
        'code_error'    => 400,
        'error_title'   => 'Invalid Form Validation',
        'error_message' => null,
        'response'      => $this->validator->getErrors()
      ];
      return $this->response->setStatusCode(400)->setJSON($res);
    endif;

    // Actualizar Registro.
    $builder = $this->db->table($this->table);
    $builder->set('tipoTelefonoTipo', $tipo_telefono);
    $builder->where('tipoTelefonoId', $id);
    try {
      $builder->update();
    } catch (\Throwable $th) {
      $res = [
        'error'         => true,
        'code_error'    => 500,
        'error_title'   => 'Internal Server Error',
        'error_message' => 'Ha ocurrido un problema al modificar el registro.',
        'response'      => $th
      ];
      return $this->response->setStatusCode(500)->setJSON($res);
    }

    $respuesta = [ "messaje" => "EL registro a sido actualizado exitosamente." ];

    $res = [
      'error'         => false,
      'code_error'    => 0,
      'error_title'   => '',
      'error_message' => '',
      'response'      => $respuesta
    ];
    return $this->response->setStatusCode(201)->setJSON($res);
  }
}