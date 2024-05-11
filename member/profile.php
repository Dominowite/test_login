<?php 
//profile.php

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

        // เรียกใช้เมธอด getUserById เพื่อดึงข้อมูลผู้ใช้
        $userData = $memberDb->getUserById($_SESSION['user_id']);
        $firstName = $userData['first_name'];
        $lastName = $userData['last_name'];
        $birthDate = $userData['birth_date'];
        $address = $userData['address'];
        // สร้าง URL สำหรับรูปภาพโปรไฟล์
        $profileImage = "img/user_image.png"; // เปลี่ยนเป็น URL ของรูปภาพจริง
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // ตรวจสอบว่ามีการส่งข้อมูลแก้ไขโปรไฟล์มาหรือไม่
  if (isset($_POST['firstName'])) {
      // รับค่าข้อมูลที่ส่งมาจากแบบฟอร์ม
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $birthDate = $_POST['birthDate'];
      $address = $_POST['address'];
      
      // ดำเนินการอัพเดทโปรไฟล์ของผู้ใช้
      try {
          // สร้างตัวแปรเก็บข้อมูลที่จะอัปเดต
          $updatedData = array(
              'first_name' => $firstName,
              'last_name' => $lastName,
              'birth_date' => $birthDate,
              'address' => $address,
          );
          // ดำเนินการอัพเดตโปรไฟล์
          $memberDb->updateUserProfile($_SESSION['user_id'], $updatedData['first_name'], $updatedData['last_name'], $updatedData['birth_date'], $updatedData['address']);
          // หากอัพเดทโปรไฟล์สำเร็จ ให้เปลี่ยนเส้นทาง URL หรือดำเนินการตามที่คุณต้องการ
          header("Location: profile.php");
          exit;
      } catch (Exception $e) {
          // หากเกิดข้อผิดพลาดในการอัพเดทโปรไฟล์ ให้แสดงข้อความผิดพลาดหรือดำเนินการตามที่คุณต้องการ
          echo 'เกิดข้อผิดพลาดในการอัพเดทโปรไฟล์: ' . $e->getMessage();
      }
  } else {
      // หากข้อมูลที่ส่งมาไม่ครบถ้วน ให้แสดงข้อความผิดพลาดหรือดำเนินการตามที่คุณต้องการ
      echo 'ข้อมูลไม่ครบถ้วน';
  }
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

<!-- Content -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <img id="profileImage" src="<?php echo $profileImage; ?>" alt="Profile Image" style="width:100%">
                <h1><?php echo $firstName . ' ' . $lastName; ?></h1>
                <p><?php echo $birthDate; ?></p>
                <p><?php echo $address; ?></p>

                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">อัพเดทโปรไฟล์</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Form -->
<div id="editProfileModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">แก้ไขโปรไฟล์</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="editProfileForm" enctype="multipart/form-data" action="" method="post">
          <div class="mb-3">
            <!-- เพิ่ม element <img> เพื่อแสดงรูปภาพตัวอย่าง -->
            <img id="previewImage" src="img/user_image.png" alt="Preview Image" style="width:100%">
            <label for="profileImage" class="form-label">รูปโปรไฟล์</label>
            <input type="file" class="form-control" id="profileImage" name="profileImage" accept=".jpg, .jpeg, .png">
            <!-- เพิ่มปุ่มสำหรับแสดงตัวอย่างรูปภาพ -->
            <button type="button" class="btn btn-secondary" id="previewImageButton">แสดงตัวอย่างรูปภาพ</button>
          </div>
          <div class="mb-3">
            <label for="firstName" class="form-label">ชื่อ</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $firstName; ?>">
          </div>
          <div class="mb-3">
            <label for="lastName" class="form-label">นามสกุล</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $lastName; ?>">
          </div>
          <div class="mb-3">
            <label for="birthDate" class="form-label">วันเกิด</label>
            <input type="date" class="form-control" id="birthDate" name="birthDate" value="<?php echo $birthDate; ?>">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">ที่อยู่</label>
            <textarea class="form-control" id="address" name="address"><?php echo $address; ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/9bf0ae86c0.js" crossorigin="anonymous"></script>

</body>
</html>
