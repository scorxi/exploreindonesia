<?php

include "config.php";

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

if (isset($_GET["hapusResto"])) {
    $kodeResto = $_GET["hapusResto"];
    $hapusfoto = mysqli_query($connection, "select * from restoran
    where restoranID = '$kodeResto'");

    $hapus = mysqli_fetch_array($hapusfoto);

    $namafile = $hapus['Foto_Restoran'];

    mysqli_query($connection, "delete from restoran
    where restoranD = '$kodeResto'");

    unlink("img/" . $namafile);

    echo "<script>alert('Data Berhasil dihapus');
    document.location='restoran.php'</script>";
}



mysqli_close($connection);
ob_end_flush();
