<?php

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

include "config.php";

if (isset($_GET["hapus"])) {
    $kodedestinasi = $_GET["hapus"];
    mysqli_query($connection, "delete from destinasi
    where destinasiID = '$kodedestinasi'");

    echo "<script>alert('Data Berhasil dihapus');
    document.location='destinasi.php'</script>";
}



mysqli_close($connection);
ob_end_flush();
