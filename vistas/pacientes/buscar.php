<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE PACIENTES</h1>
<div class="row justify-content-center">
    <form action="../../controladores/pacientes/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre1">PRIMER NOMBRE</label>
                <input type="text" name="pac_nombre1" id="pac_nombre1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_nombre2">SEGUNDO NOMBRE</label>
                <input type="text" name="pac_nombre2" id="pac_nombre2" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido1">PRIMER APELLIDO</label>
                <input type="text" name="pac_apellido1" id="pac_apellido1" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_apellido2">SEGUNDO APELLIDO</label>
                <input type="text" name="pac_apellido2" id="pac_apellido2" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="pac_dpi">DPI</label>
                <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" >
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

   