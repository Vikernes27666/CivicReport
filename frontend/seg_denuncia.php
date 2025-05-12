<?php
include '../backend/bd/conexion.php';
session_start();

$id_usuario = $_SESSION['id_usuario'] ?? null;
if ($id_usuario):
  $stmtHistorial = $conn->prepare("SELECT codigo_seguimiento, titulo, categoria, departamento, provincia, distrito, fecha_creacion, estado 
                                   FROM denuncias 
                                   WHERE id_usuario = ?
                                   ORDER BY fecha_creacion DESC");
  $stmtHistorial->bind_param("i", $id_usuario);
  $stmtHistorial->execute();
  $historial = $stmtHistorial->get_result();
endif;
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <title>Consultar Denuncia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../backend/css/inicio.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../backend/css/seg_denuncia.css">
</head>

<body>

  <!-- navbar_usuario.php -->
  <?php include 'templates/navbar.php'; ?>
  <!-- navbar_usuario.php -->

  <div class="container py-5">
    <h2 class="text-center text-primary mb-4 fw-bold">🔎 Consultar Denuncias</h2>

    <!-- aqui la busqueda -->
    <div class="search-bar mx-auto mb-5" style="max-width: 600px;">
      <form method="GET" action="">
        <label for="codigo_seguimiento" class="form-label fw-semibold">Ingrese el código de seguimiento</label>
        <div class="input-group">
          <input type="text" class="form-control" name="codigo_seguimiento" id="codigo_seguimiento" placeholder="Ej. 9F2A1D7B3C" required>
          <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
      </form>
    </div>

    <?php if (isset($_SESSION['mensaje'])): ?>
      <div class="alert alert-info text-center">
        <?= $_SESSION['mensaje'] ?>
        <?php unset($_SESSION['mensaje']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['codigo_seguimiento'])):
      $codigo = strtoupper(trim($_GET['codigo_seguimiento']));
      $stmt = $conn->prepare("SELECT id_denuncia, titulo, estado, fecha_creacion 
                        FROM denuncias 
                        WHERE codigo_seguimiento = ? AND id_usuario = ?
                        ORDER BY fecha_creacion DESC");
      $stmt->bind_param("si", $codigo, $id_usuario);

      $stmt->execute();
      $result = $stmt->get_result();
    ?>

      <!-- los resultados que botará -->
      <h4 class="">Resultados para: <span class="text-primary"><?= htmlspecialchars($codigo) ?></span></h4>
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <div class="result-card">
            <div class="row">
              <div class="col-md-8">
                <h5 class="mb-2 text-dark"><?= htmlspecialchars($row['titulo']) ?></h5>
                <p class="mb-1"><strong>Estado:</strong> <?= htmlspecialchars($row['estado']) ?></p>
                <p class="mb-1"><strong>Fecha:</strong> <?= date("d/m/Y", strtotime($row['fecha_creacion'])) ?></p>
                <p class="mb-0"><strong>ID Denuncia:</strong> <?= $row['id_denuncia'] ?></p>
              </div>
              <div class="col-md-4 text-end">
                <button
                  class="btn btn-outline-primary me-2 mb-2"
                  data-bs-toggle="modal"
                  data-bs-target="#modalEstado"
                  data-id="<?= $row['id_denuncia'] ?>"
                  data-estado="<?= $row['estado'] ?>"
                  data-fecha="<?= $row['fecha_creacion'] ?>">
                  Consultar Estado
                </button>
                <?php if (strtolower(trim($row['estado'])) === 'pendiente'): ?>
                  <form action="../backend/controlador/retirarDenuncia.php" method="POST" onsubmit="return confirm('¿Estás seguro de retirar esta denuncia?')" style="display:inline;">
                    <input type="hidden" name="id_denuncia" value="<?= $row['id_denuncia'] ?>">
                    <button type="submit" class="btn btn-outline-danger mb-2">Retirar Denuncia</button>
                  </form>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <div class="alert alert-warning">No se encontraron denuncias con ese código.</div>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <!-- modal del proces0 -->
  <div class="modal fade" id="modalEstado" tabindex="-1" aria-labelledby="modalEstadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="modalEstadoLabel">Seguimiento de tu Denuncia</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <div class="timeline-container d-flex justify-content-between position-relative mb-3" id="lineaSeguimiento">
          </div>
          <div id="fechaInicio" class="text-center text-muted small"></div>
        </div>
      </div>
    </div>
  </div>

  <!-- la tabla para el historail de las denuncias. -->
  <div class="container mb-5">
    <?php if (isset($historial) && $historial->num_rows > 0): ?>
      <h4 class="mb-3 text-secondary fw-bold">📄 Historial de Denuncias</h4>
      <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
          <thead class="table-primary text-center">
            <tr>
              <th>Código</th>
              <th>Título</th>
              <th>Categoría</th>
              <th>Departamento</th>
              <th>Provincia</th>
              <th>Distrito</th>
              <th>Fecha de creación</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php while ($fila = $historial->fetch_assoc()): ?>
              <tr>
                <td><?= htmlspecialchars($fila['codigo_seguimiento']) ?></td>
                <td><?= htmlspecialchars($fila['titulo']) ?></td>
                <td><?= htmlspecialchars($fila['categoria']) ?></td>
                <td><?= htmlspecialchars($fila['departamento']) ?></td>
                <td><?= htmlspecialchars($fila['provincia']) ?></td>
                <td><?= htmlspecialchars($fila['distrito']) ?></td>
                <td><?= date("d/m/Y", strtotime($fila['fecha_creacion'])) ?></td>
                <td>
                  <?php
                  $estado = strtolower($fila['estado']);
                  $badge = match ($estado) {
                    'pendiente' => 'warning',
                    'aprobada' => 'success',
                    'rechazada' => 'danger',
                    'cancelado' => 'secondary',
                    default => 'light'
                  };
                  ?>
                  <span class="badge bg-<?= $badge ?>"><?= ucfirst($estado) ?></span>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>

  <!-- footer -->
  <?php include 'templates/footer.php'; ?>
  <!-- foter -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../backend/js/seg_denuncia.js"></script>

</body>

</html>