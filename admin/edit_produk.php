<?php

use Produk\Produk;

require_once '../classes/classProduk.php';

//get that $_GET
$id_barang = $_GET['id_barang'];

$barang2 = new Produk;

$pdk =  $barang2->viewEachProduct($id_barang);

if(isset($_POST['submit'])){


    
    //check the progress
    if (ubahProduk($_POST)>0){
        echo "
            <script>
            alert('data berhasil diubah');
            document.location.href = 'home.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal diubah');
        document.location.href = 'home.php';
        </script>
    ";

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }
    </style>
</head>
<body>
    
<h1>Ubah Data Produk</h1>

<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_barang" value="<?= $pdk['id_barang']?>">
<input type="hidden" name="status" value="<?= $pdk['status']?>">
<input type="hidden" name="gambar_barang" value="<?= $pdk['gambar_barang']?>">
<ul>
    <li>
        <label for="Nama_produk">Nama Produk :</label>
        <input type="text" name="nama_barang" id="Nama_produk" required value="<?= $pdk['nama_barang']; ?>">
    </li>
    <li>
        <label for="Foto_produk">Foto Produk :</label>
        <input type="file" name="gambar_barang" id="nama">

        <img src="../<?= $pdk['gambar_barang'] ?>" width="100px" height="100px">
    </li>

    <li>
        <label for="Nama_produk">Jenis Produk :</label>
        <input type="text" name="jenis_barang" id="Nama_produk" required value="<?= $pdk['jenis_barang']; ?>">
    </li>

    <li>
        <label for="Nama_produk">Ukuran Produk :</label>
        <input type="text" name="ukuran_barang" id="Nama_produk" required value="<?= $pdk['ukuran_barang']; ?>">
    </li>
    <li>
        <label for="Nama_produk">Stok Produk :</label>
        <input type="number" name="stok_barang" id="Nama_produk" required value="<?= $pdk['stok_barang']; ?>">
    </li>

    <li>
        <label for="Nama_produk">Harga Produk :</label>
        <input type="number" name="harga_barang" id="Nama_produk" required value="<?= $pdk['harga_barang']; ?>">
    </li>
    <li>
        <label for="Nama_produk">Tanggal Input Produk :</label>
        <input type="date" name="tgl_input" id="Nama_produk" required value="<?= $pdk['tgl_input']; ?>">
    </li>
    <li>
        <label for="Nama_produk">Tanggal Update Produk :</label>
        <input type="date" name="tgl_update" id="Nama_produk" required value="<?= $pdk['tgl_update']; ?>">
    </li>



    <button type="submit" name="submit">Post</button>
</ul>

<a href="dashboardProduct.php">back</a>
</form>


</body>
</html>