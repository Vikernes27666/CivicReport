<?php
session_start();
include '../bd/conexion.php';

// Consulta a la base de datos para obtener las denuncias con latitud, longitud, descripción y dirección
$sql = "SELECT latitud, longitud, descripcion, direccion_referencia FROM denuncias";
$result = mysqli_query($conn, $sql);

// Array para almacenar las denuncias
$denuncias = array();

// Comprobar si hay resultados
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $denuncias[] = array(
            'lat' => $row['latitud'],
            'lng' => $row['longitud'],
            'descripcion' => $row['descripcion'],
            'direccion' => $row['direccion_referencia']
        );
    }
}

// Cerrar la conexión
mysqli_close($conn);

// Devolver las denuncias como JSON
echo json_encode($denuncias);
?>
