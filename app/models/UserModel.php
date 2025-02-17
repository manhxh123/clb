<?php
require_once __DIR__ . "/../../config/database.php";

class UserModel {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getUser($username) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Debug: Kiểm tra xem có lấy được user không
        if (!$user) {
            error_log("Không tìm thấy user: $username");
        }
        return $user;
    }
    
    public function verifyPassword($password, $hash) {
        // Kiểm tra nếu mật khẩu trong DB không được mã hóa
        if (!password_get_info($hash)['algo']) {
            return $password === $hash; // So sánh trực tiếp nếu chưa mã hóa
        }
        return password_verify($password, $hash);
    }
}
?>