<?php

$conectio = mysqli_connect("localhost", "root", "", "ferre2");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $nombre = ($_POST['name']);
    $precio = ($_POST['prise']);
    $cantidad = ($_POST['amount']);

    $sqlInsert = "INSERT INTO producto (Nombre, Precio, Stock) VALUES ('$nombre', '$precio', '$cantidad')";
    mysqli_query($conectio, $sqlInsert);

    $NewID = mysqli_insert_id($conectio);
    $sqlSelect = "SELECT * FROM producto Where Idproducto = $NewID";
    $NewTable = mysqli_query($conectio, $sqlSelect);
}
/////////// PRODUCTO //////////
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class= "container mt-5">
    <div class="col-md-4">
    <form method="POST">
        <h2 class="mb-4">PRODUCTO</h2>
    Nombre Producto
    <input type="text" name="name"  class="form-control"  required>
    <br><br>
    Precio
    <input type="number" name="prise" class="form-control" required>
    <br><br>
    Cantidad
    <input type="number" name="amount" class="form-control" required>
    <br><br>
    <input type="submit" class="btn btn-primary" value="Ingresar">
     <a href="Principal.php" class="btn btn-secondary">
        Volver
    </a>
</form>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>

<?php

if(isset($NewTable) && $NewTable){
    while($fila = mysqli_fetch_assoc($NewTable)){
        echo $fila ['Nombre']. "<br>";
        echo $fila ['Precio']. "<br>";
        echo $fila ['Stock'] . "<br>";
    }
}


?>