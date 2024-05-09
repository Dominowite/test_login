<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40; /* โทนสีดำ */
            color: #f8f9fa; /* โทนสีขาว */
            padding-top: 60px; /* สำหรับ Navbar */
            padding-bottom: 40px; /* สำหรับ Footer */
        }
        .navbar {
            background-color: #212529; /* โทนสีดำเข้ม */
        }
        .navbar-brand {
            color: #f8f9fa !important; /* โทนสีขาว */
        }
        .container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<?php include 'layout/navbar.php'; ?>

<div class="container">
    <h1>Welcome to My Website</h1>
    <p>This is a basic website template.</p>
</div>

<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
