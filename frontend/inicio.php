<?php 
session_start();
session_unset();
session_destroy();

$mostrarModal = isset($_SESSION['errores']) && !empty($_SESSION['errores']);
$mostrarLoginModal = isset($_SESSION['error']) && !empty($_SESSION['error']);
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
        <?php unset($_SESSION['registro_exitoso']); ?>
    <?php endif; ?>

    

    <!-- navbar.php -->
    <?php include 'templates/navbar.php'; ?>
    <!-- navbar.php -->


    <!-- Modal dell registro.. avisan si modifican xd -->
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
                                <img src="../backend/img/Registro.png" class="img-fluid" alt="Logo Sistema">
                            </div>
                            <div class="col-md-6">
                                <form action="../backend/controlador/registroCtl.php" method="POST" id="formRegistro">
                                    <div class="form-outline mb-4">
                                        <input type="text" name="nombres" class="form-control form-control-lg"
                                            placeholder="Ingrese sus nombres" required
                                            value="<?= htmlspecialchars($_SESSION['old']['nombres'] ?? '') ?>" />
                                        <label class="form-label">Nombres</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="apellidos" class="form-control form-control-lg"
                                            placeholder="Ingrese sus apellidos" required
                                            value="<?= htmlspecialchars($_SESSION['old']['apellidos'] ?? '') ?>" />
                                        <label class="form-label">Apellidos</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <select name="tipo_documento" class="form-control form-control-lg" required>
                                            <option value="DNI" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'DNI' ? 'selected' : '' ?>>DNI</option>
                                            <option value="RUC" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'RUC' ? 'selected' : '' ?>>RUC</option>
                                            <option value="Pasaporte" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'Pasaporte' ? 'selected' : '' ?>>Pasaporte</option>
                                        </select>
                                        <label class="form-label">Tipo de Documento</label>
                                    </div>

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

                                    <div class="form-outline mb-4">
                                        <input type="tel" name="telefono" class="form-control form-control-lg"
                                            placeholder="Ingrese su teléfono" required
                                            value="<?= htmlspecialchars($_SESSION['old']['telefono'] ?? '') ?>" />
                                        <label class="form-label">Teléfono</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="correo" class="form-control form-control-lg"
                                            placeholder="Ingrese su correo electrónico" required />
                                        <label class="form-label">Correo</label>
                                        <?php if (isset($_SESSION['errores']['email'])): ?>
                                            <p style="color:red; font-size: 14px;"><?php echo $_SESSION['errores']['email']; ?></p>
                                        <?php unset($_SESSION['errores']['email']);
                                        endif; ?>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            placeholder="Ingrese su contraseña" required />
                                        <label class="form-label">Contraseña</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="password" name="confirm_password" class="form-control form-control-lg" placeholder="Confirma tu contraseña" required />
                                        <label class="form-label">Confirmar Contraseña</label>
                                    </div>

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

    <!-- modal para login.. igual aqui -->

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
                                <img src="../backend/img/login.png" class="img-fluid" alt="Sample image">
                            </div>
                            <div class="col-md-6">
                                <form action="../backend/controlador/loginCtl.php" method="POST" id="loginForm">
                                    <?php if (isset($_SESSION['error'])): ?>
                                        <div class="alert alert-danger">
                                            <?php echo $_SESSION['error']; ?>
                                        </div>
                                        <?php unset($_SESSION['error']); ?>
                                    <?php endif; ?>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="correo" class="form-control form-control-lg" placeholder="Ingrese su correo electrónico" required />
                                        <label class="form-label">Correo</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg" placeholder="Ingrese su contraseña" required />
                                        <label class="form-label">Contraseña</label>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                            <label class="form-check-label" for="form2Example3">Recordarme</label>
                                        </div>
                                        <a href="#" class="text-white">Olvidaste tu contraseña?</a>
                                    </div>

                                    <div class="text-center text-lg-start mt-4 pt-2">
                                        <button type="submit" class="btn btn-primary btn-lg w-100" style="padding-left: 2.5rem; padding-right: 2.5rem;">Iniciar Sesión</button>
                                        <p class="small fw-bold mt-2 pt-1 mb-0">No tienes una cuenta? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" class="link-danger">Registrar</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- principal.php -->
    <?php include 'principal.php'; ?>
    <!-- principal.php -->
    
    <!-- navbar_usuario.php -->
    <?php include 'templates/footer.php'; ?>
    <!-- navbar_usuario.php -->

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
                var registerModal = new bootstrap.Modal(document.getElementById('registerModal'), {
                    keyboard: false
                });
                registerModal.show();
            <?php endif; ?>

            <?php if (isset($mostrarLoginModal) && $mostrarLoginModal): ?>
                var loginModal = new bootstrap.Modal(document.getElementById('loginModal'), {
                    keyboard: false
                });
                loginModal.show();
            <?php endif; ?>
        });
    </script>


</body>

</html>