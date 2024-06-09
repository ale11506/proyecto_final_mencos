<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE MEDICOS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/medicos/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="med_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="med_nombre1" id="med_nombre1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="med_nombre2" id="med_nombre2" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="med_apellido1" id="med_apellido1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="med_apellido2" id="med_apellido2" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="med_especialidad">ESPECIALIDAD</label>
                <input type="text" name="med_especialidad" id="med_especialidad" class="form-control" >
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-info w-100 bg-success text-white"> BUSCAR</button>
            </div>
        </div>
    </form>
</div>

<?php include_once '../../vistas/templates/footer.php'; ?>

   