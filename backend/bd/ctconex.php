<?php
// Iniciar la sesión si no está iniciada
if (!isset($_SESSION)) {
    session_start();
}

// Definir parámetros de conexión a la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');     
define('DB_PASS', '');         
define('DB_NAME', 'CivicReport'); // El nombre de la base de datos

// Conectar a la base de datos usando PDO
try {
    // Crear la conexión
    $connect = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    
    // Configurar el conjunto de caracteres para evitar problemas con caracteres especiales
    $connect->query("SET NAMES utf8;");
    
    // Configuración de atributos PDO
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Manejo de errores
    $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);  // Modo de obtención de datos (como objetos)
} catch (PDOException $e) {
    // Si hay un error en la conexión, se muestra un mensaje
    echo "Error de conexión: " . $e->getMessage();
    die();  // Detener la ejecución si la conexión falla
}
?>
