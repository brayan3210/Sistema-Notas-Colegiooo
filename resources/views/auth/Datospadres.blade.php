<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción de Estudiante</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('css/datospadres.css') }}">
    </head>

<body>
    <div class="container py-5">
        <div class="form-container shadow p-4 rounded">
            <h2 class="text-center mb-4">Completa la inscripción de tu hijo</h2>
            <form id="studentForm" action="{{ route('Padres') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                        @error('nombres')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="numerodocumento" class="form-label">Número de Documento</label>
                        <input type="number" class="form-control" id="numero_documento" name="numero_docu" required>
                        @error('numero_docu')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="munipio" class="form-label">Municipio de Expedición</label>
                        <input type="text" class="form-control" name="municipio_expe" required>
                        @error('municipio_expe')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" name="edad" required>
                        @error('edad')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="parentesco" class="form-label">Parentesco</label>
                        <input type="text" class="form-control" id="parentesco" name="parentesco" required>
                        @error('parentesco')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" required>
                        @error('telefono')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                        @error('direccion')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="ocupacion" class="form-label">Ocupación</label>
                        <input type="text" class="form-control" id="ocupacion" name="ocupacion" required>
                        @error('ocupacion')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    <!-- ======= Header ======= 
                <div class="mb-3">
                    <label for="id_documento" class="form-label">Estudiante</label>
                    <select class="form-select" name="id_estudiante" id="tipo_documento" required>
                        <option value="">Seleccione...</option>
                        @foreach(App\Models\Estudiantepadre::all() as $estudiante)
                        <option value="{{ $estudiante->id_estudiante }}">{{ $estudiante->n_documento }}</option>
                        @endforeach
                    </select>
                    @error('id_documento')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                    -->

                    <div class="mb-3">
    <label for="buscar_documento" class="form-label">Buscar Estudiante por Número de Documento</label>
    <input type="search" class="form-control" id="buscar_documento" name="buscar_documento" placeholder="Ingresa el número de documento">
    <button type="button" class="btn btn-primary mt-2" onclick="buscarEstudiante()">Buscar</button>
</div>

<div class="mb-3">
    <label for="resultado_busqueda" class="form-label">Resultado de la Búsqueda</label>
    <input type="text" class="form-control" id="resultado_busqueda" readonly>
</div>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    <a href="{{route('dashboard')}}" class="btn btn-outline-danger" role="button">¿Regresar?</a>

                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function buscarEstudiante() {
        let numeroDocumento = document.getElementById('buscar_documento').value;

        fetch("{{ route('buscarEstudiante') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                buscar_documento: numeroDocumento
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.n_documento) {
                document.getElementById('resultado_busqueda').value = data.n_documento;
            } else {
                document.getElementById('resultado_busqueda').value = 'Estudiante no encontrado';
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
 <!-- Agregar SweetAlert2 JS -->
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Nuevo script para las alertas -->
<script>
// Interceptar el envío del formulario para mostrar una alerta de confirmación
document.getElementById('studentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe inmediatamente

    Swal.fire({
        title: '¿Estás seguro?',
        text: "Estás a punto de enviar los datos, asegúrate de que todos los campos sean correctos.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Enviar',
        cancelButtonText: 'Cancelar',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, envía el formulario
            event.target.submit();
        }
    });
});

// Mostrar alerta de éxito si existe la variable de sesión 'Correcto'
@if (session()->has('Correcto'))
    Swal.fire({
        icon: 'success',
        title: '¡Registro Exitoso!',
        text: '{{ session()->get('Correcto') }}',
        confirmButtonText: 'OK'
    });
@endif
</script>

</body>
</html>