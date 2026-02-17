<?php
$connectio = mysqli_connect("localhost", "root", "", "ferre1");

$id = "";
$name = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id= $_POST['id'];
    $adres = $_POST['Adress'];
    $numphone = $_POST['numphone'];
    $name = $_POST['name'];

    $sql = "INSERT INTO cliente (Id_cliente, Direccion, Telefono, Nombre) VALUES('$id', '$adres', '$numphone', '$name')";

    $dato = mysqli_query($connectio, $sql);


    // if($dato){
    //     echo "inside data" . $dato;
    // }
    // else
    //     {
    //         echo "exit devil ";
    //     }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
    <br>
    <form method="POST">
        Enter name
        <input type="text" name="name" required>
        <br><br>
        Ingrese code
        <input type="number" name="id" required>
        <br><br>
         Ingrese Adress
        <input type="text" name="Adress" required>
        <br><br>
         Ingrese number phone
        <input type="text" name="numphone" required>
        <br><br>
        <input type="submit" value="Ingresar">
    </form>
    <br>
</body>
</html>

<?php 

if($id != "" && $name != ""){
    echo "ID: ". $id. "<br>";
    echo "name: ". $name;

}

?>