<?php
include '../bd/conexion.php';
session_start();

function limpiar($data)
{
    return htmlspecialchars(trim($data));
}

$id_tipo_denunciante = limpiar($_POST['id_denunciante']);
$nombre_denunciante = limpiar($_POST['nombre_denunciante']);

//ACA LO S INSERTO A LA TABLA DENUNCIANTES

$stmt_denunciante = $conn->prepare("INSERT INTO denunciantes (id_tipo_denunciante, nombre) VALUES (?, ?)");
$stmt_denunciante->bind_param("is", $id_tipo_denunciante, $nombre_denunciante);

if (!$stmt_denunciante->execute()) {
    die("❌ Error al insertar denunciante: " . $stmt_denunciante->error);
}

$id_denunciante = $stmt_denunciante->insert_id;

$titulo = limpiar($_POST['titulo']);
$descripcion = limpiar($_POST['descripcion']);
$categoria = limpiar($_POST['categoria']);
$especificar = limpiar($_POST['especificar_categoria'] ?? '');
$categoria_final = ($categoria === 'otros') ? $especificar : $categoria;

$fecha_hechos = limpiar($_POST['fecha_hechos']);
$departamento = limpiar($_POST['departamento']);
$provincia = limpiar($_POST['provincia']);
$distrito = limpiar($_POST['distrito']);
$direccion = limpiar($_POST['direccion_referencia']);
$latitud = limpiar($_POST['latitud']);
$longitud = limpiar($_POST['longitud']);
$es_anonimo = limpiar($_POST['es_anonimo']);

$id_usuario = $_SESSION['id_usuario'];
$codigo_seguimiento = strtoupper(bin2hex(random_bytes(5)));

// ESTOY INSERTANDO A LA TABLA DENUNCIAS
$stmt = $conn->prepare("INSERT INTO denuncias 
    (id_usuario, id_denunciante, titulo, descripcion, categoria, fecha_hechos, departamento, provincia, distrito, direccion_referencia, latitud, longitud, es_anonimo, codigo_seguimiento, estado, fecha_creacion) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pendiente', NOW())");

$stmt->bind_param("iissssssssssss", $id_usuario, $id_denunciante, $titulo, $descripcion, $categoria_final, $fecha_hechos, $departamento, $provincia, $distrito, $direccion, $latitud, $longitud, $es_anonimo, $codigo_seguimiento);

$_SESSION['codigo_seguimiento'] = $codigo_seguimiento;

if ($stmt->execute()) {
    $id_denuncia = $stmt->insert_id;

    $upload_dir = "../uploads/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // ACA SUBO A LA TBALA EVIDENCIAS YA RECUPERADO EL ID_DENUNCIA
    foreach ($_FILES['evidencias']['tmp_name'] as $key => $tmp_name) {
        if (!empty($tmp_name)) {
            $nombre_archivo = basename($_FILES['evidencias']['name'][$key]);
            $tipo_archivo = $_FILES['evidencias']['type'][$key];

            //limpiando para que las imegesns no tengan caracteres especiales ni espacio en sus nombres al momento de subirlo
            $nombre_archivo_limpio = preg_replace('/[^a-zA-Z0-9\._-]/', '_', pathinfo($nombre_archivo, PATHINFO_FILENAME));
            $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);

            $nombre_final = uniqid() . "_" . $nombre_archivo_limpio . "." . $extension;
            $ruta_relativa = "uploads/" . $nombre_final;
            $ruta_absoluta = $upload_dir . $nombre_final;

            if (move_uploaded_file($tmp_name, $ruta_absoluta)) {
                $stmt_evidencia = $conn->prepare("INSERT INTO evidencias (id_denuncia, tipo, archivo_url, fecha_subida) VALUES (?, ?, ?, NOW())");
                $stmt_evidencia->bind_param("iss", $id_denuncia, $tipo_archivo, $ruta_relativa);
                $stmt_evidencia->execute();
            }
        }
    }

    echo "
            <script>
            window.location.href = '../../frontend/inicio_usuario.php';
            </script>
        ";
} else {
    echo "❌ Error al registrar la denuncia: " . $stmt->error;
}

$conn->close();
