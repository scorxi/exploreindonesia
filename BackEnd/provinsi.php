<?php
ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}
?>

<?php

include "config.php";

if (isset($_POST['Simpan'])) {

    if (isset($_REQUEST['inputKode'])) {
        $kodeProvinsi = $_REQUEST['inputKode'];
    }

    if (!empty($kodeProvinsi)) {
        $kodeProvinsi = $_POST['inputKode']; // 'inputKode' harus sama dengan NAME pada tag html (biasanya form input)
    } else {
?> <h1>TEST</h1>
<?php die("anda hrus mengisi dta");
    }

    $namaProvinsi = $_POST['inputNama'];
    $provTglBerdiri = $_POST['inputTgl'];

    mysqli_query($connection, "insert into provinsi values ('$kodeProvinsi', '$namaProvinsi', '$provTglBerdiri')");

    header("location:provinsi.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provinsi Wisata - ADMIN</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<?php include "header.php" ?>

<div class="container-fluid">
    <div class="cards shadow mb-4">

        <body>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">

                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Input Tabel Provinsi</h1>
                        </div>
                    </div>

                    <form method="POST">
                        <div class="form-group row">
                            <label for="kodekategori" class="col-sm-2 col-form-label">Kode Provinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodekategori" name="inputKode" maxlength="4" required="" placeholder="Kode Provinsi (Max : 4 Karakter)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namakategori" class="col-sm-2 col-form-label">Nama Provinsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namakategori" name="inputNama" required="" placeholder="Nama Provinsi">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Tanggal Provinsi Berdiri</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="keterangan" name="inputTgl">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2 col-form-label"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" value="Simpan" name="Simpan">Simpan</button>
                                <button type="reset" class="btn btn-secondary" value="Batal" name="Batal">Batal</button>
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
                        <div class="container" id="TABLE">
                            <h1 class="display-4">Daftar Tabel Provinsi</h1>
                            <h2>Hasil Entri Data pada Tabel Provinsi</h2>
                        </div>
                    </div> <!-- penutup jumbotron -->

                    <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Area</label>
                            <div class="col-sm-6">
                                <input value="<?php if (isset($_POST["search"])) {
                                                    echo $_POST["search"];
                                                } ?>" type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Provinsi">
                            </div>
                            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                    </form>

                    <table class="table table-hover table-success">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Provinsi ID</th>
                                <th>Nama Provinsi</th>
                                <th>Tanggal Berdiri</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            if (isset($_POST["kirim"])) {
                                $search = $_POST["search"];
                                $data = mysqli_query($connection, "select * 
                        from provinsi 
                        where Nama_Provinsi like '%" . $search . "%'
                        ");
                            } else {
                                $data = mysqli_query($connection, "select * from provinsi");
                            }




                            $nomor = 1;
                            while ($row = mysqli_fetch_array($data)) : ?>

                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $row['provinsiID']; ?></td>
                                    <td><?php echo $row['Nama_Provinsi']; ?></td>
                                    <td><?php echo $row['Tanggal_Berdiri']; ?></td>
                                </tr>



                            <?php $nomor = $nomor + 1;

                            endwhile; ?>


                        </tbody>

                    </table>
                </div>

                <div class="col-sm-1"></div>
            </div>



            <script type="text/javascript" src="js/bootstrap.min.js"></script>
        </body>
    </div>
</div>

<?php include "footer.php" ?>

<?php

mysqli_close($connection);
ob_end_flush();

?>

</html>