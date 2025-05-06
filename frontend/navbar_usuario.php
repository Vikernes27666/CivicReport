<?php session_start();
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: login.php');
    exit();
}

$nombre_usuario = $_SESSION['nombre_usuario'];
?>
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
                <li class="nav-item"><a class="nav-link" href="inicio_usuario.php"><i style="font-size: 20px;" class="bi bi-house-fill"></i></a></li>
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