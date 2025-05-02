<?php

include '../backend//bd/conexion.php'; 

$nombre_completo = "Rick";
$correo = "admin@admin.com";
$telefono = "987654321";
$password = "admin"; 
$rol = "Administrador";
$estado = "Activo";
$fecha_registro = "2025-05-01";

$hashed_password = password_hash($password, PASSWORD_BCRYPT); 

$sql_admin = "INSERT INTO administradores (nombre_completo, correo, telefono, password, rol, estado, fecha_registro) 
VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql_admin);

$stmt->bind_param("sssssss", $nombre_completo, $correo, $telefono, $hashed_password, $rol, $estado, $fecha_registro);

if ($stmt->execute()) {
    echo "Administrador insertado correctamente.";
} else {
    echo "Error al insertar el administrador: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
