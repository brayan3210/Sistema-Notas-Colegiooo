<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (Auth::user()->is_admin == 0)
    <h1>usuario</h1>
    <a id="forgot-password" href="{{ url('/logout') }}">Cerrar session</a>
    @endif
</body>
</html>