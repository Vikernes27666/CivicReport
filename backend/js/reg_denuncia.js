function nextStep(current) {
    document.getElementById('step' + current).classList.remove('active');
    document.getElementById('step' + (current + 1)).classList.add('active');
    let steps = document.querySelectorAll('.stepwizard-step button');
    steps[current].classList.add('step-active', 'btn-primary');
    steps[current].classList.remove('btn-secondary');
}

function prevStep(current) {
    document.getElementById('step' + current).classList.remove('active');
    document.getElementById('step' + (current - 1)).classList.add('active');
}

function toggleOtroCampo(select) {
    const campo = document.getElementById("campoOtro");
    if (select.value === "Otros") {
        campo.classList.remove("d-none");
    } else {
        campo.classList.add("d-none");
    }
}

function obtenerUbicacion() {
    const btn = event.target.closest("button");
    const latInput = document.getElementById("latitud");
    const lonInput = document.getElementById("longitud");

    btn.disabled = true;
    btn.innerHTML = '<i class="bi bi-geo-alt-fill"></i> Obteniendo ubicación...';

    if ("geolocation" in navigator) {
        navigator.geolocation.getCurrentPosition(
            function(pos) {
                const lat = pos.coords.latitude.toFixed(6);
                const lon = pos.coords.longitude.toFixed(6);

                latInput.value = lat;
                lonInput.value = lon;

                btn.innerHTML = '<i class="bi bi-geo-alt-fill"></i> Ubicación obtenida';
                btn.classList.remove("btn-success");
                btn.classList.add("btn-outline-success");
            },
            function(error) {
                alert("No se pudo obtener la ubicación: " + error.message);
                btn.innerHTML = '<i class="bi bi-geo-alt-fill"></i> Usar mi ubicación';
                btn.disabled = false;
            }, {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    } else {
        alert("Tu navegador no soporta geolocalización.");
        btn.disabled = false;
    }
}