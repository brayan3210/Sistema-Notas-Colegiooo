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
                    <li><a href="{{asset('')}}">Servicios</a></li>
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
                            <h2>Proyecto Educativo Institucional</h2>
                            <h3>PEI</h3>
                            <p>
                                A continuación, presentamos la base que orienta nuestros procesos formativos, buscando el mejoramiento continuo y la formación integral de cada estudiante. Este documento surge de una reflexión colectiva y responde a las necesidades reales de nuestra comunidad, impulsando la educación en competencias para la vida y la sociedad.</p>
                        </div>
                    </div>
                </div>
            </div>
            <nav>
                <div class="container">
                    <ol>
                        <li><a href="{{ route('Sobrenosotros') }}">Inicio</a></li>
                        <li>PEI</li>
                    </ol>
                </div>
            </nav>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Service Details Section ======= -->
        <section id="service-details" class="service-details">
            <div class="container" data-aos="fade-up">

                <!-- Sección compacta con g-5 para más separación vertical/horizontal -->
                <div class="row g-5 align-items-center">

                    <!-- Columna izquierda (descripción del Manual) -->
                    <div class="col-lg-6">
                        <h4 class="mb-3">BREVE DESCRIPCION DEL PEI - PROYECTO EDUCATIVO INSTITUCIONAL</h4>
                        <p class="mb-3">
                            El colegio Santo Ángel presenta a toda la comunidad de Flandes y especialmente a su comunidad educativa el presente Proyecto Educativo Institucional “ EDUCANDO EN COMPETENCIAS PARA LA VIDA Y LA SOCIEDAD” el cual está diseñado en la realidad de nuestra población, bajo un riguroso y arduo trabajo democrático y con miras a lograr una educación adecuada, pertinente, integrada, actualizada, donde se comprometan directivos, administrativos, docentes, padres de familia, sector educativo municipal y nacional, sector productivo y otros estamentos en dar lo mejor para formar niños y niñas amantes de la educación, el buen trato y emprendedores con el fin de mejorar su calidad de vida.
                        </p>
                        <!-- <p>
              El Manual de Convivencia recoge la legislación vigente: Ley de la infancia y adolescencia 1098 de 2006, 
              Declaración Universal de los Derechos Humanos, Ley 1620 y su Decreto reglamentario 2013; lineamientos del M.E.N; 
              el Decreto 1286 de 2005 y el proyecto educativo institucional: “HACIA LA CONSTRUCCION DEL SER HUMANO EQUILIBRADO”. 
              Los principios son las pautas generales que direccionan la interacción institucional y compartimos con todos los miembros 
              de la comunidad educativa.
            </p> -->
                    </div>

                    <!-- Columna derecha (imagen reducida) -->
                    <div class="col-lg-6 text-center">
                        <img
                            src="https://colnavas.edu.co/responsive2/img/content/sixbox_sixbox_PEI1.png"
                            alt="Manual de Convivencia - Colegio Santo Ángel"
                            class="img-fluid services-img">
                    </div>
                </div> <!-- Fin row -->

                <!-- Botón centrado debajo -->
                <!-- <div class="row">
                    <div class="col-12 text-center mt-4">
                        <a href="{{route('descargar-pei') }}" class="btn btn-primary">
                            DESCARGAR PEI
                        </a>
                    </div> -->
                </div>

            </div>
        </section><!-- End Service Details Section -->

    </main><!-- End #main -->

<!-- ======= Redes Sociales Section ======= -->
<section id="social-media" class="social-media py-5">
  <div class="container text-center">
    <div class="row gy-4 justify-content-center">
      <!-- Twitter -->
      <!-- <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://twitter.com/estufundess" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-twitter" style="font-size: 2.5rem; color: #1DA1F2;"></i>
        </a>
        <p class="mt-2 mb-0">@estufundess</p>
      </div> -->

      <!-- YouTube -->
      <!-- <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.youtube.com/user/UNIFUNDES" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-youtube" style="font-size: 2.5rem; color: #FF0000;"></i>
        </a>
        <p class="mt-2 mb-0">UNIFUNDES</p>
      </div> -->

      <!-- WhatsApp -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://wa.me/573153532748" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-whatsapp" style="font-size: 2.5rem; color: #25D366;"></i>
        </a>
        <p class="mt-2 mb-0">3153532748</p>
      </div>

      <!-- Facebook -->
      <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.facebook.com/colsantoangel02" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-facebook" style="font-size: 2.5rem; color: #4267B2;"></i>
        </a>
        <p class="mt-2 mb-0">@SantoAngel</p>
      </div>

      <!-- Instagram -->
      <!-- <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.instagram.com/unifundes" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-instagram" style="font-size: 2.5rem; color: #C13584;"></i>
        </a>
        <p class="mt-2 mb-0">@unifundes</p>
      </div> -->
    </div>
  </div>
</section>
<!-- End Redes Sociales Section -->

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

    <h4>Apartados interesantes de ver</h4>
          <ul>
            <li><a href="">Home</a></li>
            <li><a href="#">Servicios</a></li>
            <li><a href="#">Novedades/Noticias</a></li>
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

    <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

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