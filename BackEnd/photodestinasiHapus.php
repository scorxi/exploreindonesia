<?php

include "config.php";

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

if (isset($_GET["hapusFoto"])) {
    $kodeFoto = $_GET["hapusFoto"];
    $hapusfoto = mysqli_query($connection, "select * from fotodestinasi
    where fotoID = '$kodeFoto'");

    $hapus = mysqli_fetch_array($hapusfoto);

    $namafile = $hapus['Foto_File'];

    mysqli_query($connection, "delete from fotodestinasi
    where fotoID = '$kodeFoto'");

    unlink("img/" . $namafile);

    echo "<script>alert('Data Berhasil dihapus');
    document.location='photodestinasi.php'</script>";
}



mysqli_close($connection);
ob_end_flush();
