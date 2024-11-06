<?php
require_once __DIR__ . '/../models/Pelanggan.php';

class PelangganController
{
    private $model;

    public function __construct($database)
    {
        $this->model = new Pelanggan($database);
    }

    public function create()
    {
        require __DIR__ . '/../views/pelanggan/createp.php';
    }

    public function store()
    {
        try {
            $id_pel = $_POST['id_pel'];
            $nm_pel = $_POST['nm_pel'];
            $alamat = $_POST['alamat'];

            // Menyimpan data pelanggan
            $this->model->create($id_pel, $nm_pel, $alamat);

            // Redirect ke halaman index pelanggan
            header("Location: index.php?controller=pelanggan&action=index");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage(); // Menampilkan pesan kesalahan
        }
    }




    public function index()
    {
        $data = $this->model->getAll(); // Ambil data terbaru
        $path = realpath(__DIR__ . '/../views/pelanggan/indexp.php');

        if ($path && file_exists($path)) {
            require_once $path;
        } else {
            echo "File indexp.php tidak ditemukan di path absolut yang terdeteksi: " . __DIR__ . '/../views/pelanggan/indexp.php';
        }
    }




    public function edit($id)
    {
        // Mendapatkan data pelanggan berdasarkan ID
        $pelanggan = $this->model->getById($id);
        require __DIR__ . '/../views/pelanggan/edit.php';
    }


    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php?controller=pelanggan&action=index");
        exit();
    }

    public function update()
    {
        // Ambil data dari $_POST
        $id_pel = $_POST['id_pel'];
        $nm_pel = $_POST['nm_pel'];
        $alamat = $_POST['alamat'];

        // Panggil method update dari model
        $this->model->update($id_pel, $nm_pel, $alamat);

        // Redirect setelah memperbarui
        header("Location: index.php?controller=pelanggan&action=index");
        exit();
    }
}
