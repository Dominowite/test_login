<?php
// เรียกใช้ไฟล์ config.php เพื่อให้สร้างคลาส UserDatabase
require_once '../config.php';

// ตัวอย่างการใช้งานคลาส UserDatabase เพื่อเชื่อมต่อฐานข้อมูล
$userDB = new UserDatabase(); // สร้างอ็อบเจกต์ของคลาส UserDatabase

// เมื่อมีการส่งค่ามาจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password']; // เพิ่มฟิลด์ยืนยันรหัสผ่าน
    
    // ตรวจสอบว่ารหัสผ่านและรหัสผ่านยืนยันเหมือนกันหรือไม่
    if ($password !== $confirmPassword) {
        echo "<script>alert('รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน');</script>";
    } else {
        // เรียกใช้เมธอด registerUser เพื่อเพิ่มข้อมูลผู้ใช้ใหม่
        $userDB->registerUser($username, $email, $password);
    }
}
?>