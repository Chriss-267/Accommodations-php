

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <nav class="flex justify-between items-center p-4 shadow-md">
        <a href="userAccount.php" class="text-red-400 font-bold text-3xl">Accommodations</a>
        <div class="flex gap-4">
            
            <?php
                if (isset($_SESSION['username'])){
                    echo "Bienvenido " . htmlspecialchars($_SESSION['username']);
                } else{
                    echo '<a href="register.php" class="font-bold">Sign in</a>';
                    echo '<a href="login.php" class="font-bold">Log in</a>';
                }
            ?>
                
            
        </div>
        
    </nav>
</body>
</html>