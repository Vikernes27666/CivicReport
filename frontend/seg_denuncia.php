<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consultar Denuncia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../backend/css/inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

 <!-- navbar_usuario.php -->
 <?php include 'navbar_usuario.php'; ?>
    <!-- navbar_usuario.php -->

  <h1>Consultar Estado de Denuncia</h1>

  <form id="formSeguimiento" action="consultar_denuncia.php" method="GET">
    <label for="codigo_seguimiento">Código de Seguimiento:</label>
    <input type="text" id="codigo_seguimiento" name="codigo_seguimiento" required>
    <button type="submit">Consultar</button>
  </form>

  <div id="resultado" style="display:none; margin-top: 20px;">
    <h3>Estado de la Denuncia:</h3>
    <p><strong>Estado actual:</strong> <span id="estadoActual"></span></p>
    <p><strong>Último comentario:</strong> <span id="comentario"></span></p>
    <p><strong>Fecha de actualización:</strong> <span id="fecha"></span></p>
  </div>

  <script>
    // Simulación de backend con datos estáticos de ejemplo
    const datosEjemplo = {
      estado: "En revisión",
      comentario: "Su denuncia está siendo evaluada por un agente.",
      fecha: "2025-04-22 10:35:00"
    };

    document.getElementById("formSeguimiento").addEventListener("submit", function(event) {
      event.preventDefault(); // quitar esta línea cuando lo conectes con PHP real

      // Mostrar los datos simulados en la vista
      document.getElementById("estadoActual").textContent = datosEjemplo.estado;
      document.getElementById("comentario").textContent = datosEjemplo.comentario;
      document.getElementById("fecha").textContent = datosEjemplo.fecha;

      document.getElementById("resultado").style.display = "block";
    });
  </script>



</body>
</html>
