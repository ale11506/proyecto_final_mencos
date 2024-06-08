<?php

//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

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
    $this->medico_situacion = $args['cli_situacion'] ?? '';
  }

  // METODO PARA INSERTAR
  public function guardar()
  {
    $sql = "INSERT into Medicos (med_nombre1, med_nombre2, med_apellido1, med_apellido2, med_especialidad) values ('$this->med_nombre1', '$this->med_nombre2', '$this->med_apellido1', '$this->med_apellido2', '$this->med_especialidad')";
    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

//   // METODO PARA CONSULTAR

//   public static function buscarTodos(...$columnas)
//   {
//     $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
//     $sql = "SELECT $cols FROM mediente where paciente_situacion = 1 ";
//     $resultado = self::servir($sql);
//     return $resultado;
//   }


//   public function buscar(...$columnas)
//   {
//     $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
//     $sql = "SELECT $colums FROM pacientes where paciente_situacion = 1 ";


//     if ($this->pac_nombre1 != '') {
//       $sql .= " AND pac_nombre1 like '%$this->pac_nombre1%' ";
//     }
//     if ($this->pac_nombre2 != '') {
//       $sql .= " AND pac_nombre2 like '%$this->pac_nombre2%' ";
//     }
//     if ($this->pac_apellido1 != '') {
//       $sql .= " AND pac_apellido1 like'%$this->pac_apellido1%' ";
//     }
//     if ($this->pac_apellido2 != '') {
//       $sql .= " AND pac_apellido2 like'%$this->pac_apellido2%' ";
//     }
//     if ($this->pac_dpi != '') {
//       $sql .= " AND pac_dpi like'%$this->pac_dpi%' ";
//     }

//     $resultado = self::servir($sql);
//     return $resultado;
//   }

//   public function buscarId($id)
//   {
//     $sql = " SELECT * FROM pacientes WHERE paciente_situacion = 1 AND paciente_id = '$id' ";
//     $resultado = array_shift(self::servir($sql));

//     return $resultado;
//   }

//   public function modificar()
//   {
//     $sql = "UPDATE pacientes SET pac_nombre1 = '$this->pac_nombre1', pac_nombre2 = '$this->pac_nombre2', pac_apellido1 = '$this->pac_apellido1', pac_apellido2 = '$this->pac_apellido2', pac_dpi = '$this->pac_dpi', pac_sexo = '$this->pac_sexo', pac_referido = '$this->pac_referido' WHERE paciente_id = $this->paciente_id ";
//     $resultado = $this->ejecutar($sql);
//     return $resultado;
//   }

//   public function eliminar()
//   {
//     //  $sql = "DELETE FROM pacientes WHERE paciente_id = $this->paciente_id ";

//     // echo $sql;

//     $sql = "UPDATE pacientes SET paciente_situacion = 0 WHERE paciente_id = $this->paciente_id ";
//     $resultado = $this->ejecutar($sql);
//     return $resultado;
//   }
}
