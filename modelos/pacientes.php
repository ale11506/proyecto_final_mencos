<?php

//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

require_once 'conexion.php';

class Pacientes extends conexion
{
  public $paciente_id;
  public $pac_nombre1;
  public $pac_nombre2;
  public $pac_apellido1;
  public $pac_apellido2;
  public $pac_dpi;
  public $pac_sexo;
  public $pac_referido;
  public $paciente_situacion;


  public function __construct($args = [])
  {
    $this->paciente_id = $args['paciente_id'] ?? null;
    $this->pac_nombre1 = $args['pac_nombre1'] ?? '';
    $this->pac_nombre2 = $args['pac_nombre2'] ?? '';
    $this->pac_apellido1 = $args['pac_apellido1'] ?? '';
    $this->pac_apellido2 = $args['pac_apellido2'] ?? '';
    $this->pac_dpi = $args['pac_dpi'] ?? '';
    $this->pac_sexo = $args['pac_sexo'] ?? '';
    $this->pac_referido = $args['pac_referido'] ?? '';
    $this->paciente_situacion = $args['pac_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into Pacientes (pac_nombre1, pac_nombre2, pac_apellido1, pac_apellido2, pac_dpi, pac_sexo, pac_referido) values ('$this->pac_nombre1', '$this->pac_nombre2', '$this->pac_apellido1', '$this->pac_apellido2', '$this->pac_dpi', '$this->pac_sexo', '$this->pac_referido')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  // METODO PARA CONSULTAR

  public static function buscarTodos(...$columnas)
  {
    $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $cols FROM paciente where paciente_situacion = 1 ";
    $resultado = self::servir($sql);
    return $resultado;
  }


  public function buscar(...$columnas)
  {
    $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $colums FROM pacientes where paciente_situacion = 1 ";


    if ($this->pac_nombre1 != '') {
      $sql .= " AND pac_nombre1 like '%$this->pac_nombre1%' ";
    }
    if ($this->pac_nombre2 != '') {
      $sql .= " AND pac_nombre2 like '%$this->pac_nombre2%' ";
    }
    if ($this->pac_apellido1 != '') {
      $sql .= " AND pac_apellido1 like'%$this->pac_apellido1%' ";
    }
    if ($this->pac_apellido2 != '') {
      $sql .= " AND pac_apellido2 like'%$this->pac_apellido2%' ";
    }
    if ($this->pac_dpi != '') {
      $sql .= " AND pac_dpi like'%$this->pac_dpi%' ";
    }

    $resultado = self::servir($sql);
    return $resultado;
  }

  public function buscarId($id)
  {
    $sql = " SELECT * FROM pacientes WHERE paciente_situacion = 1 AND paciente_id = '$id' ";
    $resultado = array_shift(self::servir($sql));

    return $resultado;
  }

  public function buscarPacientes()
 {
   $sql = " SELECT  TRIM(pac_nombre1) || ' ' || TRIM(pac_nombre2) || ' ' || TRIM(pac_apellido1) || ' ' || TRIM(pac_apellido2) AS nombres, paciente_id FROM pacientes where paciente_situacion = 1";
  
   $resultado = self::servir($sql);
 
   
   return $resultado;
 }


  public function modificar()
  {
    $sql = "UPDATE pacientes SET pac_nombre1 = '$this->pac_nombre1', pac_nombre2 = '$this->pac_nombre2', pac_apellido1 = '$this->pac_apellido1', pac_apellido2 = '$this->pac_apellido2', pac_dpi = '$this->pac_dpi', pac_sexo = '$this->pac_sexo', pac_referido = '$this->pac_referido' WHERE paciente_id = $this->paciente_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function eliminar()
  {
    //  $sql = "DELETE FROM pacientes WHERE paciente_id = $this->paciente_id ";

    // echo $sql;

    $sql = "UPDATE pacientes SET paciente_situacion = 0 WHERE paciente_id = $this->paciente_id ";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

}
