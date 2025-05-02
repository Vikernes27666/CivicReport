<?php
session_start();
include '../bd/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $password = trim($_POST['password']);

    if (empty($correo) || empty($password)) {
        $_SESSION['error'] = "Todos los campos son obligatorios."; 
        header("Location: ../../frontend/login.php");
        exit();
    } else {
        $sql_user = "SELECT id_usuario, nombres, password FROM usuarios WHERE correo = ?";
        $stmt = $conn->prepare($sql_user);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) { 
            $stmt->bind_result($id_usuario, $nombres, $hash);
            $stmt->fetch();

            if (password_verify($password, $hash)) {
                $_SESSION['id_usuario'] = $id_usuario;
                $_SESSION['nombre_usuario'] = $nombres;
                $_SESSION['admin_logged_in'] = false; 
                header("Location: ../../frontend/inicio_usuario.php"); 
                exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta."; 
            }
        } else {
            $sql_admin = "SELECT id_admin, nombre_completo, password FROM administradores WHERE correo = ?";
            $stmt = $conn->prepare($sql_admin);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {  
                $stmt->bind_result($id_admin, $nombre_completo, $hash);
                $stmt->fetch();

                if (password_verify($password, $hash)) {
                    $_SESSION['id_admin'] = $id_admin;
                    $_SESSION['nombre_completo'] = $nombre_completo;
                    $_SESSION['admin_logged_in'] = true;  
                    header("Location: ../../frontend/vistaAdmin.php"); 
                    exit();
                } else {
                    $_SESSION['error'] = "Contraseña incorrecta."; 
                    
                }
            } else {
                $_SESSION['error'] = "El correo no está registrado."; 
            }
        }
    }
}

header("Location: ../../frontend/inicio.php");
exit();
?>
