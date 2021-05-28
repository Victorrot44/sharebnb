<?php
namespace App\Models\Catalogos;

use CodeIgniter\Model;

class FechaEspecialModel extends Model {

  protected $table      = 'fechaEspecial';
  protected $primaryKey = 'especialId';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object'; // array | object | Endity
  protected $useSoftDeletes = true;

  protected $allowedFields = ['especialConcepto', 'especialDiaInicio', 'especialMesInicio', 'especialDiaFin', 'especialMesFin'];

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

  public function guardar(Array $data) { return $this->insert($data); }

  public function obtenerPorId(int $id) { return $this->find($id); }

  public function obtenerTodo(){ return $this->findAll(); }

  public function eliminar(int $id) { return $this->delete($id); }

  public function modificar(int $id, Array $data) { return $this->update($id, $data); }

}