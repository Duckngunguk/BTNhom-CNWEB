<?php
require_once __DIR__ . "/../models/User.php";

class AuthController {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $user = $userModel->findByUsernameOrEmail($_POST['username']);

            if ($user && password_verify($_POST['password'], $user['password'])) {

                // SET SESSION
                $_SESSION['user'] = [
                    'id'       => $user['id'],
                    'fullname' => $user['fullname'],
                    'role'     => $user['role']
                ];

                // REDIRECT THEO ROLE
                if ($user['role'] == 0) {
                    header("Location: /onlinecourse/student/dashboard");
                } elseif ($user['role'] == 1) {
                    header("Location: /onlinecourse/instructor/dashboard");
                } else {
                    header("Location: /onlinecourse/admin/dashboard");
                }
                exit;
            }

            $error = "Sai tài khoản hoặc mật khẩu";
        }

        require_once "views/auth/login.php";
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();

            $data = [
                'username' => $_POST['username'],
                'email'    => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                'fullname' => $_POST['fullname'],
                'role'     => 0 // mặc định là học viên
            ];

            $userModel->create($data);

            header("Location: /onlinecourse/auth/login");
            exit;
        }

        require_once "views/auth/register.php";
    }

    public function logout() {
        session_destroy();
        header("Location: /onlinecourse/");
        exit;
    }
}
