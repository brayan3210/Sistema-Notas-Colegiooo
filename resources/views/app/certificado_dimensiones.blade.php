<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado Académico</title>
    <style>
         /* Estilos optimizados para una sola página */
         @page {
            margin: 15mm; /* Márgenes adecuados para PDF */
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
        }
        
        /* Ajuste del encabezado compacto */
        .encabezado {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 5px; /* Ajuste para subirlo más */
            margin-top: -80px; /* Subir todo el encabezado */
        }

        .encabezado img {
            width: 90px; /* Tamaño más compacto */
            height: auto;
            /* margin-right: 2px; */
            margin-top: 55px; /* Subir todo el encabezado */
            

        }

        .texto-encabezado {
            text-align: center;
            font-size: 14px;
            line-height: 1.3; /* Espaciado más compacto */
        }

        .texto-encabezado h1 {
            font-size: 22px; /* Más grande */
            margin: 0;
        }

        .texto-encabezado p {
            font-size: 14px; /* Texto un poco más grande */
            margin: 2px 0;
        }

        .cuerpo-certificado {
            text-align: justify;
            margin: 20px 0;
        }

        .tabla-materias {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 16px; /* Tamaño de fuente más compacto */
        }

        .tabla-materias th, .tabla-materias td {
            border: 3px solid #ddd;
            padding: 6px;
            text-align: left;
        }

        .firma {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Encabezado con diseño compacto -->
    <div class="encabezado">
        <img src="{{ public_path('assets/Logocolegio.png') }}" alt="Logo Colegio Santo Ángel">
        <div class="texto-encabezado">
            <h1>COLEGIO SANTO ÁNGEL</h1>
            <p><strong>Aprobación Oficial 6125 de septiembre 7 de 2018</strong></p>
            <p><strong>Código DANE:</strong> 373275000443 | <strong>Registro Educativo:</strong> 323393</p>
            <p><strong>DIRECCIÓN:</strong> Carrera 9 # 7 – 37 Barrio Triana de Flandes, Tolima.</p>
        </div>
    </div>

    <!-- Cuerpo del certificado -->
    <div class="cuerpo-certificado">
        <p>La rectora y secretaria del Colegio Santo Ángel, de carácter privado aprobado según Resolución N. 6125 de septiembre 7 de 2018,</p>
        
        <p style="text-align: center; font-weight: bold; margin: 20px 0;">CERTIFICAN</p>

        <p>Que el(la) estudiante <strong>{{ $estudiante->nombres }} {{ $estudiante->primer_apellido }} {{ $estudiante->segundo_apellido ?? '' }}</strong>, identificado(a) con documento <strong>{{ $estudiante->n_documento }}</strong>, cursó y aprobó el grado <strong>{{ $grado->grados }}</strong> durante el año <strong>{{ $anio }}</strong>, con los siguientes desempeños:</p>
    </div>

        <!-- Tabla de Dimensiones -->
        <table class="tabla-materias">
            <thead>
                <tr>
                    <th>Dimensión</th>
                    <th>IHS</th>
                    <th>Desempeño Final</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finales as $dimension => $desempenoFinal)
                    @php
                        // Asignar IHS: para DIMENSION ETICA y DIMENSION SOCIO AFECTIVA es 4, de lo contrario 3.
                        $dimName = strtoupper($dimension);
                        $ihs = (in_array($dimName, ['DIMENSION ETICA', 'DIMENSION SOCIO AFECTIVA'])) ? 4 : 3;
                    @endphp
                    <tr>
                        <td>{{ $dimension }}</td>
                        <td>{{ $ihs }}</td>
                        <td>{{ $desempenoFinal }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Firma -->
        <div class="firma">
            <p>_________________________</p>
            <p>Rectora</p>
            <p>Colegio Santo Ángel</p>
            <p>Flandes, Tolima</p>
        </div>
    </div>
</body>
</html>
