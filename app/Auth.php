<?php

require_once 'Dbconfig.php';

class Auth extends Database
{
    function __construct()
    {
        parent::__construct();
    }

    function loginUser(String $email, String $password)
    {
        $sql = "SELECT * FROM pelanggan 
                WHERE 
                email_pelanggan = '$email' AND
                password = '$password'";
        $query = mysqli_query($this->db, $sql);

        if ($query->num_rows < 1) {
            header('Location: login.php?status=0');
            exit();
        }
        session_start();
        $user = mysqli_fetch_assoc($query);
        $_SESSION['id_user']            = $user['id_pelanggan'];
        $_SESSION['nama_pelanggan']     = $user['nama_pelanggan'];
        $_SESSION['email_pelanggan']    = $user['email_pelanggan'];
        $_SESSION['alamat']             = $user['alamat_pelanggan'];
        $_SESSION['status']             = $user['status'];

        header('Location: index.php');
    }


    function loginAdmin(String $username, String $password)
    {
        $sql = "SELECT * FROM admin 
                WHERE 
                username = '$username' AND
                password = '$password'";
        $query = mysqli_query($this->db, $sql);

        if ($query->num_rows < 1) {
            header('Location: login.php?status=0');
            exit();
        }
        session_start();
        $admin = mysqli_fetch_assoc($query);
        $_SESSION['id_admin']           = $admin['id_admin'];
        $_SESSION['nama_admin']         = $admin['nama_admin'];
        $_SESSION['status']             = $admin['status'];

        header('Location: dashboard.php');
    }


    function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
        exit();
    }
}
