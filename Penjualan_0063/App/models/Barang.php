<?php

class Barang
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM produk");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi CRUD lainnya (create, update, delete) bisa ditambahkan sesuai kebutuhan
}
