<?php
require_once '../config.php';

class MemberDatabase extends Database {
    // คำสั่ง SQL สำหรับการเช็คสิทธิ์ของผู้ใช้
    public function checkUserRole($userId) {
        $query = "SELECT role FROM users WHERE id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            // เช็คสิทธิ์ของผู้ใช้
            $role = $userData['role'];
            if ($role == 'admin' || $role == 'member') {
                return $role; // ส่งค่าสิทธิ์ของผู้ใช้กลับ
            } else {
                // หากไม่ใช่ admin หรือ member ให้เด้งไปยังหน้า login
                header("Location: ../login/index.php");
                exit;
            }
        } else {
            throw new Exception("ไม่พบข้อมูลผู้ใช้");
        }
    }
}


// สร้างอ็อบเจกต์ของคลาส MemberDatabase เพื่อใช้ในการตรวจสอบสิทธิ์ของผู้ใช้


?>
