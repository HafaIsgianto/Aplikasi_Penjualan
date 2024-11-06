<!DOCTYPE html>
<html lang="id">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta charset="UTF-8">
    <title>Tambah Transaksi</title>
</head>

<body class="container my-4">
    <h2 class="text-center mb-4">Tambah Transaksi</h2>
    <form action="index.php?controller=transaksi&action=store" method="POST">
        <div class="form-group">
            <label for="kd_brg">Kode Barang:</label>
            <input type="text" class="form-control" name="kd_brg" required>
        </div>

        <div class="form-group">
            <label for="id_pel">ID Pelanggan:</label>
            <input type="text" class="form-control" name="id_pel" required>
        </div>

        <div class="form-group">
            <label for="jumlah">Jumlah:</label>
            <input type="number" class="form-control" name="jumlah" required>
        </div>

        <div class="form-group">
            <label for="harga">Harga Barang:</label>
            <input type="number" class="form-control" name="harga" required>
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Transaksi:</label>
            <input type="datetime-local" class="form-control" name="tanggal" id="tanggal" required>
        </div>

        <div class="form-group">
            <p>Total Harga: <span id="total_harga">0</span></p>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <script>
        document.querySelector("input[name='jumlah']").addEventListener("input", calculateTotal);
        document.querySelector("input[name='harga']").addEventListener("input", calculateTotal);

        function calculateTotal() {
            let jumlah = parseFloat(document.querySelector("input[name='jumlah']").value) || 0;
            let hargaBarang = parseFloat(document.querySelector("input[name='harga']").value) || 0;
            let total = jumlah * hargaBarang;
            document.getElementById("total_harga").innerText = total;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const inputTanggal = document.getElementById("tanggal");
            const now = new Date();
            const formattedDate = now.toISOString().slice(0, 16);
            inputTanggal.value = formattedDate;
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
