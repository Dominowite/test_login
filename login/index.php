<?php
// เรียกใช้คลาส UserDatabase จากไฟล์ config.php
require_once 'config.php';

// สร้างอ็อบเจกต์ของคลาส UserDatabase
$userDb = new UserDatabase();

// เรียกใช้เมธอด isUserLoggedIn() เพื่อตรวจสอบสถานะการล็อกอินของผู้ใช้
if ($userDb->isUserLoggedIn()) {
    // ถ้าผู้ใช้ล็อกอินอยู่แล้ว ให้เปลี่ยนเส้นทางไปยังหน้าหลักของผู้ใช้
    header("Location: ../member/index.php");
    exit;
}

// ตรวจสอบว่ามีการส่งค่าผ่านแบบ POST หรือไม่
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าที่ส่งมาจากฟอร์ม
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // เรียกใช้เมธอด loginUser เพื่อตรวจสอบข้อมูลผู้ใช้
        $userDb->loginUser($username, $password);
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาดในการเชื่อมต่อฐานข้อมูล
        // จะแสดงข้อความของข้อผิดพลาด
        $error_message = 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login_style.css">
</head>
<body>

<div class="container">
    <form class="form-signin" method="POST" action="">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <?php if(isset($error_message)): ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error_message; ?>
    </div>
    <p>If you forgot your password, <a href="forgot_password.php">click here</a> to reset it.</p>
<?php endif; ?>

        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        
        
    </form>

    <div class="text-center mt-3">
        <p>Don't have an account? <a href="register.php">Register</a></p>
    </div>

    <div class="text-center mt-3">
        <p>Back to <a href="../index.php">Home</a></p>
    </div>
</div>



<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
