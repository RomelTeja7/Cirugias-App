<?php require_once 'components/superior.php'; ?>
<?php require_once '../models/estadosModel.php'; ?>

<div class="content-wrapper">
  <div class="content-header mb-5 p-4 titulo text-white text-center">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-center text-uppercase">Generar reporte</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <section class="content">
    <div class="container-fluid">


      <?php date_default_timezone_set('America/El_Salvador');
      if (!isset($_POST['tipo']) && !isset($_POST['fecha'])) {
        $tipo = "";
        $fecha = "";
      } else {
        $tipo = $_POST['tipo'];
        $fecha = $_POST['fecha'];
      }
      ?>

      <div class="card card-primary pt-4 pb-4">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="card-body">
            <div class="form-group col-8 m-auto">
              <label for="tipo">Tipo de reporte:</label>
              <select class="form-control" id="tipo" name="tipo" required>
                <?php
                if (isset($_POST['tipo'])) {
                  echo "<option value='" . $tipo . "' selected>" . $tipo . "</option>";
                }
                ?>
                <option value="Fecha de cirugía">Fecha de cirugía</option>
                <option value="Fecha de programación">Fecha de programación</option>
              </select>
            </div>
            <div class="form-group col-8" style="margin: 40px auto;">
              <label for="fecha">Fecha:</label>
              <input type="date" value="<?php echo $fecha; ?>" name="fecha" id="fecha" class="form-control datepicker"
                required>
            </div>

          </div>
          <div class="card-footer">
            <input type="submit" name="enviar" id="enviar" class="btn btn-success"
              style="display: block; padding: 5px 90px; margin: auto;" value="Generar" />
          </div>
        </form>
      </div>



      <?php
      if (isset($_POST['enviar'])):
        $tipo = $_POST['tipo'];
        $fecha = $_POST['fecha'];
        $model = new EstadosModel();

        $lstregistros = null;
        if ($tipo == 'Fecha de programación') {
          $lstregistros = $model->consultarCirugiasFechaRegistro($fecha);
        } else if ($tipo == 'Fecha de cirugía') {
          $lstregistros = $model->consultarCirugiasFechaCX($fecha);
        }

        $numResultados = count($lstregistros);

        if ($numResultados < 1) {
          echo "<div class=\"alert alert-info text-center pt-5 pb-5\" role=\"alert\" style=\"font-size: 1.1rem;\"><b>¡No hay resultados de cirugías en la fecha indicada!</b></div>";
        } else {
          ?>
          <a href='../controllers/generarReporte.php?tipo="<?php echo $tipo ?>"&fecha="<?php echo $fecha ?>"'
            class="btn btn-info"><i class="fa fa-download" aria-hidden="true"></i>
            Descargar</a><br><br>
          <div class="table-responsive pb-5">

            <table class="table border" id="dataTable">
              <thead>
                <tr class="bg-info">
                  <th scope="col">Fecha de registro</th>
                  <th scope="col">No. Afiliacion</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Telefono</th>
                  <th scope="col">Programacion CX</th>
                  <th scope="col">Fecha CX</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Cirujano</th>
                  <th scope="col">Cirujia Programada</th>
                </tr>
              </thead>
              <tbody>

                <?php

                foreach ($lstregistros as $row) {
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

                  <?php } ?>
                </tr>
              </tbody>
            </table>
          </div>
          <?php
        }
      endif;
      ?>
    </div>
  </section>
</div>

<!-- Agregando la parte inferior del contenido -->
<?php require_once 'components/inferior.php'; ?>