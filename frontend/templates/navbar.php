<?php $nombre_usuario = $_SESSION['nombre_usuario'] ?? null; ?>

<nav class="navbar navbar-expand-lg navbar-dark px-3 py-3" style="background-color: #0c364d;">
    <div class="container-fluid">

        <a class="navbar-brand d-lg-flex align-items-center" href="<?= $nombre_usuario ? 'inicio_usuario.php' : 'inicio.php' ?>">
            <img src="../backend/img/logo.png" alt="Inicio" class="logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="menuPrincipal">

            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php
                $links = [
                    "Servicios" => [
                        "Registrar Denuncia" => $nombre_usuario ? "reg_denucnia.php" : "#",
                        "Ver Denuncias" => $nombre_usuario ? "ver_denuncia.php" : "#",
                        "Consultar Estado" => $nombre_usuario ? "seg_denuncia.php" : "#",
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

            <!-- Botones de sesión -->
            <div class="d-flex align-items-center gap-2 ms-lg-3 mt-3 mt-lg-0">

                <?php if ($nombre_usuario): ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-light d-flex align-items-center gap-2 px-3 py-2 rounded shadow-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5"></i>
                            <span class="fw-semibold"><?= htmlspecialchars($nombre_usuario); ?></span>
                            <i class="bi bi-caret-down-fill fs-6"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm mt-2">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2 text-danger" href="../backend/controlador/logout.php">
                                    <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </div>
                <?php else: ?>
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <button class="btn btn-outline-light px-4 py-2 d-flex align-items-center gap-2 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="bi bi-box-arrow-in-right"></i> Iniciar Sesión
                        </button>
                        <button class="btn btn-primary px-4 py-2 d-flex align-items-center gap-2 fw-semibold shadow-sm" data-bs-toggle="modal" data-bs-target="#registerModal">
                            <i class="bi bi-person-plus-fill"></i> Registrarse
                        </button>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</nav>