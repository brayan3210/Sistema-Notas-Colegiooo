  <!DOCTYPE html>
  <html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Gestion Colegio</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <!-- <link rel="stylesheet" href="{{asset('css/demo.css')}}" /> -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <!-- Reemplazamos el logo SVG por la imagen -->
              <img src="{{ asset('assets/Logocolegio.png') }}" alt="Logo Colegio" class="app-brand-logo demo" width="50">
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Colegio Santo Angel</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Inicio</div>
              </a>
            </li>
            <!-- Layouts -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestion De Información</span></li>

            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div data-i18n="Layouts">Administrar Información</div>
              </a>

              <ul class="menu-sub">
              <li class="menu-item">
                  <a href="{{ route('registro') }}" class="menu-link">
                    <div data-i18n="Without menu">Registro de Usuarios</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('admin.lista') }}" class="menu-link">
                    <div data-i18n="Without menu">Lista de Administradores</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ route('inscritos.lista') }}" class="menu-link">
                    <div data-i18n="Without navbar">Lista de Matriculados</div>
                  </a>
                </li>
                <!-- <li class="menu-item">
                  <a href="{{ route('pensiones.index') }}" class="menu-link">
                    <div data-i18n="Container">Gestion de Pensiones</div>
                  </a>
                </li> -->
                <!-- <li class="menu-item">
                  <a href="layouts-fluid.html" class="menu-link">
                    <div data-i18n="Fluid">Fluid</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="layouts-blank.html" class="menu-link">
                    <div data-i18n="Blank">Blank</div>
                  </a>
                </li> -->
              </ul>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Gestion de Notas</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Gestion de Notas Estudiantes</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="{{ route('admin.evidencia-planilla') }}" class="menu-link">
                    <div data-i18n="Account">Evidencia Planilla Notas</div>
                  </a>
                </li>
          
                <li class="menu-item">
                  <a href="pages-account-settings-connections.html" class="menu-link">
                    <div data-i18n="Connections">Certificados de Notas</div>
                  </a>
                </li> 
              </ul>
            </li>
            <li class="menu-item">
              <!-- <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                <div data-i18n="Authentications">Authentications</div>
              </a> -->
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="auth-login-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Login</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="auth-register-basic.html" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Register</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="{{ asset('html/auth-forgot-password-basic.html')}}" class="menu-link" target="_blank">
                    <div data-i18n="Basic">Forgot Password</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <!-- <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">Misc</div>
              </a> -->
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="pages-misc-error.html" class="menu-link">
                    <div data-i18n="Error">Error</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="pages-misc-under-maintenance.html" class="menu-link">
                    <div data-i18n="Under Maintenance">Under Maintenance</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Components -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestión de Formatos</span></li>
            <!-- Cards -->
            <li class="menu-item">
              <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Formato de Observadores </div>
              </a>
            </li>
            <!-- User interface -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="User interface">Formato de Planilla de Notas</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="ui-accordion.html" class="menu-link">
                    <div data-i18n="Accordion">Accordion</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-alerts.html" class="menu-link">
                    <div data-i18n="Alerts">Alerts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-badges.html" class="menu-link">
                    <div data-i18n="Badges">Badges</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-buttons.html" class="menu-link">
                    <div data-i18n="Buttons">Buttons</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-carousel.html" class="menu-link">
                    <div data-i18n="Carousel">Carousel</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-collapse.html" class="menu-link">
                    <div data-i18n="Collapse">Collapse</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-dropdowns.html" class="menu-link">
                    <div data-i18n="Dropdowns">Dropdowns</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-footer.html" class="menu-link">
                    <div data-i18n="Footer">Footer</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-list-groups.html" class="menu-link">
                    <div data-i18n="List Groups">List groups</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-modals.html" class="menu-link">
                    <div data-i18n="Modals">Modals</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-navbar.html" class="menu-link">
                    <div data-i18n="Navbar">Navbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-offcanvas.html" class="menu-link">
                    <div data-i18n="Offcanvas">Offcanvas</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-pagination-breadcrumbs.html" class="menu-link">
                    <div data-i18n="Pagination &amp; Breadcrumbs">Pagination &amp; Breadcrumbs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-progress.html" class="menu-link">
                    <div data-i18n="Progress">Progress</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-spinners.html" class="menu-link">
                    <div data-i18n="Spinners">Spinners</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tabs-pills.html" class="menu-link">
                    <div data-i18n="Tabs &amp; Pills">Tabs &amp; Pills</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-toasts.html" class="menu-link">
                    <div data-i18n="Toasts">Toasts</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-tooltips-popovers.html" class="menu-link">
                    <div data-i18n="Tooltips & Popovers">Tooltips &amp; popovers</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="ui-typography.html" class="menu-link">
                    <div data-i18n="Typography">Typography</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Extended components -->
            <li class="menu-item">
              <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="Extended UI">Extended UI</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="extended-ui-perfect-scrollbar.html" class="menu-link">
                    <div data-i18n="Perfect Scrollbar">Perfect scrollbar</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="extended-ui-text-divider.html" class="menu-link">
                    <div data-i18n="Text Divider">Text Divider</div>
                  </a>
                </li>
              </ul>
            </li>

            <li class="menu-item">
              <a href="icons-boxicons.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-crown"></i>
                <div data-i18n="Boxicons">Boxicons</div>
              </a>
            </li>

            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
            <!-- Forms -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Form Elements</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="forms-basic-inputs.html" class="menu-link">
                    <div data-i18n="Basic Inputs">Basic Inputs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="forms-input-groups.html" class="menu-link">
                    <div data-i18n="Input groups">Input groups</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Layouts">Form Layouts</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="form-layouts-vertical.html" class="menu-link">
                    <div data-i18n="Vertical Form">Vertical Form</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="form-layouts-horizontal.html" class="menu-link">
                    <div data-i18n="Horizontal Form">Horizontal Form</div>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Tables -->
            <li class="menu-item">
              <a href="tables-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Tables</div>
              </a>
            </li>
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
            <li class="menu-item">
              <a
                href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-support"></i>
                <div data-i18n="Support">Support</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                target="_blank"
                class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="Documentation">Documentation</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User Dropdown -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{ asset('assets/logoadmin.png') }}" alt="User Image" class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" id="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{ asset('assets/logoadmin.png') }}" alt="User Image" class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <!-- <li>
                      <a class="dropdown-item" href="{{ url('/admin.cambiocontraseña') }}">
                        <i class="bx bx-lock me-2"></i>
                        <span class="align-middle">Cambiar Contraseña</span>
                      </a>
                    </li> -->
                    <li>
                      <a class="dropdown-item" href="{{ url('/logout') }}">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Cerrar sesión</span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User Dropdown -->
              </ul>
            </div>
          </nav>
          <!-- / Navbar -->

          <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Nuevo mensaje de bienvenida -->
            <h4 class="fw-bold py-3 mb-4">
              <span class="text-muted fw-light">Inicio /</span> Dashboard Administrador
            </h4>
            <div class="card mb-4">
              <div class="card-body">
                <h5 class="card-title text-primary">Bienvenido!</h5>
                <p class="mb-4">
                  Seleccione la opción que desea realizar en el panel de abajo.
                </p>
                <!-- <div class="card-body pb-0 px-0 px-md-4">
                        <img
                          src="../assets/img/illustrations/man-with-laptop-light.png"
                          height="140"
                          alt="View Badge User"
                          data-app-dark-img="illustrations/man-with-laptop-dark.png"
                          data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div> -->
              </div>
            </div>

            <!-- Panel de Opciones -->
            <div class="row">
              <!-- Lista de Administradores -->
              <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-people" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Lista de Administradores</h5>
                    <p class="card-text">VEA LA LISTA DE USUARIOS ADMINISTRADORES DE LA PLATAFORMA</p>
                    <a href="{{ route('admin.lista') }}" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>

              <!-- Lista de Matriculados -->
              <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-file-person" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Lista de Matriculados</h5>
                    <p class="card-text">GESTIONE LA INFORMACION DE ASPIRANTES MATRICULADOS, ASI COMO SUS DATOS PERSONALES ENTRE OTROS</p>
                    <a href="{{ route('inscritos.lista') }}" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>

              <!-- Gestion de certificados -->
              <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Gestion de Certificados de Notas</h5>
                    <p class="card-text">GESTIONE Y DESCARGUE CERTIFICADOS DE NOTAS DE CADA ESTUDIANTE BUSCANDOLOS POR NUMERO DE DOCUMENTO.</p>
                    <a href="{{ route('admin.certificados') }}" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <!-- Gestión de notas de estudiantes -->
              <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Registro de Usuario Administradores-Profesores</h5>
                    <p class="card-text">CREE UN NUEVO USUARIO ADMINISTRADOR O DOCENTE POR GRADO PARA QUE COMIENZE A GESTIONAR LAS NOTAS .</p>
                    <!-- Ruta por definir -->
                    <a href="{{route('registro')}}" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Consulte Evidencias de Planillas de Notas</h5>
                    <p class="card-text">GESTIONE Y CONSULTE LAS EVIDENCAS DE CADA PLANILLA DE NOTAS SEGUN SU GRADO Y POR CADA MATERIA </p>
                    <!-- Ruta por definir -->
                    <a href="{{ route('admin.evidencia-planilla') }}" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>

              <!-- Subir/Actualizar formatos de observador -->
              <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-upload" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Subir/Actualizar Observadores</h5>
                    <p class="card-text">SUBA O ACTUALIZE ESTOS FORMATOS</p>
                    <!-- Ruta por definir -->
                    <a href="javascript:void(0);" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-upload" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Crear Publicaciones Seccion Noticias</h5>
                    <p class="card-text">CREE PUBLICACIONES PARA LA SECCION DE NOTICIAS </p>
                    <!-- Ruta por definir -->
                    <a href="{{route('CrearPublicacion')}}" class="btn btn-primary">Acceder</a>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <!-- / Content -->

         <!-- Footer -->
         <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between 
                        py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                © <script>
                  document.write(new Date().getFullYear());
                </script>,
                Diseñado y Adaptado por
                <a href="https://bryan-dev.com/" class="footer-link fw-bolder">Bryan Dev S.A</a>
              </div>
              <div>
                <a href="https://wa.me/573208930349" class="footer-link me-4">
                  Soporte Técnico
                </a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script> -->
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Modal para cambiar contraseña -->
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('change.password') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel">Cambiar Contraseña</h5>
          <!-- (Opcional) Botón de cierre, pero si deseas forzar el cambio, puedes omitirlo -->
        </div>
        <div class="modal-body">
          @if($errors->has('new_password'))
            <div class="alert alert-danger">
              {{ $errors->first('new_password') }}
            </div>
          @endif
          <div class="mb-3">
            <label for="new_password" class="form-label">Nueva Contraseña</label>
            <input type="password" class="form-control" id="new_password" name="new_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirmar Nueva Contraseña</label>
            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Actualizar Contraseña</button>
        </div>
      </div>
    </form>
  </div>
</div>
@if(Auth::user()->force_change_password)
<script>
document.addEventListener('DOMContentLoaded', function () {
    var modalEl = document.getElementById('changePasswordModal');
    if (modalEl) {
        var myModal = new bootstrap.Modal(modalEl, {
            backdrop: 'static',
            keyboard: false
        });
        myModal.show();
    }
});
</script>
@endif

</body>

</html>