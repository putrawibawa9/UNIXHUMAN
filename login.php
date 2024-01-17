<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indirart Cosplay | Login</title>
    <link rel="icon type=image/x-icon" href="logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <?php
    require 'app/Auth.php';
    $auth   = new Auth();
    if (isset($_POST['login'])) {
        $email  = $_POST['email'];
        $pass   = $_POST['password'];
        $auth->loginUser($email, $pass);
    }

    if (isset($_GET['logout'])) {
        $auth->logout();
    }

    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        $msg = '';
        switch ($status) {
            case 0:
                $msg = 'Email atau password salah.';
                break;
            case 1:
                $msg = 'Silahkan login ya kak.';
                break;

            default:
                $msg = 'Something went wrong.';
        }
        echo '<script>alert("' . $msg . '")</script>';
    }
    ?>
</head>

<body>
    <div class="login-container">
        <img src="images/nahidaa.jpg" alt="login-image">
        <form action="login.php" method="POST">
            <div class="login-head">
                <h1>Welcome,</h1>
                <h2>Please login to continue</h2>
            </div>
            <div class="login-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" autofocus>
            </div>
            <div class="login-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autofocus>
            </div>
            <a href="registrasi.php">Registrasi disini</a>
            <a href="admin/login.php">Login Untuk Admin</a>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>