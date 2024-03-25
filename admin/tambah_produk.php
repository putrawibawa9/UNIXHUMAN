<?php

require_once '../classes/classProduk.php';
if(isset($_POST['submit'])){

    $add = new Produk\Produk;

    $result =$add->addProduk($_POST);
    
    //check the progress
    if ($result){
        echo "
            <script>
            alert('data berhasil ditambah');
            document.location.href = 'dashboardProduct.php';
            </script>
        ";
    }else{
        echo " <script>
        alert('data gagal ditambah');
        document.location.href = 'dashboardProduct.php';
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
    <title>Tambah data</title>
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
    
<h1>Tambah Barang</h1>

<form action="" method="post" enctype="multipart/form-data">
<ul>
    <li>
        <label for="Nama_produk">Nama Barang :</label>
        <input type="text" name="nama_barang" id="Nama_produk" required >
    </li>
    <li>
        <label for="Foto_produk">Gambar :</label>
        <input type="file" name="gambar_barang" id="Foto_produk" required >
    </li>
    <li>
        <label for="Nama_produk">jenis Barang :</label>
        <input type="text" name="jenis_barang" id="Nama_produk" required >
    </li>
    <li>
        <label for="Nama_produk">Ukuran Barang :</label>
        <input type="text" name="ukuran_barang" id="Nama_produk" required >
    </li>
    <li>
        <label for="Stok_produk">Stok Barang :</label>
        <input type="number" name="stok_barang" id="Stok_produk" required >
    </li>
    <li>
        <label for="Harga_produk">Harga Barang :</label>
        <input type="number" name="harga_barang" id="Harga_produk" required >
    </li>





    <li>
        <label for="Nama_produk">Status :</label>
        <input type="text" value="1" name="status" id="Nama_produk" required readonly >
    </li>
  
    <li>
        <label for="Nama_produk">Tanggal Input :</label>
        <input type="date" name="tgl_input" id="Nama_produk" required >
    </li>
  
    <li>
        <label for="Nama_produk">Tanggal Update :</label>
        <input type="date" name="tgl_update" id="Nama_produk" required >
    </li>
  
    <button type="submit" name="submit">Post</button>
</ul>

<a href="dashboardProduct.php">back</a>
</form>


</body>
</html>