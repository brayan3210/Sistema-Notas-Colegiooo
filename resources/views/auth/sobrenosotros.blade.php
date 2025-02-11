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
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('logis/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/aos/aos.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('logis/assets/css/main.css') }}" rel="stylesheet">

</head>
<style>
  /* Ajustar márgenes entre las secciones "services", "features" y "faq" */
  #service.services {
    margin-bottom: 30px !important; /* Reduce el margen inferior */
    padding-bottom: 0 !important; /* Elimina el padding inferior */
  }

  #features.features {
    margin-top: 30px !important; /* Reduce el margen superior */
    margin-bottom: 30px !important; /* Reduce el margen inferior */
    padding-top: 0 !important; /* Elimina el padding superior */
    padding-bottom: 0 !important; /* Elimina el padding inferior */
  }
  #about.about-us-section {
      margin-top: 30px !important;     /* Quita margen superior */
      padding-top: 0 !important;    /* Quita padding superior si existía */
    }

  #faq.faq {
    margin-top: 30px !important; /* Reduce el margen superior */
    padding-top: 0 !important; /* Elimina el padding superior */
  }
  /* Media query para dispositivos móviles */
  @media (max-width: 768px) {
    /* Ajustar el iframe para dispositivos móviles */
    #features iframe {
      width: 350px !important; /* Ancho completo del contenedor */
      height: 390px !important; /* Altura automática para mantener la proporción */
    }
  }
    
</style>

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
          <li><a class="get-a-quote" href="{{route('login')}}">Iniciar Sesión</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header>
  <script src="https://static.elfsight.com/platform/platform.js" async></script>
  <div class="elfsight-app-8fc1d9a0-7f2c-4016-82fa-a9d66d69802e" data-elfsight-app-lazy></div>
  
  <script src="https://static.elfsight.com/platform/platform.js" async></script>
<div class="elfsight-app-e4421340-5ad4-43aa-8c20-483ab158d8e2" data-elfsight-app-lazy></div>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Conozca Más Sobre Nuestro Colegio</h2>
          <p data-aos="fade-up" data-aos-delay="100"> El Colegio Santo Ángel, ubicado en Flandes,
            Tolima, ha sido un pilar en la comunidad local durante años.
            Su enfoque educativo tradicional promueve valores como la responsabilidad y el respeto.
          </p>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">
            <!-- 
            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Visitas</p>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Profesores</p>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                <p>Soporte</p>
              </div>
            </div>

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                <p>Area Administrativa</p>
              </div>
            </div> 
            -->
          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="{{ asset('assets/Logocolegio.png') }}" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <!-- 
          Para centrar tus 2 "service-item" horizontalmente,
          agregamos justify-content-center en el .row
        -->
        <div class="row gy-4 justify-content-center">
          
          <!-- Ejemplo comentado (no lo necesitas) 
          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"></div>
            <div>
              <h4 class="title">Educación de calidad</h4>
              <p class="description">Breve descripción a poner</p>
              <a href="service-details.html" class="readmore stretched-link">
                <span>Learn More</span><i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
          -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0">
            <i class="fa-solid fa-scale-balanced"></i> <!-- Icono actualizado para representar normas y convivencia -->
            </div>
            <div>
              <h4 class="title">Manual de Convivencia</h4>
              <p class="description">Conozca aquí nuestro manual de convivencia.</p>
              <a href="{{ route('Manual-Convivencia') }}" class="readmore stretched-link">
                <span>Click Aquí</span><i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0">
            <i class="fa-solid fa-map"></i> <!-- Icono actualizado para representar una carta de navegación -->
            </div>
            <div>
              <h4 class="title">Proyecto Educativo Institucional (PEI)</h4>
              <p class="description">Conozca y tenga más información del PEI</p>
              <a href="{{ route('PEI') }}" class="readmore stretched-link">
                <span>Click Aquí</span><i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

        </div><!-- End row -->

      </div>
    </section><!-- End Featured Services Section -->
<!-- ======= About Us Section ======= -->
<section id="about" class="about-us-section">
  <div class="container" data-aos="fade-up">
    <div class="row g-5 align-items-center">

      <!-- Columna de la imagen (con tamaño reducido y responsive) -->
      <div class="col-lg-6 text-center position-relative order-lg-last order-first">
        <img 
          src="{{asset('logis/assets/img/image.png')}}" 
          class="img-fluid" 
          alt="Imagen Acerca de Nosotros" 
          style="width: 80%; height: 600px;"
        > 
        <!-- Conservamos el botón de reproducción (glightbox) -->
        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox play-btn"></a>
      </div>

      <!-- Columna de contenido (texto) -->
      <div class="col-lg-6 content order-last order-lg-first">
        <h3>Acerca de Nosotros</h3>
        <p>
          El <strong>Colegio Santo Ángel</strong> impulsa su quehacer formativo bajo el
          <strong>Proyecto Educativo Institucional (PEI): “EDUCANDO EN COMPETENCIAS PARA LA VIDA Y LA SOCIEDAD”</strong>.
          Este enfoque rompe con la planificación tradicional, promoviendo estrategias que mejoran
          la gestión y facilitan el cambio institucional a través de la acción colectiva.
        </p>
        <p>
          Nuestro PEI se concibe como la “carta de navegación” que orienta la labor educativa,
          otorga identidad al colegio y garantiza la continuidad de sus procesos. Gracias al
          trabajo coordinado entre directivos, docentes, padres de familia y comunidad, formamos
          niños y jóvenes con valores cristianos y actitudes emprendedoras que les permitan
          contribuir al desarrollo de la sociedad.
        </p>
        <p>
          Adicionalmente, el <strong>Manual de Convivencia</strong> del Colegio Santo Ángel respalda
          los principios de dignidad humana, derechos y deberes de los estudiantes, integrando la
          legislación vigente (Ley de Infancia y Adolescencia, Ley 1620, etc.) y promoviendo
          la sana convivencia, el respeto y la formación integral para la vida.
        </p>
        <p>
          Bajo la guía de nuestra <strong>Propietaria, LILIANA CLAVIJO DÍAZ</strong>, y la
          <strong>Rectora, LILIANA MARCELA ABRIL CLAVIJO</strong>, el colegio se proyecta como
          una institución sólida, comprometida con la excelencia educativa y la mejora
          permanente.
        </p>
      </div>

    </div>
  </div>
</section>
<!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Grados Que Ofertamos</span>
          <h2>Grados Que Ofertamos</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
              </div>
              <h3><a href="{{ route('Grados-Ofertados') }}" class="stretched-link">Prejardin </a></h3>
              <p>Niños a partir de los 3 años de edad. </p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-img">
              </div>
              <h3><a href="{{ route('Grados-Ofertados') }}" class="stretched-link">Jardin </a></h3>
              <p>Niños a partir de los 4 años de edad.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-img">
              </div>
              <h3><a href="{{ route('Grados-Ofertados') }}" class="stretched-link">Transición</a></h3>
              <p>Niños a partir de los 5 años de edad.</p>
            </div>
          </div><!-- End Card Item -->
       
          <div class="row gy-4 justify-content-center">
      <!-- Item: Primaria -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
        <div class="card">
          <div class="card-img">
          </div>
          <h3><a href="{{ route('Grados-Ofertados') }}" class="stretched-link">Primaria</a></h3>
          <p>Niños a partir de los 6 años de edad dependiendo segun a los grados que van de Pimero a Quinto.</p>
        </div>
      </div><!-- End Card Item -->

      <!-- Item: Secundaria -->
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
        <div class="card">
          <div class="card-img">
          </div>
          <h3><a href="{{ route('Grados-Ofertados') }}" class="stretched-link">Secundaria</a></h3>
          <p>Grado Sexto.</p>
        </div>
      </div>

          <!-- <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card">
              <div class="card-img">
                <img src="{logis/assets/img/warehousing-service.jpg')}}" alt="" class="img-fluid"> 
              </div>
              <h3><a href="service-details.html" class="stretched-link">servicio 6 </a></h3>
              <p>breve decripcion a poner</p>
            </div>
          </div> -->

        </div>

      </div>
    </section><!-- End Services Section -->


   <!-- ======= Features Section ======= -->
<section id="features" class="features">
  <div class="container">

    <!-- Título centrado -->
    <div class="row">
      <div class="col-12 text-center mb-4">
        <h2 id="somosSantoAngel" style="font-weight: bold;">#SomosSantoAngel</h2>
      </div>
    </div>

    <!-- Contenedor del iframe centrado -->
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <iframe 
          src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcolsantoangel02%2F%3Flocale%3Des_LA&tabs=timeline&width=500&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=9104420149671540" 
          width="500" 
          height="600" 
          style="border:none; overflow:hidden;" 
          scrolling="no" 
          frameborder="0" 
          allowfullscreen="true" 
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share">
        </iframe>
      </div>
    </div>

  </div>
</section>
<!-- End Features Section -->

<!-- ======= Redes Sociales Section ======= -->
<section id="social-media" class="social-media py-5">
  <div class="container text-center">
    <div class="row gy-4 justify-content-center">
      <!-- Twitter -->
      <!-- <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://twitter.com/estufundess" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-twitter" style="font-size: 2.5rem; color: #1DA1F2;"></i>
        </a>
        <p class="mt-2 mb-0">@SantoAngel</p>
      </div> -->

      <!-- YouTube -->
      <!-- <div class="col-6 col-md-2 d-flex flex-column align-items-center">
        <a href="https://www.youtube.com/user/UNIFUNDES" target="_blank" rel="noopener noreferrer" style="text-decoration: none;">
          <i class="bi bi-youtube" style="font-size: 2.5rem; color: #FF0000;"></i>
        </a>
        <p class="mt-2 mb-0">@SantoAngel</p>
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
        <p class="mt-2 mb-0">@SantoAngel</p>
      </div> -->
    </div>
  </div>
</section>
<!-- End Redes Sociales Section -->


    <!-- ======= Frequently Asked Questions Section ======= -->
  

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
          <ul>
            <li><a href="{{route('Sobrenosotros')}}">Home</a></li>
            <li><a href="{{route(name: 'Grados-Ofertados')}}">Grados-Ofertados</a></li>
            <li><a href="">Novedades/Noticias</a></li>
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
       <script>document.write(new Date().getFullYear());</script>, &copy; Copyright <strong><span>Colegio Santo Angel</span></strong>. All Rights Reserved
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
  <script src="{{asset('logis/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/aos/aos.cjs.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/aos/aos.esm.js')}}"></script>

  

  <!-- Template Main JS File -->
  <script src="{{asset('logis/assets/js/main.js') }}"></script>

</body>
</html>