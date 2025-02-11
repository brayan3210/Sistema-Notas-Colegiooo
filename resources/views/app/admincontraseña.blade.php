<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Chadcn Font -->
    <link href="https://fonts.googleapis.com/css2?family=Changa:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
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
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mt-5">
        <div class="form-container">
            <div class="logo-container">
                <img src="{{ asset('assets/Logor.png') }}" alt="Sample image">
            </div>
            <p class="form-title">Cambie su Contraseña</p>
            <form action="{{ route('admin.cambiocontraseña') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Contraseña Actual:</label>
                    <input type="password" class="form-control" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="new_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Confirmar Nueva Contraseña:</label>
                    <input type="password" class="form-control" name="new_password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-full mt-3">Cambiar Contraseña</button>
            </form>
            <a href="{{route('dashboard')}}"  class="btn btn-primary w-full mt-3">Regresar</a>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
