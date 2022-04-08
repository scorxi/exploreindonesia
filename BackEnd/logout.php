<?php

session_start();
$_SESSION['userEmail'];
unset($_SESSION['userEmail']);


session_unset();
session_destroy();

header("location:login.php");
