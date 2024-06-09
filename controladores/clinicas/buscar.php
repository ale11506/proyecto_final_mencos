<?php
    // ini_set('display_errors', '1');
    // ini_set('display_startup_errors', '1');
    // error_reporting(E_ALL);

    require '../../modelos/clinica.php';

    // consulta
    try {
        // var_dump($_GET);
        $_GET['cli_nombre_clinica'] = htmlspecialchars( $_GET['cli_nombre_clinica']);
        $_GET['cli_ubicacion'] = htmlspecialchars( $_GET['cli_ubicacion']);
        $_GET['cli_telefono'] = htmlspecialchars( $_GET['cli_telefono']);
       

        $objclinica = new Clinicas($_GET);
        $clinicas = $objclinica->buscar();
        $resultado = [
            'mensaje' => 'Datos encontrados',
            'datos' => $clinicas,
            'codigo' => 1
        ];
        // var_dump($clinicas);
        
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
            <a href="../../vistas/clinicas/index.php" class="btn btn-primary w-100">Volver al formulario de busqueda</a>
        </div>
    </div>
    <h1 class="text-center">Listado de Clinicas</h1>
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre Clinica</th>
                        <th>Ubicacion</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($resultado['codigo'] == 1 && count($clinicas) > 0) : ?>
                        <?php foreach ($clinicas as $key => $clinica) : ?>
                            <tr>
                                <td><?= $key + 1?></td>
                                <td><?= $clinica['cli_nombre_clinica'] ?></td>
                                <td><?= $clinica['cli_ubicacion'] ?></td>
                                <td><?= $clinica['cli_telefono'] ?></td>
                                <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="../../vistas/clinicas/modificar.php?clinica_id=<?= base64_encode($clinica['clinica_id'])?>"><i class="bi bi-pencil-square me-2"></i>Modificar</a></li>
                                        <li><a class="dropdown-item" href="../../controladores/clinicas/eliminar.php?clinica_id=<?= base64_encode($clinica['clinica_id'])?>"><i class="bi bi-trash me-2"></i>Eliminar</a></li>
                                    </ul>
                                </div>

                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4">No hay clinicas registrados</td>
                        </tr>  
                    <?php endif ?>
                </tbody>
                        
            </table>
        </div>        
    </div>        
<?php include_once '../../vistas/templates/footer.php'; ?>  