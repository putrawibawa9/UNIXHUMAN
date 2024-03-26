<?php

$conn =mysqli_connect("localhost","root","","db_human");


function query($query){
    global $conn;
    $result =mysqli_query($conn, $query);
    
    //make an empty array
    $rows = [];
    //loop the $result

    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function regristrasiPelanggan($data){
    global $conn;
    $nama_pelanggan = strtolower(stripslashes($data['nama_pelanggan'])); 
    $no_telepon = $data['no_telepon']; 
    $email_pelanggan = $data['email_pelanggan']; 
    $password = md5($data['password']); 
    $alamat_pelanggan = $data['alamat_pelanggan']; 
    $status = $data['status']; 
    $password2 = md5($data['password2']); 
  
    //cek username udah ada atau belum
    $result =mysqli_query($conn,"SELECT email_pelanggan FROM pelanggan WHERE email_pelanggan = '$email_pelanggan';");
    if(mysqli_fetch_assoc($result)){
    echo "<script>
    alert('user sudah ada');
    </script>";
    return false;
  }
  
    //cek  konfirmasi password
    if($password != $password2){
      echo "<script>
          alert('konfirmasi password tidak sesuai');
            </script>";
            return false;
    }

    try {
      mysqli_query($conn,"INSERT INTO pelanggan VALUES('','$nama_pelanggan','$no_telepon','$email_pelanggan','$password', '$alamat_pelanggan','$status','','')");
      return mysqli_affected_rows($conn);
  } catch (mysqli_sql_exception $e) {
      // Catching the mysqli_sql_exception specifically
      // You can handle the exception here
      if ($e->getCode() == 1062) {
          // This error code (1062) corresponds to a duplicate entry error
          // Handle the duplicate entry error here
          echo "Duplicate entry detected. Please handle accordingly.";
      } else {
          // Handle other MySQLi exceptions
          echo "An error occurred: " . $e->getMessage();
      }
  }


  }
  

  function regristrasiAdmin($data){
    global $conn;
    $nama_admin = strtolower(stripslashes($data['nama_admin'])); 
    $username = strtolower(stripslashes($data['username'])); 
    $status = $data['status']; 
    $password = $data['password']; 
    $password2 = $data['password2']; 
  
    //cek username udah ada atau belum
    $result =mysqli_query($conn,"SELECT username FROM admin WHERE username = '$username';");
    if(mysqli_fetch_assoc($result)){
    echo "<script>
    alert('admin sudah ada');
    </script>";
    return false;
  }
  
    //cek  konfirmasi password
    if($password != $password2){
      echo "<script>
          alert('konfirmasi password tidak sesuai');
            </script>";
            return false;
    }
  
    //enkripsi passrod
    // $password = password_hash($password, PASSWORD_DEFAULT);
  
    //tambah user baru ke database
    mysqli_query($conn,"INSERT INTO admin VALUES('','$nama_admin','$username','$password','$status','','')");
    return mysqli_affected_rows($conn);
  }