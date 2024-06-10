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
    $sql = "INSERT into Citas (cita_fecha, cita_paciente_id, cita_clinica_id) values ('$this->cita_fecha', '$this->cita_paciente_id', '$this->cita_clinica_id')";

    $resultado = $this->ejecutar($sql);
    return $resultado;
  }

  public function buscar(...$columnas)

  {
    $colums = count($columnas) > 0 ? implode(',', $columnas) : '*';
    $sql = "SELECT $colums FROM Citas where cita_situacion = 1 ";


    if ($this->cita_paciente_id != '') {
      $sql .= " AND cita_fecha like '%$this->cita_fecha%' ";
    }
    if ($this->cita_fecha != '') {
      $sql .= " AND cita_paciente_id like '%$this->cita_fecha%' ";
    }
    if ($this->cita_clinica_id != '') {
      $sql .= " AND cita_clinica_id like'%$this->cita_clinica_id%' ";
    }

    $resultado = self::servir($sql);
    return $resultado;
  }

  public function buscarCitas()
  {
    $sql = " SELECT * FROM Citas where cita_situacion = 1";
    $resultado = self::servir($sql);
    return $resultado;
  }

  public function buscarId($id)
  {
    $sql = " SELECT * FROM Citas WHERE cita_situacion = 1 AND cita_id = '$id' ";
    $resultado = array_shift(self::servir($sql));
    return $resultado;
  }

  public function buscarPorFecha($fechaCita)
  {
    $sql = "SELECT cli_nombre_clinica, TRIM(med_nombre1) || ' ' || TRIM(med_nombre2) || ' ' ||
            TRIM(med_apellido1) || ' ' || TRIM(med_apellido2) as nombre_medico, TRIM(pac_nombre1)
            || ' ' || TRIM(pac_nombre2) || ' ' || TRIM( pac_apellido1) || ' ' || TRIM( pac_apellido2) as nombrepaciente, pac_dpi, cita_fecha, pac_referido 
            from Citas inner join Clinicas on cita_clinica_id = clinica_id 
            inner join Pacientes on cita_paciente_id = paciente_id
            inner join Medicos on cli_medico_id = medico_id where cita_situacion = 1 ";

    if ($fechaCita != '') {
      $sql .= "  and cita_fecha = '$fechaCita'";
    }

    $resultado = self::servir($sql);
    return $resultado;
  }

  public function buscarPacientes($nombrepacienteCita)
  {
    $sql = "SELECT cli_nombre_clinica, TRIM(med_nombre1) || ' ' || TRIM(med_nombre2) || ' ' ||
            TRIM(med_apellido1) || ' ' || TRIM(med_apellido2) as nombre_medico, TRIM(pac_nombre1)
            || ' ' || TRIM(pac_nombre2) || ' ' || TRIM( pac_apellido1) || ' ' || TRIM( pac_apellido2) as nombrepaciente, pac_dpi, cita_fecha, pac_referido 
            from Citas inner join Clinicas on cita_clinica_id = clinica_id 
            inner join Pacientes on cita_paciente_id = paciente_id
            inner join Medicos on cli_medico_id = medico_id where cita_situacion = 1 ";

    if ($nombrepacienteCita != '') {
      $sql .= "  and nombrepacienteCita = '$nombrepacienteCita'";
    }

    $resultado = self::servir($sql);
    return $resultado;
  }
}
