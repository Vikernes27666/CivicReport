<?php


// Incluye el archivo de login
include_once '../backend/controlador/ctl_login.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Responsivo</title>
    <script src="https://kit.fontawesome.com/3a7225da88.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../backend/css/login.css">
</head>
<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- FORMULARIO DE INICIO DE SESIÓN -->
                <form action="ctl_login.php" method="POST" class="sign-in-form">
                    <h2 class="signin title">Iniciar sesión</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="usuario" placeholder="Usuario" 
                            value="<?php if(isset($_POST['usuario'])) echo htmlspecialchars($_POST['usuario']); ?>" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="clave" placeholder="Contraseña"
                            value="<?php if(isset($_POST['clave'])) echo htmlspecialchars($_POST['clave']); ?>" required>
                    </div>

                    <input type="submit" name="ctglog" value="Iniciar sesión" class="btn solid">
                </form>

                <!-- FORMULARIO DE REGISTRO -->
                <form action="ctl_login.php" method="POST" class="sign-up-form">
                    <h2 class="signup title">Registrarse</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nombre" placeholder="Nombre completo"
                            value="<?php if(isset($_POST['nombre'])) echo htmlspecialchars($_POST['nombre']); ?>" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="dni" placeholder="DNI"
                            value="<?php if(isset($_POST['dni'])) echo htmlspecialchars($_POST['dni']); ?>" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="correo" placeholder="Correo electrónico"
                            value="<?php if(isset($_POST['correo'])) echo htmlspecialchars($_POST['correo']); ?>" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="telefono" placeholder="Teléfono"
                            value="<?php if(isset($_POST['telefono'])) echo htmlspecialchars($_POST['telefono']); ?>" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="contrasena" placeholder="Contraseña" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="repetir_contrasena" placeholder="Repetir Contraseña" required>
                    </div>

                    <input type="submit" value="Registrarse" class="btn solid" name="registro">
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
</body>
</html>
