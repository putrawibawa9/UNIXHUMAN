<?php
namespace DB{


class Database
{

    private $host       = "localhost";
    private $username   = "root";
    private $pass       = "";
    private $db_name    = "db_human";

    protected $db;
    protected function __construct()
    {
        return $this->db = mysqli_connect($this->host, $this->username, $this->pass, $this->db_name);
    }
}
}