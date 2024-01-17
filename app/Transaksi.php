<?php

require_once 'Dbconfig.php';
require_once 'Item.php';

class Transaksi extends Database
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT t.*, b.nama_barang 
                FROM transaksi as t
                JOIN barang as b ON t.id_barang = b.id_barang
                WHERE t.status = 1";
        $query = mysqli_query($this->db, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $transaksi[] = $data;
        }
        return $transaksi ?? '';
    }

    function setData()
    {
        $id_user        = $_SESSION['id_user'];
        $id_barang      = $_POST['id_barang'];
        $jumlah         = $_POST['jumlah'];
        $size           = $_POST['ukuran'];
        $harga          = $_POST['harga_barang'];
        $total_harga    = $_POST['total_harga'];
        $tgl_sewa       = $_POST['tgl_sewa'];
        $tgl_kembali    = $_POST['tgl_kembali'];

        $sql = "INSERT INTO transaksi 
        (id_pelanggan, id_barang, ukuran_barang, jumlah_barang, harga_barang, total_harga, tanggal_sewa, tanggal_kembali)
        VALUES
        ('$id_user', '$id_barang', '$size', '$jumlah', '$harga', '$total_harga', '$tgl_sewa', '$tgl_kembali')";

        $query = mysqli_query($this->db, $sql);
        if ($query) {
            $item = new Item();
            if ($item->minStock($id_barang, $jumlah)) {
                header('Location: thankyou.php');
                exit();
            }
            header('Location: pesan.php?id=' . $id_barang . '&status=0');
        }
        exit();
    }

    function getId(String $id)
    {
        $sql = "SELECT t.*, b.*, p.*
                FROM transaksi as t
                JOIN barang as b ON t.id_barang = b.id_barang
                JOIN pelanggan as p ON t.id_pelanggan = p.id_pelanggan
                WHERE t.id_transaksi = '$id'";

        $query = mysqli_query($this->db, $sql);
        if ($query->num_rows < 1) {
            header('Location: dashboard.php?status=0');
            exit();
        }
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
}
