<?php

require_once("_connection.php");

// Mendapatkan data Kode Barang
if ( isset($_POST["id"]) ) $id = $_POST["id"];
else {
    echo "Kode Barang tidak Ditemukan! <a href='_index.php'></a>";
    exit();
}

// Query Get Data Barang
$query = "SELECT * FROM barang WHERE id_barang = '{$id}'";

// Eksekusi Query
$result = mysqli_query($mysqli, $query);

// Fetching Data
foreach ( $result as $barang ) {
    $name = $barang["nama_barang"];
    $price = $barang["harga_barang"];
}

if ( isset($_POST['name']) ) $name = $_POST['name'];

if ( isset($_POST['price']) ) $price = $_POST['price'];

// Menyiapkan Query MySQL untuk diekseekusi
$query = "
    UPDATE barang SET
        nama_barang = '{$name}',
        harga_barang = '{$price}'
    WHERE id_barang = '{$id}';";

// Mengeksekusi MySQL Query
$insert = mysqli_query($mysqli,$query);

// Menangani ketika ada error ketika eksekusi query
if ( $insert == false ) {
    echo "Error dalam mengubah data. <a href='_index.php'>Kembali</a>";
}
else {
    header("Location: _index.php");
}


?>