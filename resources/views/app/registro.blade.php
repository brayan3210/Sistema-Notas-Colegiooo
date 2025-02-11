<!doctype html>
<html lang="en">
<head>
    <title>Registro de Usuario</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrar Usuario</p>
                                    <form id="register-form" action="{{ route('registro') }}" method="post" class="mx-1 mx-md-4">
                                        @csrf
                                        <!-- Nombre -->
                                        <div class="mb-4">
                                            <label class="form-label" for="name">Nombre</label>
                                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label class="form-label" for="email">Correo Electrónico</label>
                                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Contraseña -->
                                        <div class="mb-4">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Rol -->
                                        <div class="mb-4">
                                            <label class="form-label" for="is_admin">Tipo de Usuario</label>
                                            <select id="is_admin" name="is_admin" class="form-select @error('is_admin') is-invalid @enderror">
                                                <option value="">Seleccione el tipo de usuario</option>
                                                <option value="1" {{ old('is_admin') == '1' ? 'selected' : '' }}>Administrador</option>
                                                <option value="2" {{ old('is_admin') == '2' ? 'selected' : '' }}>Profesor</option>
                                            </select>
                                            @error('is_admin')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Grado (solo para profesores) -->
                                        <div class="mb-4" id="grado-container" style="display: none;">
                                            <label class="form-label" for="id_grado">Grado Asignado</label>
                                            <select id="id_grado" name="id_grado" class="form-select @error('id_grado') is-invalid @enderror">
                                                <option value="">Seleccione el grado</option>
                                                @foreach($grados as $grado)
                                                    <option value="{{ $grado->id_grado }}" {{ old('id_grado') == $grado->id_grado ? 'selected' : '' }}>{{ $grado->grados }}</option>
                                                @endforeach
                                            </select>
                                            @error('id_grado')
                                                <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Botones -->
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button id="submit-btn" type="submit" class="btn btn-primary btn-lg me-3">Registrar</button>
                                            <a href="{{ route('dashboard') }}" class="btn btn-outline-danger btn-lg">Regresar</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2 justify-content-center">
                                    <div class="image-container">
                                        <img src="{{ asset('assets/Logor.png') }}" class="img-fluid" alt="Imagen">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SweetAlert JS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Script para evitar doble envío -->
        <script>
            $(document).ready(function() {
                $('#register-form').on('submit', function(e) {
                    // Deshabilitar el botón para evitar múltiples envíos
                    $('#submit-btn').prop('disabled', true);
                });

                function toggleGradoField() {
                    var isAdmin = $('#is_admin').val();
                    if (isAdmin == '2') { // Profesor
                        $('#grado-container').show();
                    } else {
                        $('#grado-container').hide();
                        $('#id_grado').val('');
                    }
                }

                $('#is_admin').change(function() {
                    toggleGradoField();
                });

                // Ejecutar al cargar la página
                toggleGradoField();
            });

            // Mostrar mensaje de éxito
            @if (session()->has('Correcto'))
                Swal.fire({
                    icon: 'success',
                    title: '¡Usuario registrado correctamente!',
                    text: '{{ session()->get('Correcto') }}'
                }).then(() => {
                    window.location.href = "{{ route('dashboard') }}";
                });
            @endif
        </script>
    </section>
</body>
</html>
