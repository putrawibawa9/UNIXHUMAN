<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indirart Cosplay | Dashboard</title>
    <link rel="icon type=image/x-icon" href="logo2.png">
    <link rel="stylesheet" href="../css/dashboardAdmin.css">
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
        <p>Sewa pakian cosplay nahida</p>
        <h1 style="color: white;">DAFTAR SEWA</h1>
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
                <th>#</th>
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


<footer>
        <a href="../login.php?logout=1">Logout</a>  
        <p>arigatou gozaimasu !!</p>
    </footer>
</html>