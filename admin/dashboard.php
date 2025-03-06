<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDIRART COSPLAY | Dashboard</title>
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
<h1 style="color: white;">INDIRART COSPLAY</h1>
<h1 style="color: white;">Dashboard Pesanan</h1>
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
                <th>TGL TRANSAKSI</th>
                <th>BARANG</th>
                <th>JUMLAH</th>
                <th>TGL SEWA</th>
                <th>TGL KEMBALI</th>
                <th>STATUS</th>
                <th>VIEW</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $data_trans = $trans->getAll();

     
            if ($data_trans) {
                $no = 0;
                foreach ($data_trans as $data) {
                    $no++;
                    echo '<tr>
                        <td>' . $no . '</td>
                        <td>' . $data['tgl_input'] . '</td>
                        <td>' . $data['nama_barang'] . '</td>
                        <td>' . $data['jumlah_barang'] . '</td>
                        <td>' . $data['tanggal_sewa'] . '</td>
                        <td>' . $data['tanggal_kembali'] . '</td>
                        <td>' . ($data['status_sewa'] ? 'Finished' : 'Ongoing') . '</td>
                        <td><a href="view_transaksi.php?id='.$data['id_transaksi']. '">View</a></td>
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