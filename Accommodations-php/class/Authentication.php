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
        header("location: userAccount.php");
        exit();
    }

    public static function login($email) {
        $pdo = Conection::connect();
        $query = $pdo->prepare("SELECT id, username, email, rol FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
    
        $user = $query->fetch(PDO::FETCH_ASSOC); 
    
        if($user){
            //crear sesiones para el usuario
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['rol'] = $user['rol'];
    
            //redirigir a la vista de cuenta de usuario
            header("location: userAccount.php");
            exit();
        } else {
            echo "Credenciales Incorrectas";
        }
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