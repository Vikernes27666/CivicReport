<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Denuncia</title>
</head>
<body>

  <h1>Registrar Nueva Denuncia</h1>

  <form id="formDenuncia" action="procesar_denuncia.php" method="POST" enctype="multipart/form-data">
    
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="titulo" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" rows="4" required></textarea><br>

    <label for="categoria">Categoría:</label>
    <select id="categoria" name="categoria" required>
      <option value="">Seleccione una categoría</option>
      <option value="Robo">Robo</option>
      <option value="Acoso">Acoso</option>
      <option value="Abuso de autoridad">Abuso de autoridad</option>
      <option value="Violencia">Violencia</option>
      <option value="Otros">Otros</option>
    </select><br>

    <label for="distrito">Distrito:</label>
    <input type="text" id="distrito" name="distrito" required><br>

    <label for="direccion_detallada">Dirección detallada:</label>
    <input type="text" id="direccion_detallada" name="direccion_detallada" required><br>

    <label for="latitud">Latitud:</label>
    <input type="text" id="latitud" name="latitud" required><br>

    <label for="longitud">Longitud:</label>
    <input type="text" id="longitud" name="longitud" required><br>

    <p>¿Desea enviar la denuncia como anónima?</p>
    <input type="radio" id="anonimo_si" name="es_anonimo" value="1" required>
    <label for="anonimo_si">Sí</label><br>
    <input type="radio" id="anonimo_no" name="es_anonimo" value="0">
    <label for="anonimo_no">No</label><br>

    <label for="evidencias">Subir evidencias (opcional):</label>
    <input type="file" id="evidencias" name="evidencias[]" multiple><br><br>

    <button type="submit">Registrar Denuncia</button>
  </form>

  <div id="mensaje" style="display:none;">
    ¡Denuncia registrada con éxito! Se enviará automáticamente un código de seguimiento a tu correo.
  </div>

  <script>
    document.getElementById("formDenuncia").addEventListener("submit", function(event){
      event.preventDefault(); // quitar esta línea cuando se conecte al backend real
      document.getElementById("mensaje").style.display = "block";
    });
  </script>

</body>
</html>
