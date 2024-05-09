<?php
// เริ่ม session
session_start();

// ล้างข้อมูล session ทั้งหมด
$_SESSION = array();

// ลบ session cookie โดยการตั้งค่าหมดอายุลบเป็นจริง
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// ทำลาย session
session_destroy();

// ลิ้งค์กลับไปยังหน้าหลักหรือหน้าที่ต้องการหลังจากออกจากระบบ
header("location: index.php");
exit;
?>
