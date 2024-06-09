<?php
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);

require '../../modelos/medico.php';

$_GET['medico_id'] = filter_var(base64_decode($_GET['medico_id']), FILTER_SANITIZE_NUMBER_INT);
$medico = new Medicos();

$MedicoRegistrado = $medico->buscarId($_GET['medico_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR DE MEDICO</h1>
<div class="row justify-content-center">
    <form action="../../controladores/medicos/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="medico_id" id="medico_id" class="form-control" required value="<?= $MedicoRegistrado['medico_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="med_nombre1" id="med_nombre1" class="form-control" required value="<?= $MedicoRegistrado['med_nombre1'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="med_nombre2" id="med_nombre2" class="form-control" required value="<?= $MedicoRegistrado['med_nombre2'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="med_apellido1" id="med_apellido1" class="form-control" required value="<?= $MedicoRegistrado['med_apellido1'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="med_apellido2" id="med_apellido2" class="form-control" required value="<?= $MedicoRegistrado['med_apellido2'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_especialidad">ESPECIALIDAD</label>
                <input type="text" name="med_especialidad" id="med_especialidad" class="form-control" required value="<?= $MedicoRegistrado['med_especialidad'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/medicos/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>