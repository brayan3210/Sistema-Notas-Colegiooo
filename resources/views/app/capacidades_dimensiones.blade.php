<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr"
      data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" 
      data-template="vertical-menu-template-free">
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
  <link 
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" 
    rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
  <!-- Bootstrap Icons -->
  <link 
    rel="stylesheet" 
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link 
    rel="stylesheet" 
    href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

  <!-- Helpers -->
  <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
  <script src="{{ asset('assets/js/config.js') }}"></script>

  <style>
    /* Ajustes adicionales de estilo */
    .custom-table thead th {
      background-color: #f5f5f5;
      text-align: center;
      font-weight: 600;
    }
    .custom-table th,
    .custom-table td {
      vertical-align: middle !important;
      padding: 10px !important; /* Más espacio en celdas */
      font-size: 0.9rem;
    }
    .custom-select {
      min-height: 130px;
      line-height: 1.3; 
      font-size: 0.85rem;
      min-width: 390px; /* <-- AUMENTA EL ANCHO MÍNIMO */
    }
    .custom-textarea {
      font-size: 0.85rem;
      line-height: 1.3;
      min-height: 120px;
      min-width: 390px; /* <-- AUMENTA EL ANCHO MÍNIMO */

    }
    .section-title {
      margin-top: 2rem;
      margin-bottom: 1rem;
      font-weight: 600;
      font-size: 1.2rem;
    }
  </style>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

      <!-- Menú lateral -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="{{ route('profesor.dashboard') }}" class="app-brand-link">
            <img 
              src="{{ asset('assets/Logocolegio.png') }}" 
              alt="Logo Colegio" 
              class="app-brand-logo demo" 
              width="50">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">
              Colegio Santo Ángel
            </span>
          </a>
          <a href="javascript:void(0);" 
             class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
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
          <!-- Registrar Notas (Dimensiones) -->
          <li class="menu-item">
            <a href="{{route('profesor.dashboard.dimensiones')}}" class="menu-link" onclick="mostrarSeccion('registrar-notas')">
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
          <!-- Planilla de Notas -->
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
        <nav 
          class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" 
          id="layout-navbar"
        >
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a 
              class="nav-item nav-link px-0 me-xl-4" 
              href="javascript:void(0)"
            >
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- (Opcional) Barra de búsqueda, si se desea. -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User Dropdown -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a 
                  class="nav-link dropdown-toggle" 
                  href="javascript:void(0);" 
                  data-bs-toggle="dropdown"
                >
                  <div class="avatar avatar-online">
                    <img 
                      src="{{ asset('assets/logoadmin.png') }}" 
                      alt="User Image" 
                      class="w-px-40 h-auto rounded-circle" 
                    />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img 
                              src="{{ asset('assets/logoadmin.png') }}" 
                              alt="User Image" 
                              class="w-px-40 h-auto rounded-circle" 
                            />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">
                            {{ Auth::user()->name }}
                          </span>
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
              <!--/ User Dropdown -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Contenido Principal en un container -->
        <div class="container mt-4">
          @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
          @endif

          <!-- SECCIÓN (1) Registrar Capacidades por Dimensión (Seleccionar exist.) -->
          <h3 class="section-title">Registrar Capacidades por Dimensión</h3>
          <p>
            Seleccione las capacidades que logró cada estudiante en cada dimensión y período.
          </p>

          <form action="{{ route('profesor.capacidades.guardar') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="id_periodo" class="form-label">Periodo Académico:</label>
              <select 
                name="id_periodo" 
                id="id_periodo" 
                class="form-select d-inline-block w-auto" 
                required
              >
                <option value="" disabled selected>Seleccione un período</option>
                @foreach($periodos as $p)
                  <option value="{{ $p->id_periodo }}">{{ $p->nombre_periodo }}</option>
                @endforeach
              </select>
            </div>

            <div class="table-responsive">
              <table class="table table-bordered custom-table">
                <thead>
                  <tr>
                    <th>Estudiante</th>
                    @foreach($dimensiones as $dim)
                      <th>{{ $dim->nombre_dimension }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($estudiantes as $est)
                    <tr>
                      <td>
                        {{ $est->nombres }} 
                        {{ $est->primer_apellido }} 
                        {{ $est->segundo_apellido }}
                      </td>
                      @foreach($dimensiones as $dim)
                        <td style="min-width:250px;">
                          @php 
                            $capacidadesDeEstaDimension = $listaCapacidades[$dim->id_materia_dim] ?? [];
                          @endphp
                          @if(count($capacidadesDeEstaDimension) > 0)
                            <label style="font-size:12px;">Seleccione capacidades:</label>
                            <select 
                              name="selecciones[{{ $est->id_estudiante }}][{{ $dim->id_materia_dim }}][]" 
                              class="form-select form-select-sm custom-select"
                              multiple
                            >
                              @foreach($capacidadesDeEstaDimension as $cap)
                                <option value="{{ $cap->id_capacidad }}">
                                  {{ $cap->nombre_capacidad }}
                                </option>
                              @endforeach
                            </select>
                            <small class="text-muted">
                              Use Ctrl+Click para selección múltiple
                            </small>
                          @else
                            <em>No hay capacidades para esta dimensión</em>
                          @endif
                        </td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary mt-3">
              Guardar Capacidades
            </button>
          </form>

          <!-- SECCIÓN (2) Registrar NUEVAS Capacidades -->
          <h2 class="section-title">Registrar NUEVAS Capacidades</h2>
          <p class="text-muted">
            Digite las capacidades (una por línea) para cada Dimensión.
            Internamente se insertarán en <strong>capacidadesdimensiones</strong>
            con su ID de dimensión correspondiente.
          </p>

          <form action="{{ route('profesor.capacidades.nuevas') }}" method="POST" class="mb-5">
            @csrf
            <div class="table-responsive">
              <table class="table table-bordered custom-table">
                <thead>
                  <tr>
                    <th>Estudiante</th>
                    @foreach($dimensiones as $dim)
                      <th>{{ $dim->nombre_dimension }}</th>
                    @endforeach
                  </tr>
                </thead>
                <tbody>
                  @foreach($estudiantes as $est)
                    <tr>
                      <td>
                        {{ $est->nombres }} 
                        {{ $est->primer_apellido }} 
                        {{ $est->segundo_apellido }}
                      </td>
                      @foreach($dimensiones as $dim)
                        <td style="min-width:250px;">
                          <label style="font-size:12px;">Nuevas capacidades:</label>
                          <textarea 
                            name="nuevas[{{ $dim->id_materia_dim }}]" 
                            rows="4" 
                            class="form-control form-control-sm custom-textarea"
                            placeholder="Escriba cada capacidad en una línea"
                          ></textarea>
                        </td>
                      @endforeach
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <button type="submit" class="btn btn-primary">
              Guardar Nuevas Capacidades
            </button>
          </form>

        </div><!-- /container principal -->

      </div><!-- /layout-page -->
    </div><!-- /layout-container -->

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div><!-- /layout-wrapper -->

  <!-- Core JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- (Opcional) Script para mostrar/ocultar secciones si lo deseas -->
  <script>
    function mostrarSeccion(seccionId) {
      // tu lógica para ocultar o mostrar
    }
    function volverInicio() {
      // tu lógica para volver
    }
  </script>
</body>
</html>
