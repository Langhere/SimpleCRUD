<?php
require 'fungsi.php';
if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo "
            <script> 
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "Data Gagal Ditambahkan";
        echo mysqli_error($_POST);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h2>Tambah Data</h2>
    <br><br>
    <form action="" method="POST">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama">
            </li>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
            </li>
            <li>
                <label for="jurusan">Jurusan</label>
                <input type="text" name="jurusan" id="jurusan">
            </li>
            <button type="submit" name="submit">Tambah</button>
        </ul>
    </form>
</body>
</html>