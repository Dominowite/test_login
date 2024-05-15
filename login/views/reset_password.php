<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- เรียกใช้ Bootstrap 5 ผ่าน npm -->
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset_password_style.css">
</head>
<body>

<div class="container">
    <form class="form-signin" method="POST" action="../controllers/reset_password_controller.php">
        <h1 class="h3 mb-3 fw-normal">Reset Password</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            <label for="email">Email</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password" required>
            <label for="new_password">New Password</label>
        </div>

        <div class="form-floating">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <label for="confirm_password">Confirm Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Reset Password</button>

        <div class="text-center mt-3">
            <p>Remember your password? <a href="login.php">Sign in</a></p>
        </div>
    </form>
</div>

<!-- เรียกใช้ Bootstrap 5 โดยใช้ JavaScript ผ่าน npm -->
<script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
