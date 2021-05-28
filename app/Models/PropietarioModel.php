<?php

namespace App\Models;

use CodeIgniter\Model;

class PropietarioModel extends Model {

  protected $table      = 'propietario';
  protected $primaryKey = 'propietarioId';

  protected $useAutoIncrement = true;

  protected $returnType     = 'object'; // array | object | Endity
  protected $useSoftDeletes = true;

  protected $allowedFields = [
                                'propietarioNombre', 'propietarioApePaterno',
                                'propietarioApeMaterno', 'propietarioCorreo',
                                'propietarioCalle', 'propietarioExt', 'propietarioInt',
                                'propietarioColoniaId', 'propietarioPassword'
                              ];

  protected $useTimestamps = true;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules    = [
    'propietarioNombre'     => 'required|min_length[2]|max_length[50]', 
    'propietarioApePaterno' => 'required|min_length[2]|max_length[50]',
    'propietarioApeMaterno' => 'required|min_length[2]|max_length[50]', 
    'propietarioCorreo'     => 'required|valid_email|is_unique[propietario.propietarioCorreo]',
    'propietarioCalle'      => 'required|max_length[150]', 
    'propietarioExt'        => 'required', 
    'propietarioInt'        => 'required',
    'propietarioColoniaId'  => 'required', 
    'propietarioPassword'   => 'required'
  ];
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

  public function newRegister ($data) {
    return $this->insert($data);
  }

  public function updateRegister(int $id, Array $data) {
    $this->update($id, $data);
  }

  public function dataBank(Array $data) {
    $builder = $this->db->table('datosBancarios');
    $builder->set($data);
    $builder->insert();
  }

  public function updateDataBank(int $id, Array $data) {
    $builder = $this->db->table('datosBancarios');
    $builder->where('bancariosPropietarioId', $id);
    $builder->update($data);
  }

  public function dataContact(Array $data){
    $builder = $this->db->table('telefono');
    $builder->set($data);
    $builder->insert();
  }

  public function deleteRegister(int $id) {
    return $this->delete($id);
  }

  public function paraTabla() {
    $sql = "SELECT propietarioId AS id, 
            CONCAT(propietarioNombre,' ', propietarioApePaterno,' ', propietarioApeMaterno) 
            AS propietario, CONCAT(propietario.propietarioCalle, ' #', 
            propietario.propietarioExt, ', ', colonia.coloniaNombre, ', C.P.', 
            colonia.coloniaCp, ', ', municipio.municipioNombre, ', ', 
            estado.estadoNombre) AS direccion, GROUP_CONCAT( 
              CONCAT( tipoTelefono.tipoTelefonoTipo , ' : ', telefonoNumero, '<br>') ) AS telefonos 
              FROM propietario JOIN colonia ON 
              colonia.coloniaId = propietario.propietarioColoniaId 
              JOIN municipio ON municipio.municipioId = coloniaMunicipioId 
              JOIN estado ON estado.estadoId = colonia.coloniaEstadoId 
              JOIN telefono ON telefono.telefonoPropietarioId = propietario.propietarioId 
              JOIN tipoTelefono ON tipoTelefono.tipoTelefonoId = telefono.telefonoTipoTelefono 
              WHERE propietario.deleted_at IS NULL GROUP BY propietario.propietarioId";
    $builder = $this->db->query($sql);
    $result = $builder->getResult();
    return $result;
  }

  public function info(int $id) {
    $sql = "SELECT propietarioId AS id, 
              CONCAT(propietarioNombre,' ', propietarioApePaterno,' ', propietarioApeMaterno) AS propietario,
              CONCAT(propietario.propietarioCalle, ' #', propietario.propietarioExt, ', ', colonia.coloniaNombre, ', C.P.', colonia.coloniaCp, ', ', municipio.municipioNombre, ', ', estado.estadoNombre) AS direccion, 
              GROUP_CONCAT( CONCAT( tipoTelefono.tipoTelefonoTipo , ' : ', telefonoNumero ) ) AS telefonos,
              datosBancarios.bancariosClabe, datosBancarios.bancariosCuenta, datosBancarios.bancariosINE,
              datosBancarios.bancariosRFC FROM propietario 
              JOIN colonia ON colonia.coloniaId = propietario.propietarioColoniaId 
              JOIN municipio ON municipio.municipioId = coloniaMunicipioId 
              JOIN estado ON estado.estadoId = colonia.coloniaEstadoId 
              JOIN telefono ON telefono.telefonoPropietarioId = propietario.propietarioId 
              JOIN tipoTelefono ON tipoTelefono.tipoTelefonoId = telefono.telefonoTipoTelefono 
              JOIN datosBancarios ON datosBancarios.bancariosPropietarioId = propietario.propietarioId
              WHERE propietario.propietarioId = ". $id ." GROUP BY propietario.propietarioId";
    $builder = $this->db->query($sql);
    $result = $builder->getResult();
    return $result;
  }

  public function getInfoById(int $id) {
    $colunms = [
      'propietario.propietarioId AS id',
      'propietario.propietarioNombre AS nombre', 
      'propietario.propietarioApePaterno AS paterno', 
      'propietario.propietarioApeMaterno AS materno',
      'propietario.propietarioCorreo AS correo', 
      'propietario.propietarioCalle AS calle', 
      'propietario.propietarioExt AS exterior', 
      'propietario.propietarioInt AS interior',
      'colonia.coloniaCp AS cp', 
      'datosBancarios.bancariosClabe AS clabe', 
      'datosBancarios.bancariosCuenta AS cuenta', 
      'datosBancarios.bancariosINE AS ine', 
      'datosBancarios.bancariosRFC AS rfc'
    ];
    $propietario = $this->db->table('propietario')
                        ->select($colunms)
                        ->join('colonia', 'propietario.propietarioColoniaId = colonia.coloniaId')
                        ->join('datosBancarios', 'datosBancarios.bancariosPropietarioId = propietario.propietarioId')
                        ->where('propietario.propietarioId', $id)
                        ->get()->getRow();
    $telefono = $this->db->table('telefono')
                          ->select('telefono.telefonoNumero AS telefono, telefono.telefonoTipoTelefono AS tipo')
                          ->where('telefonoPropietarioId', $id)->get()->getResult();

    $result = [ 'propietario' => $propietario, 'telefonos' => $telefono ];

    return $result;
  }
}