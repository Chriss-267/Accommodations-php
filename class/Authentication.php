<?php

require_once 'Conection.php';

class Authentication {

    public static function register($username, $email, $password, $role = 'user') {
        $pdo = Conection::connect();
        $query = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
        $query->bindParam(':username', $username);
        $query->bindParam(':email', $email);
        $query->bindParam(':password', $password);
        $query->bindParam(':role', $role);
        $query->execute();

        // Obtener el ID del usuario recién creado
        $userId = $pdo->lastInsertId();

        // Iniciar sesión
        session_start();

        // Crear sesiones para el usuario
        $_SESSION['id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        // Redirigirnos a una vista
        header("location: PostUser.php");
        exit();
    }

    public static function login($email, $password) {
        $pdo = Conection::connect();
        $query = $pdo->prepare("SELECT id, username, email, role, password FROM users WHERE email = :email");
        $query->bindParam(':email', $email);
        $query->execute();
    
        $user = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role']; // Guardar el rol en la sesión
    
            header("location: PostUser.php");
            exit();
        } else {
            return "Credenciales incorrectas.";
        }
    }
    

    public static function logout() {
        // Iniciar sesión
        session_start();

        // Destruir la información del usuario
        session_destroy();

        // Destruir las variables de las sesiones
        session_unset();
        header("location: index.php");
        exit;
    }

    // Verificando si la sesión existe
    public static function verifySession() {
        session_start();

        if (!isset($_SESSION['id'])) {
            header("location: login.php?error=Debes iniciar sesión");
            exit;
        }
    }

    // Verificar si el usuario es administrador
    public static function isAdmin() {
        session_start();
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
}
