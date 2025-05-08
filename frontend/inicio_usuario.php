<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal de Denuncias</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../backend/css/inicio.css">
    <link rel="stylesheet" href="../backend/css/registro.css">
</head>

<body>
    <!-- navbar_usuario.php -->
    <?php include 'navbar_usuario.php'; ?>
    <!-- navbar_usuario.php -->

    <?php
    if (isset($_SESSION['codigo_seguimiento'])) {
        $codigo = htmlspecialchars($_SESSION['codigo_seguimiento']);
        echo "
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Denuncia registrada',
                html: 'Tu denuncia ha sido enviada correctamente.<br><strong>Código de seguimiento:</strong> $codigo',
                confirmButtonText: 'Aceptar'
            });
        });
    </script>";
        unset($_SESSION['codigo_seguimiento']);
    }
    ?>

    <div class="container mt-4">
        <h2>Página principal</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>