document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".container");
    const urlParams = new URLSearchParams(window.location.search);
    const mode = urlParams.get('mode'); // Puede ser "login" o "register"
  
    // Establece el estado inicial según el parámetro
    if (mode === "register") {
      container.classList.add('sign-up-mode');
    } else {
      // Si mode es "login" o no existe, se asegura que no esté la clase
      container.classList.remove('sign-up-mode');
    }
  
    // Eventos para los botones internos (si ya los tienes definidos en el formulario)
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
  
    sign_up_btn.addEventListener('click', () => {
        container.classList.add('sign-up-mode'); // Muestra registro
    });
  
    sign_in_btn.addEventListener('click', () => {
        container.classList.remove('sign-up-mode'); // Muestra login
    });
  });