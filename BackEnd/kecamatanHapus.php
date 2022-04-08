<?php

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

include "config.php";

if (isset($_GET["hapusKec"])) {
    $kodeKecamatan = $_GET["hapusKec"];
    mysqli_query($connection, "delete from kecamatan
    where kecamatanID = '$kodeKecamatan'");

    echo "<script>alert('Data Berhasil dihapus');
    document.location='kecamatan.php'</script>";
}



mysqli_close($connection);
ob_end_flush();
