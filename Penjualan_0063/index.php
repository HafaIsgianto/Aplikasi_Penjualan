<?php
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/App/controllers/HomeController.php';
require_once __DIR__ . '/App/controllers/BarangController.php';
require_once __DIR__ . '/App/controllers/PelangganController.php';
require_once __DIR__ . '/App/controllers/TransaksiController.php';

// Koneksi Database
$database = new Database();
$db = $database->getConnection();

// Menangkap Controller dan Action dari URL
$controller = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null; // Ambil ID dari URL jika ada

// Menentukan controller yang sesuai
switch ($controller) {
    case 'barang':
        $controllerObj = new BarangController($db);
        break;
    case 'pelanggan':
        $controllerObj = new PelangganController($db);
        break;
    case 'transaksi':
        $controllerObj = new TransaksiController($db);
        break;
    default:
        $controllerObj = new HomeController($db);
        break;
}



//sampai sini  Memanggil action yang sesuai
if (method_exists($controllerObj, $action)) {
    // Memanggil metode detail jika action adalah detail dan $id ada
    if ($action === 'detail' && $id !== null) {
        $controllerObj->detail($id);
    } elseif ($action === 'edit' && $id !== null) {
        $controllerObj->edit($id);
    } elseif ($action === 'delete' && $id !== null) {
        $controllerObj->delete($id);
    } elseif ($action === 'update') {
        $controllerObj->update(); // Panggil update tanpa parameter
    } else {
        // Panggil action lain tanpa parameter
        $controllerObj->$action();
    }
} else {
    echo "Aksi tidak ditemukan.";
}


// Tampilkan kesalahan jika ada
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
