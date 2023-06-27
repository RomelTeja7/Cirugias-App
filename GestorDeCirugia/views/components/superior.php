<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Cirugias</title>
  <link rel="icon" type="image/x-icon" href="dist/img//favicon.ico">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/as.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link href="plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" />
  <link rel="stylesheet" href="plugins/datatables/select.dataTables.min.css">
  

  
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo2.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo2.png" alt="Cirugias" class="brand-image elevation-3">
      <span class="brand-text text-center pl-4"><b>Cirugias</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">       
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="agregar.php" class="nav-link">
              <i class="nav-icon fas fa-plus"></i>
              <p>
                Agregar registro                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="registros.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Ver todos los registros
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="reporte.php" class="nav-link">
              <i class="nav-icon fas fa-clipboard"></i>
              <p>
                Generar reporte
              </p>
            </a>
          </li>
          <li class="nav-header border-top border-secondary">Ver cirugías por estados</li>
          <li class="nav-item">
            <a href="cirugiasEspera.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              En espera	
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cambioFechaCirugias.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Cambio de fecha
              </p>
            </a>
          </li>        
          <li class="nav-item">
            <a href="cirugiasSuspendidas.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Suspendidas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="cirugiasRealizadas.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
              Realizadas
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



