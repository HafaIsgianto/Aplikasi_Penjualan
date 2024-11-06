<link rel="stylesheet" type="text/css" href="App/Views/Barang/style.css">
<form action="index.php?controller=pelanggan&action=update" method="POST">

    <br>
    <label for="id_pel">ID Pelanggan:</label>
    <input type="text" name="id_pel" value="<?= $pelanggan['id_pel'] ?>" required>
    <br>

    <label for="nm_pel">Nama Pelanggan:</label>
    <input type="text" name="nm_pel" value="<?= $pelanggan['nm_pel'] ?>" required>


    <br>
    <label for="alamat">Alamat:</label>
    <input type="text" name="alamat" value="<?= $pelanggan['alamat'] ?>" required>
    <br>
    <button type="submit">Update</button>
</form>