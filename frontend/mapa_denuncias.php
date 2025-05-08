<?php
session_start(); // Aquí sí
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: login.php');
    exit();
}
$nombre_usuario = $_SESSION['nombre_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mapa de Calor de Denuncias</title>

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- tu CSS -->
  <link rel="stylesheet" href="../backend/css/mapa_denuncias.css"/>
  <link rel="stylesheet" href="../backend/css/inicio.css">

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- plugin de heatmaps -->
  <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
</head>

<body>

  <!-- navbar_usuario.php -->
  <?php include 'templates/navbar.php'; ?>
  <!-- navbar_usuario.php -->

  <header>
    <h1>Mapa de Calor de Denuncias</h1>
    <input type="search" id="searchInput" placeholder="Buscar" oninput="searchData()">
  </header>

  <main>
    <div id="map"></div>
  </main>

  <!-- navbar_usuario.php -->
  <?php include 'templates/footer.php'; ?>
  <!-- navbar_usuario.php -->

  <!-- tu JS al final para que Leaflet ya esté cargado -->
  <script src="../backend/js/mapa_denuncias.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
