<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte Dimensiones</title>
    <style>
         @page {
      size: legal portrait; /* Cambiar a 'legal portrait' si quisieras forzar tamaño oficio */
      margin-top: 0.56cm;
      margin-right: 0.63cm;
      margin-bottom: 0.49cm;
      margin-left: 0.63cm;
    }

        /* Tipografía base ~12.5px */
        body {
            font-family: Arial, sans-serif;
            font-size: 13.5px;
            /* background: url("{{ public_path('assets/three-kids-reading-books-vector.jpg') }}") no-repeat center center; */
            background-size: 550px 550px;
        }
        .container {
            position: relative;
            z-index: 10;
            background-color: rgba(255, 255, 255, 0.24);
            padding: 5px;
        }

        /* Encabezado con logo a la izquierda y texto más arriba */
        .header-row {
            display: flex;
            justify-content: center;  
            align-items: flex-start;  /* Ajustado para alinear el texto más arriba */
            margin-bottom: 10px;
        }
        .header-row img {
            width: 80px;     /* Tamaño del logo */
            height: auto;
            margin-right: 30px; /* Espacio entre logo y texto */
        }
        .header-text-col {
            text-align: center;
        }
        .header-text-col h2 {
            margin: 0 0 5px;
            font-size: 1.2em;
        }
        .header-text-col p {
            margin: 0;
            line-height: 1.2em;
        }

        /* Info del estudiante */
         /* Updated info section styling */
         .info {
            margin-bottom: 10px;
            padding: 15px;
            white-space: nowrap;  /* Prevents wrapping to new line */
        }
        
        .info p {
            display: inline;  /* Makes paragraphs display inline */
            margin: 0;
        }
        
        .info .label {
            font-weight: bold;
        }

        .info-separator {
            margin: 0 10px;  /* Adds space between items */
        }

        /* Tabla principal */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
            font-size: 12.5px; /* Un poco menor respecto al body */
        }
        th, td {
            border: 2px solid #000;
            padding: 4px;
            text-align: left;
            background: #eee;
        }
        .small-text {
            font-size: 10px;
        }

        /* Caja del comportamiento */
        .comportamiento {
            margin-top: 10px;
            padding: 5px;
            border: 1px solid #000;
            font-size: 12px; 
            min-height: 30px;
        }

        /* Observaciones + Escala */
        .observaciones {
            margin-top: 10px;
            font-size: 13px; 
        }

        /* Capacidades debajo de la dimensión */
        .capacidades-row td {
            text-align: left !important;
            font-size: 11px;
        }
        .capac-list {
            margin: 0;
            padding-left: 18px;
        }

        /* Firmas en lados opuestos */
        .firmas-container {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
        }
        .firmas-container div {
            text-align: center;
        }
        .firmas-container .firma-line {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Encabezado -->
        <div class="header-row">
            <img src="{{ public_path('assets/Logocolegio.png') }}" alt="Logo Colegio">
            <div class="header-text-col">
                <h2>COLEGIO SANTO ÁNGEL</h2>
                <p>Aprobación Oficial: 6125 de septiembre 7 de 2018</p>
                <p>Código DANE: 372357000443 - Registro Educativo: 323393</p>
            </div>
        </div>

        <!-- Datos del estudiante -->
        <div class="info">
            <p>
                <span class="label">Año Académico:</span> {{ $anio }}
                <span class="info-separator">|</span>
                <span class="label">Grado:</span> {{ $estudiante->grado->grados }}
                <span class="info-separator">|</span>
                <span class="label">Estudiante:</span> 
                {{ $estudiante->nombres }} 
                {{ $estudiante->primer_apellido }} 
                {{ $estudiante->segundo_apellido }}
            </p>
        </div>

    <!-- Tabla de Notas -->
    <table>
        <thead>
            <tr>
                <th>Áreas y Asignaturas</th>
                <th>IHS</th>
                <th>FAL</th>
                <th>P1</th>
                <th>P2</th>
                <th>P3</th>
                <th>P4</th>
                <th>DEF</th>
                <th>Desempeño</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($definitivas as $data)
                <!-- Materia Principal (Área) -->
                <tr class="area">
                    <td>{{ $data['materia'] }}</td>
                    <td>{{ $data['ihs'] }}</td>
                    <td>{{ $data['fallas'] }}</td>
                    <td>{{ is_numeric($data['notas'][1]) ? number_format($data['notas'][1], 1) : '' }}</td>
                    <td>{{ is_numeric($data['notas'][2]) ? number_format($data['notas'][2], 1) : '' }}</td>
                    <td>{{ is_numeric($data['notas'][3]) ? number_format($data['notas'][3], 1) : '' }}</td>
                    <td>{{ is_numeric($data['notas'][4]) ? number_format($data['notas'][4], 1) : '' }}</td>
                    <td>{{ is_numeric($data['definitiva']) ? number_format($data['definitiva'], 1) : '' }}</td>
                    <td>{{ $data['desempeno'] }}</td>
                </tr>
                <!-- Descripción del Área -->
                <tr>
                    <td colspan="9" class="descripcion">{{ $data['descripcion'] }}</td>
                </tr>
                @if (isset($data['submaterias']))
                    @foreach ($data['submaterias'] as $submateria)
                        <!-- Submateria (Asignatura) -->
                        <tr class="asignatura">
                            <td class="nombre-asignatura">{{ $submateria['materia'] }}</td>
                            <td>{{ $submateria['ihs'] }}</td>
                            <td>{{ $submateria['fallas'] }}</td>
                            <td>{{ is_numeric($submateria['notas'][1]) ? number_format($submateria['notas'][1], 1) : '' }}</td>
                            <td>{{ is_numeric($submateria['notas'][2]) ? number_format($submateria['notas'][2], 1) : '' }}</td>
                            <td>{{ is_numeric($submateria['notas'][3]) ? number_format($submateria['notas'][3], 1) : '' }}</td>
                            <td>{{ is_numeric($submateria['notas'][4]) ? number_format($submateria['notas'][4], 1) : '' }}</td>
                            <td>{{ is_numeric($submateria['definitiva']) ? number_format($submateria['definitiva'], 1) : '' }}</td>
                            <td>{{ $submateria['desempeno'] }}</td>
                        </tr>
                        <!-- Descripción de la Asignatura -->
                        <tr>
                            <td colspan="9" class="descripcion">{{ $submateria['descripcion'] }}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
  <!-- Comportamiento (último registro) -->
  <div class="comportamiento">
            <strong>Comportamiento:</strong><br>
             
        </div>

    <!-- Escala de Desempeño -->
    <div class="observaciones">
        <p><strong>Escala de Desempeño:</strong></p>
        <p>1.0 a 2.99 (Bj - Bajo), 3.0 a 3.99 (Bs - Básico), 4.0 a 4.59 (A - Alto), 4.6 a 5.0 (S - Superior)</p>
    </div>

   
        <!-- Observaciones + Escala de Desempeño  -->
        <div class="observaciones">
            <p><strong>Observaciones</strong></p><br><br>
        </div>

        <!-- Firma en lados opuestos -->
        <div class="firmas-container">
            <div>
                <p class="firma-line">__________________________________</p>
                <p><strong>MARCELINO ABRIL</strong><br>Rector</p><br>
            </div><br>
            <div>
                <p class="firma-line">__________________________________</p>
                <p><strong>LILIANA MARCELA ABRIL CLAVIJO</strong><br>Directora de Grado</p>
            </div>
        </div>

</body>
</html>
