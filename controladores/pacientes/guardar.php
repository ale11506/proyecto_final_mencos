<?php

require '../../modelos/pacientes.php';

// VALIDAR INFORMACION
$_POST['pac_nombre1'] = htmlspecialchars($_POST['pac_nombre1']);
$_POST['pac_nombre2'] = htmlspecialchars($_POST['pac_nombre2']);
$_POST['pac_apellido1'] = htmlspecialchars($_POST['pac_apellido1']);
$_POST['pac_apellido2'] = htmlspecialchars($_POST['pac_apellido2']);
$_POST['pac_dpi'] = htmlspecialchars($_POST['pac_dpi']);
$_POST['pac_sexo'] = htmlspecialchars($_POST['pac_sexo']);
$_POST['pac_referido'] = htmlspecialchars($_POST['pac_referido']);


if ($_POST['pac_nombre1'] == '' || $_POST['pac_nombre2'] == '' || $_POST['pac_apellido1'] == '' || $_POST['pac_apellido2'] == '' || $_POST['pac_dpi'] == '' || $_POST['pac_sexo'] == '' || $_POST['pac_referido'] == '') {
    // ALERTA PARA VALIDAR DATOS
    $resultado = [
        'mensaje' => 'DEBE VALIDAR LOS DATOS',
        'codigo' => 2
    ];
} else {
    try {
        // REALIZAR CONSULTA
        $clientes = new Pacientes($_POST);
        $guardar = $clientes->guardar();
        $resultado = [
            'mensaje' => 'PACIENTE INSERTADO CORRECTAMENTE',
            'codigo' => 1
        ];
    } catch (PDOException $pe) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR INSERTANDO A LA BD',
            'detalle' => $pe->getMessage(),
            'codigo' => 0
        ];
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }
}


$alertas = ['danger', 'success', 'warning'];


include_once '../../vistas/templates/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-6 alert alert-<?= $alertas[$resultado['codigo']] ?>" role="alert">
        <?= $resultado['mensaje'] ?>
        <?= $resultado['detalle'] ?>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-6">
        <a href="../../vistas/pacientes/index.php" class="btn btn-primary w-100">Volver al formulario</a>
    </div>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>