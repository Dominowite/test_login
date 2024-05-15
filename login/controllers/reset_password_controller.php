<?php
//reset_password.php
// เรียกใช้คลาส UserDatabase จากไฟล์ config.php
require_once '../config.php';

// ตรวจสอบว่ามีการส่งค่าผ่านแบบ POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าที่ส่งมาจากฟอร์ม
    $email = $_POST['email'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // ตรวจสอบว่ารหัสผ่านใหม่และการยืนยันรหัสผ่านตรงกันหรือไม่
    if ($newPassword === $confirmPassword) {
        try {
            // สร้างอ็อบเจกต์ของคลาส UserDatabase
            $userDb = new UserDatabase();

            // เรียกใช้เมธอด changePassword เพื่อเปลี่ยนรหัสผ่าน
            $userDb->changePassword($email, $newPassword);

            // แจ้งผู้ใช้ว่ารหัสผ่านถูกเปลี่ยนแล้ว
            echo "<script>alert('รหัสผ่านถูกเปลี่ยนแล้ว'); window.location.href = 'index.php';</script>";
        } catch (Exception $e) {
            // หากเกิดข้อผิดพลาดในการเปลี่ยนรหัสผ่าน
            echo "<script>alert('เกิดข้อผิดพลาดในการเปลี่ยนรหัสผ่าน: " . $e->getMessage() . "'); window.location.href = 'reset_password.php';</script>";
        }
    } else {
        // หากรหัสผ่านใหม่และการยืนยันรหัสผ่านไม่ตรงกัน
        echo "<script>alert('รหัสผ่านใหม่และการยืนยันรหัสผ่านไม่ตรงกัน'); window.location.href = 'reset_password.php';</script>";
    }
}
?>