  <!-- CAMBIAR O MEJORAR ESTO -->


<div class="container mt-5">
    <!-- Título principal -->
    <section class="text-center mb-5">
        <h1 class="display-5 fw-bold">La plataforma de Denuncias Ciudadanas que el Perú Necesita</h1>
    </section>

    <!-- Imagen tipo banner -->
    <section class="mb-5">
        <img src="../backend/img/banner.png" alt="Banner Denuncias Ciudadanas" class="img-fluid rounded shadow w-100" style="max-height: 400px; object-fit: cover;">
    </section>

    <!-- Botón Haz tu Denuncia -->
    <section class="text-center mb-5">
        <a href="formulario_denuncia.php" class="btn btn-danger btn-lg">
            <i class="fas fa-exclamation-triangle me-2"></i>Haz tu Denuncia
        </a>
    </section>

    <!-- Carrusel de imágenes -->
    <section class="mb-5">
        <div id="carruselDenuncias" class="carousel slide shadow-sm" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../backend/img/prueba.png" class="d-block w-100 rounded" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="../backend/img/prueba.png" class="d-block w-100 rounded" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="../backend/img/prueba.png" class="d-block w-100 rounded" alt="Imagen 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carruselDenuncias" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carruselDenuncias" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Sección de usuarios -->
    <section class="bg-light text-center py-4 rounded shadow-sm mb-5">
        <h3 class="fw-bold">+<span id="totalUsuarios">100</span> Usuarios</h3>
        <p class="text-muted">Llevan realizando su denuncia en la plataforma. Súmate tú también.</p>
    </section>

    <!-- Últimas denuncias -->
    <section class="mb-5">
        <h2 class="h4 fw-bold mb-4">Últimas Denuncias</h2>
        <div class="card shadow-sm mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../backend/img/Login.png" class="img-fluid rounded-start" alt="Denuncia">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <!-- Este contenido se llenará dinámicamente con PHP -->
                        <h5 class="card-title">[Título de la denuncia]</h5>
                        <p class="card-text text-muted">[Descripción breve desde la base de datos]</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Puedes repetir este bloque o hacer un loop en PHP -->
    </section>

    <!-- Mapa de oficina -->
    <section class="mb-5">
        <h4 class="fw-bold mb-3">Oficina Central</h4>
        <div class="mapa-ubicacion mb-5">
    <iframe src="https://www.google.com/maps/embed?pb=..." loading="lazy" allowfullscreen></iframe>
</div>


    </section>

    <!-- Preguntas frecuentes -->
    <section class="mb-5">
        <h4 class="fw-bold mb-3">Preguntas Frecuentes</h4>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                        ¿Puedo hacer una denuncia de forma anónima?
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Sí, puedes denunciar sin revelar tu identidad. Solo marca la opción de anonimato al llenar el formulario.
                    </div>
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                        ¿Qué tipo de denuncias puedo realizar?
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Puedes reportar actos de corrupción, abuso de autoridad, robos, acoso, y otros incidentes.
                    </div>
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                        ¿Cómo hago seguimiento a mi denuncia?
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Recibirás un código único para rastrear el estado de tu denuncia.
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
