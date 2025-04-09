<!DOCTYPE html>s
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DenunciaYa - Inicio</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../backend/css/style.css">
</head>
<body>

  <!-- HEADER -->
  <header>
    <div><a href="javascript:void(0);" onclick="showTab('inicio')" style="color: #333; text-decoration: none;">DenunciaYa</a></div>
    <div class="auth-buttons">
      <a href="login.php"><button class="btn">Iniciar sesión</button></a>
    </div>
  </header>

  <!-- SECCIÓN DE BIENVENIDA (Hero) -->
  <section class="hero form-section active" id="inicio">
    <h1>Bienvenido a <span style="color:#227093;">DenunciaYa</span></h1>
    <p>Comienza tu proyecto ahora y marca el camino al éxito</p>
    <button class="btn" onclick="showTab('denuncia')">Realizar Denuncia</button>
  </section>

  <!-- SECCIÓN DE VISUALIZAR DENUNCIAS -->
  <section class="visualizar-section active" id="visualizar">
    <h2>Denuncias Recientes</h2>
    <div id="lista-denuncias"></div>
  </section>

  <!-- FORMULARIO DE REALIZAR DENUNCIA -->
  <section class="form-section" id="denuncia">
    <h2>Realizar Denuncia</h2>
    <form onsubmit="event.preventDefault(); agregarDenuncia();">
      <label for="comentario">Comentario:</label>
      <textarea id="comentario" rows="4" placeholder="Describe tu denuncia..."></textarea>

      <label for="imagen">Adjuntar imagen:</label>
      <input type="file" id="imagen" accept="image/*" />

      <button class="btn" type="submit">Enviar Denuncia</button>
    </form>
  </section>

  <script src="scripts.js"></script>
</body>
</html>

