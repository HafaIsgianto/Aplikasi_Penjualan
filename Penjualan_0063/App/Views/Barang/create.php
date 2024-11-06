<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="App/Views/Barang/style.css">
    <meta charset="UTF-8">
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Tambah Barang</h1>
    <form action="index.php?controller=barang&action=store" method="POST">
        <label for="kd_brg">Kode Barang:</label>
        <input type="text" id="kd_brg" name="kd_brg" required>

        <label for="nm_brg">Nama Barang:</label>
        <input type="text" id="nm_brg" name="nm_brg" required>

        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>

        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required>

        <input type="submit" class="btn btn-add" value="Simpan">
        <a href="index.php?controller=barang&action=index" class="btn btn-add">Kembali</a>
    </form>
</body>

</html>