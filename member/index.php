<?php
// เรียกใช้คลาส MemberDatabase จากไฟล์ config.php
require_once 'config.php';

// เริ่ม session เพื่อเก็บข้อมูลผู้ใช้
session_start();

// ตรวจสอบว่ามีค่า user_id ใน session หรือไม่
if (isset($_SESSION['user_id'])) {
    // สร้างอ็อบเจกต์ของคลาส MemberDatabase
    $memberDb = new MemberDatabase();

    try {
        // เรียกใช้เมธอด checkUserRole เพื่อตรวจสอบสิทธิ์ของผู้ใช้
        $role = $memberDb->checkUserRole($_SESSION['user_id']);

        // หากเป็น admin หรือ member ให้แสดงเนื้อหาหน้านี้
        // ในที่นี้ไม่ต้องทำอะไรเพิ่มเนื่องจากเป็นหน้า index.php ของสมาชิก
    } catch (Exception $e) {
        // หากเกิดข้อผิดพลาดในการตรวจสอบสิทธิ์ของผู้ใช้
        // ให้แสดงข้อความของข้อผิดพลาด
        echo 'เกิดข้อผิดพลาด: ' . $e->getMessage();
    }
} else {
    // หากไม่มี user_id ใน session ให้เด้งไปยังหน้า login
    header("Location: ../login/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Area</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/member_style.css">
</head>
<body>

<?php include 'layout/navbar.php'; ?>

<div class="container mt-5">
    <h1>Welcome to the Member Area</h1>
    <!-- เพิ่มเนื้อหาหรือรายการที่ต้องการ -->
</div>

<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
