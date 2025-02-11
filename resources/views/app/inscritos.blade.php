<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Reporte de Inscritos</title>
  <style>
      body { font-family: Arial, sans-serif; }
      .header { text-align: center; margin-bottom: 20px; }
      .header img { width: 100px; float: left; }
      .header h1, .header h2, .header h3 { margin: 0; }
      .table { width: 100%; border-collapse: collapse; }
      .table th, .table td { border: 1px solid #000; padding: 8px; text-align: left; }
  </style>
</head>
<body>
  <div class="header">
    <img src="{{ $logo }}" alt="Logo del Colegio">
    <h1>{{ $colegio }}</h1>
    <h2>Lista de Estudiantes Inscritos</h2>
    <h3>{{ $direccion }}</h3>
  </div>

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
</body>
</html>
