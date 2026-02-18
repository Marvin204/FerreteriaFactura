<?php 

$conection = mysqli_connect("localhost", "root", "", "ferre2");
if($_SERVER['REQUEST_METHOD'] == "POST"){

   $fecha = $_POST['date'];
   $vendedor = $_POST['seller'];

   $sql = "INSERT INTO venta (Fecha, Vendedor) VALUES ('$fecha', '$vendedor')";
   mysqli_query($conection, $sql);

    $NewID = mysqli_insert_id($conection);
    $NewTable = "SELECT * FROM venta WHERE IdVenta = $NewID";
    $Newdatos = mysqli_query($conection, $NewTable);

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Fecha
        <input type="date" name="date" required>
        <br><br>
        Vendedor
        <input type="text" name="seller" required>
        <br><br>
        <input type="submit" value="Ingresar">
        <a href="Principal.php">
            <button>Salir</button>
</body>
</html>

<?php
if(isset($Newdatos) && $Newdatos){
    while($fila = mysqli_fetch_assoc($Newdatos)){
        echo $fila ['Fecha']. "<br>";
        echo $fila ['Vendedor']. "<br>";
    }
}   
?>