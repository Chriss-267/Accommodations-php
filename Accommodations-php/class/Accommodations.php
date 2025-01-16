<?php

require_once "Conection.php";

class Accommodations {

    // Método existente para obtener alojamientos
    public static function getAccommodations() {
        $pdo = Conection::connect();

        $query = $pdo->query("SELECT * FROM Accommodations");

        $query->execute();

        $array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $array;
    }

    // Método nuevo para agregar alojamientos (solo administrador)
    public static function addAccommodation($name, $description, $price, $image) {
        session_start();

        // Verificar si el usuario tiene rol de administrador
        if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'administrador') {
            echo "Acceso denegado: Solo los administradores pueden agregar alojamientos.";
            exit();
        }

        $pdo = Conection::connect();

        $query = $pdo->prepare("INSERT INTO Accommodations (name, description, price, image_url) VALUES (:name, :description, :price, :image)");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':price', $price);
        $query->bindParam(':image', $image);

        if ($query->execute()) {
            header("location: userAccount.php");
            return "Alojamiento agregado con éxito.";
            
        } else {
            return "Error al agregar el alojamiento.";
        }
    }
}
