<?php require_once 'components/superior.php'; ?>
<?php require_once '../models/RegistrosModel.php'; ?>
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header mb-5 p-4 titulo text-white text-center">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-center text-uppercase">Registros de cirugías</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- <><><><><><><><><><><><><> -->
    <section class="content">
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
                            $model = new RegistroController();
                            $result = $model->SelectRegistros();
                            foreach ($result as $row) {
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
                                    <?php
                                    if ($row['NombreEstado'] == 'Realizada') {
                                        echo "<td style=\"background-color: green; color: white;\">" . $row['NombreEstado'] . "</td>";
                                    } else if ($row['NombreEstado'] == 'Fecha cambiada') {
                                        echo "<td style=\"background-color: #FF66FF;\">" . $row['NombreEstado'] . "</td>";
                                    } else if ($row['NombreEstado'] == 'Suspendida') {
                                        echo "<td style=\"background-color: yellow;\">" . $row['NombreEstado'] . "</td>";
                                    } else {
                                        echo "<td>" . $row['NombreEstado'] . "</td>";
                                    }

                                    ?>
                                    <td>
                                        <?php echo $row['Cirujano'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['CirugiaProgramada'] ?>
                                    </td>
                                    <td>

                                        <a href="modificacion.php?id=<?php echo $row['codigo']; ?>" class="btn btn-warning"
                                            title="Editar"><i class="fas fa-pen fa-1x"></i></a>
                                        <a href="verRegistro.php?id=<?php echo $row['codigo']; ?>" class="btn btn-info"
                                            title="Ver"><i class="fas fa-eye fa-1x"></i></a>
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
    </section>
</div>

<?php require_once 'components/inferior.php'; ?>