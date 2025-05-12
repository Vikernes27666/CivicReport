<?php
include '../bd/conexion.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_denuncia'])) {
    $id = intval($_POST['id_denuncia']);

    $stmt = $conn->prepare("UPDATE denuncias SET estado = 'cancelado' WHERE id_denuncia = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "✅ Denuncia retirada con éxito.";
    } else {
        $_SESSION['mensaje'] = "❌ Error al retirar la denuncia.";
    }

    $stmt->close();
    $conn->close();
}

header("Location: ../../frontend/seg_denuncia.php");
exit;
