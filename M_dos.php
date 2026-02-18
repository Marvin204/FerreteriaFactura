<?php

use Dom\Mysql;

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
</head>
<form method="POST">
    Nombre Producto
    <input type="text" name="name" required>
    <br><br>
    Precio
    <input type="number" name="prise" required>
    <br><br>
    Cantidad
    <input type="number" name="amount" required>
    <br><br>
    <input type="submit" value="Ingresar">
    <br><br>
</form>
<body>
    <a href="Principal.php">
        <button>volver</button>
    </a>
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