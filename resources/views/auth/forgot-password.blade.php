<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>Recuperar Contraseña</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h1>Recuperar Contraseña</h1>

    <!-- Mensajes de éxito / error -->
    @if(session('success_forgot'))
      <div class="alert alert-success">
        {{ session('success_forgot') }}
      </div>
    @endif

    @if(session('error_forgot'))
      <div class="alert alert-danger">
        {{ session('error_forgot') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
          <div>{{ $error }}</div>
        @endforeach
      </div>
    @endif

    <form action="{{ route('forgot.password') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Usuario (Name)</label>
        <input type="text" class="form-control" id="name" name="name" required
               placeholder="Escribe tu usuario para recuperar la contraseña">
      </div>
      <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
    </form>

    <!-- Botón para volver al login -->
    <div class="mt-3">
      <a href="{{ url('/login') }}" class="btn btn-secondary">Volver al Login</a>
    </div>
  </div>
</body>
</html>
