<?php

namespace App\API\Validaciones;

use App\Controllers\BaseController;

class Asincronas extends BaseController {
  /**
   * Costructor
   */
  public function __construct() { }

	public function email_propietario_is_unique() {
    if (!$this->validate(['email'    => 'is_unique[propietario.propietarioCorreo]'])):
      $res = [
        'error'         => false,
        'code_error'    => 0,
        'error_title'   => '',
        'error_message' => '',
        'response'      => false
      ];
      return $this->response->setStatusCode(200)->setJSON($res);
    endif;
    $res = [
      'error'         => false,
      'code_error'    => 0,
      'error_title'   => '',
      'error_message' => '',
      'response'      => true
    ];
    return $this->response->setStatusCode(200)->setJSON($res);
  }

  public function concepto_fecha_especial_is_unique() {
    if (!$this->validate(['concepto' => 'is_unique[fecha_especial.especialConcepto]'])):
      return $this->response->setStatusCode(200)->setBody("false");
    endif;
    return $this->response->setStatusCode(200)->setBody("true");
  }
}
