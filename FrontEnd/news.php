<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Indonesia - Article</title>
    <link rel="stylesheet" href="style.css">
</head>

<style>
    .news {
        padding: 45px;
    }

    .news .article p {
        font-size: 18px;
        font-weight: 600;
        text-align: justify;
    }

    .news .article a {
        text-decoration: none;
        color: #132930;
    }

    .news .article a:hover {
        color: #134e5e;
        text-decoration: underline;
    }
</style>

<body>

    <?php

    $gambar = $_GET["gambar"];
    $judul = $_GET["judul"];
    $tanggal = $_GET["tanggal"];
    $paragraph1 = $_GET["first"];
    $paragraph2 = $_GET["second"];
    $paragraph3 = $_GET["third"];
    $source = $_GET["source"];
    $link = $_GET["link"];

    ?>

    <?php include "navbar.php" ?>

    <div class="container news">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="articleHeader">
                <h1><?php echo $judul ?></h1>
                <p><?php echo $tanggal ?></p>
                <img src="img/<?php echo $gambar ?>" alt="">
            </div>
            <br>
            <div class="article">
                <p><?php echo $paragraph1 ?></p>
                <p><?php echo $paragraph2 ?></p>
                <p><?php echo $paragraph3 ?></p>
                <span>Source : <?php echo $source ?></span> -
                <a href="<?php echo $link ?>" target="_blank">Baca Sumber Artikel</a>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <?php include "footer.php" ?>


</body>

</html>