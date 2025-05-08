<?php $nombre_usuario = $_SESSION['nombre_usuario'] ?? null; ?>

<nav class="navbar navbar-expand-lg navbar-dark px-3 py-3" style="background-color: #0c364d;">
    <div class="container-fluid">

        <!-- Logo -->
        <a class="navbar-brand d-lg-flex align-items-center" href="<?= $nombre_usuario ? 'inicio_usuario.php' : 'inicio.php' ?>">
            <img src="../backend/img/logo.png" alt="Inicio" class="logo">
        </a>

        <!-- Botón Hamburguesa -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido Colapsable -->
        <div class="collapse navbar-collapse justify-content-between" id="menuPrincipal">

            <!-- Menú -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php
                $links = [
                    "Servicios" => [
                        "Registrar Denuncia" => $nombre_usuario ? "reg_denucnia.php" : "#",
                        "Ver Denuncias" => $nombre_usuario ? "ver_denuncia.php" : "#",
                        "Consultar Estado" => $nombre_usuario ? "#" : "#",
                        "Mapa del Crimen" => $nombre_usuario ? "mapa_denuncias.php" : "#",
                    ],
                    "Nosotros" => [
                        "¿Quiénes Somos?" => "quienesSomos.php",
                        "Misión y Visión" => "misionVision.php",
                        "Equipo de trabajo" => "equipoTrab.php"
                    ],
                    "Blog" => [
                        "Noticias y Actualizaciones" => "noticias.php",
                        "Consejo sobre denuncias" => "consejoDenun.php",
                        "Casos de éxito" => "casosExito.php"
                    ],
                    "Seguridad" => [
                        "Privacidad y Confidencialidad" => "privacidadYConf.php",
                        "Protección de denunciantes" => "proteccionDenun.php",
                        "Seguridad en el sistema" => "seguridadSis.php"
                    ],
                    "Contactos" => [
                        "Soporte" => "soporte.php",
                        "FAQ (Preguntas frecuentes)" => "faq.php",
                        "Redes sociales" => "redesSociales.php"
                    ]
                ];

                foreach ($links as $menu => $items) {
                    echo "<li class='nav-item dropdown'>
                            <a class='nav-link dropdown-toggle' href='#' id='dropdown_$menu' role='button' data-bs-toggle='dropdown' aria-expanded='false'>$menu</a>
                            <ul class='dropdown-menu' aria-labelledby='dropdown_$menu'>";

                    foreach ($items as $nombre => $url) {
                        $atributos = (!$nombre_usuario && $menu == "Servicios") ? "data-bs-toggle='modal' data-bs-target='#loginModal'" : "";
                        echo "<li><a class='dropdown-item' href='$url' $atributos>$nombre</a></li>";
                    }

                    echo "</ul></li>";
                }
                ?>
            </ul>

            <!-- Buscador y sesión -->
            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2 ms-lg-3 mt-3 mt-lg-0 w-100 w-lg-auto">
                <form class="d-flex w-100 w-lg-auto" role="search">
                    <input class="form-control buscador" type="search" placeholder="Buscar..." aria-label="Buscar">
                </form>

                <?php if ($nombre_usuario): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle w-100 w-lg-auto" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user me-1"></i> <?= htmlspecialchars($nombre_usuario); ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../backend/controlador/logout.php">Cerrar sesión</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-outline-light w-100 w-lg-auto" data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar Sesión</button>
                        <button class="btn btn-light text-primary border w-100 w-lg-auto" data-bs-toggle="modal" data-bs-target="#registerModal">Registrarse</button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
