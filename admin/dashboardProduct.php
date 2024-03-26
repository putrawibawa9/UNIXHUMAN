<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rahindra Cosplay | Dashboard</title>
    <link rel="icon type=image/x-icon" href="logo2.png">
    <link rel="stylesheet" href="../css/dashboardAdmin.css">
    <style>

.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

a {
    /* Optional: Add additional styles for the link */
    color: #333;
    font-size: 18px;
}


    </style>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://kit.fontawesome.com/4480f1c8c5.js" crossorigin="anonymous"></script>
    <?php
    require '../app/Transaksi.php';
    session_start();
    if (!isset($_SESSION['id_admin'])) {
        header('Location: login.php?status=1');
        exit();
    }
    if (isset($_SESSION['id_pelanggan'])) {
        header('Location: index.php');
        exit();
    }

    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        $msg = '';
        switch ($status) {
            case 0:
                $msg = 'ID tidak ditemukan.';
                break;
            case 1:
                $msg = 'Silahkan login ya kak.';
                break;

            default:
                $msg = 'Something went wrong.';
        }
        echo '<script>alert("' . $msg . '")</script>';
    }

    $trans = new Transaksi();

    ?>
</head>

<body>

<header>
<h1 style="color: white;">RAHINDRA COSPLAY</h1>
<h1 style="color: white;">Dashboard Produk</h1>
        <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">  <a href="dashboard.php" style="color: white;">Dashboard Pesanan</a></li>
    <li style="display: inline; margin-right: 10px;">  <a href="dashboardProduct.php" style="color: white;">Dashboard Barang</a></li>
    <li style="display: inline; margin-right: 10px;">  <a href="tambah_produk.php" style="color: white;">Tambah Produk</a></li>
    <li style="display: inline; margin-right: 10px;">   <a href="../index.php" style="color: white;">Logout</a></li>

</ul>
    </header>



    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Nama Barang</th>
                <th>Gambar Barang</th>
                <th>Jenis Barang</th>
                <th>Ukuran Barang</th>
                <th>Stok Barang</th>
                <th>Harga Barang</th>
                <th>Status</th>
                <th>Tanggal Input</th>
                <th>Tanggal Update</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $data_trans = $trans->getAllProduct();

     
            if ($data_trans) {
                $no = 0;
                foreach ($data_trans as $data) {
                    $no++;
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $data['nama_barang'] . '</td>
                        <td>' . $data['gambar_barang'] . '</td>
                        <td>' . $data['jenis_barang'] . '</td>
                        <td>' . $data['ukuran_barang'] . '</td>
                        <td>' . $data['stok_barang'] . '</td>
                        <td>' . $data['harga_barang'] . '</td>
                        <td>' . $data['status'] . '</td>
                        <td>' . $data['tgl_input'] . '</td>
                        <td>' . $data['tgl_update'] . '</td>
                        <td><a href="edit_produk.php?id_barang='.$data['id_barang']. '">Edit</a></td>
                        <td><a href="delete_produk.php?id_barang='.$data['id_barang']. '" onclick="return confirm("yakin?")">Delete</a></td>
                    </tr>';
                }
            } else {
                echo '<tr><td colspan="8">No data</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>



</html>