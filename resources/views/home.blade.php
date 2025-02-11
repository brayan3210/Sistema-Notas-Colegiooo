<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Colegio Santo Angel</title>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}"/>
  <!-- Boxicons (CDN unpkg) -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <!-- Hoja de estilos principal -->
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
  <!-- Driver.js (opcional, como en tu código original) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/driver.js/0.9.8/driver.min.js"></script>

  <style>
      /* Base reset */
      *,
      *::before,
      *::after {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
      }

      /* Ajustes para pantallas de tablets y medianas */
      @media (max-width: 768px) {
        .showcase .text h2 {
          font-size: 1.8em;
        }
        .showcase .text h3 {
          font-size: 1.3em;
        }
        .showcase .text p {
          font-size: 0.9em;
          padding: 0 15px;
        }
        .showcase a {
          padding: 10px 20px;
          font-size: 0.9em;
        }
        header h2.logo {
          font-size: 1.2em;
        }
      }

      /* Sección .showcase con fondo #001721 */
      .showcase {
        position: relative;
        width: 100%;
        background-color: #001721; /* Fondo establecido */
      }

      /* Ajustes para pantallas de móviles pequeñas */
      @media (max-width: 480px) {
        .showcase .text h2 {
          font-size: 1.5em;
        }
        .showcase .text h3 {
          font-size: 1.1em;
        }
        .showcase .text p {
          font-size: 0.8em;
          padding: 0 10px;
        }
        .showcase a {
          padding: 8px 16px;
          font-size: 0.85em;
        }
        header h2.logo {
          font-size: 1em;
        }
      }

      /* Ícono de hamburguesa */
      .toggle i {
        color: #fff;
        font-size: 50px; /* Tamaño del ícono */
        cursor: pointer;
      }

      /* Redes sociales (posición en escritorio por defecto) */
      .social {
        position: absolute;
        bottom: 57px; /* Ajusta este valor para subir/bajar las redes sociales en escritorio */
        left: 50%;
        transform: translateX(-260%);
        list-style: none;
        display: flex;
        gap: 20px;
      }
      .social li a i {
        color: #fff;
        font-size: 40px; /* Tamaño de los íconos de redes */
        transition: transform 0.2s ease;
      }
      .social li a i:hover {
        transform: scale(1.1);
      }

      /*
        Sobrescribimos la posición de .social
        en pantallas <= 768px, para que se centren.
      */
      @media (max-width: 768px) {
        .social {
          left: 50%;
          transform: translateX(-100%);
          bottom: 30px; /* Ajusta si quieres más arriba/abajo en móvil */
        }
      }
  </style>
</head>
<body>
  <section class="showcase">
    <header>
      <h2 class="logo">Educación de calidad</h2>
      <!-- Ícono “hamburguesa” con Boxicons -->
      <div class="toggle">
        <i class="bx bx-menu"></i>
      </div>
    </header>
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-e4421340-5ad4-43aa-8c20-483ab158d8e2" data-elfsight-app-lazy></div>

    <div class="text">
      <h2>COLEGIO</h2>
      <h3>SANTO ANGEL</h3>
      <p>
        En el Colegio Santo Ángel, brindamos una educación de calidad 
        en un ambiente cálido y acogedor, donde los valores cristianos y el
        desarrollo personal son pilares fundamentales. Nuestros estudiantes reciben las herramientas y 
        el acompañamiento necesarios para alcanzar su máximo potencial académico, emocional y social.
      </p>
      <a href="{{ url('/Sobrenosotros') }}">¡Más Sobre Nosotros!</a>
    </div>

    <!-- Redes sociales -->
    <ul class="social">
      <li>
        <a href="https://web.facebook.com/colsantoangel02/?locale=es_LA&_rdc=1&_rdr">
          <i class="bx bxl-facebook"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bx bxl-twitter"></i>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="bx bxl-instagram"></i>
        </a>
      </li>
    </ul>
  </section>

  <!-- Menú lateral/desplegable -->
  <div class="menu">
    <ul>
      <li><a href="{{ url('/login') }}">Iniciar Sesión</a></li>
      <!-- <li><a href="{{ url('/Matricula') }}">Incripción</a></li> -->
      <li><a href="{{ url('/Novedades') }}">Blog/Novedades</a></li>
      <li><a href="{{ url('Contactenos')}}">Contáctenos</a></li>
    </ul>
  </div>

  <script>
    const menuToggle = document.querySelector('.toggle');
    const showcase = document.querySelector('.showcase');

    menuToggle.addEventListener('click', () => {
      menuToggle.classList.toggle('active');
      showcase.classList.toggle('active');
    });
  </script>
</body>
</html>
