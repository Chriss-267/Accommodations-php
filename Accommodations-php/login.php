<?php 
    //iniciamos la sesion
    session_start();
    require_once "./class/Authentication.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "./asset/nav.php";
        if(isset($_GET['error'])){
            echo "<p class = 'text-center mt-8 font-bold text-red-500'>".$_GET['error']."</p>";
        }
    ?>
    <div class="md:flex md:gap-4 md:justify-center md:items-center w-[80vw] md:mt-10 mx-auto">
        <img src="asset/img/place.jpg" class="md:w-[40vw]" alt="login">
        <div class="shadow-xl p-4 rounded-lg mt-4 md:w-[40vw] w-full">
            <h1 class="text-center font-bold text-4xl mb-10">Log In</h1>
            <form action="" method="POST" >

                <label class="text-xl block font-bold uppercase text-gray-500" for="email">Correo</label>
                <input class="border border-black w-full p-1 rounded mb-4" placeholder="Email" type="text" name="email" id="email">

                <label class="text-xl block font-bold uppercase text-gray-500" for="password">Contraseña</label>
                <input class="border border-black w-full p-1 rounded" placeholder="Password" type="password" name="password" id="password">

                <input type="submit" value="Iniciar Sesion" class="bg-blue-500 text-white p-2 rounded-lg mt-4 cursor-pointer hover:bg-blue-600 w-full">
            </form>
        </div>
        
    </div>

    <?php 
        if(isset($_POST['email'], $_POST['password'])){
            $email = $_POST['email'];
            Authentication::login($email);
        }
    ?>
</body>
</html>