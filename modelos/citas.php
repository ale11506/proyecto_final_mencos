<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require_once 'conexion.php';

class citas extends conexion
{
  public $cita_id;
  public $cita_fecha;
  public $cita_situacion;
  public $cita_paciente_id;
  public $cita_clinica_id;


  public function __construct($args = [])
  {
    $this->cita_id = $args['cita_id'] ?? null;
    $this->cita_fecha = $args['cita_fecha'] ?? '';
    $this->cita_situacion = $args['cita_situacion'] ?? '';
    $this->cita_paciente_id = $args['cita_paciente_id'] ?? '';
    $this->cita_clinica_id = $args['cita_cita_id'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into citas (cita_fecha, cita_paciente_id, cita_cita_id) values ('$this->cita_fecha', '$this->cita_paciente_id', '$this->cita_cita_id')";
 
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function buscar(...$columnas)
  
 {
   $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $colums FROM citas where cita_situacion = 1 ";


   if ($this->cita_paciente_id != '') {
     $sql .= " AND cita_fecha like '%$this->cita_fecha%' ";
   }
   if ($this->cita_fecha != '') {
     $sql .= " AND cita_fecha like '%$this->cita_fecha%' ";
   }
   if ($this->cita_clinica_id != '') {
     $sql .= " AND cita_clinica_id like'%$this->cita_clinica_id%' ";
   }

   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarCitas()
 {
   $sql = " SELECT * FROM citas where cita_situacion = 1";
   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarId($id)
 {
   $sql = " SELECT * FROM citas WHERE cita_situacion = 1 AND cita_id = '$id' ";
   $resultado = array_shift(self::servir($sql));
   return $resultado;
 }

 
 public function modificar()
  {
    $sql = "UPDATE clinicas SET cli_nombre_clinica = '$this->cli_nombre_clinica', cli_ubicacion = '$this->cli_ubicacion', cli_telefono = '$this->cli_telefono' WHERE clinica_id = $this->clinica_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
 
    $sql = "UPDATE clinicas SET clinica_situacion = 0 WHERE clinica_id = $this->clinica_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }
}