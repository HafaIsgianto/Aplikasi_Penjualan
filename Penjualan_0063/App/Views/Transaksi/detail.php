<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Detail Transaksi</title>
</head>

<body class="container my-4">
    <a href="index.php?controller=transaksi&action=index" class="btn btn-secondary mb-3">Kembali ke Daftar Transaksi</a>

    <div class="card p-4 shadow-sm">
        <h2 class="card-title">Detail Transaksi ID: <?= htmlspecialchars($transaksiDetail['id_tran']) ?></h2>
        <div class="card-body">
            <p><strong>Nama Barang:</strong> <?= htmlspecialchars($transaksiDetail['nm_brg']) ?></p>
            <p><strong>Nama Pelanggan:</strong> <?= htmlspecialchars($transaksiDetail['nm_pel']) ?></p>
            <p><strong>Jumlah:</strong> <?= htmlspecialchars($transaksiDetail['jumlah']) ?></p>
            <p><strong>Total Harga:</strong> <?= htmlspecialchars($transaksiDetail['total_harga']) ?></p>
            <p><strong>Tanggal Transaksi:</strong> <?= htmlspecialchars($transaksiDetail['tanggal']) ?></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
