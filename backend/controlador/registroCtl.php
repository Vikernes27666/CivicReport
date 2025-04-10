<?php
session_start();
include('../bd/conexion.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombreCompleto = $_POST['nombreCompleto'];
    $dni = $_POST['dni'];
    $correoElectronico = $_POST['correoElectronico'];
    $telefono = $_POST['telefono'];
    $contrasena = $_POST['contrasena'];
    $repetirContrasena = $_POST['repetir_contrasena'];

    $_SESSION['old'] = $_POST;

    if ($contrasena !== $repetirContrasena) {
        $_SESSION['error'] = "Las contraseñas no coinciden.";
        header("Location: ../../frontend/registro.php");
        exit();
    }

    $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

    $sql_check = "SELECT * FROM usuarios WHERE dni = '$dni' OR correoElectronico = '$correoElectronico'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        $_SESSION['error'] = "Este DNI o correo electrónico ya está registrado.";
        header("Location: ../../frontend/registro.php");
        exit();
    }

    $sql_insert = "INSERT INTO usuarios (nombreCompleto, dni, correoElectronico, telefono, contrasena) 
                   VALUES ('$nombreCompleto', '$dni', '$correoElectronico', '$telefono', '$contrasenaEncriptada')";

    if (mysqli_query($conn, $sql_insert)) {
        $_SESSION['mostrarModal'] = true;  
        unset($_SESSION['old']); 
        header("Location: ../../frontend/registro.php");
        exit();
    } else {
        $_SESSION['error'] = "Error al registrar el usuario. Intenta nuevamente.";
        header("Location: ../../frontend/registro.php");
        exit();
    }
}
?>
