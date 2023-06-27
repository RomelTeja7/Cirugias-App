<?php
require_once 'components/superior.php';
require_once '../models/ModificacionModel.php';
require_once '../models/RegistrosModel.php';

?>
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header mb-5 p-4 titulo text-white text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center text-uppercase">Modificación del registro</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- <><><><><><><><><><><><><> -->
    <section class="content">
        <div class=" container col-10 card">
            <div class="card-body">
                <form class="row g-3" id="form-mod">
                    <?php
                    $conexion = new ModificacionModel();
                    $datos = $conexion->GetData();
                    foreach ($datos as $row) {
                        ?>
                        <div class="input-group mb-4">
                            <div class="input-group-text p-0 pl-3 pr-3 border-0" style="background: none;">
                                <span class="text-danger" id="basic-addon1"
                                    style="font-weight: 900; padding-top: 5px; padding-bottom: 0px; font-size: 1.6rem;">*</span>
                                <span class="form-control-plaintext ml-3 border-none"> Los datos son requeridos</span>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" id="codigo" name="codigo"
                            value="<?php echo $row['codigo'] ?>" hidden>
                        <div class="col-md-4">
                            <label class="form-label">No. Afiliación</label>
                            <input type="text" class="form-control" id="afil" name="afil"
                                value="<?php echo $row['Afiliacion'] ?>" readonly>
                            <br>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label"><span class="text-danger">*</span> Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre"
                                value="<?php echo $row['Nombre'] ?>" required>
                            <br>
                        </div>
                        <input type="hidden" class="form-control" id="fer" name="fer"
                            value="<?php echo $row['FechaRegistro'] ?>">

                        <div class="col-md-4">
                            <label class="form-label"><span class="text-danger">*</span> Teléfono No. 1</label>
                            <input type="text" class="form-control" id="tel1" name="tel1"
                                value="<?php echo $row['Telefono'] ?>" placeholder="0000-0000" autocomplete="off" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Teléfono No. 2 (opcional)</label>
                            <input type="text" class="form-control" id="tel2" name="tel2"
                                value="<?php echo $row['Telefono2'] ?>" placeholder="0000-0000" autocomplete="off">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><span class="text-danger">*</span> Programación CX</label>
                            <input type="date" class="form-control" id="pcx" name="pcx"
                                value="<?php echo $row['ProgramacionCX'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><span class="text-danger">*</span> Fecha CX</label>
                            <input type="date" class="form-control" id="fcx" name="fcx"
                                value="<?php echo $row['FechaCX'] ?>" required>
                            <br>
                        </div>
                        <div class="col-md-8">
                            <label class="form-label"><span class="text-danger">*</span> Cirujano</label>
                            <input type="text" class="form-control" id="ciruj" name="ciruj"
                                value="<?php echo $row['Cirujano'] ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label"><span class="text-danger">*</span> Cirugía Programada</label>
                            <input type="text" class="form-control" id="cpro" name="cpro"
                                value="<?php echo $row['CirugiaProgramada'] ?>" required>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Exámenes (opcional)</label>
                            <input type="date" class="form-control" id="exam" name="exam"
                                value="<?php echo $row['Examenes'] ?>">
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">EV. Anestesia (opcional)</label>
                            <input type="date" class="form-control" id="evan" name="evan"
                                value="<?php echo $row['EVAnestecia'] ?>">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Prueba Covid (opcional)</label>
                            <input type="date" class="form-control" id="covid" name="covid"
                                value="<?php echo $row['PruebaCovid'] ?>">
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><span class="text-danger">*</span> Enviado General</label>
                            <select class="form-control" id="eg" name="eg">
                                <option value="<?php echo $row['EnviadoGeneral'] ?>" selected><?php echo $row['EnviadoGeneral'] ?></option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label"><span class="text-danger">*</span> Estado</label>
                            <select class="form-control" id="estado" name="estado">
                                <option value="<?php echo $row['IdEstado'] ?>"><?php echo $row['NombreEstado'] ?></option>
                                <?php
                                $conexion = new RegistroController();
                                $datos = $conexion->SelectEstado();
                                foreach ($datos as $row2) {
                                    ?>
                                    <option value="<?php echo $row2['IdEstado'] ?>"><?php echo $row2['NombreEstado'] ?></option>
                                <?php } ?>
                            </select>
                            <br>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">EV. M.I. (opcional)</label>
                            <input type="date" class="form-control" id="evmi" name="evmi"
                                value="<?php echo $row['EVMI'] ?>">
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlTextarea1">Datos de especialidad (opcional)</label>
                            <textarea class="form-control" id="datesp" name="datesp"
                                rows="3"><?php echo $row['DatosEspecialidad'] ?></textarea>
                        </div>
                        <div class="col-md">
                            <label for="exampleFormControlTextarea1">Otros detalles (opcional)</label>
                            <textarea class="form-control" id="detalles" name="detalles"
                                rows="3"><?php echo $row['Detalles'] ?></textarea>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <button id="btn-mod" class="btn btn-primary"
                                style="display: block; margin: auto; padding: 5px 80px;" type="submit">Actualizar</button>

                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>
    <br><br>
</div>


<?php require_once 'components/inferior.php'; ?>
<script src="components/js/modificacion.js"></script>