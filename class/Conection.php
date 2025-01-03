<?php


class Conection {


    public static function connect(){
        try{
            $dsn = 'mysql:host=localhost;dbname=alojamientos;charset=utf8';
            $user = 'root';
            $pdo = new PDO($dsn, $user, "");
            return $pdo; 
        }catch(PDOException $e){
            echo "Error al conectarnos a la base de datos" . $e->getMessage();
            exit();
        }
    }
}