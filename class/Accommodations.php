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
    public static function addAccommodation($name, $description, $price) {
        session_start();

        // Verificar si el usuario tiene rol de administrador
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            echo "Acceso denegado: Solo los administradores pueden agregar alojamientos.";
            exit();
        }

        $pdo = Conection::connect();

        $query = $pdo->prepare("INSERT INTO Accommodations (name, description, price) VALUES (:name, :description, :price)");
        $query->bindParam(':name', $name);
        $query->bindParam(':description', $description);
        $query->bindParam(':price', $price);

        if ($query->execute()) {
            return "Alojamiento agregado con éxito.";
        } else {
            return "Error al agregar el alojamiento.";
        }
    }
}
