<?php

class Dbnew {
    public $conn;

    function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "db_human");
        // Use $this->conn to refer to the class property
    }

    function query($query) {
        // Use $this->conn to refer to the class property
        $result = mysqli_query($this->conn, $query);

        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

