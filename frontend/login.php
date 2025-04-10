
<?php
session_start();  
$mostrarModal = isset($_SESSION['mostrarModal']) && $_SESSION['mostrarModal'] === true;
unset($_SESSION['mostrarModal']);  

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Responsivo</title>
    <script src="https://kit.fontawesome.com/3a7225da88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../backend/css/login.css">
    <link rel="stylesheet" href="../backend/css/registro.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- FORMULARIO DE INICIO DE SESIÓN -->
                <form action="../backend/controlador/loginCtl.php" method="POST" class="sign-in-form">
                    <h2 class="signin title">Iniciar sesión</h2>

                    <!-- Campo para el DNI -->
                    <div class="input-field">
                        <i class="fas fa-id-card"></i> <!-- Ícono para DNI -->
                        <input type="text" name="dni" placeholder="DNI" 
                            value="<?php if(isset($_POST['dni'])) echo htmlspecialchars($_POST['dni']); ?>" required>
                    </div>

                    <!-- Campo para la Contraseña -->
                    <div class="input-field">
                        <i class="fas fa-lock"></i> <!-- Ícono para contraseña -->
                        <input type="password" name="password" placeholder="Contraseña"
                            value="<?php if(isset($_POST['password'])) echo htmlspecialchars($_POST['password']); ?>" required>
                    </div>

                    <!-- Botón de enviar -->
                    <button type="submit" class="btn solid">Iniciar Sesion</button>
                </form>

                <?php 
                    
                    if (isset($_SESSION['error'])) { 
                        echo "<div class='error-message'>" . $_SESSION['error'] . "</div>";
                        unset($_SESSION['error']); 
                    }
                ?>

                <!-- FORMULARIO DE REGISTRO -->
                <form action="../backend/controlador/registroCtl.php" method="POST" class="sign-up-form">
                    <h2 class="signup title">Registrarse</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombreCompleto" id="nombreCompleto" placeholder="Nombre completo" required value="<?= $_SESSION['old']['nombreCompleto'] ?? ''; ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="dni" id="dni" placeholder="DNI" required pattern="[0-9]{8}" value="<?= $_SESSION['old']['dni'] ?? ''; ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="correoElectronico" id="correoElectronico" placeholder="Correo electrónico" required value="<?= $_SESSION['old']['correoElectronico'] ?? ''; ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="telefono" id="telefono" placeholder="Teléfono" required pattern="[0-9]{9}" value="<?= $_SESSION['old']['telefono'] ?? ''; ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="repetir_contrasena" id="repetir_contrasena" placeholder="Repetir Contraseña" required>
                    </div>

                    <button type="submit" class="btn solid">REGISTRAR</button>
                </form>


            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>¿Nuevo aquí?</h3>
                    <p>¡Bienvenido! Crea una cuenta para comenzar.</p>
                    <button class="btn transparent" id="sign-up-btn">Registrarse</button>
                </div>
                <img src="../backend/img/undraw_maker_launch_crhe.svg" class="image" alt="Ilustración de registro">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>¿Ya tienes cuenta?</h3>
                    <p>¡Inicia sesión con tu cuenta existente!</p>
                    <button class="btn transparent" id="sign-in-btn">Iniciar sesión</button>
                </div>
                <img src="../backend/img/undraw_press_play_bx2d.svg" class="image" alt="Ilustración de login">
            </div>
        </div>
    </div>

    <script src="../backend/js/login.js"></script>
    <script src="../backend/js/registro.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            <?php if ($mostrarModal): ?>
                Swal.fire({
                    title: "¡Registro Exitoso!",
                    text: "Tu cuenta ha sido creada correctamente.",
                    icon: "success",
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    window.location.href = "login.php"; 
                });
            <?php endif; ?>
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>