<?php
// ตรวจสอบค่า 'lang' ที่ส่งมาใน URL
$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en'; // ถ้าไม่ได้ส่งค่ามาให้ใช้ภาษาอังกฤษเป็นค่าเริ่มต้น

// สร้าง array หรือ object ที่มีข้อมูลเนื้อหาภาษาต่าง ๆ
$contents = array(
    'th' => array(
        'home' => 'หน้าแรก',
        'about' => 'เกี่ยวกับเรา',
        'services' => 'บริการ',
        'contact' => 'ติดต่อ'
    ),
    'en' => array(
        'home' => 'Home',
        'about' => 'About',
        'services' => 'Services',
        'contact' => 'Contact'
    )
);

// ใช้ค่า 'lang' ที่ได้รับเพื่อเลือกเนื้อหาภาษาที่ต้องการแสดง
$menu = $contents[$lang];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <!-- เชื่อมโยงไฟล์ CSS ของ Bootstrap -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <header class="container-fluid bg-dark text-white py-4">
        <div class="container">
            <h1>Welcome to My Website</h1>
            <nav>
                <ul class="nav">
                    <!-- เรียกใช้งานเนื้อหาภาษาจากตัวแปร $menu -->
                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $menu['home']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $menu['about']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $menu['services']; ?></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><?php echo $menu['contact']; ?></a></li>
                    <!-- เพิ่มปุ่มเปลี่ยนภาษา -->
                    <li class="nav-item">
                        <a class="nav-link" href="?lang=th">TH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?lang=en">EN</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- ส่วนเนื้อหาของเว็บไซต์ -->
    <!-- คุณสามารถเพิ่มเงื่อนไขในส่วนนี้เพื่อแสดงเนื้อหาในภาษาที่เลือกได้ -->

    <footer class="container-fluid bg-dark text-white py-4">
        <div class="container">
            <p>&copy; 2024 My Website. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- เชื่อมโยงไฟล์ JavaScript ของ Bootstrap -->
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
