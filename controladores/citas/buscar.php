<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/citas.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['cita_nombres'] = htmlspecialchars( $_GET['cita_nombres']);
        $_GET['cita_fecha'] = date('Y-m-d H:i', strtotime($_POST['cita_fecha']));
        $_GET['cita_cita'] = htmlspecialchars( $_GET['cita_cita']);
       

        $objcitas = new Citas($_GET);
        $citas = $objcita->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $citas,
            'codigo' => 1
        ];
        // var_dump($citas);
        
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
            <a href="../../vistas/citas/index.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de citas</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre paciente</th>
                        <th>fecha</th>
                        <th>Cita</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($citas) > 0) : ?>
                        <?php foreach ($citas as $key => $cita) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $cita['cita_paciente_id'] ?></td>
                                <td><?= $cita['cita_fecha'] ?></td>
                                <td><?= $cita['cita_clinica_id'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../vistas/citas/modificar.php?cita_id=<?= base64_encode($cita['cita_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/citas/eliminar.php?cita_id=<?= base64_encode($cita['cita_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay citas registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  