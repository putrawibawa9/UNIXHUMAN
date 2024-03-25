<?php

require_once '../classes/classProduk.php';

$id_barang = $_GET['id_barang'];
$produk = new Produk\Produk;

if ($produk->deleteProduk($id_barang)){
    echo "<script>
            alert('data berhasil dihapus');
            document.location.href = 'dashboardProduct.php';
      </script>";
}else{
  echo "  <script>
            alert('data gagal dihapus');
            document.location.href = 'dashboardProduct.php';
            </script>";
}


?>