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
              <div>Registrar Notas</div>
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
              <span class="fw-bold">Lista de Matriculados</span>
            </h4>

            <!-- Mostrar mensajes de éxito y errores -->
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

            <!-- Panel de Opciones -->
            <div class="row" id="panel-opciones">
              <div class="col-md-6 col-lg-6 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Registrar Notas</h5>
                    <p class="card-text">Ingrese y actualice las notas de sus estudiantes.</p>
                    <button class="btn btn-primary" onclick="mostrarSeccion('registrar-notas')">Acceder</button>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 mb-4">
                <div class="card h-100">
                  <div class="card-body text-center">
                    <i class="bi bi-people-fill" style="font-size: 3rem;"></i>
                    <h5 class="card-title mt-3">Ver Estudiantes</h5>
                    <p class="card-text">Consulte la lista de estudiantes y genere reportes.</p>
                    <button class="btn btn-primary" onclick="mostrarSeccion('estudiantes')">Acceder</button>
                  </div>
                </div>
              </div>
              <div class="row" id="panel-opciones">
                <div class="col-md-6 col-lg-6 mb-4">
                  <div class="card h-100">
                    <div class="card-body text-center">
                      <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                      <h5 class="card-title mt-3">Subir Evidencia Planilla Notas</h5>
                      <p class="card-text">Requisito de rectoria subir evidencia de cada planilla de notas de cada materia en sus periodos academicos.</p>
                      <a class="btn btn-primary" href="{{route('profesor.subir-evidencia.form')}}">Acceder</a>
                    </div>
                  </div>
                </div>
                </div>
            </div>

            <!-- Sección: Registrar Notas -->
            <div class="card mb-4" id="registrar-notas" style="display: none;">
              <h5 class="card-header">Registrar Notas</h5>
              <div class="card-body">
                <form action="{{ route('profesor.registrar-notas') }}" method="POST">
                  @csrf
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="id_materia" class="form-label">Materia:</label>
                      <select name="id_materia" class="form-select" required>
                        <option value="" selected disabled>Seleccione una materia</option>
                        @foreach ($materias as $materia)
                          <option value="{{ $materia->id_materia }}">
                            @if($materia->id_materia_padre)
                              - {{ $materia->nombre_materia }}
                            @else
                              {{ $materia->nombre_materia }}
                            @endif
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-md-6">
                      <label for="id_periodo" class="form-label">Periodo:</label>
                      <select name="id_periodo" id="id_periodo" class="form-select" required>
                        <option value="" selected disabled>Seleccione un período</option>
                        @foreach ($periodos as $periodo)
                          <option value="{{ $periodo->id_periodo }}">{{ $periodo->nombre_periodo }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Estudiante</th>
                          <th>Heteroevaluación (70%)</th>
                          <th>Autoevaluación (15%)</th>
                          <th>Coautoevaluación (15%)</th>
                          <th>Nota Definitiva</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($estudiantes as $estudiante)
                          <tr>
                            <td>{{ $estudiante->nombres }} {{ $estudiante->primer_apellido }} {{ $estudiante->segundo_apellido }}</td>
                            <td>
                              <input type="number" step="0.1" class="form-control hetero" 
                                     name="notas[{{ $estudiante->id_estudiante }}][hetero]" 
                                     min="0" max="5" required>
                            </td>
                            <td>
                              <input type="number" step="0.1" class="form-control auto" 
                                     name="notas[{{ $estudiante->id_estudiante }}][auto]" 
                                     min="0" max="5" required>
                            </td>
                            <td>
                              <input type="number" step="0.1" class="form-control coauto" 
                                     name="notas[{{ $estudiante->id_estudiante }}][coauto]" 
                                     min="0" max="5" required>
                            </td>
                            <td>
                              <!-- Se guarda la definitiva de ESTE período -->
                              <input type="number" step="0.01" class="form-control definitiva" 
                                     name="notas[{{ $estudiante->id_estudiante }}][nota]" 
                                     readonly>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>

                  <button type="submit" class="btn btn-primary mt-3">Registrar Notas</button>
                </form>
              </div>
            </div>

            <!-- Script de cálculo automático de la nota (70% + 15% + 15%) -->
            <script>
              document.querySelectorAll('table tbody tr').forEach(row => {
                const heteroInput = row.querySelector('.hetero');
                const autoInput = row.querySelector('.auto');
                const coautoInput = row.querySelector('.coauto');
                const definitivaInput = row.querySelector('.definitiva');

                [heteroInput, autoInput, coautoInput].forEach(input => {
                  input.addEventListener('input', () => {
                    const hetero = parseFloat(heteroInput.value) || 0;
                    const auto = parseFloat(autoInput.value) || 0;
                    const coauto = parseFloat(coautoInput.value) || 0;

                    const definitiva = (hetero * 0.7) + (auto * 0.15) + (coauto * 0.15);
                    definitivaInput.value = definitiva.toFixed(2);
                  });
                });
              });
            </script>

            <!-- Sección: Listado de Estudiantes -->
            <div class="card mb-4" id="estudiantes" style="display: none;">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Estudiantes del Grado Asignado</h5>
                <!-- Botón para abrir el modal de agregar estudiante -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarEstudianteModal">
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
                          <td>{{ $estudiante->nombres }} {{ $estudiante->primer_apellido }} {{ $estudiante->segundo_apellido }}</td>
                          <td>{{ $estudiante->n_documento }}</td>
                          <td>
                            <a href="{{ route('profesor.reporte-pdf', $estudiante->id_estudiante) }}" 
                               class="btn btn-sm btn-primary">
                              Descargar Boletin
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <button type="button" class="btn btn-secondary mt-3" onclick="volverInicio()">Volver</button>
              </div>
            </div>

            <!-- Modal para agregar estudiante -->
            <div class="modal fade" id="agregarEstudianteModal" tabindex="-1" aria-labelledby="agregarEstudianteModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <form action="{{ route('profesor.agregar-estudiante') }}" method="POST">
                  @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="agregarEstudianteModalLabel">Agregar Estudiante</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="nombres" class="form-label">Nombres:</label>
                        <input type="text" name="nombres" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="primer_apellido" class="form-label">Primer Apellido:</label>
                        <input type="text" name="primer_apellido" class="form-control" required>
                      </div>
                      <div class="mb-3">
                        <label for="segundo_apellido" class="form-label">Segundo Apellido:</label>
                        <input type="text" name="segundo_apellido" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="n_documento" class="form-label">Número de Documento:</label>
                        <input type="text" name="n_documento" class="form-control" required>
                      </div>
                      <!-- Campo oculto para id_grado -->
                      <input type="hidden" name="id_grado" value="{{ Auth::user()->id_grado }}">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Agregar Estudiante</button>
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                © <script>document.write(new Date().getFullYear());</script>, Diseñado y Adaptado por 
                <a href="https://bryan-dev.com/" class="footer-link fw-bolder">Bryan Dev S.A</a>
              </div>
              <div>
                <a href="https://wa.me/573208930349" class="footer-link me-4">Soporte Técnico</a>
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
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('admin.change.password') }}" method="POST">
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
  <!-- Mostrar/ocultar secciones -->
  <script>
    function mostrarSeccion(seccionId) {
      document.getElementById('panel-opciones').style.display = 'none';
      document.getElementById('registrar-notas').style.display = 'none';
      document.getElementById('estudiantes').style.display = 'none';

      document.getElementById(seccionId).style.display = 'block';
      window.scrollTo(0, 0);
    }

    function volverInicio() {
      document.getElementById('registrar-notas').style.display = 'none';
      document.getElementById('estudiantes').style.display = 'none';
      document.getElementById('panel-opciones').style.display = 'flex';
    }
  </script>
  @if(session('open_section'))
<script>
document.addEventListener('DOMContentLoaded', function() {
  mostrarSeccion('{{ session("open_section") }}');
});
</script>
@endif
</body>
</html>
