<?php
require_once './class/Authentication.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    Authentication::register($username, $email, $password);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>

    <?php 
        require_once "./asset/nav.php";
    ?>
    <div class="md:flex md:gap-4 md:justify-center md:items-center w-[80vw] md:mt-10 mx-auto">
        <img src="asset/img/accommodation.jpg" class="md:w-[40vw]" alt="login">
        <div class="shadow-xl p-4 rounded-lg mt-10 md:w-[40vw] w-full">
            <h1 class="text-center font-bold text-4xl mb-10">Registrarse</h1>
            <form action="" method="POST" >
                <label class="text-xl block font-bold uppercase text-gray-500"  for="username">Username</label>
                <input class="border border-black w-full p-1 rounded mb-4" placeholder="Username" type="text" name="username" id="username">

                <label class="text-xl block font-bold uppercase text-gray-500" for="email">Correo</label>
                <input class="border border-black w-full p-1 rounded mb-4" placeholder="Email" type="text" name="email" id="email">

                <label class="text-xl block font-bold uppercase text-gray-500" for="password">Contraseña</label>
                <input class="border border-black w-full p-1 rounded" placeholder="Password" type="text" name="password" id="password">

                <input type="submit" value="Iniciar Sesion" class="bg-blue-500 text-white p-2 rounded-lg mt-4 cursor-pointer hover:bg-blue-600 w-full">
            </form>
        </div>
        
    </div>
    

    
</body>
</html>