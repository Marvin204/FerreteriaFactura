<?php
$connetion = mysqli_connect("localhost", "root", "", "ferre2");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nit = $_POST['nit'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];

    $sql = "INSERT INTO cliente (Nombre, Direccion, NIT) VALUES ('$nombre', '$direccion', '$nit')";
    mysqli_query($connetion, $sql);

    $NewID = mysqli_insert_id($connetion);
    $NewTable = "SELECT * FROM cliente WHERE IdCliente = $NewID";
    $Newdatos = mysqli_query($connetion, $NewTable);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cliente</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">

                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h1 class="h3 mb-4 text-center">Cliente</h1>

                        <form method="POST" class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label class="form-label">Ingrese Nombre</label>
                                <input type="text" name="nombre" class="form-control" required>
                                <div class="invalid-feedback">Ingresa el nombre.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ingrese Dirección</label>
                                <input type="text" name="direccion" class="form-control" required>
                                <div class="invalid-feedback">Ingresa la dirección.</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Ingrese NIT</label>
                                <input type="text" name="nit" class="form-control" required>
                                <div class="invalid-feedback">Ingresa el NIT.</div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="Principal.php" class="btn btn-outline-secondary">Salir</a>
                            </div>
                        </form>
                    </div>
                </div>

                <?php if (isset($Newdatos) && $Newdatos): ?>
                    <?php while ($fila = mysqli_fetch_assoc($Newdatos)): ?>
                        <div class="alert alert-success mt-4 shadow-sm" role="alert">
                            <h5 class="alert-heading mb-2">Registro guardado</h5>
                            <div><strong>Nombre:</strong> <?php echo $fila['Nombre']; ?></div>
                            <div><strong>Dirección:</strong> <?php echo $fila['Direccion']; ?></div>
                            <div><strong>NIT:</strong> <?php echo $fila['NIT']; ?></div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS (para validación y componentes) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
