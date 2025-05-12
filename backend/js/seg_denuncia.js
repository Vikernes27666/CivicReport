document.addEventListener("DOMContentLoaded", () => {
    const modalEstado = document.getElementById('modalEstado');

    modalEstado.addEventListener('show.bs.modal', function(event) {
      const btn = event.relatedTarget;
      const estado = btn.getAttribute('data-estado').trim().toLowerCase();
      const fecha = new Date(btn.getAttribute('data-fecha'));
      const ahora = new Date();
      const dias = Math.floor((ahora - fecha) / (1000 * 60 * 60 * 24));

      const pasos = [{
          nombre: "Enviado",
          activo: dias >= 0
        },
        {
          nombre: "En proceso",
          activo: dias >= 1
        },
        {
          nombre: "En investigación",
          activo: dias >= 2
        },
      ];

      const esFinal = estado === "aprobada" || estado === "rechazada";

      if (esFinal) {
        pasos.push({
          nombre: estado === "aprobada" ? "Aprobado" : "Rechazado",
          activo: true,
          final: true
        });
      } else {
        pasos.push({
          nombre: "Pendiente",
          activo: false,
          pendiente: true
        });
      }

      const contenedor = document.getElementById('lineaSeguimiento');
      contenedor.innerHTML = "";

      pasos.forEach((paso, i) => {
        const clase = paso.final ?
          (estado === "aprobada" ? "final aprobado" : "final rechazado") :
          paso.pendiente ?
          "pendiente" :
          paso.activo ?
          "active" :
          "";

        const contenido = paso.activo ? '✓' : paso.pendiente ? '?' : '';
        contenedor.innerHTML += `
        <div class="timeline-step">
          <div class="timeline-circle ${clase}">
            ${contenido}
          </div>
          <div class="timeline-label">${paso.nombre}</div>
        </div>
      `;
      });

      const fechaInicio = document.getElementById('fechaInicio');
      const opcionesFecha = {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
      };
      fechaInicio.innerText = `📅 Fecha de envío: ${fecha.toLocaleDateString('es-PE', opcionesFecha)}`;
    });
  });