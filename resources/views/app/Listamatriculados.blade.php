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
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0);">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center ms-auto">
              <li class="nav-item navbar-dropdown dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <span>Buscar</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                  <form id="filtroForm" action="{{ route('inscritos.lista') }}" method="GET">
                    <div class="mb-3">
                      <label for="n_documento" class="form-label">Número de Documento</label>
                      <input type="text" name="n_documento" class="form-control" placeholder="Buscar por Documento">
                    </div>
                    <div class="mb-3">
                      <label for="id_grado" class="form-label">Grado</label>
                      <select class="form-select" name="id_grado" id="id_grado">
                        <option value="">Seleccione...</option>
                        @foreach(App\Models\Grado::all() as $grado)
                        <option value="{{ $grado->id_grado }}">{{ $grado->grados }}</option>
                        @endforeach
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Buscar</button>
                  </form>
                </ul>
              </li>
            </div>
            <!-- User Dropdown -->
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
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ url('/admin.cambiocontraseña') }}">
                      <i class="bx bx-lock me-2"></i>
                      <span class="align-middle">Cambiar Contraseña</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="{{ url('/logout') }}">
                      <i class="bx bx-power-off me-2"></i>
                      <span class="align-middle">Cerrar sesión</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <!--/ User Dropdown -->
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Contenido principal -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4">
  <a href="{{ route('dashboard') }}" class="text-muted fw-light" style="text-decoration: none;">Inicio</a>
  <span class="text-muted fw-light"> / </span>
  <a href="{{ route('inscritos.lista') }}" class="text-muted fw-light" style="text-decoration: none;">Administración</a>
  <span class="text-muted fw-light"> / </span>
  <span class="fw-bold">Lista de Matriculados</span>
</h4>


            <!-- Lista de Matriculados -->
            <div class="card">
              <h5 class="card-header">Lista de Estudiantes Matriculados</h5>
              <div class="table-responsive">
                <table class="table table-striped table-borderless border-bottom">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Número Documento</th>
                      <th>Grado</th>
                      <th>Estado Matrícula</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($matriculados as $matricula)
                    <tr>
                      <td>{{ $matricula->nombres }} {{ $matricula->primer_apellido }} {{ $matricula->segundo_apellido }}</td>
                      <td>{{ $matricula->n_documento }}</td>
                      <td>{{ $matricula->grado->grados }}</td>
                      <td>
                        @if($matricula->estado_matricula == 'Pago')
                        <span class="badge bg-success">Pago</span>
                        @else
                        <span class="badge bg-danger">Sin pagar</span>
                        @endif
                      </td>
                      <td>
                        <button type="button" class="btn btn-sm btn-info" onclick="showDetails({{ $matricula->id_estudiante }})">Ver Detalles</button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center mt-4 mb-4">
                  {{ $matriculados->links('pagination::bootstrap-4') }}
                </div>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Modal para Editar Detalles del Estudiante -->
      <!-- Modal para Editar Detalles del Estudiante -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModalLabel">Detalles del Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form id="detailsForm" action="" method="POST">
          @csrf
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre Completo</label>
            <input type="text" class="form-control" id="nombre" name="nombres" required>
          </div>
          <div class="mb-3">
            <label for="primer_apellido" class="form-label">Primer Apellido</label>
            <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
          </div>
          <div class="mb-3">
            <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
            <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" required>
          </div>
          <div class="mb-3">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
          </div>
          <div class="mb-3">
            <label for="n_documento" class="form-label">Número de Documento</label>
            <input type="text" class="form-control" id="n_documento" name="n_documento" required>
          </div>
          <div class="mb-3">
            <label for="id_grado" class="form-label">Grado</label>
            <select class="form-select" id="id_grado" name="id_grado" required>
              <option value="">Seleccione un grado</option>
              @foreach(App\Models\Grado::all() as $grado)
                <option value="{{ $grado->id_grado }}">{{ $grado->grados }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="estado_matricula" class="form-label">Estado Matrícula</label>
            <select class="form-select" id="estado_matricula" name="estado_matricula" required>
              <option value="Pago">Pago</option>
              <option value="Sin pagar">Sin pagar</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-select" id="estado" name="estado" required>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
              <option value="Finalizado">Finalizado</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>

          <!-- / Modal -->
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
      <!-- /Content wrapper -->
    </div>
    <!-- /Layout page -->
  </div>
  <!-- /Layout wrapper -->

  <!-- Core JS -->
  <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- SweetAlert JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Custom JS -->
  <script>
   function showDetails(id_estudiante) {
  $.ajax({
    url: '/Matriculaestudiantes/' + id_estudiante,
    type: 'GET',
    success: function(data) {
      $('#nombre').val(data.nombres);
      $('#primer_apellido').val(data.primer_apellido);
      $('#segundo_apellido').val(data.segundo_apellido);
      const fechaNacimiento = data.fecha_nacimiento ? data.fecha_nacimiento.split(' ')[0] : '';
      $('#fecha_nacimiento').val(fechaNacimiento);
      $('#n_documento').val(data.n_documento);

      // Preseleccionar el grado en el select
      $('#id_grado').val(data.id_grado);

      // Verificar si la opción correspondiente al grado existe antes de seleccionarla
      if ($('#id_grado option[value="' + data.id_grado + '"]').length > 0) {
        $('#id_grado').val(data.id_grado).trigger('change');
      }

      // Preseleccionar el estado de matrícula
      $('#estado_matricula').val(data.estado_matricula);

      // Preseleccionar el estado general (Activo, Inactivo, Finalizado)
      $('#estado').val(data.estado);

      // Asignar la acción al formulario
      $('#detailsForm').attr('action', '/ActualizarMatricula/' + id_estudiante);

      // Mostrar el modal
      $('#detailsModal').modal('show');
    },
    error: function(xhr) {
      if (xhr.status === 404) {
        Swal.fire('Error', 'Estudiante no encontrado.', 'error');
      } else {
        Swal.fire('Error', 'No se pudieron cargar los detalles del estudiante.', 'error');
      }
    }
  });
}


    $('#detailsForm').on('submit', function(e) {
      e.preventDefault();

      $('#detailsModal').modal('hide');

      setTimeout(() => {
        Swal.fire({
          title: '¿Estás seguro?',
          text: "¿Quieres guardar los cambios realizados?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Sí, guardar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: $(this).attr('action'),
              type: 'POST',
              data: $(this).serialize(),
              success: function(response) {
                Swal.fire({
                  title: 'Actualizado',
                  text: 'La información del estudiante ha sido actualizada exitosamente.',
                  icon: 'success'
                }).then(() => {
                  location.reload(); // Recarga la página después de confirmar en el éxito
                });
              },
              error: function() {
                Swal.fire('Error', 'No se pudo actualizar la información del estudiante.', 'error');
              }
            });
          } else {
            $('#detailsModal').modal('show');
          }
        });
      }, 500);
    });
  </script>
</body>

</html>