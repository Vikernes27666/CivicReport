document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("form").addEventListener("submit", function (event) {
        let condiciones = document.getElementById("condiciones");
        let password = document.getElementById("contrasena").value;
        let confirmPassword = document.getElementById("repetir_contrasena").value; 
        let numeroDocumento = document.getElementById("dni"); 
        let celular = document.getElementById("telefono"); 
        let valid = true;

        if (password !== confirmPassword) {
            mostrarMensajeError(document.getElementById("repetir_contrasena"), "Las contraseñas no coinciden.");
            valid = false;
        }

        if (!/^\d{8,12}$/.test(numeroDocumento.value)) {
            mostrarMensajeError(numeroDocumento, "El número de documento debe tener entre 8 y 12 dígitos numéricos.");
            valid = false;
        }

        // Validar celular (solo números y longitud exacta de 9)
        if (!/^\d{9}$/.test(celular.value)) {
            mostrarMensajeError(celular, "El número de celular debe tener 9 dígitos.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});

function mostrarMensajeError(elemento, mensaje) {
    let error = elemento.nextElementSibling;
    if (!error || !error.classList.contains("text-danger")) {
        error = document.createElement("small");
        error.classList.add("text-danger");
        elemento.parentNode.appendChild(error);
    }
    error.textContent = mensaje;
}
