<?php
session_start();
include '../bd/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombres = mysqli_real_escape_string($conn, $_POST['nombres']);
    $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
    $tipoDocumento = mysqli_real_escape_string($conn, $_POST['tipo_documento']);
    $numeroDocumento = mysqli_real_escape_string($conn, $_POST['numero_documento']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $password = $_POST['password']; 
    $confirmPassword = $_POST['confirm_password']; 

    $_SESSION['errores'] = [];
    $_SESSION['old'] = $_POST; 

    if ($password !== $confirmPassword) {
        $_SESSION['errores']['confirmPassword'] = "Las contraseñas no coinciden.";
    }

    $sql_check = "SELECT * FROM usuarios WHERE numero_documento = '$numeroDocumento' OR correo = '$correo'";
    $result_check = mysqli_query($conn, $sql_check);

    while ($row = mysqli_fetch_assoc($result_check)) {
        if ($row['numero_documento'] == $numeroDocumento) {
            $_SESSION['errores']['numeroDocumento'] = "Este número de documento ya está registrado.";
        }
        if ($row['correo'] == $correo) {
            $_SESSION['errores']['email'] = "Este correo ya está registrado.";
        }
    }

    if (!empty($_SESSION['errores'])) {
    
        header("Location: ../../frontend/inicio.php");
        exit();
    }

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $fechaRegistro = date("Y-m-d H:i:s");
    $sql_insert = "INSERT INTO usuarios (nombres, apellidos, tipo_documento, numero_documento, correo, telefono, password, fecha_registro) 
                   VALUES ('$nombres', '$apellidos', '$tipoDocumento', '$numeroDocumento', '$correo', '$telefono', '$passwordHash', '$fechaRegistro')";

    if (mysqli_query($conn, $sql_insert)) {
        $_SESSION['registro_exitoso'] = "¡Registro exitoso! Tu cuenta ha sido creada correctamente."; 
        unset($_SESSION['old']); 
        header("Location: ../../frontend/inicio.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar el usuario.";
        header("Location: ../../frontend/inicio.php");
        exit();
    }
}
?>
