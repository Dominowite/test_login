<?php
// login/controller/forgot_password_controller.php
// เรียกใช้คลาส UserDatabase จากไฟล์ config.php
require_once '../config.php';

// ตรวจสอบว่ามีการส่งค่าผ่านแบบ POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    try {
        $userDb = new UserDatabase();
        // เรียกใช้เมธอด forgotPassword() จาก UserDatabase
        $userFound = $userDb->forgotPassword($username, $email);

        if ($userFound) {
            // หากพบผู้ใช้ ทำการเปลี่ยนเส้นทางไปยังหน้า reset_password.php
            header("Location: ../views/reset_password.php");
            exit;
        } else {
            // หากไม่พบผู้ใช้ แสดงข้อความเตือนและให้ผู้ใช้กลับไปยังหน้า forgot_password.php
            echo "<script>alert('ไม่พบบัญชีผู้ใช้ที่ตรงกับชื่อผู้ใช้และอีเมลที่ระบุ'); window.location.href = '../views/forgot_password.php';</script>";
        }
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาดในการค้นหาผู้ใช้ แสดงข้อความเตือนและให้ผู้ใช้กลับไปยังหน้า forgot_password.php
        echo 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
}


?>
