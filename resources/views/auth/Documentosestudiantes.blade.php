 <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subida de Documentos Estudiante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Subir Documentos del Estudiante</h2>

    <!-- Formulario para la búsqueda de estudiantes y la subida de documentos -->
    <form action="{{ route('documentos') }}" method="post" enctype="multipart/form-data">
        @csrf

        <!-- Buscar estudiante por número de documento -->
        <div class="mb-3">
            <label for="buscar_documento" class="form-label">Buscar Estudiante por Número de Documento</label>
            <input type="search" class="form-control" id="buscar_documento" name="buscar_documento" placeholder="Ingresa el número de documento">
            <button type="button" class="btn btn-primary mt-2" onclick="buscarEstudiante()">Buscar</button>
        </div>

        <!-- Mostrar el resultado de la búsqueda -->
        <div class="mb-3">
            <label for="resultado_busqueda" class="form-label">Resultado de la Búsqueda</label>
            <input type="text" class="form-control" id="resultado_busqueda" readonly >
        </div>

        <!-- Campo oculto para el ID del estudiante 
        <input type="hidden" id="id_estudiante" name="id_estudiante">
        -->
        <!-- Campos para subir documentos -->
        <div class="mb-3">
            <label for="fotocopia_registro_civil" class="form-label">Fotocopia Registro Civil (PDF)</label>
            <input type="file" class="form-control" id="fotocopia_registro_civil" name="fotocopia_registro_civil">
        </div>

        <div class="mb-3">
            <label for="fotocopia_carnet_vacunas" class="form-label">Fotocopia Carnet de Vacunas (PDF)</label>
            <input type="file" class="form-control" id="fotocopia_carnet_vacunas" name="fotocopia_carnet_vacunas">
        </div>

        <div class="mb-3">
            <label for="fotocopia_carnet_covid" class="form-label">Fotocopia Carnet de Vacunas Covid (PDF)</label>
            <input type="file" class="form-control" id="fotocopia_carnet_covid" name="fotocopia_carnet_covid">
        </div>

        <div class="mb-3">
            <label for="fotocopia_carnet_crecimiento" class="form-label">Fotocopia Carnet de Crecimiento (PDF)</label>
            <input type="file" class="form-control" id="fotocopia_carnet_crecimiento" name="fotocopia_carnet_crecimiento">
        </div>

        <div class="mb-3">
            <label for="certificado_eps" class="form-label">Certificado EPS (PDF)</label>
            <input type="file" class="form-control" id="certificado_eps" name="certificado_eps">
        </div>

        <div class="mb-3">
            <label for="certificado_medico_visual_auditivo" class="form-label">Certificado Médico Visual y Auditivo (PDF)</label>
            <input type="file" class="form-control" id="certificado_medico_visual_auditivo" name="certificado_medico_visual_auditivo">
        </div>

        <div class="mb-3">
            <label for="fotocopia_documento_padres_acudiente" class="form-label">Fotocopia Documento de Padres/Acudiente (PDF)</label>
            <input type="file" class="form-control" id="fotocopia_documento_padres_acudiente" name="fotocopia_documento_padres_acudiente">
        </div>

        <div class="mb-3">
            <label for="fotocopia_observador_estudiante" class="form-label">Fotocopia Observador del Estudiante (PDF)</label>
            <input type="file" class="form-control" id="fotocopia_observador_estudiante" name="fotocopia_observador_estudiante">
        </div>

        <div class="mb-3">
            <label for="boletin_anterior" class="form-label">Boletín Anterior (PDF)</label>
            <input type="file" class="form-control" id="boletin_anterior" name="boletin_anterior">
        </div>

        <div class="mb-3">
            <label for="paz_salvo_anterior" class="form-label">Paz y Salvo Anterior (PDF)</label>
            <input type="file" class="form-control" id="paz_salvo_anterior" name="paz_salvo_anterior">
        </div>

        <div class="mb-3">
            <label for="certificado_grado_quinto" class="form-label">Certificado de Grado Quinto (PDF)</label>
            <input type="file" class="form-control" id="certificado_grado_quinto" name="certificado_grado_quinto">
        </div>

        <div class="mb-3">
            <label for="retiro_simat" class="form-label">Retiro de SIMAT (PDF)</label>
            <input type="file" class="form-control" id="retiro_simat" name="retiro_simat">
        </div>

        <div class="mb-3">
            <label for="fotos_3x4" class="form-label">Fotos 3x4 (JPG/PNG)</label>
            <input type="file" class="form-control" id="fotos_3x4" name="fotos_3x4">
        </div>

        <button type="submit" class="btn btn-primary">Subir Documentos</button>
    </form>
</div>

<!-- Script para buscar estudiante por número de documento -->
 <!-- control z si algo lo cambiare -->

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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>