<?php

$connetion = mysqli_connect("localhost", "root", "", "ferre2");

if($_SERVER['REQUEST_METHOD'] == "POST"){

$nit = $_POST['nit'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];

$sql = "INSERT INTO cliente (Nombre, Direccion, NIT) VALUES ('$nombre', '$direccion', '$nit' )"; 
mysqli_query($connetion, $sql);

$NewID = mysqli_insert_id($connetion);
$NewTable = "SELECT * FROM cliente WHERE IdCliente = $NewID";
$Newdatos = mysqli_query($connetion, $NewTable);

}
//////////  CLIENT4//////////
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>Cliente</h1>
    <form method="POST">
        Ingrese Nombre 
        <input type="text" name="nombre" required>
        <br><br>
        Ingrese Direccion
        <input type="text" name="direccion" required>
        <br><br>
        Ingrese NIT 
        <input type="text" name="nit" required>
        <br><br>
        <input type="submit" value="Precioname">
        
    </form>
    <a href="Principal.php">
            <button>Salir</button>
        </a>
    <br>
</body>
</html>

<?php 
if(isset($Newdatos)&& $Newdatos){

while($fila = mysqli_fetch_assoc($Newdatos)){
    echo $fila ['Nombre']. "<br>";
    echo $fila ['Direccion']. "<br>";
    echo $fila ['NIT'] . "<br>";
}
}
?>