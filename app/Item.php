<?php

require_once 'Dbconfig.php';

class Item extends Database
{
    function __construct()
    {
        parent::__construct();
    }

    function getAll()
    {
        $sql = "SELECT * FROM barang WHERE status = 1";
        $query = mysqli_query($this->db, $sql);
        while ($data = mysqli_fetch_array($query)) {
            $item[] = $data;
        }
        return $item;
    }

    function getItem(int $id)
    {
        $sql = "SELECT * FROM barang WHERE status = 1 AND id_barang = '$id'";
        $query = mysqli_query($this->db, $sql);

        if ($query->num_rows < 1) {
            header('Location: index.php');
            exit();
        }

        $item = mysqli_fetch_array($query);
        return $item;
    }

    function minStock(int $id, int $amount)
    {
        $sql    = "UPDATE barang SET stok_barang = stok_barang - '$amount' WHERE id_barang = '$id'";
        $query  = mysqli_query($this->db, $sql);
        if ($query) return true;
    }
}
