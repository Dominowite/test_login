<?php
// ไฟล์ config.php

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




?>
