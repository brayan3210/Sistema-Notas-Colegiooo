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

  <!-- Vendor CSS Files -->
  <link href="{{asset('logis/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Template Main CSS File -->
  <link href="{{asset('logis/assets/css/main.css') }}" rel="stylesheet">

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
    }

    .post-footer {
      display: flex;
      justify-content: space-around;
      padding: 12px;
      border-top: 1px solid #E4E6EB;
    }

    .post-action {
      background: none;
      border: none;
      color: #65676B;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      display: flex;
      align-items: center;
    }

    .post-action i {
      margin-right: 4px;
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

    /* Lightbox modal */
    .lightbox {
      display: none;
      position: fixed;
      z-index: 1000;
      padding-top: 60px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.9);
    }

    .lightbox-content {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #lightboxImage {
      max-width: 80%;
      max-height: 80%;
    }

    .close {
      position: absolute;
      top: 20px;
      right: 25px;
      color: #fff;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
    }

    .prev,
    .next {
      position: absolute;
      top: 50%;
      color: white;
      font-size: 40px;
      font-weight: bold;
      cursor: pointer;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }

    /* Estilo de las publicaciones */
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
          <li><a href="{{route('Sobrenosotros')}}" class="active">Inicio</a></li>
          <li><a href="{{asset('Grados-Ofertados')}}">Grados Ofertados</a></li>
          <li><a href="{{asset('Novedades')}}">Novedades/Noticias</a></li>
          <li><a href="{{route('Contactenos')}}">Contáctenos</a></li>
          <li><a class="get-a-quote" href="{{route('login')}}">Iniciar Sesión</a></li>
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
          <li><a href="{{route('Sobrenosotros')}}">Inicio</a></li>
          <li>Novedades</li>
        </ol>
      </div>
    </nav>
  </div>
<!-- Cabecera y estilos se mantienen igual -->

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-8 text-center">Novedades del Colegio</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($publicaciones as $publicacion)
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <a href="{{ route('novedades.show', $publicacion->id_publicacion) }}">
                @if($publicacion->fotos->isNotEmpty())
                <img src="{{ asset('storage/' . $publicacion->fotos->first()->ruta_foto) }}" 
                     alt="{{ $publicacion->titulo_publicacion }}"
                     class="w-full h-48 object-cover">
                @else
                <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-500">Sin imagen-Posible-PDF</span>
                </div>
                @endif
                
                <div class="p-4">
                    <time class="text-sm text-gray-500 block mb-2">
                        {{ $publicacion->created_at->format('d M Y') }}
                    </time>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        {{ Str::limit($publicacion->titulo_publicacion, 50) }}
                    </h3>
                    <p class="text-gray-600">
                        {{ Str::limit($publicacion->descripcion, 100) }}
                    </p>
                </div>
            </a>
        </article>
        @endforeach
    </div>

    <!-- Paginación -->
    <div class="mt-8">
        {{ $publicaciones->links() }}
    </div>
</div>

  <!-- <div class="posts-container">
    @if($publicaciones->isEmpty())
    <p>No hay publicaciones aún.</p>
    @else
    @foreach($publicaciones as $publicacion)
    <article class="post">
      <header class="post-header">
        <img src="{{ asset('assets/Logor.png') }}" alt="Logo Colegio" class="post-avatar">
        <div class="post-meta">
          <h3 class="post-author">Colegio Santo Angel</h3>
          <time class="post-time" datetime="{{ $publicacion->created_at->timezone('America/Bogota')->format('Y-m-d\TH:i:s') }}">
            {{ $publicacion->created_at->timezone('America/Bogota')->format('d \d\e F \a \l\a\s H:i') }}
          </time>

        </div>
      </header>
      <div class="post-content">
        <h4 class="post-title">{{ $publicacion->titulo_publicacion }}</h4>
        <p>{{ $publicacion->descripcion }}</p>
      </div>
      @if($publicacion->fotos->isNotEmpty())
      <div class="post-images">
        @foreach($publicacion->fotos->take(5) as $index => $foto)
        <div class="post-image-container {{ $index === 0 && $publicacion->fotos->count() === 4 ? 'wide' : '' }} {{ $index === 0 && $publicacion->fotos->count() >= 5? 'large' : '' }}">
          <img src="{{ asset('storage/' . $foto->ruta_foto) }}" alt="Foto de la publicación" class="post-image" data-index="{{ $index }}" data-images="{{ json_encode($publicacion->fotos->pluck('ruta_foto')->toArray()) }}">
          @if($index === 4 && $publicacion->fotos->count() > 5)
          <div class="post-image-overlay" data-index="{{ $index }}" data-images="{{ json_encode($publicacion->fotos->pluck('ruta_foto')->toArray()) }}">
            <span>+{{ $publicacion->fotos->count() - 5 }}</span>
          </div>
          @endif
        </div>
        @endforeach
      </div>
      @endif
      <footer class="post-footer">
        <button class="post-action">
          <i class="fas fa-thumbs-up"></i> Me gusta
        </button>
        <button class="post-action">
          <i class="fas fa-comment"></i> Comentar
        </button>
        <button class="post-action">
          <i class="fas fa-share"></i> Compartir
        </button>
      </footer>
    </article>
    @endforeach
    @endif
  </div> -->

  <!-- Lightbox Modal -->
  <!-- <div id="imageLightbox" class="lightbox">
    <span class="close" onclick="closeLightbox()">&times;</span>
    <div class="lightbox-content">
      <img id="lightboxImage" src="" alt="Imagen ampliada">
      <div class="lightbox-caption"></div>
    </div>
    <a class="prev" onclick="changeImage(-1)">&#10094;</a>
    <a class="next" onclick="changeImage(1)">&#10095;</a>
  </div> -->

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
            <li><a href="{{route('Sobrenosotros')}}">Home</a></li>
            <li><a href="{{route('Grados-Ofertados')}}">Grados-Ofertados</a></li>
            <li><a href="">Novedades/Noticias</a></li>
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
            <strong>Email:</strong> colegiosantoangelflandes@gmail.com<br>
          </p>
        </div>
      </div>
    </div>
    <div class="container mt-4">
      <div class="copyright">
       <script>document.write(new Date().getFullYear());</script>,&copy; Copyright <strong><span>Colegio Santo Angel</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
      Designed by <iner href="https://bryan-dev.com/">Bryan Dev S.A</a>
      </div>
    </div>
  </footer>

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>
  <!-- Vendor JS Files -->
  <script src="{{asset('logis/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('logis/assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('logis/assets/js/main.js') }}"></script>

</body>
<script>
  let currentImageIndex = 0;
  let images = [];

  // Función para abrir el lightbox
  function openLightbox(index, imgsArray) {
    images = imgsArray; // Asignar las imágenes actuales
    currentImageIndex = index;
    const lightbox = document.getElementById('imageLightbox');
    const lightboxImage = document.getElementById('lightboxImage');

    // Mostrar la imagen actual
    lightboxImage.src = "/storage/" + images[currentImageIndex];
    lightbox.style.display = 'block';
  }

  // Función para cerrar el lightbox
  function closeLightbox() {
    document.getElementById('imageLightbox').style.display = 'none';
  }

  // Función para cambiar la imagen en el lightbox
  function changeImage(direction) {
    currentImageIndex += direction;

    // Asegurarse de que el índice esté dentro del rango
    if (currentImageIndex < 0) {
      currentImageIndex = images.length - 1;
    } else if (currentImageIndex >= images.length) {
      currentImageIndex = 0;
    }

    const lightboxImage = document.getElementById('lightboxImage');
    lightboxImage.src = "/storage/" + images[currentImageIndex];
  }

  // Al cargar la página
  document.addEventListener('DOMContentLoaded', function() {
    const imageElements = document.querySelectorAll('.post-image, .post-image-overlay');

    imageElements.forEach((imageElement) => {
      imageElement.addEventListener('click', function() {
        const imgsArray = JSON.parse(this.getAttribute('data-images')); // Obtener el array de imágenes del data attribute
        const index = parseInt(this.getAttribute('data-index'));
        openLightbox(index, imgsArray); // Abrir el lightbox con la imagen correcta
      });
    });
  });
</script>

</html>