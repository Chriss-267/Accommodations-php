<?php
require_once 'class/Accommodations.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];


    $result = Accommodations::addAccommodation($name, $description, $price, $image);
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
    <?php
        require_once "./asset/nav.php";
    
    ?>
<div class="md:flex md:gap-4 md:justify-center md:items-center w-[80vw] md:mt-10 mx-auto">
<div class="shadow-xl p-4 rounded-lg mt-4 md:w-[40vw] w-full">
    <h1 class="text-center font-bold text-4xl mb-10">Agregar Alojamiento</h1>
    <form method="POST" action="">
        <label  class="text-xl block font-bold uppercase text-gray-500" for="name">Nombre:</label>
        <input class="border border-black w-full p-1 rounded mb-4" placeholder = "Nombre del Alojamiento" type="text" id="name" name="name" required>

        <label  class="text-xl block font-bold uppercase text-gray-500" for="description">Descripcion:</label>
        <input class="border border-black w-full p-1 rounded mb-4" placeholder = "Descripción del Alojamiento" type="text" id="description" name="description" required>

        <label  class="text-xl block font-bold uppercase text-gray-500" for="price">Precio:</label>
        <input class="border border-black w-full p-1 rounded mb-4" placeholder = "Precio del Alojamiento" type="number" id="price" name="price" required>

        <label  class="text-xl block font-bold uppercase text-gray-500" for="price">Imagen:</label>
        <input class="border border-black w-full p-1 rounded mb-4" placeholder = "Url de la imagen, Ejem hhtps://cloudinary/imagen.com" type="text" id="image" name="image" required>
        <button class="bg-blue-500 text-white p-2 rounded-lg mt-4 cursor-pointer hover:bg-blue-600 w-full" type="submit">Agregar</button>
    </form>
</div>
</div>
</body>
</html>
