<?php
class Transaksi
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    // Fungsi untuk mengambil semua data transaksi
    public function getAllTransaksi()
    {
        $query = "SELECT t.id_tran, p.kd_brg, pel.id_pel, t.jumlah,
                  t.total_harga, t.tanggal
                  FROM transaksi t
                  JOIN produk p ON t.kd_brg = p.kd_brg
                  JOIN pelanggan pel ON t.id_pel = pel.id_pel";
        return $this->db->query($query)->fetchAll();
    }

    // Fungsi untuk membuat data transaksi baru
    public function create($data)
    {
        $query = "INSERT INTO transaksi (id_tran, kd_brg, id_pel, jumlah, total_harga, tanggal)
                  VALUES (:id_tran, :kd_brg, :id_pel, :jumlah, :total_harga, :tanggal)";
        $stmt = $this->db->prepare($query);
        $stmt->execute($data);
    }

    // Fungsi untuk memeriksa keberadaan produk
    public function checkProdukExists($kd_brg)
    {
        $query = "SELECT COUNT(*) FROM produk WHERE kd_brg = :kd_brg";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['kd_brg' => $kd_brg]);
        return $stmt->fetchColumn() > 0;
    }

    // Fungsi untuk memeriksa keberadaan pelanggan
    public function checkPelangganExists($id_pel)
    {
        $query = "SELECT COUNT(*) FROM pelanggan WHERE id_pel = :id_pel";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id_pel' => $id_pel]);
        return $stmt->fetchColumn() > 0;
    }

    // Fungsi untuk mendapatkan semua produk (opsional, jika dibutuhkan dalam controller)
    public function getAllProduk()
    {
        $query = "SELECT * FROM produk";
        return $this->db->query($query)->fetchAll();
    }


    public function getAllPelanggan()
    {
        $query = "SELECT * FROM pelanggan";
        return $this->db->query($query)->fetchAll();
    }

    public function getDetailTransaksi($id)
    {
        $query = "SELECT t.id_tran, p.nm_brg, pel.nm_pel, t.jumlah, t.total_harga, t.tanggal
              FROM transaksi t
              JOIN produk p ON t.kd_brg = p.kd_brg
              JOIN pelanggan pel ON t.id_pel = pel.id_pel
              WHERE t.id_tran = :id";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
