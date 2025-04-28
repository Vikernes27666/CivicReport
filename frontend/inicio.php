<?php session_start();
$mostrarModal = isset($_SESSION['errores']) && !empty($_SESSION['errores']);
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
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../backend/css/inicio.css">
    <link rel="stylesheet" href="../backend/css/registro.css">
</head>

<body>
    <!-- Verificar si hay errores y mostrarlos -->

     <!-- Si hay un mensaje de éxito en la sesión, mostrarlo -->
     <?php if (isset($_SESSION['registro_exitoso'])): ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Swal.fire({
                title: '¡Registro Exitoso!',
                text: '<?php echo $_SESSION['registro_exitoso']; ?>',
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
        <?php unset($_SESSION['registro_exitoso']); // Limpiar el mensaje después de mostrarlo ?>
    <?php endif; ?>

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

    <!-- Menú Principal -->
    <nav class="navbar navbar-expand-lg navbar-dark mt-3">
        <div class="container header-nav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="#"><i style="font-size: 20px;" class="bi bi-house-fill"></i></a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Servicios</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Registrar Denuncia</a></li>
                        <li><a class="dropdown-item" href="#">Ver Denuncias</a></li>
                        <li><a class="dropdown-item" href="#">Consultar Estado</a></li>
                        <li><a class="dropdown-item" href="#">Mapa del Crimen</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Nosotros</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">¿Quiénes Somos?</a></li>
                        <li><a class="dropdown-item" href="#">Mision y Vision</a></li>
                        <li><a class="dropdown-item" href="#">Equipo de trabajo</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Blog</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Noticias y Actualizaciones</a></li>
                        <li><a class="dropdown-item" href="#">Consejo sobre denuncias</a></li>
                        <li><a class="dropdown-item" href="#">Casos de éxito</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Seguridad</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Privacidad y Confidencialidad</a></li>
                        <li><a class="dropdown-item" href="#">Protección de denunciantes</a></li>
                        <li><a class="dropdown-item" href="#">Seguridad en el sistema</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Contactos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Soporte</a></li>
                        <li><a class="dropdown-item" href="#">FAQ (Preguntas frecuentes)</a></li>
                        <li><a class="dropdown-item" href="#">Redes sociales</a></li>
                    </ul>
                </li>
            </ul>
            <div>
                <a class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">INICIAR SESIÓN</a>

                <!-- Botón Registrarse, abre el modal de registro -->
                <a class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#registerModal">REGISTRAR</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Página principal</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
    </div>


    <!-- Modal para Registro -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registerModalLabel">Registro de Usuario</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-6">
                                <img src="../backend/img/logo_sistema.png" class="img-fluid" alt="Logo Sistema">
                            </div>
                            <div class="col-md-6">
                                <!-- Formulario de Registro -->
                                <form action="../backend/controlador/registroCtl.php" method="POST" id="formRegistro">
                                    <!-- Nombres -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="nombres" class="form-control form-control-lg"
                                            placeholder="Ingrese sus nombres" required
                                            value="<?= htmlspecialchars($_SESSION['old']['nombres'] ?? '') ?>" />
                                        <label class="form-label">Nombres</label>
                                    </div>

                                    <!-- Apellidos -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="apellidos" class="form-control form-control-lg"
                                            placeholder="Ingrese sus apellidos" required
                                            value="<?= htmlspecialchars($_SESSION['old']['apellidos'] ?? '') ?>" />
                                        <label class="form-label">Apellidos</label>
                                    </div>

                                    <!-- Tipo de Documento -->
                                    <div class="form-outline mb-4">
                                        <select name="tipo_documento" class="form-control form-control-lg" required>
                                            <option value="DNI" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'DNI' ? 'selected' : '' ?>>DNI</option>
                                            <option value="RUC" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'RUC' ? 'selected' : '' ?>>RUC</option>
                                            <option value="Pasaporte" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'Pasaporte' ? 'selected' : '' ?>>Pasaporte</option>
                                        </select>
                                        <label class="form-label">Tipo de Documento</label>
                                    </div>

                                    <!-- Número de Documento -->
                                    <div class="form-outline mb-4">
                                        <input type="text" name="numero_documento" class="form-control form-control-lg"
                                            placeholder="Ingrese su número de documento" required
                                            value="<?= htmlspecialchars($_SESSION['old']['numero_documento'] ?? '') ?>" />
                                        <label class="form-label">Número de Documento</label>
                                        <?php if (isset($_SESSION['errores']['numeroDocumento'])): ?>
                                            <p style="color:red; font-size: 14px;"><?php echo $_SESSION['errores']['numeroDocumento']; ?></p>
                                        <?php unset($_SESSION['errores']['numeroDocumento']);
                                        endif; ?>
                                    </div>

                                    <!-- Teléfono -->
                                    <div class="form-outline mb-4">
                                        <input type="tel" name="telefono" class="form-control form-control-lg"
                                            placeholder="Ingrese su teléfono" required
                                            value="<?= htmlspecialchars($_SESSION['old']['telefono'] ?? '') ?>" />
                                        <label class="form-label">Teléfono</label>
                                    </div>

                                    <!-- Correo -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="correo" class="form-control form-control-lg"
                                            placeholder="Ingrese su correo electrónico" required
                                            value="<?= htmlspecialchars($_SESSION['old']['correo'] ?? '') ?>" />
                                        <label class="form-label">Correo</label>
                                        <?php if (isset($_SESSION['errores']['email'])): ?>
                                            <p style="color:red; font-size: 14px;"><?php echo $_SESSION['errores']['email']; ?></p>
                                        <?php unset($_SESSION['errores']['email']);
                                        endif; ?>
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="form-outline mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            placeholder="Ingrese su contraseña" required />
                                        <label class="form-label">Contraseña</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirma tu contraseña" required />
                                        <label class="form-label">Confirmar Contraseña</label>
                                    </div>

                                    <!-- Botón de registro -->
                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-lg w-100"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Registrar</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">Ya tienes una cuenta? <a href="" data-bs-toggle="modal" data-bs-target="#loginModal" class="link-danger">Iniciar Sesion</a></p>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal para login -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-6">
                                <!-- Imagen -->
                                <img src="" class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-6">
                                <!-- Formulario de login -->
                                <form action="../backend/controlador/loginCtl.php" method="POST" id="loginForm">
                                    <!-- Entrar con redes sociales -->
                                    <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start mb-4">
                                        <p class="lead fw-normal mb-0 me-3">Entrar con</p>
                                        <button type="button" class="btn btn-facebook btn-social">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>
                                        <button type="button" class="btn btn-twitter btn-social">
                                            <i class="fab fa-twitter"></i>
                                        </button>
                                        <button type="button" class="btn btn-google btn-social">
                                            <i class="fab fa-google"></i>
                                        </button>
                                    </div>

                                    <!-- Separador -->
                                    <div class="divider d-flex align-items-center my-4">
                                        <p class="text-center fw-bold mx-3 mb-0 text-muted">O</p>
                                    </div>

                                    <!-- Correo -->
                                    <div class="form-outline mb-4">
                                        <input type="email" name="correo" class="form-control form-control-lg"
                                            placeholder="Ingrese su correo electrónico" required />
                                        <label class="form-label">Correo</label>
                                    </div>

                                    <!-- Contraseña -->
                                    <div class="form-outline mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            placeholder="Ingrese su contraseña" required />
                                        <label class="form-label">Contraseña</label>
                                    </div>

                                    <!-- Recordarme y olvidaste la contraseña -->
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">Recordarme</label>
                                        </div>
                                        <a href="#" class="text-white">Olvidaste tu contraseña?</a>
                                    </div>

                                    <!-- Botón de inicio de sesión -->
                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-lg w-100"
                                            style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesión</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">No tienes una cuenta? <a href="" data-bs-toggle="modal" data-bs-target="#registerModal" class="link-danger">Registrar</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../backend/js/registro.js"></script>
    <script src="../backend/js/validaciones.js"> </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            <?php if (isset($mostrarModal) && $mostrarModal): ?>
                var myModal = new bootstrap.Modal(document.getElementById('registerModal'), {
                    keyboard: false
                });
                myModal.show();
            <?php endif; ?>
        });
    </script>


</body>

</html>