<?php
require_once __DIR__ . "/app/controllers/LoginController.php";

$controller = new LoginController();

$action = $_GET['action'] ?? 'showLoginForm';

switch ($action) {
    case 'showLoginForm':
        $controller->showLoginForm();
        break;
    case 'login':
        $controller->login();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
?>