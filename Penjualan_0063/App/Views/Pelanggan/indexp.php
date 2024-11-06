<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Daftar Pelanggan</title>
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=home&action=index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=barang&action=index">Barang</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=pelanggan&action=index">Pelanggan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=transaksi&action=index">Transaksi</a>
            </li>
        </ul>
    </nav>

    <h1 class="text-center font-weight-bold text-dark">Daftar Pelanggan</h1>
    <div class="text-right mb-3">
        <a href="index.php?controller=pelanggan&action=create" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>ID Pelanggan</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $pelanggan): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $pelanggan['id_pel'] ?></td>
                    <td><?= $pelanggan['nm_pel'] ?></td>
                    <td><?= $pelanggan['alamat'] ?></td>
                    <td>
                        <a href="index.php?controller=pelanggan&action=edit&id=<?= $pelanggan['id_pel'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="index.php?controller=pelanggan&action=delete&id=<?= $pelanggan['id_pel'] ?>" onclick="return confirm('Kamu yakin akan menghapus data ini?');" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
