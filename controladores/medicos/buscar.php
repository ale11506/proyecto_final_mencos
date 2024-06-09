<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/medico.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['med_nombre1'] = htmlspecialchars( $_GET['med_nombre1']);
        $_GET['med_nombre2'] = htmlspecialchars( $_GET['med_nombre2']);
        $_GET['med_apellido1'] = htmlspecialchars( $_GET['med_apellido1']);
        $_GET['med_apellido2'] = htmlspecialchars( $_GET['med_apellido2']);
        $_GET['med_especialidad'] = htmlspecialchars( $_GET['med_especialidad']);

        $objmedico = new Medicos($_GET);
        $medicos = $objmedico->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $medicos,
            'codigo' => 1
        ];
        // var_dump($medicos);
        
    } catch (Exception $e) {
        $resultado = [
            'mensaje' => 'OCURRIO UN ERROR EN LA EJECUCIÓN',
            'detalle' => $e->getMessage(),
            'codigo' => 0
        ];
    }       


    $alertas = ['danger', 'success', 'warning'];

    
    include_once '../../vistas/templates/header.php'; ?>

    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6 alert alert-<?=$alertas[$resultado['codigo']] ?>" role="alert">
            <?= $resultado['mensaje'] ?>
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        <div class="col-lg-6">
            <a href="../../vistas/medicos/index.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Medicos</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Primer Apellido</th>
                        <th>Segundo Apellido</th>
                        <th>Especialidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($medicos) > 0) : ?>
                        <?php foreach ($medicos as $key => $medico) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $medico['med_nombre1'] ?></td>
                                <td><?= $medico['med_nombre2'] ?></td>
                                <td><?= $medico['med_apellido1'] ?></td>
                                <td><?= $medico['med_apellido2'] ?></td>
                                <td><?= $medico['med_especialidad'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../vistas/pacientes/modificar.php?paciente_id=<?= base64_encode($paciente['paciente_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/pacientes/eliminar.php?paciente_id=<?= base64_encode($paciente['paciente_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay medicos registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  