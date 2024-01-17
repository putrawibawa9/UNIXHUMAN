<?php

include_once "../functions/functions.php";

if(isset($_POST['register'])){

    if (regristrasiAdmin($_POST) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan');
                document.location.href = 'login.php';
              </script>";
           
    } else {
        echo "<script>
                alert('User gagal ditambahkan');
              </script>";
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
<link rel="stylesheet" href="../css/registrasiAdmin.css">
</head>
<body>
    <div class="container">
        <div class="card-header">
            Registrasi Admin
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" name="nama_admin" placeholder="Nama Admin">
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username">
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <input type="text" name="status" placeholder="Status">
                </div>
                <div class="mb-3">
                    <input type="password" name="password2" placeholder="Confirm Password">
                </div>
                <div class="d-grid gap-2">
                    <button type="login" name="register">Register</button>
                </div>
                <div>
                    <a href="login.php">Sudah punya akun?</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
