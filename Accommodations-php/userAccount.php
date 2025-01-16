<?php
require_once "./class/Authentication.php";
require_once "./class/Accommodations.php";
Authentication::verifySession();


// Manejar la selección de alojamientos
if(isset($_POST['select_accommodation'])) {
    $accommodationId = $_POST['accommodation_id'];
    $userId = $_SESSION['id'];
    
    try {
        $pdo = Conection::connect();
        $stmt = $pdo->prepare("INSERT INTO user_selections (user_id, accommodation_id) VALUES (:user_id, :accommodation_id)");
        $stmt->execute([
            ':user_id' => $userId,
            ':accommodation_id' => $accommodationId
        ]);
        header("Location: userAccount.php?success=Alojamiento seleccionado correctamente");
    } catch(PDOException $e) {
        header("Location: userAccount.php?error=Error al seleccionar el alojamiento");
    }
}

// Manejar la eliminación de alojamientos
if(isset($_POST['remove_accommodation'])) {
    $accommodationId = $_POST['accommodation_id'];
    $userId = $_SESSION['id'];
    
    try {
        $pdo = Conection::connect();
        $stmt = $pdo->prepare("DELETE FROM user_selections WHERE user_id = :user_id AND accommodation_id = :accommodation_id");
        $stmt->execute([
            ':user_id' => $userId,
            ':accommodation_id' => $accommodationId
        ]);
        header("Location: userAccount.php?success=Alojamiento eliminado correctamente");
    } catch(PDOException $e) {
        header("Location: userAccount.php?error=Error al eliminar el alojamiento");
    }
}

// Obtener alojamientos seleccionados por el usuario
function getUserSelections($userId) {
    $pdo = Conection::connect();
    $stmt = $pdo->prepare("
        SELECT a.* 
        FROM accommodations a
        JOIN user_selections us ON a.id_accomodation = us.accommodation_id
        WHERE us.user_id = :user_id
    ");
    $stmt->execute([':user_id' => $userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Cuenta</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <?php require_once "./asset/nav.php"; ?>

    <div class="container mx-auto px-4 py-8">
        <div class = "md:flex md:justify-between">
            <h1 class="text-3xl font-bold mb-8">Mi Cuenta</h1>

                <?php
                     if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador') {
                        echo '<button>';
                        echo '<a href="addAccommodation.php" class="bg-blue-500 text-white py-2 px-2 rounded-lg mt-4 cursor-pointer hover:bg-blue-600 flex items-center">Agregar</a>';
                        echo '</button>';
                        } 
                ?>
                  
                  
                    
                
            
        </div>
        
        
        <?php if(isset($_GET['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Sección para mostrar todos los alojamientos disponibles -->
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Alojamientos Disponibles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $allAccommodations = Accommodations::getAccommodations();
                foreach($allAccommodations as $accommodation): 
                ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="<?php echo htmlspecialchars($accommodation['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($accommodation['name']); ?>"
                         class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2"><?php echo htmlspecialchars($accommodation['name']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($accommodation['description']); ?></p>
                        <p class="font-bold text-lg mb-4">$<?php echo number_format($accommodation['price'], 2); ?></p>
                        <form method="POST">
                            <input type="hidden" name="accommodation_id" value="<?php echo $accommodation['id_accomodation']; ?>">
                            <button type="submit" name="select_accommodation" 
                                    class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                Seleccionar
                            </button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- Sección para mostrar alojamientos seleccionados -->
        <section>
            <h2 class="text-2xl font-bold mb-4">Mis Alojamientos Seleccionados</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php
                $selectedAccommodations = getUserSelections($_SESSION['id']);
                if(empty($selectedAccommodations)): 
                ?>
                    <p class="text-gray-500">No has seleccionado ningún alojamiento todavía.</p>
                <?php 
                else:
                    foreach($selectedAccommodations as $accommodation): 
                ?>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="<?php echo htmlspecialchars($accommodation['image_url']); ?>" 
                         alt="<?php echo htmlspecialchars($accommodation['name']); ?>"
                         class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2"><?php echo htmlspecialchars($accommodation['name']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo htmlspecialchars($accommodation['description']); ?></p>
                        <p class="font-bold text-lg mb-4">$<?php echo number_format($accommodation['price'], 2); ?></p>
                        <form method="POST">
                            <input type="hidden" name="accommodation_id" value="<?php echo $accommodation['id_accomodation']; ?>">
                            <button type="submit" name="remove_accommodation" 
                                    class="w-full bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
                <?php 
                    endforeach;
                endif; 
                ?>
            </div>
        </section>
    </div>
</body>
</html>