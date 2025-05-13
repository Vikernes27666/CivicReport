<?php session_start();
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
            <div class="modal-content border-0 rounded-4 overflow-hidden shadow-lg">

                <div class="row g-0">

                    <div class="col-md-6 bg-white p-5 d-flex flex-column justify-content-center">
                        <div class="text-center mb-4">
                            <img src="../backend/img/logo_sistema.png" alt="Logo Sistema" width="60" class="mb-3">
                            <h5 class="fw-bold mb-0 text-primary">REGISTRO DE USUARIO</h5>
                            <p class="text-muted small">Crea tu cuenta para acceder al portal de denuncias</p>
                        </div>

                        <form action="../backend/controlador/registroCtl.php" method="POST" id="formRegistro">

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person-fill text-primary"></i></span>
                                    <input type="text" name="nombres" class="form-control" placeholder="Ingrese sus nombres" required value="<?= htmlspecialchars($_SESSION['old']['nombres'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-person-fill text-primary"></i></span>
                                    <input type="text" name="apellidos" class="form-control" placeholder="Ingrese sus apellidos" required value="<?= htmlspecialchars($_SESSION['old']['apellidos'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-file-earmark-person-fill text-primary"></i></span>
                                    <select name="tipo_documento" class="form-control" required>
                                        <option value="DNI" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'DNI' ? 'selected' : '' ?>>DNI</option>
                                        <option value="RUC" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'RUC' ? 'selected' : '' ?>>RUC</option>
                                        <option value="Pasaporte" <?= isset($_SESSION['old']['tipo_documento']) && $_SESSION['old']['tipo_documento'] == 'Pasaporte' ? 'selected' : '' ?>>Pasaporte</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-file-earmark-text-fill text-primary"></i></span>
                                    <input type="text" name="numero_documento" class="form-control" placeholder="Ingrese su número de documento" required value="<?= htmlspecialchars($_SESSION['old']['numero_documento'] ?? '') ?>">
                                </div>
                                <?php if (isset($_SESSION['errores']['numeroDocumento'])): ?>
                                    <p class="text-danger" style="font-size: 14px;"><?= $_SESSION['errores']['numeroDocumento']; ?></p>
                                    <?php unset($_SESSION['errores']['numeroDocumento']); ?>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-telephone-fill text-primary"></i></span>
                                    <input type="tel" name="telefono" class="form-control" placeholder="Ingrese su teléfono" required value="<?= htmlspecialchars($_SESSION['old']['telefono'] ?? '') ?>">
                                </div>
                                <?php if (isset($_SESSION['errores']['telefono'])): ?>
                                    <p class="text-danger" style="font-size: 14px;"><?= $_SESSION['errores']['telefono']; ?></p>
                                    <?php unset($_SESSION['errores']['telefono']); ?>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope-fill text-primary"></i></span>
                                    <input type="email" name="correo" class="form-control" placeholder="Ingrese su correo electrónico" required value="<?= htmlspecialchars($_SESSION['old']['correo'] ?? '') ?>">
                                </div>
                                <?php if (isset($_SESSION['errores']['email'])): ?>
                                    <p class="text-danger" style="font-size: 14px;"><?= $_SESSION['errores']['email']; ?></p>
                                    <?php unset($_SESSION['errores']['email']); ?>
                                <?php endif; ?>
                            </div>

                            <div class="form-outline mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill text-primary"></i></span>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese su contraseña" required>
                                    <span class="input-group-text bg-light" id="togglePassword" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash text-primary"></i> <!-- Ícono de ojo cerrado -->
                                    </span>
                                </div>
                            </div>

                            <div class="form-outline mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill text-primary"></i></span>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirma tu contraseña" required>
                                    <span class="input-group-text bg-light" id="toggleConfirmPassword" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash text-primary"></i> <!-- Ícono de ojo cerrado -->
                                    </span>
                                </div>
                            </div>

                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-semibold">
                                    <i class="bi bi-person-plus-fill me-1"></i> Registrar
                                </button>
                            </div>

                            <p class="small mt-3 text-center">
                                ¿Ya tienes una cuenta?
                                <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="fw-semibold text-primary text-decoration-none">Inicia sesión aquí</a>
                            </p>

                        </form>
                    </div>

                    <div class="col-md-6 d-none d-md-flex bg-primary text-white flex-column justify-content-center align-items-center text-center p-4" style="background: url('../backend/img/loginYregistro.png') center center / cover no-repeat;">
                        <div style="background-color: rgba(12, 45, 77, 0.8);" class="p-4 rounded-3 w-100">
                            <h4 class="fw-bold">Tu seguridad es nuestra prioridad</h4>
                            <p class="small">Denuncia de forma anónima y segura. Contribuye a una sociedad más justa y transparente.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- modal para login.. igual aqui -->

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 rounded-4 overflow-hidden shadow">

                <div class="row g-0">

                    <div class="col-md-6 bg-white p-5 d-flex flex-column justify-content-center">
                        <div class="text-center mb-4">
                            <img src="../backend/img/logo.png" alt="Logo" width="60" class="mb-3">
                            <h5 class="fw-bold mb-0 text-primary">PORTAL DE DENUNCIAS</h5>
                            <p class="text-muted small">Ingresa para continuar con tus reportes</p>
                        </div>

                        <form action="../backend/controlador/loginCtl.php" method="POST">
                            <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger py-2"><?= $_SESSION['error'];
                                                                        unset($_SESSION['error']); ?></div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-envelope-fill text-primary"></i></span>
                                    <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-lock-fill text-primary"></i></span>
                                    <input type="password" name="password" id="loginPassword" class="form-control" placeholder="Contraseña" required>
                                    <span class="input-group-text bg-light" id="toggleLoginPassword" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash text-primary"></i> <!-- Ícono de ojo cerrado -->
                                    </span>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="recordarme">
                                    <label class="form-check-label" for="recordarme">Recordarme</label>
                                </div>
                                <a href="#" class="small text-decoration-none text-secondary">¿Olvidaste tu contraseña?</a>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 fw-semibold">
                                    <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar Sesión
                                </button>
                            </div>

                            <p class="small mt-3 text-center">
                                ¿No tienes una cuenta?
                                <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" class="fw-semibold text-primary text-decoration-none">Regístrate aquí</a>
                            </p>
                        </form>
                        <div class="text-center mt-4">
                            <p class="small text-muted">O ingresa con:</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="#" class="btn btn-outline-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-google"></i>
                                </a>
                                <a href="#" class="btn btn-outline-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-facebook"></i>
                                </a>
                                <a href="#" class="btn btn-outline-info rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-twitter"></i>
                                </a>
                                <a href="#" class="btn btn-outline-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 d-none d-md-flex bg-primary text-white flex-column justify-content-center align-items-center text-center p-4" style="background: url('../backend/img/loginnn.jpg') center center / cover no-repeat;">
                        <div style="background-color: rgba(12, 45, 77, 0.8);" class="p-4 rounded-3 w-100">
                            <h4 class="fw-bold">Tu seguridad es nuestra prioridad</h4>
                            <p class="small">Denuncia de forma anónima y segura. Contribuye a una sociedad más justa y transparente.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- principal.php -->
    <?php include 'principal.php'; ?>
    <!-- principal.php -->

    <!-- footer -->
    <?php include 'templates/footer.php'; ?>
    <!-- foter -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../backend/js/registro.js"></script>
    <script src="../backend/js/validaciones.js"> </script>
    <script src="../backend/js/login.js"></script>
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