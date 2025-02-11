<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Colegio Santo Angel</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

  <!-- Vendor CSS Files -->
  <link href="{{ asset('logis/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('logis/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('logis/assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('logis/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('logis/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('logis/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Template Main CSS File -->
  <link href="{{ asset('logis/assets/css/main.css') }}" rel="stylesheet">
 
  <style>
    .posts-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    .post {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      overflow: hidden;
    }

    .post-header {
      display: flex;
      align-items: center;
      padding: 12px;
    }

    .post-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
    }

    .post-meta {
      flex-grow: 1;
    }

    .post-author {
      margin: 0;
      font-size: 14px;
      font-weight: 600;
    }

    .post-time {
      font-size: 12px;
      color: #65676B;
    }

    .post-content {
      padding: 0 12px 12px;
    }

    .post-title {
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 8px;
    }

    .post-images {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 2px;
    }

    .post-image-container {
      position: relative;
      padding-bottom: 100%;
      /* 1:1 Aspect Ratio */
      overflow: hidden;
    }

    .post-image-container.wide {
      grid-column: span 2;
    }

    .post-image-container.large {
      grid-row: span 2;
    }

    .post-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      cursor: pointer;
    }

    .post-image-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 20px;
      font-weight: bold;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      .posts-container {
        padding: 10px;
      }

      .post-images {
        grid-template-columns: 1fr;
      }

      .post-image-container.wide,
      .post-image-container.large {
        grid-column: auto;
        grid-row: auto;
      }
    }

    /* Estilos para el lightbox (GLightbox se encarga de la mayor parte) */
  </style>
  
</head>

<body>
  
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ asset('assets/Logocolegio.png') }}" class="logo d-flex align-items-center">
        <h1>Santo Angel</h1>
      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('Sobrenosotros') }}" class="active">Inicio</a></li>
          <li><a href="{{ asset('Grados-Ofertados') }}">Grados Ofertados</a></li>
          <li><a href="{{ asset('Novedades') }}">Novedades/Noticias</a></li>
          <li><a href="{{ route('Contactenos') }}">Contáctenos</a></li>
          <li><a class="get-a-quote" href="{{ route('login') }}">Iniciar Sesión</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <script src="https://static.elfsight.com/platform/platform.js" async></script>
  <div class="elfsight-app-e4421340-5ad4-43aa-8c20-483ab158d8e2" data-elfsight-app-lazy></div>
  <div class="breadcrumbs">
    <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>Novedades De Nuestro Colegio</h2>
            <p>Este apartado es para que se conozcan las actividades que se realizan con nuestros estudiantes en nuestro colegio.</p>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ route('Sobrenosotros') }}">Inicio</a></li>
          <li>Novedades</li>
        </ol>
      </div>
    </nav>
  </div>

  <div class="container mx-auto px-4 py-8 max-w-2xl sm:max-w-4xl">
    <article class="bg-white rounded-lg shadow-lg p-4 sm:p-6 animate__animated animate__fadeInUp">
      <!-- Fecha de publicación -->
      <time class="text-xs sm:text-sm text-gray-500 block mb-2 text-center">
        {{ $publicacion->created_at->format('d F Y') }}
      </time>

      <!-- Título de la publicación, centrado -->
      <h1 class="text-xl sm:text-3xl font-bold text-gray-800 mb-4 text-center">
        {{ $publicacion->titulo_publicacion }}
      </h1>

      <!-- Imágenes de la publicación -->
      @if($publicacion->fotos->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2 sm:gap-4 mb-4">
          @foreach($publicacion->fotos as $foto)
            <a href="{{ asset('storage/' . $foto->ruta_foto) }}"
               class="glightbox"
               data-gallery="gallery{{ $publicacion->id_publicacion }}"
               data-id="{{ $foto->id_foto }}">
              <img src="{{ asset('storage/' . $foto->ruta_foto) }}"
                   alt="Imagen {{ $loop->iteration }}"
                   class="mx-auto object-cover rounded-lg shadow-md transform hover:scale-105 transition duration-300"
                   style="max-height: 200px;">
            </a>
          @endforeach
        </div>
      @endif

      <!-- Contenido de la publicación -->
      <div class="prose max-w-none mb-4 text-justify text-sm sm:text-base">
        {!! nl2br(e($publicacion->descripcion)) !!}
      </div>

      <!-- Visor de PDF: Se muestran los documentos PDF debajo de la descripción -->
      @if($publicacion->documentos->isNotEmpty())
        <div class="mb-4">
          @foreach($publicacion->documentos as $documento)
            @if($documento->tipo_documento === 'pdf')
              <div class="mb-4">
                <iframe src="{{ asset('storage/' . $documento->ruta_documento) }}" width="100%" height="600px" style="border: none;"></iframe>
              </div>
            @endif
          @endforeach
        </div>
      @endif

      <!-- Contenedor de AddThis centrado -->
      <div class="flex justify-center items-center mt-4">
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
          <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
          <a class="a2a_button_facebook"></a>
          <a class="a2a_button_whatsapp"></a>
        </div>
      </div>
    </article>
  </div>

  <script>
    var a2a_config = a2a_config || {};
    a2a_config.locale = "es";
  </script>
  <script defer src="https://static.addtoany.com/menu/page.js"></script>
  <!-- AddToAny END -->

  <!-- GLightbox Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/glightbox/3.2.0/js/glightbox.min.js"></script>
  <script>
    const lightbox = GLightbox({
      selector: '.glightbox',
      touchNavigation: true,
      loop: true
    });
  </script>

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
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>Apartados interesantes de ver</h4>
          <ul>
            <li><a href="{{ route('Sobrenosotros') }}">Home</a></li>
            <li><a href="{{ route('Grados-Ofertados') }}">Grados-Ofertados</a></li>
            <li><a href="{{ url('Novedades') }}">Novedades/Noticias</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-6 footer-links">
          <h4>Grados Ofertados</h4>
          <ul>
            <li><a href="{{ route('Grados-Ofertados') }}">Preescolar</a></li>
            <li><a href="{{ route('Grados-Ofertados') }}">Jardin</a></li>
            <li><a href="{{ route('Grados-Ofertados') }}">Transicion</a></li>
            <li><a href="{{ route('Grados-Ofertados') }}">Pimaria</a></li>
            <li><a href="{{ route('Grados-Ofertados') }}">Secundaria</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contactanos</h4>
          <p>
            Cra.9 N° 7-37 B/Triana <br>
            Flandes-Tolima<br>
            Colombia <br><br>
            <strong>Telefono:</strong> +57 315 3532748<br>
            <strong>Email:</strong> colegiosantoangelflandes@gmail.com<br>
          </p>
        </div>
      </div>
    </div>
    <div class="container mt-4">
      <div class="copyright">
        <script>document.write(new Date().getFullYear());</script>,  &copy; Copyright <strong><span>Colegio Santo Angel</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bryan-dev.com/">Bryan Dev S.A</a>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  
  <!-- Vendor JS Files -->
  <script src="{{ asset('logis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('logis/assets/vendor/php-email-form/validate.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="{{ asset('logis/assets/js/main.js') }}"></script>
</body>

</html>
