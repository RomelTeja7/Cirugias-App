<?php require_once 'components/superior.php'; ?>


<div class="content-wrapper">
  <!-- Content Header -->
  <div class="content-header mb-5 p-4 titulo text-white text-center">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0 text-center text-uppercase">Inicio</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <p><br>Agregar registro</p>
            </div>
            <div class="icon">
              <i class="ion ion-plus"></i>
            </div>
            <a href="agregar.php" class="small-box-footer mt-2"><i class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <p><br>Ver todos los registros</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="registros.php" class="small-box-footer mt-2"><i class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <p><br>Cirugías en espera</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="cirugiasEspera.php" class="small-box-footer mt-2"><i
                class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <p><br>Cambio en fecha de cirugías</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="cambioFechaCirugias.php" class="small-box-footer mt-2"><i
                class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <p><br>Cirugías suspendidas</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="cirugiasSuspendidas.php" class="small-box-footer mt-2"><i
                class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <p><br>Cirugías realizadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="cirugiasRealizadas.php" class="small-box-footer mt-2"><i
                class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
              <p><br>Generar reporte</p>
            </div>
            <div class="icon">
              <i class="ion ion-clipboard"></i>
            </div>
            <a href="reporte.php" class="small-box-footer mt-2"><i class="fas fa-arrow-circle-right fa-2x"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <!-- Principal -->
      <div class="row">

      </div>
      <!-- Principal -->

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php require_once 'components/inferior.php'; ?>