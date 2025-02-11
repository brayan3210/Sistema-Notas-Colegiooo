<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Publicación</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/Logocolegio.png') }}" />
    <link href="{{asset('logis/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{asset('logis/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('logis/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    .body {
      font-family: 'Changa', sans-serif;
    }
    .form-container {
      max-width: 500px;
      margin: auto;
      padding: 2rem;
      background-color: #f8f9fa;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-container label {
      font-weight: 600;
    }
    .form-container button {
      background-color: #4a90e2;
      color: white;
    }
    .form-container button:hover {
      background-color: #357ab8;
    }
    .form-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1.5rem;
      text-align: center;
    }
    .logo-container {
      display: flex;
      justify-content: center;
      margin-bottom: 1.5rem;
    }
    .logo-container img {
      max-width: 100px;
    }
    .publicaciones {
        margin-top: 2rem;
    }
    .publicacion {
        background-color: #f8f9fa;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .fotos img {
        max-width: 200px;
        margin-right: 10px;
    }
    .file-upload {
            position: relative;
            display: block;
            width: 100%;
            padding: 1.5rem;
            background-color: #f8f9fa;
            border: 2px dashed #ddd;
            border-radius: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 1rem;
        }

        .file-upload:hover {
            border-color: #4a90e2;
            background-color: #f0f7ff;
        }

        .file-upload input[type="file"] {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 1rem;
            min-height: 50px;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
        }

        .preview-item {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .preview-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .preview-item.pdf {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            flex-direction: column;
        }

        .preview-item .remove-btn {
            position: absolute;
            top: 2px;
            right: 2px;
            background: rgba(255, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .file-name {
            font-size: 0.7rem;
            word-break: break-all;
            text-align: center;
            padding: 2px;
            background: rgba(255, 255, 255, 0.9);
        }

        .selected-files-count {
            margin-top: 0.5rem;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="logo-container">
                <img src="{{ asset('assets/Logor.png') }}" alt="Logo" class="img-fluid">
            </div>
            <h1 class="form-title">Crear Nueva Publicación</h1>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('CrearPublicacion') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título de la Publicación</label>
                    <input type="text" class="form-control" id="title" placeholder="Ingrese el título" name="titulo_publicacion" required>
                    @error('titulo_publicacion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="content">Descripción</label>
                    <textarea class="form-control" id="content" placeholder="Escriba el contenido de la publicación" name="descripcion" required></textarea>
                    @error('descripcion')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="upload-section">
                    <div class="upload-title">Imágenes (Opcional)</div>
                    <div class="file-upload">
                        <i class="fas fa-images fa-2x mb-2"></i>
                        <p class="mb-0">Haga clic o arrastre las imágenes aquí</p>
                        <p class="file-info">Formatos permitidos: JPG, PNG, GIF (Máx. 2MB por archivo)</p>
                        <input type="file" name="fotos[]" multiple accept="image/*" id="imageInput">
                    </div>
                    <div id="imagePreview" class="preview-container"></div>
                    <div id="imageCount" class="selected-files-count"></div>
                    @error('fotos.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="upload-section">
                    <div class="upload-title">Documentos PDF (Opcional)</div>
                    <div class="file-upload">
                        <i class="fas fa-file-pdf fa-2x mb-2"></i>
                        <p class="mb-0">Haga clic o arrastre los documentos PDF aquí</p>
                        <p class="file-info">Formato permitido: PDF (Máx. 5MB por archivo)</p>
                        <input type="file" name="pdfs[]" multiple accept="application/pdf" id="pdfInput">
                    </div>
                    <div id="pdfPreview" class="preview-container"></div>
                    <div id="pdfCount" class="selected-files-count"></div>
                    @error('pdfs.*')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Publicar</button>
                <a href="{{route('novedadescolegio')}}" class="btn btn-primary" role="button">Regresar</a>
            </form>
        </div>
    </div>

    <script>
        // Función para previsualizar imágenes
        document.getElementById('imageInput').addEventListener('change', function(e) {
            const container = document.getElementById('imagePreview');
            const countDisplay = document.getElementById('imageCount');
            container.innerHTML = '';
            
            if (this.files.length > 0) {
                countDisplay.textContent = `${this.files.length} imagen(es) seleccionada(s)`;
                
                Array.from(this.files).forEach((file, index) => {
                    const reader = new FileReader();
                    const div = document.createElement('div');
                    div.className = 'preview-item';
                    
                    reader.onload = function(e) {
                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <button type="button" class="remove-btn" data-index="${index}">&times;</button>
                            <div class="file-name">${file.name}</div>
                        `;
                    }
                    
                    reader.readAsDataURL(file);
                    container.appendChild(div);
                });
            } else {
                countDisplay.textContent = '';
            }
        });

        // Función para previsualizar PDFs
        document.getElementById('pdfInput').addEventListener('change', function(e) {
            const container = document.getElementById('pdfPreview');
            const countDisplay = document.getElementById('pdfCount');
            container.innerHTML = '';
            
            if (this.files.length > 0) {
                countDisplay.textContent = `${this.files.length} PDF(s) seleccionado(s)`;
                
                Array.from(this.files).forEach((file, index) => {
                    const div = document.createElement('div');
                    div.className = 'preview-item pdf';
                    div.innerHTML = `
                        <i class="fas fa-file-pdf fa-2x"></i>
                        <button type="button" class="remove-btn" data-index="${index}">&times;</button>
                        <div class="file-name">${file.name}</div>
                    `;
                    container.appendChild(div);
                });
            } else {
                countDisplay.textContent = '';
            }
        });

        // Función para remover archivos
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-btn')) {
                const index = e.target.dataset.index;
                const previewItem = e.target.closest('.preview-item');
                const isImage = previewItem.querySelector('img') !== null;
                
                const input = isImage ? document.getElementById('imageInput') : document.getElementById('pdfInput');
                const container = isImage ? document.getElementById('imagePreview') : document.getElementById('pdfPreview');
                const countDisplay = isImage ? document.getElementById('imageCount') : document.getElementById('pdfCount');
                
                // Crear un nuevo FileList sin el archivo eliminado
                const dt = new DataTransfer();
                const files = input.files;
                for (let i = 0; i < files.length; i++) {
                    if (i !== parseInt(index)) {
                        dt.items.add(files[i]);
                    }
                }
                input.files = dt.files;
                
                // Actualizar la previsualización
                previewItem.remove();
                
                // Actualizar el contador
                const remainingFiles = input.files.length;
                if (remainingFiles > 0) {
                    countDisplay.textContent = `${remainingFiles} ${isImage ? 'imagen(es)' : 'PDF(s)'} seleccionado(s)`;
                } else {
                    countDisplay.textContent = '';
                }
            }
        });
    </script>
</body>
</html>