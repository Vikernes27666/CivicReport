// 1) Inicializa el mapa en Lima
document.addEventListener("DOMContentLoaded", function () {
    var map = L.map('map').setView([-12.0464, -77.0428], 13);

    // 2) Añade capa base OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // 3) Fetch al backend
    fetch('../backend/controlador/get_denuncias.php')
        .then(function(res) {
            if (!res.ok) throw new Error('HTTP error ' + res.status);
            return res.json();
        })
        .then(function(data) {
            console.log('Denuncias JSON:', data);

            var heatPoints = [];
            var markers = []; // Array para almacenar los marcadores

            // Almacena todas las denuncias para hacer búsquedas
            data.forEach(function(d) {
                var lat = parseFloat(d.lat),
                    lng = parseFloat(d.lng);

                if (!isNaN(lat) && !isNaN(lng)) {
                    heatPoints.push([lat, lng]);

                    // Crea el marcador
                    var marker = L.marker([lat, lng])
                        .bindPopup(
                            '<b>Descripción:</b> ' + d.descripcion +
                            '<br><b>Dirección:</b> ' + d.direccion
                        );
                    marker.addTo(map);

                    // Almacenar el marcador en un array para filtrarlos más tarde
                    markers.push({ marker: marker, descripcion: d.descripcion, direccion: d.direccion });
                }
            });

            // 4) Capa de calor
            if (heatPoints.length) {
                L.heatLayer(heatPoints, {
                    radius: 40,
                    blur: 30,
                    maxZoom: 17,
                    minOpacity: 0.4,
                    gradient: {
                        0.1: 'blue',
                        0.3: 'yellow',
                        0.7: 'red',
                        1.0: 'darkred'
                    }
                }).addTo(map);
            }

            // 5) Función de búsqueda
            window.searchData = function() {
                const query = document.getElementById('searchInput').value.toLowerCase();

                // Filtra los marcadores según la búsqueda
                markers.forEach(function(item) {
                    const descripcionMatch = item.descripcion.toLowerCase().includes(query);
                    const direccionMatch = item.direccion.toLowerCase().includes(query);

                    // Si la descripción o la dirección coinciden, muestra el marcador
                    if (descripcionMatch || direccionMatch) {
                        item.marker.addTo(map);
                    } else {
                        // Si no coinciden, elimina el marcador
                        map.removeLayer(item.marker);
                    }
                });

                // Actualiza la capa de calor con las denuncias visibles
                const filteredHeatPoints = markers.filter(item =>
                    item.marker._map && // Asegura que el marcador esté en el mapa
                    (
                        item.descripcion.toLowerCase().includes(query) || 
                        item.direccion.toLowerCase().includes(query)
                    )
                ).map(item => item.marker.getLatLng());

                // Remueve la capa de calor anterior
                map.eachLayer(function(layer) {
                    if (layer instanceof L.HeatLayer) {
                        map.removeLayer(layer);
                    }
                });

                // Vuelve a añadir la capa de calor con los puntos filtrados
                if (filteredHeatPoints.length) {
                    L.heatLayer(filteredHeatPoints, {
                        radius: 40,
                        blur: 30,
                        maxZoom: 17,
                        minOpacity: 0.4,
                        gradient: {
                            0.1: 'blue',
                            0.3: 'yellow',
                            0.7: 'red',
                            1.0: 'darkred'
                        }
                    }).addTo(map);
                }
            }
        })
        .catch(function(err) {
            console.error('Error al fetch/get_denuncias:', err);
            // Si quieres mostrar un error visual, crea un elemento y agrégalo aquí
        });
});
