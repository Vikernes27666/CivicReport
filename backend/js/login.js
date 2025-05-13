document.getElementById('toggleLoginPassword').addEventListener('click', function () {
    const passwordField = document.getElementById('loginPassword');
    const icon = this.querySelector('i');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';  // Cambia el tipo a texto
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');  // Cambia a ojo abierto
    } else {
        passwordField.type = 'password';  // Cambia el tipo a contraseña
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');  // Cambia a ojo cerrado
    }
});