<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            background-color: #e6f3ff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
            border-bottom: 3px solid #a2d1ff;
        }
        .logo {
            font-size: 24px;
            color: #0066cc;
            font-weight: bold;
        }
        .content {
            padding: 20px;
        }
        .password-box {
            background-color: #e6f3ff;
            padding: 15px;
            border-radius: 5px;
            margin: 15px 0;
            border-left: 4px solid #0066cc;
        }
        .footer {
            text-align: center;
            padding: 15px;
            font-size: 14px;
            color: #666666;
            background-color: #f2f9ff;
            border-radius: 0 0 8px 8px;
        }
        h2 {
            color: #0066cc;
            margin-top: 0;
        }
        strong {
            color: #0066cc;
            font-size: 18px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #E6F3FF;
            color: #E6F3FF;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Colegio Santo Ángel</div>
        </div>
        
        <div class="content">
            <h2>Hola, {{ $user->name }}.</h2>
            
            <p>Hemos generado una nueva contraseña para tu cuenta. Podrás utilizarla para acceder a nuestro sistema:</p>
            
            <div class="password-box">
                <p>Tu nueva contraseña de acceso es: <strong>{{ $newPassword }}</strong></p>
            </div>
            
            <p>Recuerda cambiarla después de iniciar sesión por motivos de seguridad.</p>
            
            <p>Si no has solicitado este cambio de contraseña, por favor contacta al departamento de sistemas inmediatamente.</p>
            
            <a href="#" class="button">Iniciar Sesión</a>
            
            <p>Saludos,<br>
            Colegio Santo Ángel</p>
        </div>
        
        <div class="footer">
            <p>© 2025 Colegio Santo Ángel. Todos los derechos reservados.</p>
            <p>Este es un correo automático, por favor no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html>