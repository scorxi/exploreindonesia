<?php

include "config.php";

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

if (isset($_GET["hapusRental"])) {
    $kodeRental = $_GET["hapusRental"];
    $hapusfoto = mysqli_query($connection, "select * from fotodestinasi
    where fotoID = '$kodeRental'");

    $hapus = mysqli_fetch_array($hapusfoto);

    $namafile = $hapus['Foto_Mobil'];

    mysqli_query($connection, "delete from rental
    where rentalID = '$kodeRental'");

    unlink("img/" . $namafile);

    echo "<script>alert('Data Berhasil dihapus');
    document.location='rental.php'</script>";
}



mysqli_close($connection);
ob_end_flush();
