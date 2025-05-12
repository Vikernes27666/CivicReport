<?php
session_start(); // Aquí sí
if (!isset($_SESSION['nombre_usuario'])) {
    header('Location: inicio.php');
    exit();
}
$nombre_usuario = $_SESSION['nombre_usuario'];
?>

<?php
include '../backend/bd/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Formulario de Denuncia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../backend/css/inicio.css">
    <link rel="stylesheet" href="../backend/css/footer.css">
    <link rel="stylesheet" href="../backend/css/reg_denuncia.css">
    <link rel="stylesheet" href="../backend/css/footer.css">
</head>

<body>
    <!-- navbar_usuario.php -->
    <?php include 'templates/navbar.php'; ?>
    <!-- navbar_usuario.php -->

    <div class="container mt-4 ">
        <div class="text-center mb-4">
            <img src="../backend/img/logo_sistema.png" alt="Logo PNP" width="120">
            <h4>Denuncia Policial Digital</h4>
        </div>

        <div class="stepwizard">
            <div class="stepwizard-step">
                <button type="button" class="btn btn-primary btn-circle step-active">1</button>
                <p>Generales</p>
            </div>
            <div class="stepwizard-step">
                <button type="button" class="btn btn-secondary btn-circle">2</button>
                <p>Hecho</p>
            </div>
            <div class="stepwizard-step">
                <button type="button" class="btn btn-secondary btn-circle">3</button>
                <p>Ubicación</p>
            </div>
            <div class="stepwizard-step">
                <button type="button" class="btn btn-secondary btn-circle">4</button>
                <p>Evidencias</p>
            </div>
        </div>

        <form action="../backend/controlador/Ctl_regDenuncias.php" method="POST" enctype="multipart/form-data" id="denunciaForm">

            <!-- ESTE ES EL APARTDO DE "GENERALES" -->
            <div class="card p-4 step active" id="step1">
                <h5>Datos Generales</h5>
                <div class="mb-3">
                    <label>¿Desea realizar de forma anónima?</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="es_anonimo" value="1" required>
                        <label class="form-check-label">Sí</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="es_anonimo" value="0" required>
                        <label class="form-check-label">No</label>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="tipo_denunciante">Tipo de Denunciado</label>
                    <?php
                    $sql = "SELECT id_tipo_denunciante, tipo FROM tipo_denunciantes";
                    $result = $conn->query($sql);
                    ?>
                    <select class="form-select" name="id_denunciante" id="tipo_denunciante" required>
                        <option value="">Seleccione...</option>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <option value="<?= $row['id_tipo_denunciante'] ?>">
                                <?= htmlspecialchars($row['tipo']) ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nombre_denunciante">Nombre (si se conoce)</label>
                    <input type="text" class="form-control" name="nombre_denunciante">
                </div>
                <div class="form-footer">
                    <button type="button" class="btn btn-primary btn-sm" onclick="nextStep(1)">Siguiente</button>
                </div>
            </div>

            <!-- ESTE ES EL APARTADO DE "HECHOS" -->
            <div class="card p-4 step" id="step2">
                <h5>Datos del Hecho</h5>
                <div class="mb-3">
                    <label for="titulo">Asunto</label>
                    <input type="text" class="form-control" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" name="descripcion" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="categoria">Categoría</label>
                    <select class="form-select" name="categoria" id="categoria" required onchange="toggleOtroCampo(this)">
                        <option value="">Seleccione...</option>
                        <option>Uso excesivo de la fuerza</option>
                        <option>Amenazas o intimidación</option>
                        <option>Detención arbitraria</option>
                        <option>Discriminación por autoridad</option>
                        <option>Corrupción</option>
                        <option>Negligencia policial</option>
                        <option>Violación de derechos humanos</option>
                        <option>Otros</option>
                    </select>
                </div>
                <div class="mb-3 d-none" id="campoOtro">
                    <label for="otro_texto">Especifique la categoría</label>
                    <input type="text" class="form-control" name="otro_texto" id="otro_texto">
                </div>
                <div class="mb-3">
                    <label for="fecha_hechos">Fecha del Hecho</label>
                    <input type="date" class="form-control" name="fecha_hechos" required>
                </div>

                <div class="form-footer">
                    <button type="button" class="btn btn-secondary btn-sm" onclick="prevStep(2)">Anterior</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="nextStep(2)">Siguiente</button>
                </div>
            </div>

            <!-- ESTES ES EL APARTADO DE "UBICAICONE" -->
            <div class="card p-4 step" id="step3">
                <h5>Ubicación del Hecho</h5>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label>Departamento</label>
                        <input type="text" class="form-control" name="departamento">
                    </div>
                    <div class="col-md-4">
                        <label>Provincia</label>
                        <input type="text" class="form-control" name="provincia">
                    </div>
                    <div class="col-md-4">
                        <label>Distrito</label>
                        <input type="text" class="form-control" name="distrito">
                    </div>
                </div>
                <div class="mb-3">
                    <label>Dirección de Referencia</label>
                    <input type="text" class="form-control" name="direccion_referencia">
                </div>
                <div class="mb-3">
                    <label for="latitud" class="form-label">Latitud</label>
                    <input type="text" class="form-control" name="latitud" id="latitud" placeholder="Latitud">
                </div>

                <div class="mb-3">
                    <label for="longitud" class="form-label">Longitud</label>
                    <input type="text" class="form-control" name="longitud" id="longitud" placeholder="Longitud">
                </div>

                <div class="mb-4">
                    <button type="button" class="btn btn-success d-flex align-items-center gap-2" onclick="obtenerUbicacion()">
                        <i class="bi bi-geo-alt-fill"></i>
                        Usar mi ubicación
                    </button>
                </div>
                <div class="form-footer">
                    <button type="button" class="btn btn-secondary btn-sm" onclick="prevStep(3)">Anterior</button>
                    <button type="button" class="btn btn-primary btn-sm" onclick="nextStep(3)">Siguiente</button>
                </div>
            </div>

            <!-- ESTE ES EL APARTADO DE LAS "EVIDENCIAS -->
            <div class="card p-4 step" id="step4">
                <h5>Subir Evidencias</h5>
                <div class="mb-3">
                    <label for="evidencias" class="form-label">Adjuntar archivos (imágenes, PDFs, videos...)</label>
                    <input type="file" class="form-control" name="evidencias[]" id="evidencias" multiple accept=".jpg,.jpeg,.png,.pdf,.mp4,.mov,.avi">
                    <div class="form-text">Puedes subir varios archivos (imágenes, PDFs, videos).</div>
                </div>
                <div class="form-footer text-center">
                    <button type="button" class="btn btn-secondary btn-sm me-2" onclick="prevStep(4)">Anterior</button>
                    <button type="submit" class="btn btn-success btn-sm">Enviar</button>
                </div>
            </div>

        </form>
    </div>
    <div class=" mt-4 ">
        <!-- footer -->
        <?php include 'templates/footer.php'; ?>
        <!-- foter -->
    </div>


    <script>

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../backend/js/reg_denuncia.js"> </script>
</body>

</html>