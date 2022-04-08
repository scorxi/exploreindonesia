<!DOCTYPE html>
<?php

include "config.php";

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}


if (isset($_POST['Batal'])) {
    header("location:destinasiEdit.php");
}

if (isset($_POST['Edit'])) {

    if (isset($_REQUEST['inputKode'])) {
        $destinasikode = $_REQUEST['inputKode'];
    }

    if (!empty($destinasikode)) {
        $destinasikode = $_POST['inputKode'];
    } else {
?> <h1>TEST</h1>
<?php die("anda harus mengisi data");
    }

    $destinasinama = $_POST['inputNama'];
    $alamat = $_POST['alamat'];
    $kodekategori = $_POST['kodekategori'];
    $kodearea = $_POST['kodearea'];

    // mysqli_query($connection, "insert into destinasi values ('$destinasikode', '$destinasinama', '$alamat', '$kodekategori', '$kodearea')");

    mysqli_query($connection, "update destinasi set Nama_Destinasi = '$destinasinama', Alamat = '$alamat', kategoriID = '$kodekategori', 
    areaID = '$kodearea'
    where destinasiID = '$destinasikode'");

    header("location:destinasi.php");
}

$datakategori = mysqli_query($connection, "select * from kategori");
$dataarea = mysqli_query($connection, "select * from area");


// Untuk menampilkan data untuk diedit pada form
$kodedestinasi = $_GET["ubah"];
$editdestinasi = mysqli_query($connection, "select * from destinasi
where destinasiID = '$kodedestinasi'");
$rowedit = mysqli_fetch_array($editdestinasi);


$editkategori = mysqli_query($connection, "select * 
from destinasi, kategori
where destinasiID = '$kodedestinasi' and destinasi.kategoriID = kategori.kategoriID");
$rowedit2 = mysqli_fetch_array($editkategori);

$editarea = mysqli_query($connection, "select * 
from destinasi, area
where destinasiID = '$kodedestinasi' and destinasi.areaID = area.areaID");
$rowedit3 = mysqli_fetch_array($editarea);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi Wisata</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css">
    <style>

    </style>
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
                            <h1 class="display-4">Input Destinasi Wisata</h1>
                        </div>
                    </div>

                    <form method="POST">
                        <div class="form-group row">
                            <label for="kodedestinasi" class="col-sm-2 col-form-label">Kode Destinasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kodedestinasi" name="inputKode" value="<?php echo $rowedit['destinasiID']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="namadestinasi" class="col-sm-2 col-form-label">Nama Destinasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="namadestinasi" name="inputNama" value="<?php echo $rowedit["Nama_Destinasi"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat Destinasi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $rowedit["Alamat"]; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ref" class="col-sm-2 col-form-label">Kategori_ID</label>
                            <div class="col-sm-10">
                                <select name="kodekategori" id="kodekategori" class="form-control">
                                    <option value="<?php echo $rowedit["kategoriID"]; ?>"><?php echo $rowedit["kategoriID"] ?></option>
                                    <option value="<?php echo $row["kategoriID"]; ?>">Kategori Wisata</option>
                                    <?php while ($row = mysqli_fetch_array($datakategori)) : ?>
                                        <option value="<?php echo $row["kategoriID"]; ?>">
                                            <?php echo $row["kategoriID"]; ?>
                                            <?php echo $row["Nama_Kategori"]; ?>
                                        </option>
                                    <?php endwhile; ?>

                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ref" class="col-sm-2 col-form-label">Area ID</label>
                            <div class="col-sm-10">
                                <select name="kodearea" id="kodearea" class="form-control">
                                    <option value="<?php echo $rowedit["areaID"]; ?>"><?php echo $rowedit["areaID"]; ?>
                                        <?php echo $rowedit3["Nama_Area"]; ?></option>
                                    <option value="<?php echo $row["areaID"]; ?>">Area Wisata</option>
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
                            <div class="col-sm-2 col-form-label"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" value="Edit" name="Edit">Edit</button>
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
                        <div class="container">
                            <h1 class="display-4">Daftar Destinasi Wisata</h1>
                            <h2>Hasil Entri Data pada Tabel Destinasi Wisata</h2>
                        </div>
                    </div> <!-- penutup jumbotron -->

                    <form method="POST">
                        <div class="form-group row mb-2">
                            <label for="search" class="col-sm-3">Nama Destinasi</label>
                            <div class="col-sm-6">
                                <input value="<?php if (isset($_POST["search"])) {
                                                    echo $_POST["search"];
                                                } ?>" type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Kategori">
                            </div>
                            <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
                        </div>
                    </form>

                    <table class="table table-hover table-success">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Kategori ID</th>
                                <th>Nama Destinasi</th>
                                <th>Alamat Destinasi</th>
                                <th>Kategori ID</th>
                                <th>Nama Kategori</th>
                                <th>Area ID</th>
                                <th>Nama Area</th>
                                <th colspan="2" style="text-align: center">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php

                            if (isset($_POST["kirim"])) {
                                $search = $_POST["search"];
                                $data = mysqli_query($connection, "select destinasi.*, kategori.kategoriID,
                        kategori.Nama_Kategori, area.areaID, area.Nama_Area 
                        from destinasi, kategori, area
                        where Nama_Destinasi like '%" . $search . "%'
                        and destinasi.kategoriID = kategori.kategoriID
                        and destinasi.areaID = area.areaID
                        ");
                            } else {
                                $data = mysqli_query($connection, "select destinasi.*, kategori.kategoriID,
                        kategori.Nama_Kategori, area.areaID, area.Nama_Area 
                        from destinasi, kategori, area
                        where destinasi.kategoriID = kategori.kategoriID
                        and destinasi.areaID = area.areaID");
                            }




                            $nomor = 1;
                            while ($row = mysqli_fetch_array($data)) : ?>

                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $row['destinasiID']; ?></td>
                                    <td><?php echo $row['Nama_Destinasi']; ?></td>
                                    <td><?php echo $row['Alamat']; ?></td>
                                    <td><?php echo $row['kategoriID']; ?></td>
                                    <td><?php echo $row['Nama_Kategori']; ?></td>
                                    <td><?php echo $row['areaID']; ?></td>
                                    <td><?php echo $row['Nama_Area']; ?></td>

                                    <!-- untuk icons edit dan delete -->

                                    <td>
                                        <a href="destinasiEdit.php?ubah=<?php echo $row["destinasiID"]; ?>" class="btn btn-success btn-sm" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                    </td>

                                    <td>
                                        <a href="destinasiHapus.php?hapus=<?php echo $row["destinasiID"]; ?>" class="btn btn-danger btn-sm" title="Delete">
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



            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#kodekategori').select2({
                        allowClear: true,
                        placeholder: "Pilih Kategori Wisata"
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#kodearea').select2({
                        allowClear: true,
                        placeholder: "Pilih Area Wisata"
                    });
                });
            </script>
        </body>
    </div>
</div>


<?php

mysqli_close($connection);
ob_end_flush();

?>

</html>