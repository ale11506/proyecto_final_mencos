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
    $this->cita_clinica_id = $args['cita_clinica_id'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into citas (cita_fecha, cita_paciente_id, cita_clinica_id) values ('$this->cita_fecha', '$this->cita_paciente_id', '$this->cita_clinica_id')";
 
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function buscar(...$columnas)
  
 {
   $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $colums FROM clinicas where clinica_situacion = 1 ";


   if ($this->cli_nombre_clinica != '') {
     $sql .= " AND cli_nombre_clinica like '%$this->cli_nombre_clinica%' ";
   }
   if ($this->cli_ubicacion != '') {
     $sql .= " AND cli_ubicacion like '%$this->cli_ubicacion%' ";
   }
   if ($this->cli_telefono != '') {
     $sql .= " AND cli_telefono like'%$this->cli_telefono%' ";
   }

   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarClinicas()
 {
   $sql = " SELECT * FROM clinicas where clinica_situacion = 1";
   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarId($id)
 {
   $sql = " SELECT * FROM clinicas WHERE clinica_situacion = 1 AND clinica_id = '$id' ";
   $resultado = array_shift(self::servir($sql));
   return $resultado;
 }
}