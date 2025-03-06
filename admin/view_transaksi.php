<?php
    require '../app/Transaksi.php';
    session_start();

    if (!isset($_GET['id'])) {
        header('Location: admin/dashboard.php');
        exit();
    }
    if (!isset($_SESSION['id_admin'])) {
        header('Location: admin/login.php?status=1');
        exit();
    }
    if (isset($_SESSION['id_pelanggan'])) {
        header('Location: index.php');
        exit();
    }

    $trans      = new Transaksi();
    $id_barang  = $_GET['id'];
    $data  = $trans->getId($id_barang);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDIRART COSPLAY</title>
<link rel="stylesheet" href="../css/dashboardview.css">
</head>
<body>
   
    <header>
    <h1>INDIRART COSPLAY</h1>
        <p>Sewa Pakaian Cosplay NAHIDA </p>
    </header>
 
<div id="card-container">
        <div class="card">
  <div class="card-header">
    <h2><?= $data['nama_barang']; ?></h2>
  </div>
  <div class="card-body">
    <img class="product-image" src="../<?= $data['gambar_barang'] ?>" alt="Product Image">
    <p><strong><?= $data['nama_pelanggan'] ?></p>
    <p>Rp <?= $data['total_harga'] ?></p>
  </div>
</div>
</div>
        
        <footer>
        <a href="dashboard.php">Back</a>
        <p>arigatou gozaimasu !!</p>
    </footer>

     </body>