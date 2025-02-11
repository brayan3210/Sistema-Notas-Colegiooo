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
        #service-details {
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
                    <li><a href="{{route('Contactenos')}}">Contactenos</a></li>
                    <li><a class="get-a-quote" href="{{route('login')}}">Iniciar Sesión</a></li>
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
                            <h2>Contactenos</h2>
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
                        <li>Contacto</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->
    <!-- Additional content here -->
    <section id="contactenos" class="service-details">
    <div class="container" data-aos="fade-up">
        <div class="section-header text-center mb-5" data-aos="fade-down">
            <h2>Contáctenos</h2>
            <p>Estamos aquí para ayudarte. Encuentra nuestras oficinas o contáctanos a través de los diferentes medios que ofrecemos.</p>
        </div>

        <div class="row gy-5">
            <!-- Información de contacto -->
            <div class="col-lg-6" data-aos="fade-right">
                <h4 class="mb-3">Información de Contacto</h4>
                <p>
                    <strong>Dirección:</strong> Cra. 9 # 7-37, Flandes, Tolima, Colombia<br>
                    <strong>Teléfono:</strong> +57 315 3532748<br>
                    <strong>Email:</strong> colegiosantoangelflandes@gmail.com
                </p>
                <p>
                    <strong>Horario de atención:</strong><br>
                    Lunes a Viernes: 8:00 AM - 6:00 PM<br>
                    Sábados: 8:00 AM - 12:00 PM
                </p>
            </div>

            <!-- Redes sociales -->
            <div class="col-lg-6" data-aos="fade-left">
                <h4 class="mb-3">Redes Sociales</h4>
                <p>Conéctate con nosotros a través de nuestras redes sociales:</p>
                <ul>
                    <!-- <li><a href="#" target="_blank" class="twitter"><i class="bi bi-twitter"></i> Twitter</a></li> -->
                    <li><a href="https://web.facebook.com/colsantoangel02/?locale=es_LA&_rdc=1&_rdr" target="_blank" class="facebook"><i class="bi bi-facebook"></i> Facebook</a></li>
                    <!-- <li><a href="#" target="_blank" class="instagram"><i class="bi bi-instagram"></i> Instagram</a></li>
                    <li><a href="#" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i> LinkedIn</a></li> -->
                </ul>
            </div>
        </div>

        <!-- Google Maps -->
        <div class="row mt-5" data-aos="zoom-in">
            <div class="col-12 text-center">
                <h4 class="mb-3">Encuéntranos en Google Maps</h4>
                <p>También puedes encontrarnos fácilmente en nuestra ubicación:</p>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.4264307886556!2d-74.81831332557836!3d4.292436496721705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3e3126b92c6397%3A0x3fcba2eb84f427b5!2sCra.%209%20%237-37%2C%20Flandes%2C%20Tolima%2C%20Colombia!5e0!3m2!1sen!2sco!4v1700000000000!5m2!1sen!2sco"
                    width="100%"
                    height="400"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </div>
</section>

<script>
    AOS.init({
        duration: 1000, // Duración de las animaciones en milisegundos
        easing: 'ease-in-out', // Tipo de easing para las animaciones
        once: true // Animar solo una vez cuando se hace scroll
    });
</script>

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
      <li><a href="{{route('Sobrenosotros')}}">Inicio</a></li>
            <li><a href="{{route('Grados-Ofertados')}}">Grados-Ofertados</a></li>
            <li><a href="{{url('Novedades')}}">Novedades/Noticias</a></li>
          </ul>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>Grados Ofertados</h4>
          <ul>
            <li><a href="{{route('Grados-Ofertados')}}">Preescolar</a></li>
            <li><a href="{{route('Grados-Ofertados')}}">Jardin</a></li>
            <li><a href="{{route('Grados-Ofertados')}}">Transicion</a></li>
            <li><a href="{{route('Grados-Ofertados')}}">Pimaria</a></li>
            <li><a href="{{route('Grados-Ofertados')}}">Secundaria</a></li>
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
  Designed by <iner href="https://bryan-dev.com/">Bryan Dev S.A</a>
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
