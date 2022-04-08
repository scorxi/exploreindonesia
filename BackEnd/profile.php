<?php

ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
</head>

<style>
    label {
        font-size: 18px;
        font-weight: 600;
    }

    .profile p {
        margin-bottom: 25px;
        letter-spacing: 0.5px;
    }

    .row {
        padding: 35px;
    }

    .img-profile img {
        width: 250px;
        height: auto;
        border-radius: 70%;
    }
</style>

<body>

    <?php include "header.php" ?>

    <div class="container-fluid">
        <div class="cards shadow mb-4">
            <div class="jumbotron jumbotron-fluid">
                <h1 class="display-4">MY PROFILE</h1>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="img-profile">
                            <img src="img/PP admin.jpg" alt="Agung Darmawan">
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="profile">
                            <label for="">NIM</label>
                            <p>825200070</p>
                            <label for="">Nama</label>
                            <p>Agung Darmawan</p>
                            <label for="">Alamat</label>
                            <p>Jalan Prof. Dr. Satrio No. 18, Setiabudi, Jakarta Selatan</p>
                            <label for="">No. HandPhone</label>
                            <p>08568828098</p>
                            <label for="">Alamat Email</label>
                            <p>agungdarmawan1187@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "footer.php" ?>

</body>


<script type="text/javascript" src="js/bootstrap.min.js"></script>

<?php

mysqli_close($connection);
ob_end_flush();

?>

</html>