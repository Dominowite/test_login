<?php

// ../member/config.php
require_once '../login/config.php';
class MemberDatabase extends Database {
    // คำสั่ง SQL สำหรับการเช็คสิทธิ์ของผู้ใช้
    public function getUserById($userId) {
        $query = "SELECT u.*, p.* FROM users u JOIN profiles p ON u.id = p.user_id WHERE u.id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    


    public function updateUserProfile($userId, $first_name, $last_name, $birth_date, $address) {
        try {
            // เตรียมคำสั่ง SQL สำหรับอัพเดทข้อมูล
            $query = "UPDATE profiles 
                      SET birth_date = :birth_date, address = :address ,first_name = :first_name, last_name = :last_name 
                      WHERE user_id = :user_id";
            
            // เตรียม statement
            $stmt = $this->conn->prepare($query);
    
            // ผูกค่าพารามิเตอร์
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':birth_date', $birth_date);
            $stmt->bindParam(':address', $address);
    
            // ทำการอัพเดทข้อมูล
            $stmt->execute();
    
            // ไม่ควรปิดการเชื่อมต่อฐานข้อมูลที่นี่ เพราะคลาสยังต้องการใช้การเชื่อมต่อฐานข้อมูลในฟังก์ชันอื่น ๆ
            // $conn = null;
        } catch (PDOException $e) {
            // จัดการข้อผิดพลาด
            echo "เกิดข้อผิดพลาด: " . $e->getMessage();
        }
    }
    
    

public function checkUserRole($userId) {
    $query = "SELECT role FROM users WHERE id = :user_id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':user_id', $userId);
    $stmt->execute();
    $userData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($userData) {
        // เช็คสิทธิ์ของผู้ใช้
        $role = $userData['role'];
        if ($role == 'admin' || $role == 'member') {
            return $role; // ส่งค่าสิทธิ์ของผู้ใช้กลับ
        } else {
            // หากไม่ใช่ admin หรือ member ให้เกิดข้อผิดพลาด
            throw new Exception("ไม่พบข้อมูลสิทธิ์ผู้ใช้หรือสิทธิ์ไม่ถูกต้อง");
        }
    } else {
        // หากไม่พบข้อมูลผู้ใช้
        throw new Exception("ไม่พบข้อมูลผู้ใช้หรือสิทธิ์ผู้ใช้ไม่ถูกต้อง");
    }
}

}

?>
