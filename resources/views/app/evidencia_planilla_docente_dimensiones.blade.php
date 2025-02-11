<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" 
      data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template-free">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Profesor - Gestión Colegio</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- Page CSS -->
  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menú lateral -->
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
          <!-- Inicio -->
          <li class="menu-item active">
            <a href="{{ route('profesor.dashboard') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div>Inicio</div>
            </a>
          </li>
          <!-- Registrar Notas -->
          <li class="menu-item">
            <a href="#" class="menu-link" onclick="mostrarSeccion('registrar-notas')">
              <i class="menu-icon tf-icons bx bx-pencil"></i>
              <div>Registrar Dimensiones</div>
            </a>
          </li>
          <!-- Ver Estudiantes -->
          <li class="menu-item">
            <a href="#" class="menu-link" onclick="mostrarSeccion('estudiantes')">
              <i class="menu-icon tf-icons bx bx-user"></i>
              <div>Ver Estudiantes</div>
            </a>
          </li>

          <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Gestión de Formatos</span>
          </li>
          <!-- Ejemplo de otros menús -->
          <li class="menu-item">
            <a href="{{ route('profesor.planilla-notas') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-collection"></i>
              <div data-i18n="Basic">Formato de Planilla de Notas</div>
            </a>
          </li>
          <!-- Cerrar Sesión -->
          <li class="menu-item">
            <a href="{{ url('/logout') }}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-power-off"></i>
              <div>Cerrar Sesión</div>
            </a>
          </li>
        </ul>
      </aside>
      <!-- / Menú lateral -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Opcional: Barra de búsqueda -->
            <!-- <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Buscar..." aria-label="Buscar..." />
              </div>
            </div> -->
            <!-- /Barra de búsqueda -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User Dropdown -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('assets/logoadmin.png') }}" alt="User Image" class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);">
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
                  <!-- Opciones adicionales si las hay -->
                  <li>
                    <a class="dropdown-item" href="{{ url('/logout') }}">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Cerrar sesión</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User Dropdown -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->
  <div class="container py-4">
    <h3 class="mb-4">Subir Evidencia de Planilla (Dimensiones)</h3>

    <!-- Mensajes -->
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Formulario -->
    <form action="{{ route('profesor.subir-evidencia-dimensiones') }}" 
          method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="id_periodo" class="form-label">Periodo Académico:</label>
        <select name="id_periodo" id="id_periodo" class="form-select" required>
          <option value="" selected disabled>Seleccione un período</option>
          @foreach($periodos as $periodo)
            <option value="{{ $periodo->id_periodo }}">{{ $periodo->nombre_periodo }}</option>
          @endforeach
        </select>
      </div>

      <h5>Seleccione la evidencia para cada Dimensión</h5>
      @foreach($dimensiones as $dim)
        <div class="mb-3">
          <label class="form-label">{{ $dim->nombre_dimension }}</label>
          <input type="file" name="evidencias[{{ $dim->id_materia_dim }}]" 
                 class="form-control" accept=".pdf,image/*">
          <small class="text-muted">Formatos permitidos: PDF o imagen.</small>
        </div>
      @endforeach

      <button type="submit" class="btn btn-primary">Subir Evidencia</button>
    </form>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
