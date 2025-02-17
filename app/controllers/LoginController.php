<?php
require_once __DIR__ . "/../models/UserModel.php";

class LoginController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function showLoginForm() {
        require_once __DIR__ . "/../views/Login.php";
    }

    public function login() {
        session_start();
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            header("Location: index.php?action=showLoginForm&error=Vui lòng nhập đầy đủ thông tin!");
            exit();
        }

        $user = $this->userModel->getUser($username);
        
        // Debug: Kiểm tra user lấy từ database
        if (!$user) {
            error_log("User không tồn tại: $username");
        }
        
        if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php?action=dashboard");
            exit();
        } else {
            header("Location: index.php?action=showLoginForm&error=Sai tài khoản hoặc mật khẩu!");
            exit();
        }
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: index.php?action=showLoginForm");
            exit();
        }
        require_once __DIR__ . "/../views/home.php";
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=showLoginForm");
        exit();
    }
}
?>
