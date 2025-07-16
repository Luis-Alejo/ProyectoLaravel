<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Clínica Salud</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa 0%, #ffffff 100%);
            min-height: 100vh;
        }
        .login-container {
            min-height: 100vh;
        }
        .clinic-logo {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 10px;
        }
        .welcome-text {
            font-size: 1.1rem;
            color: #00796b;
            margin-bottom: 18px;
        }
    </style>
</head>
<body>
    <div class="container-fluid login-container d-flex align-items-center justify-content-center">
        <div class="card p-4 shadow rounded-5" style="min-width: 350px; max-width: 400px; width: 100%;">
            <div class="text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/2965/2965567.png" alt="Clínica Logo" class="clinic-logo">
                <h2 class="mb-1">Clínica "Los Andes"</h2>
                <div class="welcome-text mb-3">
                    Bienvenido al portal de pacientes.<br>
                    Ingrese sus credenciales para acceder a su cuenta.
                </div>
            </div>
            @if($errors->any())
                <div class="alert alert-danger py-2">
                    {{ $errors->first() }}
                </div>
            @endif
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
            </form>
            <div class="mt-3 text-center">
                <a href="#" class="text-decoration-none text-secondary">¿Olvidó su contraseña?</a>
            </div>
            <hr>
            <div class="text-center text-muted" style="font-size: 0.95em;">
                &copy; {{ date('Y') }} Clínica "Los Andes". Todos los derechos reservados.
            </div>
        </div>
    </div>
</body>
</html>
