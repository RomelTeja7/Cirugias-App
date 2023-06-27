<?php require_once 'components/superior.php'; ?>
<?php require_once '../models/estadosModel.php'; ?>


<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header mb-5 p-4 titulo text-white text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center text-uppercase">Cirugías en espera</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table row-bordered table table-striped table-hover dataTable" id="dataTable"
                            width="100%" cellspacing="0" style="white-space: nowrap; overflow-x: auto;">
                            <thead>
                                <tr class="bg-info">
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col">No. Afiliación</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Programación CX</th>
                                    <th scope="col">Fecha CX</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cirujano</th>
                                    <th scope="col">Cirugía Programada</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $model = new EstadosModel();
                                $registros = $model->consultarCirugiasEspera();
                                foreach ($registros as $row) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['FechaRegistro'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Afiliacion'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Nombre'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Telefono'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['ProgramacionCX'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['FechaCX'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['NombreEstado'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['Cirujano'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['CirugiaProgramada'] ?>
                                        </td>
                                        <td>
                                            <a href="modificacion.php?id=<?php echo $row['codigo']; ?>"
                                                class="btn btn-warning" title="Editar"><i class="fas fa-pen fa-1x"></i></a>
                                            <a href="verRegistroEstados.php?id=<?php echo $row['codigo']; ?>"
                                                class="btn btn-info" title="Ver"><i class="fas fa-eye fa-1x"></i></a>
                                        </td>
                                    <?php } ?>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="bg-info">
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col">No. Afiliación</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Programación CX</th>
                                    <th scope="col">Fecha CX</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Cirujano</th>
                                    <th scope="col">Cirugía Programada</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>


        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php require_once 'components/inferior.php'; ?>