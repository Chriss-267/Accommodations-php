<?php

require_once "Conection.php";

class Accommodations {


public static function getAccommodations()
{
    $pdo = Conection::connect();

    $query = $pdo->query("SELECT * FROM Accommodations");

    $query->execute();

    $array = $query->fetchAll(PDO::FETCH_ASSOC); 
    return $array;
}

}