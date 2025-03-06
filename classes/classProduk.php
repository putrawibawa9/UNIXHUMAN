<?php
namespace Produk{
    use Connection\Connect;
    require_once "construct.php";
    

class Produk extends Connect{
    
    public function readProduk(){
        $conn = $this->getConnection();
        $query = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori";  
        $result = $conn->query($query);
        $burger = $result->fetchAll();
        return $burger;
        }

    public function readTwoTable(){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk";
        $resultBin = $conn->query($queryBin);


        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetchAll();
            $dataBin = $resultBin->fetchAll();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
        }
    }
    public function readTwoTablepart2($id_produk){
        $conn = $this->getConnection();
        $queryKat = "SELECT * FROM kategori JOIN produk ON kategori.id_kategori = produk.id_kategori WHERE id_produk = $id_produk";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk WHERE id_produk= $id_produk";
        $resultBin = $conn->query($queryBin);



        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetch();
            $dataBin = $resultBin->fetch();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
        }
    }

    public function readTwoTablepart3($id_kategori){
        $conn = $this->getConnection();
        $queryKat = "SELECT nama_kategori FROM kategori WHERE id_kategori = $id_kategori";
        $resultKat = $conn->query($queryKat);

        $queryBin = "SELECT * FROM produk JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE kategori.id_kategori = $id_kategori";
        $resultBin = $conn->query($queryBin);

        if($resultKat && $resultBin){
            $dataKat = $resultKat->fetch();
            $dataBin = $resultBin->fetchall();
            return array('tableKat'=>$dataKat, 'tableBin'=>$dataBin);
        }else{
            return false;
    }
}

    public function addProduk($data){
      
        $conn = $this->getConnection();
        $nama_barang = $data['nama_barang'];
        $jenis_barang = $data['jenis_barang'];
        $warna_barang = $data['warna_barang'];
        $ukuran_barang = $data['ukuran_barang'];
        $stok_barang = $data['stok_barang'];
        $harga_barang = $data['harga_barang'];
        $status = $data['status'];
        // $tgl_input = $data['tgl_input'];
        // $tgl_update = $data['tgl_update'];
        $gambar_barang = $this->uploadGambar();
        if (!$gambar_barang) {
            return false;
        }


       $query = "INSERT INTO barang 
          (nama_barang, gambar_barang, jenis_barang, ukuran_barang, stok_barang, harga_barang, status, warna_barang) 
          VALUES (?, ?, ?, ?, ?, ?, ?,?)";

    
        $stmt = $conn->prepare($query);
    
        $stmt->bindParam(1,$nama_barang);
        $stmt->bindParam(2,$gambar_barang);
        $stmt->bindParam(3,$jenis_barang);
        $stmt->bindParam(4,$ukuran_barang );
        $stmt->bindParam(5,$stok_barang );
        $stmt->bindParam(6,$harga_barang );
        $stmt->bindParam(7,$status );
        $stmt->bindParam(8,$warna_barang );
        // $stmt->bindParam(8,$tgl_input );
        // $stmt->bindParam(9,$tgl_update );
        $stmt->execute();
        return true;
    }


    public function editProduk($data){
        
        $conn = $this->getConnection();
        $id_barang = $data['id_barang'];
        $nama_barang = $data['nama_barang'];
        $jenis_barang = $data['jenis_barang'];
        $ukuran_barang = $data['ukuran_barang'];
        // $gambar_barang = $data['gambar_barang'];
        $gambar_lama = $data['gambar_lama'];
        $warna_barang = $data['warna_barang'];
        $ukuran_barang = $data['ukuran_barang'];
        $stok_barang = $data['stok_barang'];
        $harga_barang = $data['harga_barang'];
        $status = $data['status'];
        $tgl_input = $data['tgl_input'];
        $tgl_update = $data['tgl_update'];
        $harga_barang = $data['harga_barang'];

          //check whether user pick a new image or not
        if($_FILES['gambar_barang']['error']===4){
            $gambar_barang = $gambar_lama;
        }else{
            $gambar_barang = $this->uploadGambar();
        }
        $query = "UPDATE barang SET
        nama_barang = ?,
        gambar_barang = ?,
        jenis_barang = ?,
        ukuran_barang = ?,
        stok_barang = ?,
        harga_barang = ?,
        status = ?,
        tgl_input = ?,
        tgl_update = ?,
        warna_barang = ?
        WHERE id_barang = ?
        ";
             $stmt = $conn->prepare($query);
                $stmt->bindParam(1,$nama_barang);
                $stmt->bindParam(2,$gambar_barang);
                $stmt->bindParam(3,$jenis_barang);
                $stmt->bindParam(4,$ukuran_barang);
                $stmt->bindParam(5,$stok_barang);
                $stmt->bindParam(6,$harga_barang);
                $stmt->bindParam(7,$status);
                $stmt->bindParam(8,$tgl_input);
                $stmt->bindParam(9,$tgl_update);
                $stmt->bindParam(10,$warna_barang);
                $stmt->bindParam(11,$id_barang);
                $stmt->execute();
                return true;
    }


    public function uploadGambar(){
        $namaFile = $_FILES['gambar_barang']['name'];
        $ukuranFile =  $_FILES['gambar_barang']['size'];
        $error =  $_FILES['gambar_barang']['error'];  
        $tmp =  $_FILES['gambar_barang']['tmp_name'];  
      
        //cek apakah user sudah menambah gambar
      
        if($error ===4){
          echo "<script>
              alert ('Silahkan pilih gambar');
                </script>";
                return false;
        }
      
        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid =['jpg','jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile); 
        $ekstensiGambar = strtolower(end($ekstensiGambar)); 
        if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
          echo "<script>
              alert ('format gambar salah!');
                </script>";
                return false;
        }
      
        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000){
          echo "<script>
              alert ('Ukuran terlalu besar');
                </script>";
        }
      
        //generate nama file random
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
      
      
        //lolos semua hasil cek, lalu dijalankan
        move_uploaded_file($tmp, '../'.$namaFileBaru);
      
        return $namaFileBaru;
    }


    public function deleteProduk($id_barang){
        $conn = $this->getConnection();
        $query = "DELETE FROM barang WHERE id_barang = $id_barang";
        $result = $conn->exec($query);
        return $result;
}

    public function viewEachProduct($id_barang){
        $conn = $this->getConnection();
        $query = "SELECT * FROM barang WHERE id_barang= $id_barang";
        $result = $conn->query($query);
        $kategori = $result->fetch();
        return $kategori;
    }

    public function editKategori($nama_kategori,$id_kategori){
        $conn = $this->getConnection();
        $query = "UPDATE kategori SET
        nama_kategori = ?
        WHERE id_kategori = ?";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(1,$nama_kategori);
         $stmt->bindParam(2,$id_kategori);

          //check the progress
    if ($stmt->execute()) {
        echo "
            <script>
            alert('Data berhasil diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('Data gagal diupdate');
            document.location.href = 'kategori.php';
            </script>
        ";
    }
    }

}
}
?>