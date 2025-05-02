<?php
session_start();
// aquí podrías manejar modales de error si los tuvieras
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Mapa de Calor de Denuncias</title>

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
  <!-- tu CSS -->
  <link rel="stylesheet" href="../backend/css/mapa_denuncias.css"/>

  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- plugin de heatmaps -->
  <script src="https://unpkg.com/leaflet.heat/dist/leaflet-heat.js"></script>
</head>
<body>

  <header>
    <h1>Mapa de Calor de Denuncias</h1>
    <input type="search" id="searchInput" placeholder="Buscar" oninput="searchData()">
  </header>

  <main>
    <div id="map"></div>
  </main>

  <footer>
    <p>&copy; 2025 Sistema de Denuncias Públicas</p>
  </footer>

  <!-- tu JS al final para que Leaflet ya esté cargado -->
  <script src="../backend/js/mapa_denuncias.js"></script>
</body>
</html>
