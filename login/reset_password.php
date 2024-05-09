<?php
// เรียกใช้คลาส UserDatabase จากไฟล์ config.php
require_once 'config.php';

// ตรวจสอบว่ามีการส่งค่าผ่านแบบ POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าที่ส่งมาจากฟอร์ม
    $username = $_POST['username'];
    $email = $_POST['email'];

    try {
        // สร้างอ็อบเจกต์ของคลาส UserDatabase
        $userDb = new UserDatabase();

        // เรียกใช้เมธอด forgotPassword เพื่อตรวจสอบข้อมูลผู้ใช้
        $userExists = $userDb->forgotPassword($username, $email);

        // ตรวจสอบว่ามีข้อมูลผู้ใช้ตรงกับ username และ email ที่ระบุหรือไม่
        if ($userExists) {
            // หากมีข้อมูลผู้ใช้ตรงกัน ให้เรียกใช้หน้า reset_password.php
            header("Location: reset_password.php");
            exit;
        } else {
            // หากไม่มีข้อมูลผู้ใช้ตรงกัน ให้แสดงข้อความแจ้งเตือนและให้กลับไปยังหน้า forgot_password.php
            echo "<script>alert('ไม่พบบัญชีผู้ใช้ที่ตรงกับชื่อผู้ใช้และอีเมลที่ระบุ'); window.location.href = 'forgot_password.php';</script>";
        }
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล
        // จะแสดงข้อความของข้อผิดพลาด
        echo 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
}
?>
