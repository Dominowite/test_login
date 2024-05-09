<?php
// เรียกใช้ไฟล์ config.php เพื่อให้สร้างคลาส UserDatabase
require_once 'config.php';

// ตัวอย่างการใช้งานคลาส UserDatabase เพื่อเชื่อมต่อฐานข้อมูล
$userDB = new UserDatabase(); // สร้างอ็อบเจกต์ของคลาส UserDatabase

// เมื่อมีการส่งค่ามาจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับค่าจากฟอร์ม
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // เรียกใช้เมธอด registerUser เพื่อเพิ่มข้อมูลผู้ใช้ใหม่
    $userDB->registerUser($username, $email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register_style.css">
</head>
<body>

<div class="container">
    <form class="form-signup" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required>
            <label for="email">Email address</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>

        <button class="btn btn-lg btn-primary" type="submit">Register</button>
    </form>
</div>

<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
