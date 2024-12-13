<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="css/stylelogin.css" />
</head>
<body>
    <div class="wrapper">
        <form action="register-proses.php" method="POST">
            <h1>REGISTER</h1>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required />
                <i class="i" data-feather="mail"></i>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required />
                <i class="i" data-feather="user"></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required />
                <i class="i" data-feather="lock"></i>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
      feather.replace();
    </script>
</body>
</html>
