<!--login/views/forgot_password.php-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/forgot_password_style.css">
</head>
<body>

<div class="container">
    <form class="form-signin" method="POST" action="../controllers/forgot_password_controller.php">
        <h1 class="h3 mb-3 fw-normal">Forgot Password</h1>
        <div class="form-floating">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            <label for="username">Username</label>
        </div>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email address" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
            <label for="email">Email address</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">ค้นหาในระบบ</button>

        <div class="text-center mt-3">
            <p>Remember your password? <a href="../index.php">Sign in</a></p>
        </div>
    </form>
</div>


<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
