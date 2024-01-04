<?php

$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = []; // Corrected the syntax here

    if (!$result) {
        die("Query failed: " . mysqli_error($conn)); // Added error handling
    }

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    //mengamankan dari defacer
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $query = "INSERT INTO mahasiswa 
            VALUES
            ('', '$nama', '$email', '$jurusan')
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    //mengamankan dari defacer
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $query = "UPDATE mahasiswa SET 
             nama = '$nama',
             email = '$email',
             jurusan = '$jurusan'
        WHERE id = $id
    ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword){
    global $conn;
    $results = "SELECT * FROM mahasiswa
                WHERE 
                nama LIKE '%$keyword%' OR
                jurusan LIKE '%$keyword%' OR
                email LIKE '%$keyword%'

    ";
    return query($results);
}

?>
