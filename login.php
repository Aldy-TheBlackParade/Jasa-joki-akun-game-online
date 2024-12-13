<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/stylelogin.css" />
</head>
<body>
    <div class="wrapper">
        <form action="login-proses.php" method="POST">
            <h1>LOGIN</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class="i" data-feather="user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required />
                <i class="i" data-feather="lock"></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" /> Remember me</label>
                <a href="#">Forgot password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
    </script>
</body>
</html>
