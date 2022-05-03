<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Indonesia</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<?php include "config.php" ?>

<?php

$query = mysqli_query($connection, "select * from area");

$dataProv = mysqli_query($connection, "select * from provinsi");

$dataKategori = mysqli_query($connection, "select * from kategori");

$destinasi = mysqli_query($connection, "select * from kategori, destinasi, fotodestinasi
where kategori.kategoriID = destinasi.kategoriID
and destinasi.destinasiID = fotodestinasi.destinasiID");

$sql = mysqli_query($connection, "select * from destinasi");
$jumlah = mysqli_num_rows($sql);

$foto = mysqli_query($connection, "select * from fotodestinasi, destinasi, area, provinsi
where fotodestinasi.destinasiID = destinasi.destinasiID
and destinasi.areaID = area.areaID
and area.provinsiID = provinsi.provinsiID");

$rental = mysqli_query($connection, "select * from rental, area, provinsi
where rental.areaID = area.areaID and area.provinsiID = provinsi.provinsiID");

$resort = mysqli_query($connection, "select * from resort, provinsi
where resort.provinsiID = provinsi.provinsiID");

$sqlRental = mysqli_query($connection, "select * from rental");
$jumlahRental = mysqli_num_rows($sqlRental);

$sqlResort = mysqli_query($connection, "select * from resort");
$jumlahResort = mysqli_num_rows($sqlResort);

$resto = mysqli_query($connection, "select * from restoran, area, provinsi
where restoran.areaID = area.areaID
and area.provinsiID = provinsi.provinsiID");

$sqlResto = mysqli_query($connection, "select * from restoran");
$jumlahResto = mysqli_num_rows($sqlResto);

?>

<?php include "dataArtikel.php" ?>

<body>
    <!-- Menu -->
    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg" id="navBar">
        <a class="navbar-brand" href="#" id="navBrand">
            <img src="img/Logo.png" width="40px" height="40px" alt="">
            Explore Indonesia
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <!-- <li class="nav-item dropdown" id="nav_item">
                    <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Provinsi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($dataProv) > 0) { ?>
                            <?php while ($row = mysqli_fetch_array($dataProv)) : ?>
                                <a href="index.php #GALLERY" class="dropdown-item"><?php echo $row['Nama_Provinsi'] ?></a>
                            <?php endwhile; ?>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item dropdown" id="nav_item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Area
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($query) > 0) { ?>
                            <?php while ($rowArea = mysqli_fetch_array($query)) : ?>
                                <a href="" class="dropdown-item"><?php echo $rowArea['Nama_Area'] ?></a>
                            <?php endwhile; ?>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item dropdown" id="nav_item">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($dataKategori) > 0) { ?>
                            <?php while ($rowKategori = mysqli_fetch_array($dataKategori)) : ?>
                                <a href="" class="dropdown-item"><?php echo $rowKategori['Nama_Kategori'] ?></a>
                            <?php endwhile; ?>
                        <?php } ?>
                    </div>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="#Destinations">Destinations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Rental">Rental</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#Hotels">Hotels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="events.php">Events</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Akhir Menu -->


    <!-- Slider -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/scene2.jpg" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Nirrey Valley, Georgia</h1>
                    <h4>Lorem Ipsum Dolor Sit Amet Consectetur</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/scene3.jpg" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Marina Bay, Singapore</h1>
                    <h4>Lorem Ipsum Dolor Sit Amet Consectetur</h4>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/scene1.jpg" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Whiskey Highway, Georgetown</h1>
                    <h4>Lorem Ipsum Dolor Sit Amet Consectetur</h4>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- Akhir Slider -->

    <section class="awal">
        <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <h1 class="title">Explore Indonesia</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam adipisci quia vero eius quis officia numquam vitae iste incidunt voluptatibus, tempore, ipsa ratione rerum voluptatum reprehenderit, quasi consectetur omnis illo.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsam ratione deleniti explicabo impedit, molestiae architecto eum numquam. Maiores nesciunt sequi excepturi accusantium ad sunt quidem impedit, nemo numquam velit ex?
                    </p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>

    <section class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="newsHeader">
                        <h3>Latest News</h3>
                    </div>