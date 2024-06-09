<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/clinica.php';

$_GET['clinica_id'] = filter_var(base64_decode($_GET['clinica_id']), FILTER_SANITIZE_NUMBER_INT);
$clinica = new clinicas();

$ClinicaRegistrado = $clinica->buscarId($_GET['clinica_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR DE CLINICA</h1>
<div class="row justify-content-center">
    <form action="../../controladores/clinicas/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="clinica_id" id="clinica_id" class="form-control" required value="<?= $ClinicaRegistrado['clinica_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre_clinica">NOMBRE CLINICA</label>
                <input type="text" name="cli_nombre_clinica" id="cli_nombre_clinica" class="form-control" required value="<?= $ClinicaRegistrado['cli_nombre_clinica'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_ubicacion">UBICACION</label>
                <input type="text" name="cli_ubicacion" id="cli_ubicacion" class="form-control" required value="<?= $ClinicaRegistrado['cli_ubicacion'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">TELEFONO</label>
                <input type="text" name="cli_telefono" id="cli_telefono" class="form-control" required value="<?= $ClinicaRegistrado['cli_telefono'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/clinicas/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>