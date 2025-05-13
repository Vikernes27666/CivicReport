//abrir modalesxd

document.addEventListener("DOMContentLoaded", function () {
    const signInButton = document.getElementById('sign-in-btn');
    const signUpButton = document.getElementById('sign-up-btn');
    const authModal = new bootstrap.Modal(document.getElementById('authModal'));
    const signInForm = document.querySelector('.sign-in-form');
    const signUpForm = document.querySelector('.sign-up-form');

    signInButton.addEventListener('click', function () {
        authModal.show();
        signInForm.style.display = 'block';
        signUpForm.style.display = 'none';
    });

    signUpButton.addEventListener('click', function () {
        authModal.show();
        signInForm.style.display = 'none';
        signUpForm.style.display = 'block';
    });
});

document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordField = document.getElementById('password');
    const icon = this.querySelector('i');
    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');  // Cambia a ojo abierto
    } else {
        passwordField.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');  // Cambia a ojo cerrado
    }
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    const confirmPasswordField = document.getElementById('confirm_password');
    const icon = this.querySelector('i');
    if (confirmPasswordField.type === 'password') {
        confirmPasswordField.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');  // Cambia a ojo abierto
    } else {
        confirmPasswordField.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');  // Cambia a ojo cerrado
    }
});



