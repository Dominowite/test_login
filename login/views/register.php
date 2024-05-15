<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/register_style.css">
</head>
<body>

<div class="container">
    <form class="form-signup" method="POST" action="../controllers/register_controller.php">
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

        <!-- เพิ่มฟิลด์ยืนยันรหัสผ่าน -->
        <div class="form-floating">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <label for="confirm_password">Confirm Password</label>
        </div>

        <button class="btn btn-lg btn-primary" type="submit">Register</button>
    </form>
</div>

<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
