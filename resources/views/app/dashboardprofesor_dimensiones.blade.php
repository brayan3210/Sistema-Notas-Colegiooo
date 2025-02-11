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
          <!-- Registrar Notas (ahora Dimensiones) -->
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
        <nav class="layout-navbar navbar navbar-expand-xl navbar-detached 
                    align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center 
                      me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Opcional: Barra de búsqueda -->
            <!--
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" 
                       placeholder="Buscar..." aria-label="Buscar..." />
              </div>
            </div>
            -->
            <!-- /Barra de búsqueda -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- User Dropdown -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0);"
                  data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="{{ asset('assets/logoadmin.png') }}"
                      alt="User Image"
                      class="w-px-40 h-auto rounded-circle" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="{{ asset('assets/logoadmin.png') }}"
                              alt="User Image"
                              class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                          <small class="text-muted">Profesor</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
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

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Título de la página -->
            <h4 class="fw-bold py-3 mb-4">
              <a href="{{ route('dashboard') }}" class="text-muted fw-light"
                style="text-decoration: none;">Inicio</a>
              <span class="text-muted fw-light"> / </span>
              <a href="{{ route('profesor.dashboard') }}" class="text-muted fw-light"
                style="text-decoration: none;">Dashboard</a>
              <span class="text-muted fw-light"> / </span>
              <span class="fw-bold">Lista de Matriculados</span>
            </h4>

            <!-- Mensajes de éxito y error -->
            @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
            @endif

            <!-- Panel de Opciones (visible por defecto) -->
            <div class="row" id="panel-opciones">
              <!-- Registrar Dimensiones -->
              <div class="col-md-6 col-lg-6 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Registrar Dimensiones</h5>
                    <p class="card-text">
                      Ingrese y actualice el desempeño de cada dimensión
                      de sus estudiantes.
                    </p>
                    <button class="btn btn-primary"
                      onclick="mostrarSeccion('registrar-notas')">
                      Acceder
                    </button>
                  </div>
                </div>
              </div>
              <!-- Nuevo panel de "Registrar Capacidades" -->
              <div class="col-md-6 col-lg-6 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-clipboard-check" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Registrar Capacidades Logradas</h5>
                    <p class="card-text">
                      Seleccione qué capacidades ha logrado cada estudiante en cada periodo y dimensión.
                    </p>
                    <a class="btn btn-primary" href="{{ route('profesor.capacidades.form') }}">
                      Acceder
                    </a>
                  </div>
                </div>
              </div>

              <!-- Ver Estudiantes -->
              <div class="col-md-6 col-lg-6 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-people-fill" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Ver Estudiantes</h5>
                    <p class="card-text">
                      Consulte la lista de estudiantes y genere reportes.
                    </p>
                    <button class="btn btn-primary"
                      onclick="mostrarSeccion('estudiantes')">
                      Acceder
                    </button>
                  </div>
                </div>
              </div>
              <!-- Subir Evidencia Planilla Notas -->
              <div class="col-md-6 col-lg-6 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">
                      Subir Evidencia Planilla Notas
                    </h5>
                    <p class="card-text">
                      Requisito de rectoría: subir evidencia de cada planilla
                      de notas de cada materia en sus periodos académicos.
                    </p>
                    <a class="btn btn-primary"
                      href="{{ route('profesor.subir-evidencia-dimensiones.form') }}">
                      Acceder
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <!-- Sección: Registrar Dimensiones (oculta por defecto) -->
            <div class="card mb-4" id="registrar-notas" style="display: none;">
              <div class="card-header">
                <h5 class="mb-0">Evaluación de Dimensiones</h5>
              </div>
              <div class="card-body">
                <!-- Mensajes -->
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif

                <!-- Formulario para registrar evaluaciones -->
                <form action="{{ route('profesor.registrar-dimensiones') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="id_periodo" class="form-label">Periodo Académico:</label>
                    <select name="id_periodo" id="id_periodo" class="form-select" required>
                      <option value="" selected disabled>Seleccione un período</option>
                      @foreach($periodos as $periodo)
                      <option value="{{ $periodo->id_periodo }}">
                        {{ $periodo->nombre_periodo }}
                      </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Estudiante</th>
                          @foreach($dimensiones as $dim)
                          @if($dim->nombre_dimension !== 'COMPORTAMIENTO')
                          <th>{{ $dim->nombre_dimension }}</th>
                          @endif
                          @endforeach
                          <th>Comportamiento</th> <!-- Casilla para la textarea -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($estudiantes as $estudiante)
                        <tr>
                          <td>
                            {{ $estudiante->nombres }} {{ $estudiante->primer_apellido }} {{ $estudiante->segundo_apellido }}
                          </td>

                          @foreach($dimensiones as $dim)
                          @if($dim->nombre_dimension !== 'COMPORTAMIENTO')
                          <td style="min-width:180px;">
                            <div class="mb-2">
                              <label for="desempeno_{{ $estudiante->id_estudiante }}_{{ $dim->id_materia_dim }}" class="form-label" style="font-size: 12px;">Desempeño</label>
                              <select
                                id="desempeno_{{ $estudiante->id_estudiante }}_{{ $dim->id_materia_dim }}"
                                name="evaluaciones[{{ $estudiante->id_estudiante }}][{{ $dim->id_materia_dim }}][desempeno]"
                                class="form-select form-select-sm"
                                style="font-size:12px;"
                                required>
                                <option value="" disabled selected>Seleccione</option>
                                <option value="Bajo">Bajo</option>
                                <option value="Básico">Básico</option>
                                <option value="Alto">Alto</option>
                                <option value="Superior">Superior</option>
                              </select>
                            </div>

                            <div>
                              <label for="fallas_{{ $estudiante->id_estudiante }}_{{ $dim->id_materia_dim }}" class="form-label" style="font-size: 12px;">Fallas</label>
                              <input
                                type="number"
                                id="fallas_{{ $estudiante->id_estudiante }}_{{ $dim->id_materia_dim }}"
                                name="evaluaciones[{{ $estudiante->id_estudiante }}][{{ $dim->id_materia_dim }}][fallas]"
                                class="form-control form-control-sm"
                                style="font-size:12px; width:100px;"
                                min="0"
                                value="0">
                            </div>
                          </td>
                          @endif
                          @endforeach

                          <!-- Campo de comportamiento (textarea) -->
                          <td style="width:150px;">
                            <textarea
                              name="comportamiento[{{ $estudiante->id_estudiante }}]"
                              class="form-control"
                              rows="3"
                              placeholder="Ingrese el comportamiento (máx 200 palabras)"
                              style="font-size:12px;"></textarea>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>

                  </div>
                  <button type="submit" class="btn btn-primary mt-3">
                    Registrar Evaluaciones
                  </button>
                </form>
                <!-- Botón para volver al panel principal -->
                <button type="button" class="btn btn-secondary mt-3"
                  onclick="volverInicio()">Volver</button>
              </div>
            </div>

            <!-- Sección: Listado de Estudiantes (oculta por defecto) -->
            <div class="card mb-4" id="estudiantes" style="display: none;">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Estudiantes del Grado Asignado</h5>
                <!-- Botón para abrir el modal de agregar estudiante -->
                <button type="button" class="btn btn-primary"
                  data-bs-toggle="modal" data-bs-target="#agregarEstudianteModal">
                  Agregar Estudiante
                </button>
              </div>
              <div class="card-body">
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Documento</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($estudiantes as $estudiante)
                      <tr>
                        <td>
                          {{ $estudiante->nombres }}
                          {{ $estudiante->primer_apellido }}
                          {{ $estudiante->segundo_apellido }}
                        </td>
                        <td>{{ $estudiante->n_documento }}</td>
                        <td>
                          <a href="{{ route('profesor.reporte-dimensiones-pdf', $estudiante->id_estudiante) }}"
                            class="btn btn-sm btn-primary">
                            Generar Boletin
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <button type="button" class="btn btn-secondary mt-3"
                  onclick="volverInicio()">Volver</button>
              </div>
            </div>

            <!-- Modal para agregar estudiante -->
            <div class="modal fade" id="agregarEstudianteModal" tabindex="-1"
              aria-labelledby="agregarEstudianteModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form action="{{ route('profesor.agregar-estudiante') }}" method="POST">
                  @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="agregarEstudianteModalLabel">
                        Agregar Estudiante
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres:</label>
                        <input type="text" name="nombres" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="primer_apellido" class="form-label">
                          Primer Apellido:
                        </label>
                        <input type="text" name="primer_apellido" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="segundo_apellido" class="form-label">
                          Segundo Apellido:
                        </label>
                        <input type="text" name="segundo_apellido" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="n_documento" class="form-label">
                          Número de Documento:
                        </label>
                        <input type="text" name="n_documento" class="form-control" required>
                      </div>
                      <!-- Campo oculto para id_grado -->
                      <input type="hidden" name="id_grado" value="{{ Auth::user()->id_grado }}">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">
                        Agregar Estudiante
                      </button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                      </button>
                    </div>
                  </div>
                </form>
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
  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Modal para cambiar contraseña forzado (si aplica) -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1"
    aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{ route('admin.change.password') }}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="changePasswordModalLabel">
              Cambiar Contraseña
            </h5>
            <!-- Botón de cierre opcional -->
          </div>
          <div class="modal-body">
            @if($errors->has('new_password'))
            <div class="alert alert-danger">
              {{ $errors->first('new_password') }}
            </div>
            @endif
            <div class="mb-3">
              <label for="new_password" class="form-label">Nueva Contraseña</label>
              <input type="password" class="form-control" id="new_password"
                name="new_password" required>
            </div>
            <div class="mb-3">
              <label for="new_password_confirmation" class="form-label">
                Confirmar Nueva Contraseña
              </label>
              <input type="password" class="form-control"
                id="new_password_confirmation"
                name="new_password_confirmation" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">
              Actualizar Contraseña
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @if(Auth::user()->force_change_password)
  <script>
    document.addEventListener('DOMContentLoaded', function() {
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

  <!-- Mostrar/ocultar secciones -->
  <script>
    function mostrarSeccion(seccionId) {
      // Ocultar panel de opciones
      document.getElementById('panel-opciones').style.display = 'none';

      // Ocultar las otras secciones
      document.getElementById('registrar-notas').style.display = 'none';
      document.getElementById('estudiantes').style.display = 'none';

      // Mostrar la sección solicitada
      const sectionToShow = document.getElementById(seccionId);
      if (sectionToShow) {
        sectionToShow.style.display = 'block';
      }
      window.scrollTo(0, 0);
    }

    function volverInicio() {
      // Ocultar secciones
      document.getElementById('registrar-notas').style.display = 'none';
      document.getElementById('estudiantes').style.display = 'none';

      // Mostrar el panel de opciones
      document.getElementById('panel-opciones').style.display = 'flex';
    }
  </script>
  <!-- Si existe la variable de sesión "open_section", mostramos esa sección al recargar -->
@if(session('open_section'))
<script>
document.addEventListener('DOMContentLoaded', function() {
  mostrarSeccion('{{ session("open_section") }}');
});
</script>
@endif
</body>

</html>