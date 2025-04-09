
<?php 
    require '../backend/bd/ctconex.php';

// --- INICIO DE SESIÓN ---
if (isset($_POST['ctglog'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Busca usuario por nombre de usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuarioData = $resultado->fetch_assoc();
        // Verifica contraseña
        if (password_verify($clave, $usuarioData['clave'])) {
            // Almacena datos en sesión
            $_SESSION['id'] = $usuarioData['id'];
            $_SESSION['nombre'] = $usuarioData['nombre'];
            header('Location: escritorio.php');
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta');</script>";
        }
    } else {
        echo "<script>alert('Usuario no encontrado');</script>";
    }
}

// --- REGISTRO DE USUARIO ---
if (isset($_POST['registro'])) {
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $repetir_contrasena = $_POST['repetir_contrasena'];

    // Validaciones básicas
    if ($contrasena !== $repetir_contrasena) {
        echo "<script>alert('Las contraseñas no coinciden');</script>";
        exit();
    }

    // Validar si ya existe el correo o DNI
    $sqlCheck = "SELECT * FROM usuarios WHERE dni = ? OR correo = ?";
    $stmt = $conn->prepare($sqlCheck);
    $stmt->bind_param("ss", $dni, $correo);
    $stmt->execute();
    $check = $stmt->get_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Ya existe un usuario con ese DNI o correo');</script>";
        exit();
    }

    // Hashea la contraseña
    $claveHash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Inserta en la base de datos
    $sql = "INSERT INTO usuarios (nombre, dni, correo, telefono, clave, usuario) VALUES (?, ?, ?, ?, ?, ?)";
    $usuario = explode('@', $correo)[0]; // Puedes generar el nombre de usuario así, o pedirlo como campo

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nombre, $dni, $correo, $telefono, $claveHash, $usuario);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado correctamente'); window.location.href='../frontend/login.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error al registrar usuario');</script>";
    }
}
?>