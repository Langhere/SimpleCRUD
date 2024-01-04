<?php
require 'fungsi.php';
$id = $_GET["id"];
//ambil array ke 0 artinya data 0, kalo mau liat itu ke var_dump aja
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "
            <script> 
            alert('Data Berhasil Diubah');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "Data Gagal Diubah";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
</head>
<body>
    <h2>Ubah Data</h2>
    <br><br>
    <form action="" method="POST">
        <ul>
            <li>
                <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"] ?>">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $mhs["email"] ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan" value="<?= $mhs["jurusan"] ?>">
            </li>
            <button type="submit" name="submit">Ubah</button>
        </ul>
    </form>
</body>
</html>