<?php
// login/config.php

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "db_test_website";
    protected $conn;

    // Constructor เพื่อเชื่อมต่อฐานข้อมูล
    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            throw new Exception("การเชื่อมต่อฐานข้อมูลล้มเหลว: " . $e->getMessage());
        }
    }

    // เมธอดสำหรับปิดการเชื่อมต่อฐานข้อมูล
    public function close() {
        $this->conn = null;
        echo "ปิดการเชื่อมต่อฐานข้อมูล";
    }
}



class UserDatabase extends Database {
    // เพิ่มเมธอดหรือคุณสมบัติเฉพาะสำหรับผู้ใช้ทั่วไปที่นี่
    public function registerUser($username, $email, $password) {
        // ตรวจสอบว่ามีชื่อผู้ใช้หรืออีเมล์ที่ซ้ำกันอยู่ในฐานข้อมูลหรือไม่
        $query = "SELECT * FROM users WHERE username = :username OR email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($existingUser) {
            throw new Exception("ชื่อผู้ใช้หรืออีเมล์นี้มีอยู่ในระบบแล้ว");
        }
    
        // ถ้าไม่มีชื่อผู้ใช้หรืออีเมล์ที่ซ้ำกัน ก็ทำการเพิ่มข้อมูลผู้ใช้ใหม่
        $query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // ทำการ hash รหัสผ่าน
        $stmt->bindParam(':password', $hashedPassword);
    
        // ทำการ execute คำสั่ง SQL
        if ($stmt->execute()) {
            // เพิ่มข้อมูลลงในตาราง user_logs เมื่อมีการลงทะเบียนผู้ใช้ใหม่
            $logQuery = "INSERT INTO user_logs (user_id, action, created_at) VALUES (:user_id, 'ลงทะเบียน', NOW())";
            $logStmt = $this->conn->prepare($logQuery);
            $logStmt->bindValue(':user_id', $this->conn->lastInsertId());
            $logStmt->execute();
    
            echo "เพิ่มข้อมูลผู้ใช้ใหม่เรียบร้อยแล้ว";
            return true;
        } else {
            throw new Exception("เกิดข้อผิดพลาดในการเพิ่มข้อมูลผู้ใช้ใหม่");
        }
    }

    public function loginUser($username, $password) {
        // ค้นหาข้อมูลผู้ใช้จากฐานข้อมูลโดยใช้ชื่อผู้ใช้
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // ตรวจสอบว่าพบข้อมูลผู้ใช้หรือไม่
        if ($user) {
            // ตรวจสอบรหัสผ่าน
            if (password_verify($password, $user['password'])) {
                // หากรหัสผ่านถูกต้อง
                // เรียกใช้ฟังก์ชัน session_start() เพื่อเริ่มต้นเซสชัน
                session_start();
                // เก็บค่า user_id ลงในเซสชัน
                $_SESSION['user_id'] = $user['id'];
    
                // ตรวจสอบสิทธิ์ของผู้ใช้
                if ($user['role'] === 'admin') {
                    // ถ้าเป็น admin ให้ไปยังหน้า index.php ในโฟเดอร์ admin
                    header("Location: ../admin/index.php");
                } else {
                    // ถ้าเป็น member ให้ไปยังหน้า index.php ในโฟเดอร์ member
                    header("Location: ../member/index.php");
                }
                exit;
            } else {
                // หากรหัสผ่านไม่ถูกต้อง
                throw new Exception("รหัสผ่านไม่ถูกต้อง");
            }
        } else {
            // หากไม่พบข้อมูลผู้ใช้
            throw new Exception("ไม่พบชื่อผู้ใช้");
        }
    }


    public function forgotPassword($username, $email) {
        // ค้นหาข้อมูลผู้ใช้จากฐานข้อมูลโดยใช้ชื่อผู้ใช้และอีเมล
        $query = "SELECT * FROM users WHERE username = :username AND email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        // ตรวจสอบว่าพบข้อมูลผู้ใช้หรือไม่
        if ($user) {
            // ส่งอีเมลให้ผู้ใช้
            // โดยในส่วนนี้คุณสามารถเขียนโค้ดส่งอีเมลเพื่อรีเซ็ตรหัสผ่านได้ตามต้องการ
            // ในที่นี้จะแสดงข้อความเท่านั้นเนื่องจากไม่มีฟังก์ชันจริงสำหรับการส่งอีเมล
            echo "ส่งลิงก์รีเซ็ตรหัสผ่านไปยังอีเมลของคุณแล้ว";
            return true;
        } else {
            // หากไม่พบข้อมูลผู้ใช้ที่ตรงกับชื่อผู้ใช้และอีเมลที่ระบุ
            // ให้เปลี่ยนเส้นทาง URL เพื่อไปยังหน้า forgot_password.php
            echo "<script>alert('ไม่พบบัญชีผู้ใช้ที่ตรงกับชื่อผู้ใช้และอีเมลที่ระบุ'); window.location.href = 'forgot_password.php';</script>";
        }
    }
    
    
    
    


    
}
?>
