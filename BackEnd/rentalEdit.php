<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil Wisata - ADMIN</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
</head>

<?php
include "config.php";

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

if (isset($_POST['Batal'])) {
    header("location:rental.php");
}

if (isset($_POST['Edit'])) {
    $kodeRental = $_POST['inputKode'];
    $noMobil = $_POST['inputNoMobil'];
    $namaMobil = $_POST['inputNamaMobil'];
    $jenisMobil = $_POST['inputJenisMobil'];
    $kodearea = $_POST['kodearea'];
    $hargaRental = $_POST['inputHargaRental'];

    $nama = $_FILES['file']['name']; // ['name'] harus digunakan dalam $_FILES
    $file_tmp = $_FILES["file"]["tmp_name"];

    if (empty($nama)) {
        mysqli_query($connection, "update rental set 
        No_Mobil = '$noMobil', Nama_Mobil = '$namaMobil', Jenis Mobil = '$jenisMobil', areaID = '$kodearea', Harga_per_Hari = '$hargaRental'
        where rentalID = '$kodeRental'");
    }

    $ekstensiFile = pathinfo($nama, PATHINFO_EXTENSION);

    // Periksa Ekstensi File (Harus JPG atau jpg)
    if (($ekstensiFile == "jpg" || $ekstensiFile == "JPG" || $ekstensiFile == "png" || $ekstensiFile == "PNG")) {
        move_uploaded_file($file_tmp, "img/" . $nama); // upload file ke folder images

        mysqli_query($connection, "update rental 
        set No_Mobil = '$noMobil', Nama_Mobil = '$namaMobil', Jenis Mobil = '$jenisMobil', areaID = '$kodearea', Harga_per_Hari = '$hargaRental', Foto_Mobil = '$nama'
        where rentalID = '$kodeRental'");
    }
    header("location:rental.php");
}

$dataarea = mysqli_query($connection, "select * from area");

$rentalKode = $_GET["ubahRental"];
$editRental = mysqli_query($connection, "select * from rental
where rentalID = '$rentalKode'");
$rowedit = mysqli_fetch_array($editRental);

$editarea = mysqli_query($connection, "select *
from area, rental
where rentalID = '$rentalKode' and area.areaID = rental.areaID");
$rowedit2 = mysqli_fetch_array($editarea);

?>

<?php include "header.php" ?>

<body>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Edit Rental Mobil Wisata</h1>
                </div>
            </div>

            <form method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="kodeFoto" class="col-sm-2 col-form-label">Kode Rental</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kodeFoto" name="inputKode" placeholder="Kode Rental" value="<?php echo $rowedit['rentalID'] ?>" readonly required="" maxlength="4">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="noMobil" class="col-sm-2 col-form-label">No Mobil</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="noMobil" name="inputNoMobil" value="<?php echo $rowedit['No_Mobil'] ?>" placeholder="Nomor Mobil">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="namaMobil" class="col-sm-2 col-form-label">Nama Mobil</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaMobil" name="inputNamaMobil" value="<?php echo $rowedit['Nama_Mobil'] ?>" placeholder="Nama Mobil">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenisMobil" class="col-sm-2 col-form-label">Jenis Mobil</label>
                    <div class="col-sm-10">
                        <select name="inputJenisMobil" id="jenisMobil" class="form-control">
                            <option value="<?php echo $rowedit["Jenis Mobil"]; ?>">
                                <?php echo $rowedit["Jenis Mobil"]; ?>
                            </option>
                            <option value="SUV">SUV</option>
                            <option value="MPV">MPV</option>
                            <option value="Offroad">Offroad</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kodearea" class="col-sm-2 col-form-label">Kode Area</label>
                    <div class="col-sm-10">
                        <select name="kodearea" id="kodearea" class="form-control">
                            <option value="<?php echo $rowedit["rentalID"]; ?>">
                                <?php echo $rowedit2["areaID"] . " " . $rowedit2['Nama_Area'] ?>
                            </option>
                            <?php while ($row = mysqli_fetch_array($dataarea)) : ?>
                                <option value="<?php echo $row["areaID"]; ?>">
                                    <?php echo $row["areaID"]; ?>
                                    <?php echo $row["Nama_Area"]; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hargaRental" class="col-sm-2 col-form-label">Harga/hari</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hargaRental" name="inputHargaRental" value="<?php echo $rowedit['Harga_per_Hari'] ?>" placeholder="Rp. Harga Rental/hari">
                    </div>
                </div>
                <!-- Form Upload File -->
                <div class="form-group row">
                    <label for="file" class="col-sm-2 col-form-label">Foto Mobil</label>
                    <div class="col-sm-10">
                        <input type="file" id="file" name="file">
                        <img src="img/<?php echo $rowedit["Foto_Mobil"]; ?>" style="width: 200px; height: 100px;">
                        <p class="help-block">Format foto : jpg atau png</p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" name="Edit" class="btn btn-primary" value="Edit">
                        <input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-1"></div>
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Daftar Rental Mobil Wisata</h1>
                </div>
            </div>

            <table class="table table-hover table-success">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Kode Rental</th>
                        <th>No Mobil</th>
                        <th>Nama Mobil</th>
                        <th>Jenis Mobil</th>
                        <th>Area ID</th>
                        <th>Nama Area</th>
                        <th>Harga/hari</th>
                        <th>Foto Mobil</th>
                        <th colspan="2" style="text-align: center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    $query = mysqli_query($connection, "select * from rental, area
                            where rental.areaID = area.areaID");


                    $nomor = 1;
                    while ($row = mysqli_fetch_array($query)) : ?>

                        <tr>
                            <td><?php echo $nomor; ?></td>
                            <td><?php echo $row['rentalID']; ?></td>
                            <td><?php echo $row['No_Mobil']; ?></td>
                            <td><?php echo $row['Nama_Mobil']; ?></td>
                            <td><?php echo $row['Jenis Mobil']; ?></td>
                            <td><?php echo $row['areaID']; ?></td>
                            <td><?php echo $row['Nama_Area']; ?></td>
                            <td><?php echo $row['Harga_per_Hari']; ?></td>
                            <td>
                                <?php if (is_file("img/" . $row['Foto_Mobil'])) { ?>
                                    <img src="img/<?php echo $row['Foto_Mobil'] ?>" width="70">

                                <?php } else
                                    echo "<img src='img/scene1.png' width='70'>";
                                ?>


                            </td>

                            <!-- untuk icons edit dan delete -->

                            <td>
                                <a href="rentalEdit.php?ubahRental=<?php echo $row["rentalID"]; ?>" class="btn btn-success btn-sm" title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </td>

                            <td>
                                <a href="rentalHapus.php?hapusRental=<?php echo $row["rentalID"]; ?>" class="btn btn-danger btn-sm" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>
                            </td>
                            <!-- akhir icons edit dan delete -->
                        </tr>



                    <?php $nomor = $nomor + 1;

                    endwhile; ?>


                </tbody>

            </table>
        </div>


        <div class="col-sm-1"></div>
    </div>
</body>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>


<?php include "footer.php" ?>

<?php

mysqli_close($connection);
ob_end_flush();

?>

</html>