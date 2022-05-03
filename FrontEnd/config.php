<?php
/* Ini koneksi ke Database */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exploreindonesia";


$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Connection Failed! : " . mysqli_connect_error());
}
