<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you</title>
    <link rel="icon type=image/x-icon" href="logo2.png">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
        body {
            text-align: center; /* Center the text content */
        }

        h1 {
            margin-top: 50px; /* Add some top margin for spacing */
        }

        a {
            display: block;
            margin-top: 20px; /* Add some top margin for spacing */
        }
        footer {
            background-color: #40513B;
            color: #ffffff;
            text-align: center;
         }
    </style>
</head>
<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><img src="logooo.png" /></div>
            <div class="Menu">
                <ul>
                    <li><a href="#home" class="menuItem">Home</a></li>
                    <li><a href="#pilihan-item" class="menuItem">Pilihan Item</a></li>
                    <li><a href="#tentang-saya" class="menuItem">Tentang Saya</a></li>
                    <?php if (isset($_SESSION['email_pelanggan'])) { ?>
                        <li>
                            <a>Hallo,
                                <?= $_SESSION['nama_pelanggan'] ?>
                            </a>
                        </li>
                        <li>
                            <a href="login.php?logout=1">Logout</a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <button class="hamburger-menu">
                <i class="fa-solid fa-bars icon-bars"></i>
                <i class="fa-solid fa-xmark icon-close"></i>
            </button>
        </div>

    </nav>
    <h1>TERIMA KASIH SUDAH MENYEWA</h1>
    <a href="index.php">Kembali ke home</a>
    <footer>
        <div class="wrapper">arigatou gozaimasu !!</div>
    </footer>
</body>

</html>