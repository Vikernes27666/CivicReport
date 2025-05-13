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
$sql = "SELECT d.id_denuncia, d.titulo, d.descripcion, d.categoria, d.fecha_hechos,
        d.departamento, d.provincia, d.distrito, d.direccion_referencia, d.codigo_seguimiento,
        d.es_anonimo, d.fecha_creacion, de.nombre AS nombre_denunciante, e.archivo_url
        FROM denuncias d
        LEFT JOIN evidencias e ON d.id_denuncia = e.id_denuncia
        LEFT JOIN denunciantes de ON d.id_denunciante = de.id_denunciante
        WHERE d.estado = 'Aprobada'
        GROUP BY d.id_denuncia
        ORDER BY d.fecha_creacion DESC
        ";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Denuncias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../backend/css/inicio.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../backend/css/ver_denuncia.css">
</head>

<body>
    <!-- navbar_usuario.php -->
    <?php include 'templates/navbar.php'; ?>
    <!-- navbar_usuario.php -->

    <div class="container my-5">
        <div class="bg-light py-4 px-3 rounded shadow-sm mb-5 d-flex align-items-center">
            <img src="../backend/img/denuncia.png" alt="Logo" style="height: 100px; width: auto;" class="me-3">
            <div>
                <h2 class="mb-1 text-dark fw-bold"> Denuncias Aprobadas</h2>
                <p class="mb-0 text-muted">Estas son las denuncias que han sido aprobadas por el sistema.</p>
            </div>
        </div>
        <div class="row">
            <?php while ($row = $result->fetch_assoc()) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm card-hover h-100">
                        <img src="../backend/<?= $row['archivo_url'] ?>" class="card-img-top rounded-top" alt="Evidencia" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-semibold text-dark mb-2"><?= htmlspecialchars($row['titulo']) ?></h5>
                            <p class="card-text text-muted mb-3"><?= substr(htmlspecialchars($row['descripcion']), 0, 100) ?>...</p>
                            <button class="btn btn-outline-primary mt-auto w-100" data-bs-toggle="modal" data-bs-target="#modal<?= $row['id_denuncia'] ?>">
                                <i class="bi bi-eye"></i> Ver más detalles
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal de lass denuncaisd -->
                <div class="modal fade" id="modal<?= $row['id_denuncia'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $row['id_denuncia'] ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border border-dark" style="background-color: #f8f9fa;">

                            <div class="modal-header bg-light border-bottom border-dark d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="../backend/img/logo_sistema.png" alt="Logo" width="100" class="me-3">
                                    <h5 class="modal-title fw-bold mb-0">COPIA CERTIFICADA DIGITAL - DENUNCIA (policiales??)</h5>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                            </div>
                            <div class="modal-body p-4">

                                <div class="text-end mb-3 text-muted small">
                                    <strong>Código de Seguimiento:</strong> <?= htmlspecialchars($row['codigo_seguimiento']) ?>
                                </div>

                                <div class="bg-secondary text-white px-3 py-2 mb-3"><strong>DATOS DEL DENUNCIANTE</strong></div>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <strong>Nombre:</strong><br>
                                        <?php if ($row['es_anonimo'] === '1') : ?>
                                            Anónimo
                                        <?php else : ?>
                                            <?= htmlspecialchars($row['nombre_denunciante']) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="bg-secondary text-white px-3 py-2 mb-3"><strong>DATOS GENERALES</strong></div>
                                <div class="row mb-3">
                                    <div class="col-md-6"><strong>Título de la denuncia:</strong><br><?= htmlspecialchars($row['titulo']) ?></div>
                                    <div class="col-md-6"><strong>Categoría:</strong><br><?= htmlspecialchars($row['categoria']) ?></div>
                                </div>

                                <div class="bg-secondary text-white px-3 py-2 mb-3"><strong>UBICACIÓN DE LOS HECHOS</strong></div>
                                <div class="row mb-3">
                                    <div class="col-md-4"><strong>Departamento:</strong><br><?= htmlspecialchars($row['departamento']) ?></div>
                                    <div class="col-md-4"><strong>Provincia:</strong><br><?= htmlspecialchars($row['provincia']) ?></div>
                                    <div class="col-md-4"><strong>Distrito:</strong><br><?= htmlspecialchars($row['distrito']) ?></div>
                                </div>
                                <div class="mb-3">
                                    <strong>Dirección de referencia:</strong><br><?= htmlspecialchars($row['direccion_referencia']) ?>
                                </div>
                                <div class="mb-3">
                                    <strong>Fecha de los hechos:</strong><br><?= htmlspecialchars($row['fecha_hechos']) ?>
                                </div>

                                <div class="bg-secondary text-white px-3 py-2 mb-3"><strong>DESCRIPCIÓN DETALLADA</strong></div>
                                <div class="border p-3 bg-white mb-3" style="border-left: 4px solid #6c757d;">
                                    <?= nl2br(htmlspecialchars($row['descripcion'])) ?>
                                </div>

                                <div class="bg-secondary text-white px-3 py-2 mb-3"><strong>EVIDENCIAS</strong></div>
                                <?php
                                $id_actual = $row['id_denuncia'];
                                $sql_evidencias = "SELECT archivo_url FROM evidencias WHERE id_denuncia = $id_actual";
                                $res_evidencias = $conn->query($sql_evidencias);
                                $evidencias = [];
                                while ($ev = $res_evidencias->fetch_assoc()) {
                                    $evidencias[] = $ev['archivo_url'];
                                }
                                ?>

                                <?php if (count($evidencias) > 1): ?>
                                    <div id="carousel<?= $row['id_denuncia'] ?>" class="carousel slide mb-3" data-bs-ride="carousel">
                                        <div class="carousel-inner">
                                            <?php foreach ($evidencias as $i => $img): ?>
                                                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                                                    <img src="../backend/<?= $img ?>" class="d-block w-100 border" style="max-height: 300px; object-fit: contain;" alt="Evidencia <?= $i + 1 ?>">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?= $row['id_denuncia'] ?>" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Anterior</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#carousel<?= $row['id_denuncia'] ?>" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Siguiente</span>
                                        </button>
                                    </div>
                                <?php elseif (count($evidencias) === 1): ?>
                                    <div class="text-center mb-3">
                                        <img src="../backend/<?= $evidencias[0] ?>" class="img-fluid border" style="max-height: 300px;" alt="Evidencia">
                                    </div>
                                <?php else: ?>
                                    <p class="text-muted">No se adjuntaron evidencias.</p>
                                <?php endif; ?>

                                <div class="text-center small text-muted mt-4">
                                    Esta copia digital forma parte del Sistema de Denuncias Públicas. Fecha de emisión: <?= date("d/m/Y", strtotime($row['fecha_creacion'])) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

    <!-- footer -->
    <?php include 'templates/footer.php'; ?>
    <!-- foter -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>