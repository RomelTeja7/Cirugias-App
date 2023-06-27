<?php require_once 'components/superior.php'; ?>


<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header mb-5 p-4 titulo text-white text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center text-uppercase">Agregar detalles de cirugía</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class=" container col-10 card">
            <div class="card-body">
                <form class="row g-3" id="form-register">
                   
                    <div class="input-group mb-4">
                        <div class="input-group-text p-0 pl-3 pr-3 border-0" style="background: none;">
                            <span class="text-danger" id="basic-addon1" style="font-weight: 900; padding-top: 5px; padding-bottom: 0px; font-size: 1.6rem;">*</span>
                            <span class="form-control-plaintext ml-3 border-none"> Los datos son requeridos</span>
                        </div>                 
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><span class="text-danger">*</span> No. Afiliación</label>
                        <input class="form-control" name="afiliacion" type="number" placeholder="000000000" required>
                        <br>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label"><span class="text-danger">*</span> Nombre</label>
                        <input class="form-control" name="nombre" type="text" placeholder="" required>
                        <br>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label"><span class="text-danger">*</span> Teléfono No. 1</label>
                        <input class="form-control" name="telefono" type="text" placeholder="0000-0000" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Teléfono No. 2 (opcional)</label>
                        <input class="form-control" name="telefono2" type="text" placeholder="0000-0000">
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><span class="text-danger">*</span> Programación CX</label>
                        <input class="form-control" name="programacion" type="date" required>

                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><span class="text-danger">*</span> Fecha CX</label>
                        <input class="form-control" name="fecha" type="date" required>
                        <br>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label"><span class="text-danger">*</span> Cirujano</label>
                        <input class="form-control" name="cirujano" type="text" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><span class="text-danger">*</span> Cirugía Programada</label>
                        <input class="form-control" name="cirugia" type="text" placeholder="" required>
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Exámenes (opcional)</label>
                        <input class="form-control" name="examenes" type="date" placeholder="">
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">EV. Anestesia (opcional)</label>
                        <input class="form-control" name="nestecia" type="date" placeholder="">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Prueba Covid (opcional)</label>
                        <input class="form-control" name="covid" type="date" placeholder="">
                        <br>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label"><span class="text-danger">*</span> Enviado General</label>
                        <select class="form-control" id="general" name="general">
                            <option value="No">No</option>
                            <option value="Si">Si</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">EV. M.I. (opcional)</label>
                        <input class="form-control" name="evmi" type="date" placeholder="">
                        <br>
                    </div>

                    <div class="col-md-6">
                        <label for="datosespecialidad">Datos de especialidad (opcional)</label>
                        <textarea class="form-control" id="datosespecialidad" name="datosespecialidad"
                            rows="3"></textarea>
                    </div>
                    <div class="col-md">
                        <label for="detalles">Otros detalles (opcional)</label>
                        <textarea class="form-control" id="detalles" name="detalles" rows="3"></textarea>
                        <br>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" id="btn-register" style="display: block; margin: auto; padding: 5px 80px;"
                            class="btn btn-success">Agregar cita</button>

                    </div>

                </form>
            </div>
        </div>
    </section>
    <br><br>
</div>

<?php require_once 'components/inferior.php'; ?>
<script src="components/js/acciones.js"></script>