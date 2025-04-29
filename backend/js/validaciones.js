document.addEventListener("DOMContentLoaded", function () {
    const formRegistro = document.getElementById("formRegistro"); 

    formRegistro.addEventListener("submit", function (event) {
        const errorMessages = document.querySelectorAll('.text-danger');
        errorMessages.forEach(function (error) {
            error.remove(); 
        });

        let valid = true;
        let errors = [];

        let nombre = document.querySelector("input[name='nombres']");
        if (nombre.value.trim() === "" || nombre.value.length < 2) {
            errors.push("El nombre debe tener al menos 2 caracteres.");
            mostrarMensajeError(nombre, "El nombre debe tener al menos 2 caracteres.");
            valid = false;
        }

        let apellido = document.querySelector("input[name='apellidos']");
        if (apellido.value.trim() === "" || apellido.value.length < 2) {
            errors.push("El apellido debe tener al menos 2 caracteres.");
            mostrarMensajeError(apellido, "El apellido debe tener al menos 2 caracteres.");
            valid = false;
        }

        let tipoDocumento = document.querySelector("select[name='tipo_documento']");
        if (tipoDocumento.value === "") {
            errors.push("Seleccione un tipo de documento.");
            mostrarMensajeError(tipoDocumento, "Seleccione un tipo de documento.");
            valid = false;
        }

        let numeroDocumento = document.querySelector("input[name='numero_documento']");
        if (!/^\d{8,12}$/.test(numeroDocumento.value)) {
            errors.push("El número de documento debe tener entre 8 y 12 dígitos numéricos.");
            mostrarMensajeError(numeroDocumento, "El número de documento debe tener entre 8 y 12 dígitos numéricos.");
            valid = false;
        }

        let telefono = document.querySelector("input[name='telefono']");
        if (!/^\d{9}$/.test(telefono.value)) {
            errors.push("El número de teléfono debe tener 9 dígitos.");
            mostrarMensajeError(telefono, "El número de teléfono debe tener 9 dígitos.");
            valid = false;
        }

        let correo = document.querySelector("input[name='correo']");
        if (!/\S+@\S+\.\S+/.test(correo.value)) {
            errors.push("El correo no es válido.");
            mostrarMensajeError(correo, "El correo no es válido.");
            valid = false;
        }

        let contrasena = document.querySelector("input[name='password']");
        if (contrasena.value.length < 6) {
            errors.push("La contraseña debe tener al menos 6 caracteres.");
            mostrarMensajeError(contrasena, "La contraseña debe tener al menos 6 caracteres.");
            valid = false;
        }

        if (contrasena.value.length >= 6 && !/[A-Z]/.test(contrasena.value)) {
            errors.push("La contraseña debe contener al menos una letra mayúscula.");
            mostrarMensajeError(contrasena, "La contraseña debe contener al menos una letra mayúscula.");
            valid = false;
        }

        if (contrasena.value.length >= 6 && /[A-Z]/.test(contrasena.value) && !/[!@#$%^&*(),.?":{}|<>]/.test(contrasena.value)) {
            errors.push("La contraseña debe contener al menos un carácter especial.");
            mostrarMensajeError(contrasena, "La contraseña debe contener al menos un carácter especial.");
            valid = false;
        }

        let confirmContrasena = document.querySelector("input[name='confirm_password']");
        if (contrasena.value !== confirmContrasena.value) {
            errors.push("Las contraseñas no coinciden.");
            mostrarMensajeError(confirmContrasena, "Las contraseñas no coinciden.");
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
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
});
