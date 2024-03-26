<?php

include_once "functions/functions.php";

if(isset($_POST['register'])){

    if (regristrasiPelanggan($_POST) > 0) {
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
    <link rel="stylesheet" href="css/registrasiPelanggan.css">

</head>
<body>
    <div class="container">
        <div class="card-header">
            Registrasi Pelanggan
        </div>
        <div class="card-body">
            <form action="" method="post">
                <input type="hidden" name="status" value="1">
                <div class="mb-3">
                    <input type="text" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="no_telepon" placeholder="No Telepon" required>
                </div>
                <div class="mb-3">
                    <input type="email" name="email_pelanggan" placeholder="Email Pelanggan" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="text" name="alamat_pelanggan" placeholder="Alamat Pelanggan" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password2" placeholder="Confirm Password" required>
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
