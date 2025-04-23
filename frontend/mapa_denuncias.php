<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa de Calor de Denuncias</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-heat/dist/leaflet-heat.js"></script>
    <style>
        /* Estilos básicos para el mapa */
        #map {
            width: 100%;
            height: 500px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <header>
        <h1>Mapa de Calor de Denuncias</h1>
    </header>

    <main>
        <section id="map"></section>
        
        <!-- Otros contenidos de la página -->
    </main>

    <footer>
        <p>&copy; 2025 Sistema de Denuncias Públicas</p>
    </footer>

    <script>
        // Crear el mapa centrado en Lima, Perú (o el lugar que prefieras)
        var map = L.map('map').setView([ -12.0464, -77.0428 ], 13);

        // Cargar el mapa con OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Aquí se deben incluir las coordenadas de las denuncias desde la base de datos
        var denunciaCoordenadas = [
            [-12.0464, -77.0428],  // Coordenadas de ejemplo
            [-12.0399, -77.0270],
            [-12.0304, -77.0458]
        ];

        // Crear un mapa de calor
        L.heatLayer(denunciaCoordenadas, {radius: 25, blur: 15}).addTo(map);

        // Opción: Agregar marcadores para cada denuncia si se desea
        denunciaCoordenadas.forEach(function(coord) {
            L.marker(coord).addTo(map)
                .bindPopup("<b>Denuncia en esta ubicación</b>")
                .openPopup();
        });
    </script>

</body>
</html>
