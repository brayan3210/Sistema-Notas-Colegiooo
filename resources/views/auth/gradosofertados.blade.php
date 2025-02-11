<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Colegio Santo Angel</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('logis/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('logis/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('logis/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('logis/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('logis/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('logis/assets/vendor/aos/aos.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('logis/assets/css/main.css') }}" rel="stylesheet">

    <style>
        /* Ajustes específicos para la sección Service Details */
        /* En pantallas grandes, la imagen ocupará un 50% del contenedor (y se centrará) */
        @media (min-width: 992px) {
            .services-img {
                max-width: 50%;
                margin: 0 auto;
                display: block;
            }
        }
        #grados-ofertados {
    margin-bottom: 50px !important; /* Reduce el margen inferior */
    padding-bottom: 0 !important; /* Elimina el padding inferior */
  }

  #social-media {
    margin-top: 50px !important; /* Reduce el margen superior */
    padding-top: 0 !important; /* Elimina el padding superior */
  }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <a href="{{ asset('assets/Logocolegio.png') }}" class="logo d-flex align-items-center">
                <h1>Colegio Santo Angel</h1>
            </a>

            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="{{route('Sobrenosotros')}}" class="active">Inicio</a></li>
                    <li><a href="{{asset('Grados-Ofertados')}}">Grados Ofertados</a></li>
                    <li><a href="{{asset('Novedades')}}">Novedades/Noticias</a></li>
                    <li><a href="{{route('Contactenos')}}">Contáctenos</a></li>
                    <li><a class="get-a-quote" href="{{route('login')}}">Iniciar Sesion</a></li>
                </ul>
            </nav><!-- .navbar -->

        </div>
    </header>
    <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-e4421340-5ad4-43aa-8c20-483ab158d8e2" data-elfsight-app-lazy></div>

  <main id="main">

   
        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="page-header d-flex align-items-center" >
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h2>Grados Que Ofrecemos</h2>
                            <!-- <h3>PEI</h3> -->
                            <!-- <p>
                                A continuación, presentamos la base que orienta nuestros procesos formativos, buscando el mejoramiento continuo y la formación integral de cada estudiante. Este documento surge de una reflexión colectiva y responde a las necesidades reales de nuestra comunidad, impulsando la educación en competencias para la vida y la sociedad.
                            </p> -->
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('Sobrenosotros') }}">Inicio</a></li>
                        <li>Grados Ofertados</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->
    <!-- Additional content here -->
    <section id="grados-ofertados" class="service-details">
    <div class="container" data-aos="fade-up">
        <div class="section-header text-center mb-5">
            <h2>Grados que Ofrecemos</h2>
            <p>Conoce los niveles educativos que conforman nuestro modelo pedagógico, diseñado para el desarrollo integral de nuestros estudiantes.</p>
        </div>

        <div class="row gy-5">
            <!-- Jardín -->
            <div class="col-lg-12">
                <h4 class="mb-3">Jardín</h4>
                <p>
                    En Jardín, dirigido a niños a partir de los 4 años, potenciamos el desarrollo de habilidades sociales, comunicativas y preacadémicas.
                    Diseñamos actividades dinámicas que permiten a los estudiantes adquirir confianza en sí mismos, trabajar en equipo y expresar sus ideas. 
                    Además, integramos el juego como herramienta fundamental para fortalecer la creatividad y el pensamiento crítico, preparando a los niños para 
                    los retos de la educación formal.
                </p>
            </div>

            <!-- Prejardín -->
            <div class="col-lg-12">
                <h4 class="mb-3">Prejardín</h4>
                <p>
                    En Prejardín, recibimos a niños a partir de los 3 años, ofreciendo un ambiente cálido y seguro que favorece su adaptación al entorno escolar. 
                    En esta etapa inicial, nuestro enfoque se centra en estimular el desarrollo emocional, cognitivo y motor de los pequeños a través de actividades 
                    lúdicas, creativas y experienciales. Los niños aprenden a explorar el mundo que los rodea, fomentando su curiosidad natural y sus primeras interacciones sociales.
                </p>
            </div>

            <!-- Transición -->
            <div class="col-lg-12">
                <h4 class="mb-3">Transición</h4>
                <p>
                    La etapa de Transición, destinada a niños desde los 5 años, marca un puente esencial entre la educación inicial y la educación básica.
                    En este grado, reforzamos las bases del aprendizaje en lectura, escritura y pensamiento lógico-matemático. 
                    Nuestros estudiantes desarrollan autonomía, hábitos de estudio y un sentido de responsabilidad, siempre en un entorno de respeto y motivación.
                </p>
            </div>

            <!-- Primaria -->
            <div class="col-lg-12">
                <h4 class="mb-3">Primaria</h4>
                <p>
                    En la educación Primaria, acogemos a niños desde los 6 años, abarcando los grados de Primero a Quinto. 
                    Nuestro programa está diseñado para fortalecer las competencias básicas en áreas como matemáticas, ciencias, lengua y sociales, 
                    mientras promovemos habilidades blandas como la empatía, el liderazgo y el trabajo colaborativo. 
                    Además, integramos la tecnología y actividades extracurriculares que enriquecen la experiencia educativa.
                </p>
            </div>

            <!-- Secundaria -->
            <div class="col-lg-12">
                <h4 class="mb-3">Secundaria</h4>
                <p>
                    La educación Secundaria, que inicia desde el grado Sexto, está orientada a jóvenes entre 10 y 11 años en adelante. 
                    En este nivel, los estudiantes consolidan su pensamiento crítico y analítico, fortaleciendo su preparación académica para el bachillerato. 
                    Nuestros docentes se enfocan en acompañar el crecimiento personal y académico de los estudiantes, promoviendo valores como la responsabilidad, 
                    la ética y el compromiso social. Incorporamos metodologías activas y proyectos interdisciplinarios para garantizar un aprendizaje significativo.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ======= Redes Sociales Section ======= -->
<section id="social-media" class="social-media py-5">
  <div class="container text-center">
    <div class="row gy-4 justify-content-center">
      <!-- Twitter -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://twitter.com/estufundess" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-twitter" style="font-size: 2.5rem; color: #1DA1F2;"></i>
        </a>
        <p class="mt-2 mb-0">@estufundess</p>
      </div>

      <!-- YouTube -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.youtube.com/user/UNIFUNDES" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-youtube" style="font-size: 2.5rem; color: #FF0000;"></i>
        </a>
        <p class="mt-2 mb-0">UNIFUNDES</p>
      </div>

      <!-- WhatsApp -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://wa.me/573202254010" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-whatsapp" style="font-size: 2.5rem; color: #25D366;"></i>
        </a>
        <p class="mt-2 mb-0">3202254010</p>
      </div>

      <!-- Facebook -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.facebook.com/UNIFUNDES" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-facebook" style="font-size: 2.5rem; color: #4267B2;"></i>
        </a>
        <p class="mt-2 mb-0">@UNIFUNDES</p>
      </div>

      <!-- Instagram -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.instagram.com/unifundes" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-instagram" style="font-size: 2.5rem; color: #C13584;"></i>
        </a>
        <p class="mt-2 mb-0">@unifundes</p>
      </div>
    </div>
  </div>
</section>
<!-- End Redes Sociales Section -->

  </main><!-- End #main -->

     <!-- ======= Footer ======= -->
     <footer id="footer" class="footer">

<div class="container">
  <div class="row gy-4">
    <div class="col-lg-5 col-md-12 footer-info">
      <a href="index.html" class="logo d-flex align-items-center">
        <span>Colegio Santo Angel</span>
      </a>
      <p>La Sonrisa De Los Niños Es La Alegría De Los Adultos.</p>
      <div class="social-links d-flex mt-4">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="https://web.facebook.com/colsantoangel02/?locale=es_LA&_rdc=1&_rdr" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Apartados interesantes de ver </h4>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Servicios</a></li>
        <li><a href="#">Novedades/Noticias</a></li>
      </ul>
    </div>

    <div class="col-lg-2 col-6 footer-links">
      <h4>Our Services</h4>
      <ul>
        <li><a href="#">Web Design</a></li>
        <li><a href="#">Web Development</a></li>
        <li><a href="#">Product Management</a></li>
        <li><a href="#">Marketing</a></li>
        <li><a href="#">Graphic Design</a></li>
      </ul>
    </div>

    <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
      <h4>Contactanos</h4>
      <p>
        Cra.9 N° 7-37 B/Triana <br>
        Flandes-Tolima<br>
        Colombia <br><br>
        <strong>Telefono:</strong> +57 315 3532748<br>
        <strong>Email:</strong>
        colegiosantoangelflandes@gmail.com<br>
      </p>

    </div>

  </div>
</div>
<div class="container mt-4">
  <div class="copyright">
    &copy; Copyright <strong><span>Colegio Santo Angel</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    Designed by <iner href="https://bootstrapmade.com/">Designers S.A</a>
  </div>
</div>

</footer><!-- End Footer -->
<!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('logis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('logis/assets/js/main.js') }}"></script>

</body>

</html>
