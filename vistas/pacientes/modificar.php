<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require '../../modelos/pacientes.php';

$_GET['paciente_id'] = filter_var(base64_decode($_GET['paciente_id']), FILTER_SANITIZE_NUMBER_INT);
$paciente = new Pacientes();

$PacienteRegistrado = $paciente->buscarId($_GET['paciente_id']);

include_once '../../vistas/templates/header.php'; ?>
<h1 class="text-center">MODIFICAR DE PACIENTE</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/modificar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <input type="hidden" name="paciente_id" id="paciente_id" class="form-control" required value="<?= $PacienteRegistrado['paciente_id'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="pac_nombre1" id="pac_nombre1" class="form-control" required value="<?= $PacienteRegistrado['pac_nombre1'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="pac_nombre2" id="pac_nombre2" class="form-control" required value="<?= $PacienteRegistrado['pac_nombre2'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="pac_apellido1" id="pac_apellido1" class="form-control" required value="<?= $PacienteRegistrado['pac_apellido1'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="pac_apellido2" id="pac_apellido2" class="form-control" required value="<?= $PacienteRegistrado['pac_apellido2'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_dpi">DPI</label>
                <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" required value="<?= $PacienteRegistrado['pac_dpi'] ?>">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="pac_sexo">Genero</label>
                <select name="pac_sexo" id="pac_sexo">
                    <option>Seleccione su Genero</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3">
                <label for="pac_referido">¿Trae Referencia?</label>
                <select name="pac_referido" id="pac_referido">
                    <option>Seleccione una opcion</option>
                    <option value="Si">SI</option>
                    <option value="No">NO</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-warning w-100">Modificar</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/buscar.php" class="btn btn-secondary w-100">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>