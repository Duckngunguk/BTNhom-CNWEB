<?php
require_once "models/User.php";

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && $user['password'] == $password) {
            $_SESSION['user'] = $user;
        $_SESSION['user'] = [
    'id' => $user['id'],
    'username' => $user['username'],
    'email' => $user['email'],
    'role' => $user['role']
];
            exit;

        } else {
            $error = "Sai email hoặc mật khẩu";
        }
    }
    require_once "views/auth/login.php";
    }

    public function handleLogin() {
        $user = User::findByUsername($_POST['username']);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
        } else {
            echo "Sai tài khoản hoặc mật khẩu";
        }
    }

    public function register() {
        require_once "views/auth/register.php";
    }

    public function handleRegister() {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        User::create([
            $_POST['username'],
            $_POST['email'],
            $password,
            $_POST['fullname'],
            0
        ]);
        header("Location: index.php?controller=auth&action=login");
    }

    public function logout() {
        session_destroy();
        header("Location: ?controller=auth&action=login");
    }
}
