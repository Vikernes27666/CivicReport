//abrir modalesxd

document.addEventListener("DOMContentLoaded", function() {
    const signInButton = document.getElementById('sign-in-btn');
    const signUpButton = document.getElementById('sign-up-btn');
    const authModal = new bootstrap.Modal(document.getElementById('authModal'));
    const signInForm = document.querySelector('.sign-in-form');
    const signUpForm = document.querySelector('.sign-up-form');

    signInButton.addEventListener('click', function() {
        authModal.show();
        signInForm.style.display = 'block'; 
        signUpForm.style.display = 'none'; 
    });

    signUpButton.addEventListener('click', function() {
        authModal.show();
        signInForm.style.display = 'none'; 
        signUpForm.style.display = 'block';
    });
});



