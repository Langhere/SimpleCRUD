<?php
require 'fungsi.php';
$mahasiswa = query("SELECT * FROM mahasiswa");
if(isset($_POST["search"])){
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect MYSQL</title>
</head>
<body>
    <h3>Data Mahasiswa</h3>
    <a href="tambah.php">Tambah Data</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword" placeholder="Search" autocomplete="off">
        <button type="submit" name="search">Search</button>
        <br><br>
    </form>
<table border ="2" cellpading="10">
    <tr>
        <th>No</th>
        <th>Action</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Jurusan</th>
    </tr>
    <?php $no = 1; ?>
    <?php foreach($mahasiswa as $mhs) : ?>
    <tr>
        <td><?= $no ?></td>
        <td>
            <a href="ubah.php?id=<?= $mhs["id"]?>">Ubah</a>
            <a href="hapus.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
        </td>
        <td><?= $mhs["nama"] ?></td>
        <td><?= $mhs["email"] ?></td>
        <td><?= $mhs["jurusan"] ?></td>
        <?php $no++ ?>
    </tr>
    <?php endforeach; ?>
</table>

    </tr>
</body>
</html>