<?php

  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

require 'conexion.php';

class clinicas extends conexion
{
  public $clinica_id;
  public $cli_nombre_clinica;
  public $cli_ubicacion;
  public $cli_telefono;
  public $cli_medico_id;
  public $clinica_situacion;


  public function __construct($args = [])
  {
    $this->clinica_id = $args['clinica_id'] ?? null;
    $this->cli_nombre_clinica = $args['cli_nombre_clinica'] ?? '';
    $this->cli_ubicacion = $args['cli_ubicacion'] ?? '';
    $this->cli_telefono = $args['cli_telefono'] ?? '';
    $this->cli_medico_id = $args['cli_medico_id'] ?? '';
    $this->clinica_situacion = $args['clinica_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into clinicas (cli_nombre_clinica, cli_ubicacion, cli_telefono, cli_medico_id) values ('$this->cli_nombre_clinica', '$this->cli_ubicacion', '$this->cli_telefono', '$this->cli_medico_id')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

//  METODO PARA CONSULTAR

 public static function buscarTodos(...$columnas)
 {
   $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
   $sql = "SELECT $cols FROM clinicas where clinica_situacion = 1 ";
   $resultado = self::servir($sql);
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

 public function buscarId($id)
 {
   $sql = " SELECT * FROM clinicas WHERE clinica_situacion = 1 AND clinica_id = '$id' ";
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
    //   $sql = "DELETE FROM clinicas WHERE clinica_id = $this->clinica_id ";

    //  echo $sql;

    $sql = "UPDATE clinicas SET clinica_situacion = 0 WHERE clinica_id = $this->clinica_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }
}