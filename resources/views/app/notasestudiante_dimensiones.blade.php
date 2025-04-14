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
            background: url("{{ public_path('assets/three-kids-reading-books-vector.jpg') }}") no-repeat center center;
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
            border: 1px solid #000;
            padding: 4px;
            text-align: center;
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
            min-height: 50px;
        }

        /* Observaciones + Escala */
        .observaciones {
            margin-top: 10px;
            font-size: 12px; 
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

        <!-- Tabla de dimensiones -->
        <table>
            <thead>
                <tr>
                    <th rowspan="2">Dimensiones</th>
                    <th rowspan="2">IHS</th>
                    <!-- 4 períodos => (desempeño + fallas) x 4 = 8 columnas -->
                    <th colspan="2">Periodo 1</th>
                    <th colspan="2">Periodo 2</th>
                    <th colspan="2">Periodo 3</th>
                    <th colspan="2">Periodo 4</th>
                    <th rowspan="2">Desempeño Final</th>
                </tr>
                <tr class="small-text">
                    <th>Desp</th><th>Fallas</th>
                    <th>Desp</th><th>Fallas</th>
                    <th>Desp</th><th>Fallas</th>
                    <th>Desp</th><th>Fallas</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dimData as $dimItem)
                    @php
                        // IHS según la dimensión
                        $dimName = strtoupper($dimItem['nombre_dimension'] ?? '');
                        if (in_array($dimName, ['DIMENSION ETICA','DIMENSION SOCIO AFECTIVA'])) {
                            $ihs = 4;
                        } else {
                            $ihs = 3;
                        }
                    @endphp
                    <!-- Fila principal -->
                    <tr>
                        <td>{{ $dimItem['nombre_dimension'] }}</td>
                        <td>{{ $ihs }}</td>
                        <!-- Periodo 1 -->
                        <td>{{ $dimItem['periodos']['P1']['desempeno'] }}</td>
                        <td>{{ $dimItem['periodos']['P1']['fallas'] }}</td>
                        <!-- Periodo 2 -->
                        <td>{{ $dimItem['periodos']['P2']['desempeno'] }}</td>
                        <td>{{ $dimItem['periodos']['P2']['fallas'] }}</td>
                        <!-- Periodo 3 -->
                        <td>{{ $dimItem['periodos']['P3']['desempeno'] }}</td>
                        <td>{{ $dimItem['periodos']['P3']['fallas'] }}</td>
                        <!-- Periodo 4 -->
                        <td>{{ $dimItem['periodos']['P4']['desempeno'] }}</td>
                        <td>{{ $dimItem['periodos']['P4']['fallas'] }}</td>
                        <!-- Desempeño final -->
                        <td>{{ $dimItem['final'] }}</td>
                    </tr>

                    <!-- Fila para las capacidades (últimas) si existen -->
                    @if(count($dimItem['capacidades']) > 0)
                        <tr class="capacidades-row">
                            <td colspan="11">
                                <ul class="capac-list">
                                    @foreach($dimItem['capacidades'] as $capTexto)
                                        <li>{{ $capTexto }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <!-- Comportamiento (último registro) -->
        <div class="comportamiento">
            <strong>Comportamiento:</strong><br>
            {{ $comportamiento ?? 'Sin registro de comportamiento.' }}
        </div>

        <!-- Observaciones + Escala de Desempeño  -->
        <div class="observaciones">
            <p><strong>Escala de Desempeño:</strong> Bajo - Básico - Alto - Superior</p>
            <p><strong>Observaciones</strong></p><br><br>
        </div><br>

        <!-- Firma en lados opuestos -->
        <div class="firmas-container">
            <div>
                <p class="firma-line">__________________________________</p>
                <p><strong>LILIANA MARCELA ABRIL CLAVIJO</strong><br>Rectora</p><br>
            </div><br>
            <div>
                <p class="firma-line">__________________________________</p>
                <p><strong></strong><br>Directora de Grado</p>
            </div>
        </div>

    </div>
</body>
</html>
