<?php
// forgot_password.php
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
        $userDb->forgotPassword($username, $email);
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล
        // จะแสดงข้อความของข้อผิดพลาด
        echo 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/forgot_password_style.css">
</head>
<body>

<div class="container">
    <form class="form-signin" method="POST" action="">
        <h1 class="h3 mb-3 fw-normal">Forgot Password</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($userExists) && !$userExists) {
            echo "<div class='alert alert-danger' role='alert'>ไม่พบบัญชีผู้ใช้ที่ตรงกับชื่อผู้ใช้และอีเมลที่ระบุ</div>";
        }
        ?>

        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            <label for="email">Email address</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">ค้นหาในระบบ</button>

        <div class="text-center mt-3">
            <p>Remember your password? <a href="index.php">Sign in</a></p>
        </div>
    </form>
</div>


<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
