<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
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

?>

<body>
    <nav class="navbar navbar-expand-lg" id="navBar">
        <a class="navbar-brand" href="index.php" id="navBrand">
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
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Provinsi
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (mysqli_num_rows($dataProv) > 0) { ?>
                            <?php while ($row = mysqli_fetch_array($dataProv)) : ?>
                                <a href="" class="dropdown-item"><?php echo $row['Nama_Provinsi'] ?></a>
                            <?php endwhile; ?>
                        <?php } ?>
                    </div>
                </li>
                <li class="nav-item dropdown">
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
                <li class="nav-item dropdown">
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
                    <a class="nav-link" href="events.php">Events</a>
                </li>
            </ul>
        </div>
    </nav>



</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>