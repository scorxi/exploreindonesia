<?php

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

include "config.php";

if (isset($_GET["hapusKab"])) {
    $kodeKabupaten = $_GET["hapusKab"];
    mysqli_query($connection, "delete from kabupaten
    where kabupatenID = '$kodeKabupaten'");

    echo "<script>alert('Data Berhasil dihapus');
    document.location='kabupaten.php'</script>";
}



mysqli_close($connection);
ob_end_flush();
