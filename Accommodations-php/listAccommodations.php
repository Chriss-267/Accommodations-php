<?php
    require_once "./class/Accommodations.php";
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
    
    ?>
    <h1 class="font-bold text-4xl text-center mt-10">Experiences</h1>

    <div class="flex justify-center mt-10">
        <div class="w-[80vw] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php 
                    require_once './class/Accommodations.php';
                    $accommodations = Accommodations::getAccommodations();

                    foreach($accommodations as $accommodation){
                        echo '
                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <img src="' . $accommodation["image_url"] . '" alt="' . $accommodation["name"] . '" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h2 class="font-bold text-xl mb-2">' . $accommodation["name"] . '</h2>
                                <p class="text-gray-700 text-base">' . $accommodation["description"] . '</p>
                                <p class="text-gray-900 font-bold mt-4">$' . $accommodation["price"] . ' por noche</p>
                            </div>
                        </div>';
                    }
                ?>
        </div>
    </div>
    
</body>
</html>