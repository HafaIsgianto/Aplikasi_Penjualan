<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="App/Views/Barang/style.css">
    <meta charset="UTF-8">
    <title>Tambah Pelanggan</title>
    <style>
        /* Tambahkan gaya sesuai kebutuhan */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
        }

        input[type="text"] {
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
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>Tambah Pelanggan</h1>
    <form action="index.php?controller=pelanggan&action=store" method="POST">
        <label for="id_pel">ID Pelanggan:</label>
        <input type="text" name="id_pel" required>

        <label for="nm_pel">Nama Pelanggan:</label>
        <input type="text" name="nm_pel" required>

        <label for="alamat">Alamat:</label>
        <input type="text" name="alamat" required>

        <input type="submit" class="btn btn-add" value="Simpan">
        <a href="index.php?controller=pelanggan&action=index" class="btn btn-add">Kembali</a>
    </form>


</body>

</html>