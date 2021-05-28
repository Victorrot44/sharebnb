<?php
namespace App\Models;

use CodeIgniter\Model;

class FechaBloqueadaModel extends Model {

  protected $table      = 'fechabloqueada';
  protected $primaryKey = 'bloqueoId';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object'; // array | object | Endity
  protected $useSoftDeletes = true;

  protected $allowedFields = ['bloqueoPropiedadId', 'bloqueoInicio', 'bloqueoFin'];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules    = [];
  protected $validationMessages = [];
  protected $skipValidation     = true;

  protected $beforeInsert = []; // Antes de Insertar
  protected $afterInsert  = []; // Despues de Insertar
  protected $beforeUpdate = []; // Antes de Actualizar
  protected $afterUpdate  = []; // Despues de Actualizar
  protected $afterFind    = []; // Despues de Buscar
  protected $afterDelete  = []; // Despues de Eliminar

  public function __construct(){
    parent::__construct();
    $this->db = db_connect();
  }

  public function nuevoRegistro ($data) {
    return $this->insert($data);
  }

  public function actualizarRegistro(int $id, Array $data) {
    $this->update($id, $data);
  }

  public function eliminarRegistro(int $id) {
    return $this->delete($id);
  }

}