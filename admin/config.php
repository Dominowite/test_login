<?php
// ไฟล์ admin/config.php

require_once '../config.php';

class AdminDatabase extends Database {
    // เพิ่มเมธอดเพื่อตรวจสอบสิทธิ์เข้าถึงของผู้ใช้แอดมิน
    public function isAdmin() {
        // เริ่ม session หากยังไม่ได้เริ่ม session
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // ตรวจสอบว่ามีคีย์ 'user_id' ใน $_SESSION หรือไม่
        if (isset($_SESSION['user_id'])) {
            // ค้นหาข้อมูลผู้ใช้จากฐานข้อมูลโดยใช้ user_id ที่เก็บใน session
            $query = "SELECT * FROM users WHERE id = :user_id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // ตรวจสอบสิทธิ์ของผู้ใช้
            if ($user && $user['role'] === 'admin') {
                return true; // ผู้ใช้เป็นแอดมิน
            }
        }
        
        return false; // ผู้ใช้ไม่ใช่แอดมินหรือไม่มีการเข้าสู่ระบบ
    }
}
?>
