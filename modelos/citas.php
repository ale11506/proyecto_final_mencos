<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require 'conexion.php';

class medicos extends conexion
{
  public $cita_id;
  public $cita_fecha;
  public $cita_situacion;


  public function __construct($args = [])
  {
    $this->cita_id = $args['cita_id'] ?? null;
    $this->cita_fecha = $args['cita_fecha'] ?? '';
    $this->cita_situacion = $args['cita_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into citas (cita_fecha) values ('$this->cita_fecha')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

//  METODO PARA CONSULTAR

 public static function buscarTodos(...$columnas)
 {
   $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $cols FROM medicos where medico_situacion = 1 ";
   $resultado = self::servir($sql);
   return $resultado;
 }


 public function buscar(...$columnas)
 {
   $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $colums FROM medicos where medico_situacion = 1 ";


   if ($this->med_nombre1 != '') {
     $sql .= " AND med_nombre1 like '%$this->med_nombre1%' ";
   }
   if ($this->med_nombre2 != '') {
     $sql .= " AND med_nombre2 like '%$this->med_nombre2%' ";
   }
   if ($this->med_apellido1 != '') {
     $sql .= " AND med_apellido1 like'%$this->med_apellido1%' ";
   }
   if ($this->med_apellido2 != '') {
     $sql .= " AND med_apellido2 like'%$this->med_apellido2%' ";
   }
   if ($this->med_especialidad != '') {
     $sql .= " AND med_especialidad like'%$this->med_especialidad%' ";
   }

   $resultado = self::servir($sql);
   return $resultado;
 }

 public function buscarId($id)
 {
   $sql = " SELECT * FROM medicos WHERE medico_situacion = 1 AND medico_id = '$id' ";
   $resultado = array_shift(self::servir($sql));

   return $resultado;
 }

 public function buscarMedicos()
 {
   $sql = " SELECT * FROM medicos ";
   $resultado = self::servir($sql);
   return $resultado;
 }

 public function modificar()
  {
    $sql = "UPDATE medicos SET med_nombre1 = '$this->med_nombre1', med_nombre2 = '$this->med_nombre2', med_apellido1 = '$this->med_apellido1', med_apellido2 = '$this->med_apellido2', med_especialidad = '$this->med_especialidad' WHERE medico_id = $this->medico_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
    //   $sql = "DELETE FROM medicos WHERE medico_id = $this->medico_id ";

    //  echo $sql;

    $sql = "UPDATE medicos SET medico_situacion = 0 WHERE medico_id = $this->medico_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }
}