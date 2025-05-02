<?php
session_start();
session_destroy();  // Destruye todas las variables de sesión
header('Location: ../../frontend/inicio.php');  // Redirige al formulario de login
exit();
?>