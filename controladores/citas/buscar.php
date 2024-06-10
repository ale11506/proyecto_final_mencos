<?php
//  ini_set('display_errors', 1);
//  ini_set('display_startup_errors', 1);
//  error_reporting(E_ALL);

require_once '../../modelos/citas.php';

if (isset($_GET['nombrepaciente']) && !empty($_GET['nombrepaciente'])) {
    $_GET['nombrepaciente'] = htmlspecialchars($_GET['nombrepaciente']);
    $fechaCita = $_GET['nombrepaciente'];
} else {
    $fechaCita = '';
}

try {
    $cita = new Citas();
    $citas = $cita->buscarPacientes($nombrepacienteCita);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


if (isset($_GET['cita_fecha']) && !empty($_GET['cita_fecha'])) {
    $_GET['cita_fecha'] = date("Y-m-d H:i", strtotime($_GET['cita_fecha']));
    $fechaCita = $_GET['cita_fecha'];
} else {
    $fechaCita = '';
}

try {
    $cita = new Citas();
    $citas = $cita->buscarPorFecha($fechaCita);
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}


$citasPorClinica = [];
if (isset($citas) && count($citas) > 0) {
    foreach ($citas as $cita) {
        $clinica = $cita['cli_nombre_clinica'] ?? 'Sin Clínica';
        if (!isset($citasPorClinica[$clinica])) {
            $citasPorClinica[$clinica] = [];
        }
        $citasPorClinica[$clinica][] = $cita;
    }
}

$fechaSolo = !empty($fechaCita) ? date("Y-m-d", strtotime($fechaCita)) : '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
    
    .highlight-table {
        background-color: #f2f2f2; 
        border: 2px solid #999999; 
        border-radius: 10px;
        padding: 20px;
        color: #333333; 
        font-family: 'Alegreya', serif; 
    }

   
    .highlight-table th {
        background-color: #666666; 
        color: #ffffff; 
        font-size: 16px; 
        padding: 10px;
        font-family: 'Alegreya', serif; 
    }

    
    .highlight-table tbody tr:nth-child(odd) {
        background-color: #e0e0e0; 
    }

    
    .highlight-table tbody tr:nth-child(even) {
        background-color: #f7f7f7; 
    }

    
    .highlight-header {
        background-color: #666666; 
        border: 2px solid #999999; 
        border-radius: 10px;
        padding: 15px; 
        text-align: center;
        margin-bottom: 20px;
        color: #ffffff; 
        font-size: 18px; 
        font-family: 'Alegreya', serif; 
    }

    
    .highlight-table,
    .highlight-header {
        font-family: 'Alegreya', serif; 
    }
</style>


    <title>Buscar citas</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="highlight-header">
                    <h2 class="mt-3 mb-3">
                        <?= !empty($fechaCita) ? "Citas para el día de hoy: " . htmlspecialchars($fechaSolo) : "Citas registradas" ?>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <?php if (isset($citas) && count($citas) > 0) : ?>
                    <?php foreach ($citasPorClinica as $clinica => $citas) : ?>
                        <h3 class="mt-4 text-center"><?= htmlspecialchars($clinica) ?></h3>
                        <div class="highlight-table mt-3 mb-5">
                            <table class="table table-bordered table-hover">
                                <thead class="table-dark text-center">
                                    <tr>
                                        <th>NO.</th>
                                        <th>PACIENTE</th>
                                        <th>DPI</th>
                                        <th>MÉDICO</th>
                                        <th>FECHA CITA</th>
                                        <th>REFERIDO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($citas as $key => $cita) : ?>
                                        <tr>
                                            <td class="text-center"><?= $key + 1 ?></td>
                                            <td><?= htmlspecialchars($cita['nombrepaciente'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($cita['pac_dpi'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($cita['nombre_medico'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($cita['cita_fecha'] ?? '') ?></td>
                                            <td><?= htmlspecialchars($cita['pac_referido'] ?? '') ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endforeach ?>
                <?php else : ?>
                    <div class="alert alert-warning text-center" role="alert">
                        SIN REGISTROS
                    </div>
                <?php endif ?>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 text-center">
                <a href="../../vistas/citas/buscar.php" class="btn btn-info w-100">Regresar a la búsqueda</a>
            </div>
        </div>
    </div>
</body>
</html>
