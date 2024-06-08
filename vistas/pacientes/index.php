<?php

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/guardar.php" method="POST" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre1">Primer Nombre</label>
                <input type="text" name="pac_nombre1" id="pac_nombre1" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre2">Segundo Nombre</label>
                <input type="text" name="pac_nombre2" id="pac_nombre2" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido1">Primer Apellido</label>
                <input type="text" name="pac_apellido1" id="pac_apellido1" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido2">Segundo Apellido</label>
                <input type="text" name="pac_apellido2" id="pac_apellido2" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_dpi">DPI</label>
                <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" required>
            </div>
        </div>
        <div class="col">
            <label for="pac_sex">Genero</label>
            <select name="pac_sex" id="pac_sex">
                <option>Seleccione su Genero</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
        </div>
        <div class="col">
            <label for="pac_referido">¿Trae Referencia?</label>
            <select name="pac_sex" id="pac_sex">
                <option>Seleccione una opcion</option>
                <option value="Si">SI</option>
                <option value="No">NO</option>
            </select>
        </div>
        <div class="row mb-3">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">GUARDAR</button>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="../../controladores/pacientes/guardar.php" class="btn btn-primary w-100">BUSCAR</a>
            </div>
        </div>
    </form>
</div>


<?php include_once '../../vistas/templates/footer.php'; ?>