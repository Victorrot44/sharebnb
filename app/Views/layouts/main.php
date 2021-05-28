<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Sharebnb - <?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?= base_url('public/images/favicon.ico') ?>">

  <?= $this->renderSection('css') ?>

  <!-- App css -->
  <link href="<?= base_url('public/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?= base_url('public/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
</head>

<body>
  <!-- Navigation Bar-->
  <header id="topnav">
    <!-- Topbar Start -->
    <div class="navbar-custom">
      <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-right mb-0">
          <li class="dropdown notification-list">
            <!-- Mobile menu toggle-->
            <a class="navbar-toggle nav-link">
              <div class="lines">
                <span></span>
                <span></span>
                <span></span>
              </div>
            </a>
            <!-- End mobile menu toggle-->
          </li>
          <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
              <i class="fe-bell noti-icon"></i>
              <span class="badge badge-danger rounded-circle noti-icon-badge">9</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
              <!-- item-->
              <div class="dropdown-item noti-title">
                <h5 class="m-0">
                  <span class="float-right">
                    <a href="#" class="text-dark">
                      <small> Limpiar todo </small>
                    </a>
                  </span>Notificación
                </h5>
              </div>

              <div class="slimscroll noti-scroll">

                <!-- item img 
                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                  <div class="notify-icon">
                    <img src="<?= base_url('public/images/users/user-1.jpg') ?>" class="img-fluid rounded-circle" alt="" />
                  </div>
                  <p class="notify-details">Cristina Pride</p>
                  <p class="text-muted mb-0 user-msg">
                    <small>Hi, How are you? What about our next meeting</small>
                  </p>
                </a>
                -->

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-info">
                    <i class="fas fa-tools"></i>
                  </div>
                  <p class="notify-details"> Presupuesto del Mantenimiento
                    <small class="text-muted"> 08/05/2021</small>
                  </p>
                </a>

                <!-- item icon -->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-secondary">
                    <i class="fas fa-tools"></i>
                  </div>
                  <p class="notify-details"> Mantenimiento programado
                    <small class="text-muted"> 09/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-success">
                    <i class="fas fa-tools"></i>
                  </div>
                  <p class="notify-details"> Mantenimiento Concluido
                    <small class="text-muted"> 10/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-danger">
                    <i class="fas fa-tools"></i>
                  </div>
                  <p class="notify-details"> Incidencias: {Tipo de incidencia}
                    <small class="text-muted"> 09/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-danger">
                    <i class="fas fa-broom"></i>
                  </div>
                  <p class="notify-details"> Incidencias: {Tipo de incidencia}
                    <small class="text-muted"> 06/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-info">
                    <i class="fas fa-broom"></i>
                  </div>
                  <p class="notify-details"> Gastos de Limpieza
                    <small class="text-muted"> 06/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-success">
                    <i class="fas fa-home"></i>
                  </div>
                  <p class="notify-details"> Propiedad Reservada
                    <small class="text-muted"> 09/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-primary">
                    <i class="fas fa-home"></i>
                  </div>
                  <p class="notify-details"> Propiedad en Evento
                    <small class="text-muted"> 09/05/2021</small>
                  </p>
                </a>

                <a href="javascript:void(0);" class="dropdown-item notify-item">
                  <div class="notify-icon bg-danger">     
                    <i class="fas fa-home"></i>
                  </div>
                  <p class="notify-details"> Reservación Cancelada
                    <small class="text-muted"> 09/05/2021</small>
                  </p>
                </a>

              </div>

              <!-- All-->
              <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                Ver todo <i class="fi-arrow-right"></i>
              </a>
            </div>
          </li>

          <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button"
              aria-haspopup="false" aria-expanded="false">
              <img src="<?= base_url('public/images/users/user-1.jpg') ?>" alt="user-image" class="rounded-circle">
              <span class="pro-user-name ml-1">
                Propietario <i class="mdi mdi-chevron-down"></i>
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
              <!-- item-->
              <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenido !</h6>
              </div>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-user"></i>
                <span>Mi cuenta</span>
              </a>

              <div class="dropdown-divider"></div>

              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <i class="fe-log-out"></i>
                <span>Cerrar Sesión</span>
              </a>

            </div>
          </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
          <a href="index.html" class="logo text-center">
            <span class="logo-lg">
              <img src="<?= base_url('public/images/logo-light.png') ?>" alt="" height="16">
              <!-- <span class="logo-lg-text-light">UBold</span> -->
            </span>
            <span class="logo-sm">
              <!-- <span class="logo-sm-text-dark">U</span> -->
              <img src="<?= base_url('public/images/logo-sm.png') ?>" alt="" height="24">
            </span>
          </a>
        </div>

      </div>
    </div>
    <!-- end Topbar -->
    <div class="topbar-menu">
      <div class="container-fluid">
        <div id="navigation">
          <!-- Navigation Menu-->
          <ul class="navigation-menu">

            <li class="has-submenu">
              <a href="<?= base_url() ?>"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
            </li>

            <li class="has-submenu">
              <a href="#"> <i class="fas fa-users"></i> Propietarios <div class="arrow-down"></div> </a>
              <ul class="submenu">
                <li>
                  <ul>
                    <li> <a href="<?= base_url('propietarios') ?>"> <i class="fa fa-clipboard-list"></i> Lista de Propietarios </a> </li>
                    <li> <a href="<?= base_url('propietarios/nuevo-propietario') ?>"> <i class="fas fa-user-plus"></i> Añadir Propietario </a> </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="has-submenu">
              <a href="#"> <i class="mdi mdi-home-group"></i> Propietades <div class="arrow-down"></div> </a>
              <ul class="submenu">
                <li>
                  <ul>
                    <li> <a href="<?= base_url('propiedades') ?>"> <i class="fa fa-clipboard-list"></i> Listar Propiedades </a> </li>
                    <li> <a href="<?= base_url('propiedades/nueva-propiedad') ?>"> <i class="fa fa-plus-circle"></i> Añadir Propiedad </a> </li>
                  </ul>
                </li>
              </ul>
            </li>

            <li class="has-submenu">
              <a href="#"> <i class="fas fa-swatchbook"></i> Catálogos <div class="arrow-down"></div> </a>
              <ul class="submenu">
                <li> <a href="<?= base_url('catalogos/fecha-especial') ?>"> <i class="fas fa-calendar-day"></i> Fechas Especiales </a> </li>
              </ul>
            </li>

          </ul>
          <!-- End navigation menu -->
          <div class="clearfix"></div>
        </div>
        <!-- end #navigation -->
      </div>
      <!-- end container -->
    </div>
    <!-- end navbar-custom -->
  </header>
  <!-- End Navigation Bar-->

  <!-- ============================================================== -->
  <!-- Start Page Content here -->
  <!-- ============================================================== -->

  <?= $this->renderSection('content') ?>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->

  <!-- Footer Start -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <?= date('Y') ?> &copy; Desarrollado por <a href="https://scio.group">SCIO Group</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- end Footer -->
  
  <!-- ===================== JavaScript Section ===================== -->

  <!-- Vendor js -->
  <script src="<?= base_url('public/js/vendor.min.js') ?>"></script>

  <?= $this->renderSection('js') ?>

  <!-- App js-->
  <script src="<?= base_url('public/js/app.min.js') ?>"></script>
</body>
</html>