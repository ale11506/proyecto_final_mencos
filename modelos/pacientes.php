<?php

//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

require 'conexion.php';

class Pacientes extends conexion{
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
        $this->pac_dpi= $args['pac_dpi'] ?? '';
        $this->pac_sexo = $args['pac_sexo'] ?? '';
        $this->pac_referido = $args['pac_referido'] ?? '';
        $this->paciente_situacion = $args['cli_situacion'] ?? '';

    }

      // METODO PARA INSERTAR
      public function guardar(){
        $sql = "INSERT into Pacientes (pac_nombre1, pac_nombre2, pac_apellido1, pac_apellido2, pac_dpi, pac_sexo, pac_referido) values ('$this->pac_nombre1', '$this->pac_nombre2', '$this->pac_apellido1', '$this->pac_apellido2', '$this->pac_dpi', '$this->pac_sexo', '$this->pac_referido')";
        $resultado = $this->ejecutar($sql);
        return $resultado; 
    }

      // METODO PARA CONSULTAR

    //   public static function buscarTodos(...$columnas){
    //     $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    //     $sql = "SELECT $cols FROM cliente where cli_situacion = 1 ";
    //     $resultado = self::servir($sql);
    //     return $resultado;
    // }


    // public function buscar(...$columnas){
    //     $cols = count($columnas) > 0 ? implode(',', $columnas) : '*';
    //     $sql = "SELECT $cols FROM cliente where cli_situacion = 1 ";


    //     if($this->cli_nombre != ''){
    //         $sql .= " AND cli_nombre like '%$this->cli_nombre%' ";
    //     }
    //     if($this->cli_apellido != ''){
    //         $sql .= " AND cli_apellido like'%$this->cli_apellido%' ";
    //     }

    //     $resultado = self::servir($sql);
    //     return $resultado;
    // }

    // public function buscarId($id){
    //     $sql = " SELECT * FROM cliente WHERE cli_situacion = 1 AND cli_id = '$id' ";
    //     $resultado = array_shift( self::servir($sql)) ;

    //     return $resultado;
    // }

    // public function modificar(){
    //     $sql = "UPDATE cliente SET cli_nombre = '$this->cli_nombre', cli_apellido = '$this->cli_apellido', cli_nit = '$this->cli_nit', cli_telefono = '$this->cli_telefono' WHERE cli_id = $this->cli_id ";
    //     $resultado = $this->ejecutar($sql);
    //     return $resultado; 
    // }

    // public function eliminar(){
    //     // $sql = "DELETE FROM clientes WHERE cli_id = $this->cli_id ";

    //     // echo $sql;
    //     $sql = "UPDATE cliente SET cli_situacion = 0 WHERE cli_id = $this->cli_id ";
    //     $resultado = $this->ejecutar($sql);
    //     return $resultado; 
    // }
}