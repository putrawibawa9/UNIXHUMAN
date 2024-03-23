<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rahindra Cosplay | Pesan</title>
    <link rel="icon type=image/x-icon" href="logo2.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/pesan.css">
    <?php
    require 'app/Item.php';
    require 'app/Transaksi.php';
    session_start();

    if (!isset($_SESSION['status'])) {
        header('Location: login.php?status=1');
        exit();
    }
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        $msg = '';
        switch ($status) {
            case 0:
                $msg = 'Terdapat kesalahan saat memproses.';
                break;
            default:
                $msg = 'Something went wrong.';
        }
        echo '<script>alert("' . $msg . '")</script>';
    }


    $item       = new Item();
    $trans      = new Transaksi();

    if (isset($_POST['sewa'])) {
        $trans->setData();
        exit();
    }

    $id_barang  = $_GET['id'];
    $data_item  = $item->getItem($id_barang);
    $sizes      = explode(',', $data_item['ukuran_barang']);

    $id_user    = $_SESSION['id_user'];

    ?>
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
    <div class="pesan-container">
        <div class="pesan-item">
            <img src="<?= $data_item['gambar_barang'] ?>" alt="Gambar Barang">
            <div class="pesan-item-info">
                <h3><?= $data_item['nama_barang'] ?></h3>
                <p>Size <?= $data_item['ukuran_barang'] . ' | Stock : ' . $data_item['stok_barang'] ?></p>
            </div>
        </div>
        <form action="pesan.php" method="POST" name="pesanForm" onsubmit="return validateForm()">
            <input type="text" name="id_user" value="<?= $id_user ?>" hidden>
            <input type="text" name="id_barang" value="<?= $id_barang ?>" hidden>
            <input type="number" name="harga_barang" value="<?= $data_item['harga_barang'] ?>" hidden>
            <div class="pesan-field">
                <label for="ukuran">Ukuran Barang</label>
                <select name="ukuran" id="ukuran">
                    <option hidden>Pilih size barang</option>
                    <?php
                    foreach ($sizes as $size) {
                        echo '<option value="' . $size . '">' . $size . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="pesan-field">
                <label for="jumlah">Jumlah</label>
                <input type="number" name="jumlah" id="jumlah" min="1" value="1" max="<?= $data_item['stok_barang'] ?>" oninput="calcHarga()">
            </div>
            <div class="pesan-field">
                <label for="tgl_sewa">Tgl. Sewa</label>
                <input type="date" name="tgl_sewa" id="tgl_sewa" value="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="pesan-field">
                <label for="tgl_kembali">Tgl. Kembali</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" min="<?= date('Y-m-d') ?>">
            </div>
            <div class="pesan-field">
                <label for="total_harga">Total bayar (Rp)</label>
                <input type="number" name="total_harga" id="total_harga" readonly>
            </div>
            <div class="pesan-action">
                <a href="index.php">Batal</a>
                <button type="submit" name="sewa">Sewa sekarang</button>
            </div>
        </form>
    </div>
    <!-- <footer>
        <div class="wrapper">arigatou gozaimasu !!</div>
    </footer> -->
    <script src="js/pesanan.js"></script>
</body>

</html>