<?php
require_once __DIR__ . '/../models/Transaksi.php'; // Tambahkan ini

class TransaksiController
{
    private $transaksiModel;

    public function __construct($db)
    {
        $this->transaksiModel = new Transaksi($db); // Gunakan $db sebagai koneksi
    }

    public function index()
    {
        $transaksiList = $this->transaksiModel->getAllTransaksi();
        require_once __DIR__ . '/../views/transaksi/indext.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/transaksi/create.php'; // Panggil form create
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_tran = uniqid('TRX');
            $kd_brg = $_POST['kd_brg'];
            $id_pel = $_POST['id_pel'];
            $jumlah = $_POST['jumlah'];
            $harga = $_POST['harga'];
            $total_harga = $harga * $jumlah;
            $tanggal = $_POST['tanggal'];

            $data = [
                'id_tran' => $id_tran,
                'kd_brg' => $kd_brg,
                'id_pel' => $id_pel,
                'jumlah' => $jumlah,
                'total_harga' => $total_harga,
                'tanggal' => $tanggal
            ];

            $this->transaksiModel->create($data); // Panggil metode untuk menyimpan data
        }

        //yukk bisaa yukk bisa
        // Redirect ke halaman daftar transaksi
        header("Location: index.php?controller=transaksi&action=index");
        exit();
    }






    public function detail($id)
    {
        $transaksiDetail = $this->transaksiModel->getDetailTransaksi($id);

        // Cek jika data tidak ditemukan
        if (!$transaksiDetail) {
            echo "Detail transaksi tidak ditemukan.";
            return; // Berhenti jika tidak ada data
        }

        require_once __DIR__ . '/../views/transaksi/detail.php';
    }
}
