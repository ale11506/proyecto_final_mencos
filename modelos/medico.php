<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require 'conexion.php';

class medicos extends conexion
{
  public $medico_id;
  public $med_nombre1;
  public $med_nombre2;
  public $med_apellido1;
  public $med_apellido2;
  public $med_especialidad;
  public $medico_situacion;


  public function __construct($args = [])
  {
    $this->medico_id = $args['medico_id'] ?? null;
    $this->med_nombre1 = $args['med_nombre1'] ?? '';
    $this->med_nombre2 = $args['med_nombre2'] ?? '';
    $this->med_apellido1 = $args['med_apellido1'] ?? '';
    $this->med_apellido2 = $args['med_apellido2'] ?? '';
    $this->med_especialidad = $args['med_especialidad'] ?? '';
    $this->medico_situacion = $args['medico_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into medicos (med_nombre1, med_nombre2, med_apellido1, med_apellido2, med_especialidad) values ('$this->med_nombre1', '$this->med_nombre2', '$this->med_apellido1', '$this->med_apellido2', '$this->med_especialidad')";
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

 public function modificar()
  {
    $sql = "UPDATE medicos SET med_nombre1 = '$this->med_nombre1', med_nombre2 = '$this->med_nombre2', med_apellido1 = '$this->med_apellido1', med_apellido2 = '$this->med_apellido2', med_especialidad = '$this->med_especialidad' WHERE medico_id = $this->medico_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

//  public function eliminar()
//  {
//    //  $sql = "DELETE FROM pacientes WHERE paciente_id = $this->paciente_id ";

//    // echo $sql;

//    $sql = "UPDATE pacientes SET paciente_situacion = 0 WHERE paciente_id = $this->paciente_id ";
//    $resultado = $this->ejecutar($sql);
//    return $resultado;
//  }
}