<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Gestion Colegio</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>
<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu lateral -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('profesor.dashboard') }}" class="app-brand-link">
            <img src="{{ asset('assets/Logocolegio.png') }}" alt="Logo Colegio" class="app-brand-logo demo" width="50">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Colegio Santo Ángel</span>
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
            </ul>
          </li>
          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Gestion de Notas</span>
          </li>
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-dock-top"></i>
              <div data-i18n="Account Settings">Ver Notas Estudiates</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.evidencia-planilla') }}" class="menu-link">
                  <div data-i18n="Account">Reportes o evidencia de notas</div>
                </a>
              </li>
            </ul>
          </li>
          <li class="menu-item">
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
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Gestión de Formatos</span></li>
          <li class="menu-item">
            <a href="cards-basic.html" class="menu-link">
              <i class="menu-icon tf-icons bx bx-collection"></i>
              <div data-i18n="Basic">Formato de Observadores </div>
            </a>
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
           <!-- Misc -->
           <li class="menu-header small text-uppercase"><span class="menu-header-text">Soporte</span></li>
          <li class="menu-item">
            <a
              href="https://wa.me/573208930349"
              target="_blank"
              class="menu-link">
              <i class="menu-icon tf-icons bx bx-support"></i>
              <div data-i18n="Support">Soporte Técnico</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menu lateral -->
       

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
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..." aria-label="Search..." />
              </div>
            </div>
            <ul class="navbar-nav flex-row align-items-center ms-auto">
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
                          <small class="text-muted">Profesor</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li><div class="dropdown-divider"></div></li>
                  <li>
                    <a class="dropdown-item" href="{{ url('/logout') }}">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Cerrar sesión</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Título de la página -->
            <h4 class="fw-bold py-3 mb-4">
              <a href="{{ route('dashboard') }}" class="text-muted fw-light" style="text-decoration: none;">Inicio</a>
              <span class="text-muted fw-light"> / </span>
              <a href="{{ route('profesor.dashboard') }}" class="text-muted fw-light" style="text-decoration: none;">Dashboard</a>
              <span class="text-muted fw-light"> / </span>
              <span class="fw-bold">Consulta de Certificados Académicos</span>
            </h4>

            <!-- Contenido principal: Formulario de búsqueda y listado -->
            <div class="container">
              <div class="header">
                <h2>Consulta de Certificados Académicos</h2>
                <p>Ingrese el número de documento del estudiante para consultar sus certificados.</p>
              </div>

              <form method="GET" action="{{ route('admin.certificados') }}" class="form-inline mb-4">
                <div class="form-group">
                  <label for="n_documento">Número de Documento:</label>
                  <input type="text" name="n_documento" id="n_documento" class="form-control mx-2" value="{{ $documento ?? '' }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
              </form>

              @if($documento)
                @if($estudiante)
                  <h4>Resultados para: {{ $estudiante->nombres }} {{ $estudiante->primer_apellido }} {{ $estudiante->segundo_apellido }}</h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Año</th>
                        <th>Grado</th>
                        <th>Tipo de Certificado</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse($certificados as $cert)
                        <tr>
                          <td>{{ $cert['anio'] }}</td>
                          <td>{{ $cert['grado'] }}</td>
                          <td>
                            @if($cert['tipo'] == 'academico')
                              Certificado Académico
                            @else
                              Certificado de Dimensiones
                            @endif
                          </td>
                          <td>
                            @if($cert['tipo'] == 'academico')
                              <a href="{{ route('profesordescarga.certificado', [$cert['id_estudiante'], $cert['anio']]) }}" class="btn btn-success btn-download" target="_blank">Descargar</a>
                            @else
                              <a href="{{ route('adminprofesor1al3.certificado-dimensiones', [$cert['id_estudiante'], $cert['anio']]) }}" class="btn btn-success btn-download" target="_blank">Descargar</a>
                            @endif
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td colspan="4">No se encontraron certificados para este estudiante.</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                @else
                  <div class="alert alert-warning">No se encontró ningún estudiante con el número de documento ingresado.</div>
                @endif
              @endif
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
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
        <!-- / Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- / Layout container -->

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
