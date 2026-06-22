<?php

class AuthController
{

    public function __construct()
    {
        require_once __DIR__ . '/../Models/User.php';
    }

    public function doRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($email) || empty($password)) {
                die("Wszystkie pola są wymagane!");
            }

            $userModel = new User();
            if ($userModel->register($username, $email, $password)) {
                header("Location: index.php?action=login&success=1");
                exit;
            } else {
                echo "Database save error. Please make sure your email address is unique.";
            }
        }
    }

    public function doLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->login($email, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['username'];
                header("Location: index.php?action=home");
                exit;
            } else {
                header("Location: index.php?action=login&error=wrong_data");
                exit;
            }
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: index.php?action=home");
        exit;
    }
}
