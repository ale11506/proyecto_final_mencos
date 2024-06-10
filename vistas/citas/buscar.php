<?php 

include_once '../../vistas/templates/header.php'; ?>

<h1 class="text-center">FORMULARIO DE CITAS</h1>
<div class="row justify-content-center">
    <form action="../../controladores/citas/buscar.php" method="GET" class="border bg-light shadow rounded p-4 col-lg-6">
        <div class="row mb-3">
            <div class="col">
                <label for="cita_paciente_id">NOMBRE DEL PACIENTE</label>
                <input type="text" name="cita_paciente_id" id="cita_paciente_id" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cita_fecha">FECHA DE LA CITA</label>
                <input type="text" name="cita_fecha" id="cita_fecha" class="form-control" >
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cita_clinica_id">CLINICA</label>
                <input type="text" name="cita_clinica_id" id="cita_clinica_id" class="form-control" >
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

   