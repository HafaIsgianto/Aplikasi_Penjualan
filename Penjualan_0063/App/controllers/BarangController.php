<?php

class BarangController
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function index()
    {
        $query = "SELECT * FROM produk";
        $statement = $this->db->query($query);
        $data = $statement->fetchAll();

        require_once __DIR__ . "/../views/barang/indexb.php";
    }

    public function create()
    {
        // Menampilkan form untuk tambah data barang yang ada di dalamnyaa
        require_once __DIR__ . "/../views/barang/create.php";
    }

    public function store()
    {
        // Menyimpan data barang yang di-post dari form 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kd_brg = $_POST['kd_brg'];
            $nm_brg = $_POST['nm_brg'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $query = "INSERT INTO produk (kd_brg, nm_brg, harga, stok) VALUES (:kd_brg, :nm_brg, :harga, :stok)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':kd_brg', $kd_brg);
            $stmt->bindParam(':nm_brg', $nm_brg);
            $stmt->bindParam(':harga', $harga);
            $stmt->bindParam(':stok', $stok);
            $stmt->execute();

            header("Location: index.php?controller=barang&action=index");
            exit();
        }
    }


    public function edit($id)
    {

        // Ambil data barang berdasarkan kd_brg
        $query = "SELECT * FROM produk WHERE kd_brg = :kd_brg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kd_brg', $id);
        $stmt->execute();
        $barang = $stmt->fetch();

        // Pastikan barang ditemukan sebelum melanjutkan
        if ($barang) {
            require_once __DIR__ . "/../views/barang/editb.php"; // Menampilkan form edit
        } else {
            echo "Barang tidak ditemukan.";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $kd_brg = $_POST['kd_brg'];
            $nm_brg = $_POST['nm_brg'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $query = "UPDATE produk SET nm_brg = :nm_brg, harga = :harga, stok = :stok WHERE kd_brg = :kd_brg";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':kd_brg', $kd_brg);
            $stmt->bindParam(':nm_brg', $nm_brg);
            $stmt->bindParam(':harga', $harga);
            $stmt->bindParam(':stok', $stok);
            $stmt->execute();

            header("Location: index.php?controller=barang&action=index");
            exit();
        }
    }

    public function delete($id)
    {
        // hapus data barang berdasarkan kd_brg
        $query = "DELETE FROM produk WHERE kd_brg = :kd_brg";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kd_brg', $id);

        if ($stmt->execute()) {
            header("Location: index.php?controller=barang&action=index");
            exit();
        } else {
            echo "Gagal menghapus barang.";
        }
    }
}
