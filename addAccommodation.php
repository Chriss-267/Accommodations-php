<?php
require_once 'class/Accommodations.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $result = Accommodations::addAccommodation($name, $description, $price);
    echo $result;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Alojamiento</title>
</head>
<body>
    <h1>Agregar Alojamiento</h1>
    <form method="POST" action="">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="description">Descripcion:</label>
        <input type="text" id="description" name="description" required>
        <br>
        <label for="price">Precio:</label>
        <input type="number" id="price" name="price" required>
        <br>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>
