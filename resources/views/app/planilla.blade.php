<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Planilla de Notas</title>
  <style>
    /* Configurar la página: tamaño carta por defecto, con márgenes en cm */
    @page {
      size: letter portrait; /* Cambiar a 'legal portrait' si quisieras forzar tamaño oficio */
      margin-top: 0.56cm;
      margin-right: 0.63cm;
      margin-bottom: 0.49cm;
      margin-left: 0.63cm;
    }
    
    /* El body sin márgenes ni padding, para que use los de @page */
    body {
      font-family: Arial, sans-serif;
      font-size: 13px; /* Aumentamos un punto con respecto a 12px */
      margin: 0;
      padding: 0;
    }

    /* Contenedor principal para nuestro contenido */
    .container {
      width: 100%;
    }

    /* Encabezado principal */
    .header-container {
      display: table;
      width: 100%;
      margin-bottom: 10px;
    }
    .header-logo {
      display: table-cell;
      vertical-align: middle;
      width: 90px; /* Forzamos un ancho mínimo para el logo */
    }
    .header-logo img {
      width: 90px; /* Logo más grande */
    }
    .header-text {
      display: table-cell;
      vertical-align: middle;
      text-align: center;
      line-height: 1.2;
    }
    .header-text h2, .header-text h3, .header-text p {
      margin: 0;
      padding: 0;
    }

    .info-line {
      margin: 10px 0;
    }

    /* Tabla principal (Planilla) */
    table {
      width: 100%;          /* Ocupa todo el espacio disponible */
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    th, td {
      border: 1px solid #000;
      padding: 6px;
      text-align: center;
    }
    th {
      background-color: #f5f5f5;
    }
    .th-notas {
      font-weight: bold;
    }
      /* Reducir espacio específicamente para el th con rowspan="2" (ESTUDIANTE) */
      th[rowspan="2"] {
      padding: 9px !important;       /* Ajusta aquí si quieres menos espacio */
      line-height: 1.0 !important;  /* Ajusta el interlineado si deseas */
      vertical-align: middle;
    }

    .small-text {
      font-size: 11px;
    }

    /* Bloque de descripción + escala de desempeños */
    .footer-info {
      margin-top: 20px;
    }
    .footer-info .left-section {
      float: left;
      width: 60%;
    }
    .footer-info .right-section {
      float: right;
      width: 35%;
    }

    /* Aumentar espacio entre líneas en la descripción de las notas */
    .footer-info .left-section ol li {
      margin-bottom: 8px; /* Ajusta este valor según prefieras */
    }

    /* Escala de desempeños */
    .desempenos-table {
      width: 100%;
      border: 1px solid #000;
      border-collapse: collapse;
      margin-top: 5px;
    }
    .desempenos-table td {
      border: 1px solid #000;
      padding: 3px;
      text-align: left;
    }

    /* Limpiar floats */
    .clearfix {
      clear: both;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Encabezado con logo a la izquierda y texto centrado -->
    <div class="header-container">
      <div class="header-logo">
        <img src="{{ public_path('assets/Logocolegio.png') }}" alt="Logo">
      </div>
      <div class="header-text">
        <h2>COLEGIO SANTO ÁNGEL</h2>
        <p>Aprobación Oficial 6125 de septiembre 7 de 2018</p>
        <p>Código DANE 317225000843 - Registro Educativo 323393</p>
        <h3>PLANILLA DE NOTAS</h3>
      </div>
    </div>

    <!-- Información de grado, materia, período -->
    <div class="info-line">
      <strong>GRADO:</strong> {{ $gradoNombre }} &nbsp;&nbsp;&nbsp;
      <strong>MATERIA:</strong> ______________________ &nbsp;&nbsp;&nbsp;
      <strong>PERIODO:</strong> ______________________
    </div>

    <!-- Encabezado de la tabla agrupando las 10 columnas de NOTAS -->
    <table>
      <thead>
        <tr>
          <th rowspan="2" style="vertical-align: middle;">ESTUDIANTE</th>
          <th colspan="10" class="th-notas">NOTAS</th>
        </tr>
        <tr>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
        </tr>
      </thead>
      <tbody>
        @foreach($estudiantes as $est)
          <tr>
            <td style="text-align: left;">
              {{ $est->nombres }} {{ $est->primer_apellido }} {{ $est->segundo_apellido }}
            </td>
            <!-- 10 columnas vacías para las notas -->
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <p class="small-text">
      *La cantidad de notas por período es decisión del docente.
    </p>

    <!-- DESCRIPCIÓN DE NOTAS y ESCALA DE DESEMPEÑOS -->
    <div class="footer-info">
      <!-- Descripción de las notas (10 líneas) a la izquierda -->
      <div class="left-section">
        <p><strong>DESCRIPCIÓN DE LAS NOTAS:</strong></p>
        <ol>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
          <li>_____________________________________________</li>
        </ol>
      </div>

      <!-- Escala de desempeños a la derecha -->
      <div class="right-section">
        <table class="desempenos-table">
          <tr>
            <td colspan="2" style="text-align: center;"><strong>ESCALA DE DESEMPEÑOS</strong></td>
          </tr>
          <tr>
            <td>Desempeño Bajo</td>
            <td>1.0 a 2.99</td>
          </tr>
          <tr>
            <td>Desempeño Básico</td>
            <td>3.0 a 3.99</td>
          </tr>
          <tr>
            <td>Desempeño Alto</td>
            <td>4.0 a 4.59</td>
          </tr>
          <tr>
            <td>Desempeño Superior</td>
            <td>4.5 a 5.0</td>
          </tr>
        </table>
      </div>
      <div class="clearfix"></div>
    </div>

    <p><strong>DOCENTE:</strong> _________________________________________</p>
  </div>
</body>
</html>
