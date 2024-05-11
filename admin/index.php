<?php
// เรียกใช้งานไฟล์ config.php ที่มีคลาส AdminDatabase
require_once 'config.php';

// สร้างอ็อบเจกต์ของคลาส AdminDatabase
$adminDB = new AdminDatabase();

// ตรวจสอบสิทธิ์เข้าถึงว่าเป็นแอดมินหรือไม่
if (!$adminDB->isAdmin()) {
    // ถ้าไม่ใช่แอดมิน ให้เปลี่ยนเส้นทางไปยังหน้า login.php หรือหน้าที่เหมาะสม
    header("Location: ../member/index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Area</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admin_style.css">
</head>
<body>

<?php include 'layout/navbar.php'?>

<main>
     <div class="container-fluid">
<?php include 'layout/sidebar.php'?>
    <!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <h1 class="m-0">Welcome to the Admin Area</h1>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <!-- Add your content here -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- End of Content Wrapper -->
     </div>
    

</main>




<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
