<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Matrícula del Estudiante - Gestión Colegio</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />

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
                    <a href="{{ route('dashboard') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <!-- Logo del colegio -->
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Colegio Santo Angel</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1">
                    <li class="menu-item">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Inicio</div>
                        </a>
                    </li>
                    <!-- Menú de Configuración de Cuenta -->
                    <li class="menu-item active open">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Configuración de Cuenta</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item active">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Account">Perfil</div>
                                </a>
                            </li>
                            <!-- <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Notifications">Notificaciones</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Connections">Conexiones</div> -->
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Autenticaciones -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Autenticaciones</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Basic">Iniciar sesión</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Register">Registrar</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Forgot Password">Recuperar Contraseña</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Otros Enlaces -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Misc">Misceláneos</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Error">Error</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Maintenance">Mantenimiento</div>
                                </a>
                            </li>
                        </ul>
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
                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <!-- User Dropdown -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/logoadmin.png') }}" alt="User Image" class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
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
                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Cerrar sesión</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Estudiantes /</span> Detalle de Documentos</h4>

                        <!-- Información de la Matrícula -->
                        <div class="card mb-4">
                            <h5 class="card-header">Documentos del Estudiante</h5>
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ Storage::url($documentos->fotos_3x4 ?? 'assets/img/default-avatar.png') }}" alt="Foto del estudiante" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                                    <div class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Subir nueva foto</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                        </label>
                                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Restablecimiento</span>
                                        </button>
                                        <p class="text-muted mb-0">Se permiten JPG, GIF o PNG. Tamaño máximo de 800K</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="nombres" class="form-label">Nombre</label>
                                        <input class="form-control" type="text" id="nombres" name="nombres" value="{{ $matricula->nombres }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="primer_apellido" class="form-label">Primer Apellido</label>
                                        <input class="form-control" type="text" id="primer_apellido" name="primer_apellido" value="{{ $matricula->primer_apellido }}" readonly />
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                                        <input class="form-control" type="text" id="segundo_apellido" name="segundo_apellido" value="{{ $matricula->segundo_apellido }}" readonly />
                                    </div>
                                </div>
                            </div>
                        </div>

                    <!-- Documentos del Estudiante -->
<div class="card">
    <h5 class="card-header">Documentos del Estudiante</h5>
    <div class="card-body">
        @if($documentos)
            <p><strong>Fotocopia Registro Civil:</strong>
                @if($documentos->fotocopia_registro_civil)
                    <a href="{{ Storage::url($documentos->fotocopia_registro_civil) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Fotocopia Carnet de Vacunas:</strong>
                @if($documentos->fotocopia_carnet_vacunas)
                    <a href="{{ Storage::url($documentos->fotocopia_carnet_vacunas) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Fotocopia Carnet COVID-19:</strong>
                @if($documentos->fotocopia_carnet_covid)
                    <a href="{{ Storage::url($documentos->fotocopia_carnet_covid) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Fotocopia Carnet de Crecimiento y Desarrollo:</strong>
                @if($documentos->fotocopia_carnet_crecimiento)
                    <a href="{{ Storage::url($documentos->fotocopia_carnet_crecimiento) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Certificado EPS:</strong>
                @if($documentos->certificado_eps)
                    <a href="{{ Storage::url($documentos->certificado_eps) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Certificado Médico Visual y Auditivo:</strong>
                @if($documentos->certificado_medico_visual_auditivo)
                    <a href="{{ Storage::url($documentos->certificado_medico_visual_auditivo) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Fotocopia Documento de Identidad de Padres y Acudiente:</strong>
                @if($documentos->fotocopia_documento_padres_acudiente)
                    <a href="{{ Storage::url($documentos->fotocopia_documento_padres_acudiente) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Fotocopia del Observador del Estudiante:</strong>
                @if($documentos->fotocopia_observador_estudiante)
                    <a href="{{ Storage::url($documentos->fotocopia_observador_estudiante) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Boletín del Año Anterior:</strong>
                @if($documentos->boletin_anterior)
                    <a href="{{ Storage::url($documentos->boletin_anterior) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Paz y Salvo del Año Anterior:</strong>
                @if($documentos->paz_salvo_anterior)
                    <a href="{{ Storage::url($documentos->paz_salvo_anterior) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Certificado Grado Quinto (opcional):</strong>
                @if($documentos->certificado_grado_quinto)
                    <a href="{{ Storage::url($documentos->certificado_grado_quinto) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Retiro SIMAT:</strong>
                @if($documentos->retiro_simat)
                    <a href="{{ Storage::url($documentos->retiro_simat) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
            <p><strong>Fotos 3x4 cm Fondo Azul:</strong>
                @if($documentos->fotos_3x4)
                    <a href="{{ Storage::url($documentos->fotos_3x4) }}" target="_blank">Ver Documento</a>
                @else
                    No adjuntado
                @endif
            </p>
        @else
            <p>No se han subido documentos para este estudiante.</p>
        @endif
    </div>
</div>


                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                © <script>document.write(new Date().getFullYear());</script>, hecho con ❤️ por Colegio Santo Angel
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->
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
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>
