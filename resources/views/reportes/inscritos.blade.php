<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Inscritos</title>
  <style>
      /* Estilos generales */
      body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
      .container { width: 100%; padding: 20px; }
      
      /* Encabezado */
      .header { display: flex; align-items: center; justify-content: space-between; padding-bottom: 10px; border-bottom: 2px solid #333; }
      .header .title { text-align: center; width: 100%; }
      .header img { width: 80px; }

      /* Título y subtítulos */
      h1, h2, h3 { margin: 0; padding: 5px 0; }
      h1 { font-size: 24px; font-weight: bold; color: #333; }
      h2 { font-size: 20px; color: #555; }
      h3 { font-size: 16px; color: #777; }
      h4{ font-size: 16px; color: #777; }


      /* Tabla */
      .table { width: 100%; border-collapse: collapse; margin-top: 20px; font-size: 14px; }
      .table th, .table td { padding: 10px; border: 1px solid #ddd; text-align: left; }
      .table th { background-color: #f5f5f5; font-weight: bold; color: #333; }
      .table tr:nth-child(even) { background-color: #f9f9f9; }

      /* Footer */
      .footer { text-align: center; margin-top: 20px; font-size: 12px; color: #888; }
  </style>
</head>
<body>
  <div class="container">
    <!-- Encabezado con logo y título -->
    <div class="header">
      <img src="{{ public_path('assets/Logocolegio.png') }}" alt="Logo del Colegio">
      <div class="title">
        <h1>Colegio Santo Angel</h1>
        <h2>Lista de Estudiantes Inscritos</h2>
        <h3>CRA 9 N° 7-37 BARRIO TRIANA FLANDES- TOLIMA</h3>
        <h4>Grado Reporte matrícula/inscripción: {{ $grado }}</h4>

      </div>
    </div>

    <!-- Tabla de inscritos -->
    <table class="table">
      <thead>
        <tr>
          <th>Nombre Completo</th>
          <th>Fecha de Nacimiento</th>
          <th>Lugar de Nacimiento</th>
          <th>Número de Documento</th>
          <th>Grado</th>
          <th>Sisben</th>
          <th>Estado Matrícula</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($matriculados as $matricula)
        <tr>
          <td>{{ $matricula->nombres }} {{ $matricula->primer_apellido }} {{ $matricula->segundo_apellido }}</td>
          <td>{{ $matricula->fecha_nacimiento }}</td>
          <td>{{ $matricula->lugar_nacimiento }}</td>
          <td>{{ $matricula->n_documento }}</td>
          <td>{{ $matricula->id_grado }}</td>
          <td>{{ $matricula->id_sisben }}</td>
          <td>{{ $matricula->estado_matricula }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <!-- Footer -->
    <div class="footer">
      <p>Reporte generado automáticamente por el sistema de gestión del Colegio Santo Angel.</p>
    </div>
  </div>
</body>
</html>
