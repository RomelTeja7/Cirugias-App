<?php
require_once 'components/superior.php';
require_once '../models/ModificacionModel.php';


?>
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header mb-5 p-4 titulo text-white text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center text-uppercase">Detalles del registro</h1>
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
                    $model = new ModificacionModel();
                    $datos = $model->GetData();
                    foreach ($datos as $row) {
                    ?>

                        <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['codigo'] ?>" hidden>
                        <div class="col-md-4">
                            <label class="form-label">No. Afiliacion</label>
                            <input type="text" class="form-control" id="afil" name="afil" value="<?php echo $row['Afiliacion'] ?>" readonly>
                            <br>
                        </div>

                        <div class="col-md-8">
                            <label class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['Nombre'] ?>" readonly>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha de registro</label>
                            <input type="date" class="form-control" id="fer" name="fer" value="<?php echo $row['FechaRegistro'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                        <label class="form-label">Teléfono No. 1</label>
                            <input type="text" class="form-control" id="tel1" name="tel1" value="<?php echo $row['Telefono'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                        <label class="form-label">Teléfono No. 2</label>
                            <input type="text" class="form-control" id="tel2" name="tel2" value="<?php echo $row['Telefono2'] ?>" readonly>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Programación CX</label>
                            <input type="date" class="form-control" id="pcx" name="pcx" value="<?php echo $row['ProgramacionCX'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Fecha CX</label>
                            <input type="date" class="form-control" id="fcx" name="fcx" value="<?php echo $row['FechaCX'] ?>" readonly>
                            <br>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cirujano</label>
                            <input type="text" class="form-control" id="ciruj" name="ciruj" value="<?php echo $row['Cirujano'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cirugía Programada</label>
                            <input type="text" class="form-control" id="cpro" name="cpro" value="<?php echo $row['CirugiaProgramada'] ?>" readonly>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Exámenes</label>
                            <input type="date" class="form-control" id="exam" name="exam" value="<?php echo $row['Examenes'] ?>" readonly>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">EV. Anestesia</label>
                            <input type="date" class="form-control" id="evan" name="evan" value="<?php echo $row['EVAnestecia'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Prueba Covid</label>
                            <input type="date" class="form-control" id="covid" name="covid" value="<?php echo $row['PruebaCovid'] ?>" readonly>
                            <br>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row['NombreEstado'] ?>" readonly>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Enviado General</label>
                            <input type="text" class="form-control" id="estado" name="estado" value="<?php echo $row['EnviadoGeneral'] ?>" readonly>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">EV. M.I.</label>
                            <input type="date" class="form-control" id="evmi" name="evmi" value="<?php echo $row['EVMI'] ?>" readonly>
                            <br>
                        </div>

                        <div class="col-md-6">
                            <label for="exampleFormControlTextarea1">Datos de especialidad</label>
                            <textarea class="form-control" id="datesp" name="datesp" readonly rows="3"><?php echo $row['DatosEspecialidad'] ?></textarea>
                        </div>
                        <div class="col-md">
                            <label for="exampleFormControlTextarea1">Otros detalles</label>
                            <textarea class="form-control" id="detalles" name="detalles" readonly rows="3"><?php echo $row['Detalles'] ?></textarea>
                            <br>
                        </div>
                       
                    <?php } ?>
                </form>
            </div>
        </div>
    </section>
    <br><br>
</div>
</div>

<?php require_once 'components/inferior.php'; ?>