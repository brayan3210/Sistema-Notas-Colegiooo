<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Inscripcion</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/Matriculadiseño.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />

</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Haz que Tu Hijo Sea Parte de la Familia Santo Ángel</h2>
            <form id="studentForm" action="{{ route('Matricula') }}" method="post" class="mx-1 mx-md-4" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombres">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                        @error('nombres')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="primer_apellido">Primer Apellido</label>
                        <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                        @error('primer_apellido')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="segundo_apellido">Segundo Apellido</label>
                        <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" required>
                        @error('segundo_apellido')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                        @error('fecha_nacimiento')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="lugar_nacimiento">Lugar de Nacimiento</label>
                        <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" required>
                        @error('lugar_nacimiento')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="genero">Género</label>
                        <select class="form-control" name="genero" id="genero" required>
                            <option value="">Seleccione...</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Otro">Otro</option>
                        </select>
                        @error('genero')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_documento">Tipo Documento</label>
                        <select class="form-control" name="id_documento" id="tipo_documento" required>
                            <option value="">Seleccione...</option>
                            @foreach(App\Models\Documento::all() as $documento)
                            <option value="{{ $documento->id_documento }}">{{ $documento->tipo_documento }}</option>
                            @endforeach
                        </select>
                        @error('id_documento')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="numero_documento">Número Documento</label>
                        <input type="number" class="form-control" id="numero_documento" name="n_documento" required>
                        @error('n_documento')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rh">RH</label>
                        <input type="text" class="form-control" id="rh" name="rh" required>
                        @error('rh')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="eps">EPS</label>
                        <input type="text" class="form-control" id="eps" name="eps" required>
                        @error('eps')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_sisben">Grupo Sisben</label>
                        <select class="form-control" name="id_sisben" id="id_sisben" required>
                            <option value="">Seleccione...</option>
                            @foreach(App\Models\Sisben::all() as $sisben)
                            <option value="{{ $sisben->id_sisben }}">{{ $sisben->sisben }}</option>
                            @endforeach
                        </select>
                        @error('id_sisben')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="estrato_social">Estrato Social</label>
                        <input type="text" class="form-control" id="estrato_social" name="estrato_social" required>
                        @error('estrato_social')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="discapacidad">Discapacidad</label>
                        <input type="text" class="form-control" id="discapacidad" name="discapacidad" required>
                        @error('discapacidad')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                        @error('telefono')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                        @error('direccion')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="barrio">Barrio</label>
                        <input type="text" class="form-control" id="barrio" name="barrio" required>
                        @error('barrio')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="municipio">Municipio</label>
                        <input type="text" class="form-control" id="municipio" name="municipio" required>
                        @error('municipio')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control" id="departamento" name="departamento" required>
                        @error('departamento')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_grado">Grado a Matricular</label>
                        <select class="form-control" name="id_grado" id="id_grado" required>
                            <option value="">Seleccione...</option>
                            @foreach(App\Models\Grado::all() as $grado)
                            <option value="{{ $grado->id_grado }}">{{ $grado->grados }}</option>
                            @endforeach
                        </select>
                        @error('id_grado')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="file">Subir Documento</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                        @error('file')
                        <div class="alert alert-danger mb-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <center>
                <input type="submit" class="btn btn-primary" value="Inscribir"></input>
                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Regresar</button>
                </center>

            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        // Alerta de confirmación antes de enviar el formulario
        $('#studentForm').on('submit', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe inmediatamente

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Estás a punto de enviar los datos, asegúrate de que todos los campos sean correctos.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Inscribir',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario
                    this.submit();
                }
            });
        });

        // Alerta de éxito después del registro
        @if (session()->has('Correcto'))
            Swal.fire({
                icon: 'success',
                title: '¡Registro Exitoso!',
                text: '{{ session()->get('Correcto') }}',
                confirmButtonText: 'OK'
            });
        @endif
    });
    </script>
</body>

</html>