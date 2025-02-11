<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Administradores - Gestion Colegio</title>
  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

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
                  <div data-i18n="Account">Evidencia Planilla de notas</div>
                </a>
              </li>
            </ul>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{ route('admin.certificados') }}" class="menu-link">
                  <div data-i18n="Account">Certificado de Notas</div>
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

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
          <h4 class="fw-bold py-3 mb-4">
  <a href="{{ route('dashboard') }}" class="text-muted fw-light" style="text-decoration: none;">Inicio</a>
  <span class="text-muted fw-light"> / </span>
  <a href="{{ route('admin.lista') }}" class="text-muted fw-light" style="text-decoration: none;">Administración</a>
  <span class="text-muted fw-light"> / </span>
  <span class="fw-bold">Lista de Administradores</span>
</h4>


                    <!-- Tabla de Administradores -->
                    <div class="card">
              <h5 class="card-header">Listar Administradores</h5>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Email</th>
                      <th>Rol</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datos as $dato)
                      <tr>
                      <td>{{ $dato->name }}</td>
        <td>{{ $dato->email }}</td>
        <td>
          @if($dato->is_admin == 0)
            Usuario
          @elseif($dato->is_admin == 1)
            Admin
          @elseif($dato->is_admin == 2)
            Profesor
          @endif
        </td>
        <td>
                          <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $dato->id_usuario }}" data-name="{{ $dato->name }}" data-email="{{ $dato->email }}" data-role="{{ $dato->is_admin }}">Editar</button>
                          <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $dato->id_usuario }})">Eliminar</button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="d-flex justify-content-center">
                   {{ $datos->links() }}
                 </div>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Modal para Editar Administrador -->
          <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Editar Administrador</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm" action="" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="mb-3">
                      <label for="name" class="form-label">Nombre</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                      <label for="is_admin" class="form-label">Rol</label>
                      <select id="is_admin" name="is_admin" class="form-select" required>
                        <option value="1">Admin</option>
                        <option value="0">Usuario</option>
                        <option value="2">Profesor</option>

                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" onclick="confirmUpdate()" class="btn btn-primary">Actualizar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

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

  <!-- SweetAlert2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Main JS -->
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <!-- Custom Script for Modal and Alerts -->
  <script>
    let editForm = document.getElementById('editForm');

    document.getElementById('editModal').addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const id = button.getAttribute('data-id');
      const name = button.getAttribute('data-name');
      const email = button.getAttribute('data-email');
      const role = button.getAttribute('data-role');

      editForm.action = `{{ url('ActualizarPersonal') }}/${id}`;
      document.getElementById('name').value = name;
      document.getElementById('email').value = email;
      document.getElementById('is_admin').value = role;
    });

    function confirmUpdate() {
  // Cerrar el modal antes de mostrar la alerta de confirmación
  $('#editModal').modal('hide');

  // Mostrar alerta de confirmación
  Swal.fire({
    title: '¿Estás seguro?',
    text: '¿Quieres actualizar este administrador?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Sí, actualizar',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      editForm.submit();
      Swal.fire('Actualizado', 'El administrador ha sido actualizado.', 'success');
    } else {
      // Volver a mostrar el modal si se cancela la acción
      $('#editModal').modal('show');
    }
  });
}


    function confirmDelete(id) {
      Swal.fire({
        title: '¿Estás seguro?',
        text: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
          $.post(`{{ url('EliminarPersonal') }}/${id}`, {_method: 'DELETE', _token: '{{ csrf_token() }}'}, function() {
            Swal.fire('Eliminado', 'El administrador ha sido eliminado.', 'success').then(() => {
              location.reload();
            });
          });
        }
      });
    }
  </script>
</body>
</html>
