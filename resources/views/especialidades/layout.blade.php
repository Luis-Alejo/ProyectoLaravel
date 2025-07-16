<!DOCTYPE html>
<html>
<head>
    <title>Clínica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body class="bg-light">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <button class="btn btn-outline-secondary me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <i class="fa-solid fa-bars"></i>
            </button>
            <a class="navbar-brand fw-bold fs-4">Clínica <em class="text-success">"Los Andes"</em></a>
            <form action="{{ route('logout') }}" method="POST" class="ms-auto">
                @csrf
                <button class="btn btn-outline-danger">
                    <i class="fa-solid fa-right-from-bracket me-2"></i> Cerrar sesión
                </button>
            </form>
        </div>
    </nav>
</header>

<main class="container py-4">
    @yield('content')
</main>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="font-size:1.5rem;">Menú Principal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Cerrar"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-light border-0 mb-3 fs-5 px-4 py-3">
                <a href="#" class="d-flex align-items-center text-dark fw-medium gap-3 text-decoration-none list-group-item-action">
                    <i class="fa-solid fa-house text-success fs-4"></i> Inicio
                </a>
            </li>
            <li class="list-group-item bg-light border-0 mb-3 fs-5 px-4 py-3">
                <a href="#" class="d-flex align-items-center text-dark fw-medium gap-3 text-decoration-none list-group-item-action">
                    <i class="fa-solid fa-user-injured text-success fs-4"></i> Pacientes
                </a>
            </li>
            <li class="list-group-item bg-light border-0 mb-3 fs-5 px-4 py-3">
                <a href="{{ 'especialidades' }}" class="d-flex align-items-center text-dark fw-medium gap-3 text-decoration-none list-group-item-action">
                    <i class="fa-solid fa-stethoscope text-success fs-4"></i> Especialidades
                </a>
            </li>
            <li class="list-group-item bg-light border-0 mb-3 fs-5 px-4 py-3">
                <a href="#" class="d-flex align-items-center text-dark fw-medium gap-3 text-decoration-none list-group-item-action">
                    <i class="fa-solid fa-user-md text-success fs-4"></i> Médicos
                </a>
            </li>
            <li class="list-group-item bg-light border-0 mb-3 fs-5 px-4 py-3">
                <a href="#" class="d-flex align-items-center text-dark fw-medium gap-3 text-decoration-none list-group-item-action">
                    <i class="fa-solid fa-calendar-check text-success fs-4"></i> Citas
                </a>
            </li>
            <li class="list-group-item bg-light border-0 mb-3 fs-5 px-4 py-3">
                <a href="#" class="d-flex align-items-center text-dark fw-medium gap-3 text-decoration-none list-group-item-action">
                    <i class="fa-solid fa-file-medical text-success fs-4"></i> Reportes
                </a>
            </li>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>