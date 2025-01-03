<?php

require_once 'Conection.php';

class Authentication{

    public static function register($username, $email, $password) {
        $pdo = Conection::connect();
        $query = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->execute();

        // Obtener el ID del usuario recién creado
        $userId = $pdo->lastInsertId();

        // Iniciar sesión
        session_start();

        // Crear sesiones para el usuario
        $_SESSION['id'] = $userId;
        $_SESSION['username'] = $username;

        // Redirigirnos a una vista
        header("location: PostUser.php");
        exit();
    }

    public static function login($email)
    {
        $pdo = Conection::connect();
        $query = $pdo->prepare("SELECT id, username, email FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();

        $user = $query->fetch(PDO::FETCH_ASSOC); 

        if($user){
            //crear sesiones para el usuario
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['namename'];

            //redigirnos a una vista
            header("location: PostUser.php");
        }else{
            echo "Credenciales Incorrectas";
        }
    }

    public static function logout(){
        //iniciar sesion
        session_start();

        //destruir la informacion del usuario
        session_destroy();

        //destruir las variables de las sesiones
        session_unset();
        header("location: index.php");
        exit;
    }

    //verificando si la sesion existe
    public static function verifySession(){
        session_start();

        if(!isset($_SESSION['id'])){
            header("location: login.php?error=Debes iniciar sesion");
            exit;
        }
    }
}