<?php session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: login.php');
    exit();
}

$nombre_usuario = $_SESSION['nombre_usuario'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../backend/css/inicio.css">
    <link rel="stylesheet" href="../backend/css/registro.css">
</head>

<body>
    <div class="container mt-3">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img src="../backend/img/logo_sistema.png" alt="Portal de Denuncias" class="logo">
            </div>
            <div class="col-md-6 text-end">
                <input type="search" class="form-control buscador" placeholder="¿Qué deseas buscar?">
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark mt-3">
        <div class="container header-nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="inicio.php"><i style="font-size: 20px;" class="bi bi-house-fill"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="reg_denucnia.php">Registrar Denuncia</a></li>
                        <li><a class="dropdown-item" href="ver_denuncia.php">Ver Denuncias</a></li>
                        <li><a class="dropdown-item" href="">Consultar Estado</a></li>
                        <li><a class="dropdown-item" href="mapa_denuncias.php">Mapa del Crimen</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Nosotros</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="quienesSomos.php">¿Quiénes Somos?</a></li>
                        <li><a class="dropdown-item" href="misionVision.php">Mision y Vision</a></li>
                        <li><a class="dropdown-item" href="equipoTrab.php">Equipo de trabajo</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Blog</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="noticias.php">Noticias y Actualizaciones</a></li>
                        <li><a class="dropdown-item" href="consejoDenun.php">Consejo sobre denuncias</a></li>
                        <li><a class="dropdown-item" href="casosExito.php">Casos de éxito</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Seguridad</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="privacidadYConf.php">Privacidad y Confidencialidad</a></li>
                        <li><a class="dropdown-item" href="proteccionDenun.php">Protección de denunciantes</a></li>
                        <li><a class="dropdown-item" href="seguridadSis.php">Seguridad en el sistema</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Contactos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="soporte.php">Soporte</a></li>
                        <li><a class="dropdown-item" href="faq.php">FAQ (Preguntas frecuentes)</a></li>
                        <li><a class="dropdown-item" href="redesSociales.php">Redes sociales</a></li>
                    </ul>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user"></i>
                    <?php echo htmlspecialchars($nombre_usuario); ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="../backend/controlador/logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Página principal</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>