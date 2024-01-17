<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indirart Cosplay</title>
    <link rel="icon type=image/x-icon" href="logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://kit.fontawesome.com/4480f1c8c5.js" crossorigin="anonymous"></script>
    <?php
    require 'app/Item.php';
    session_start();
    $item = new Item();
    ?>
</head>

<body>

    <!-- menu -->

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
                            <a>Hallo, <?= $_SESSION['nama_pelanggan'] ?></a>
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

    <!-- hero / jumbotron -->

    <header>
        <section id="home">
            <div class="header-opacity"></div>
            <div class="header-jumbotron">
                <h4>Indirart Cosplay</h4>
                <h5>Sewa Pakaian Cosplay<br /> NAHIDA </h5>
                <p>wig, aksesoris, pakaian</p>
                <a href="#pilihan-item" class="button button-xl">PESAN SEKARANG</a>
            </div>
        </section>
    </header>

    <!--pilihan item-->
    <section id="pilihan-item">
        <div class="wrapper">
            <h4>PILIHAN ITEM</h4>
            <p>baca terlebih dahulu sebelum pesan</p>

            <div class="grid" id="grid-item">
                <?php
                foreach ($item->getAll() as $data_item) {
                    echo '<div class="item">
                            <img src="' . $data_item['gambar_barang'] . '" />
                            <div class="item-detail">
                                <p>' . $data_item['nama_barang'] . '</p>
                                <p>Size : ' . $data_item['ukuran_barang'] . '</p>
                                <div>
                                    <small><i class="fa-regular fa-calendar-days"></i>' . ($data_item['stok_barang'] ? ' Available' : ' Out of Stock') . '</small>';
                    if ($data_item['stok_barang']) echo '<a href="pesan.php?id=' . $data_item['id_barang'] . '" class="button"><i class="fa-solid fa-cart-shopping"></i>PESAN</a>';
                    echo '</div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <!--tentang saya-->
    <section id="tentang-saya">
        <div class="wrapper">
            <h4>Tentang Saya</h4>
            <div>
                <div class="foto"><img src="images/nahidaa.jpg" /></div>

                <div class="article">
                    <article>
                        <h2>Saya Indira Artha,</h2>
                        <p>orang yang ingin berbagi kebahagiaan dengan menyewakan pakaian cosplay hehehe. jika ingin bertanya-tanya tentang pemesanan bisa chat melalui dm ya</p>
                        <div class="social">
                            <a href="https://www.instagram.com/indiraartha_"><i class="fa-brands fa-instagram"></i></a>
                            <a href="https://twitter.com/Unixhuman_"><i class="fa-brands fa-twitter"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="wrapper">arigatou gozaimasu !!</div>
    </footer>
    <!-- <script src="js/main.js"></script> -->
</body>

</html>