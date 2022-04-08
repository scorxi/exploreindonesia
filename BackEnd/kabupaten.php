<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kabupaten Wisata - ADMIN</title>
</head>

<?php

ob_start();
session_start();

if (!isset($_SESSION['userEmail'])) {
    header("location:login.php");
}

?>

<?php include "header.php" ?>

<div class="container-fluid">
    <div class="card shadow mb-4">

        <?php

        include "config.php";

        if (isset($_POST['Batal'])) {
            header("location:kabupaten.php");
        }

        if (isset($_POST['Simpan'])) {

            if (isset($_REQUEST['inputKode'])) {
                $kodeKab = $_REQUEST['inputKode'];
            }

            if (!empty($kodeKab)) {
                $kodeKab = $_POST['inputKode'];
            } else {
        ?> <h1>Something Went Wrong!</h1>
        <?php die("anda harus mengisi data");
            }

            $namaKab = $_POST['inputNama'];
            $ketKab = $_POST['inputKet'];
            $kodeProv = $_POST['inputKodeProv'];

            mysqli_query($connection, "insert into kabupaten values ('$kodeKab', '$namaKab', '$ketKab', '$kodeProv')");

            header("location:kabupaten.php");
        }

        $dataProvinsi = mysqli_query($connection, "select * from provinsi");

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


        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

                <div class="jumbotron jumbotron-fluid">
                    <div class="container">
                        <h1 class="display-4">Input Kabupaten Wisata</h1>
                    </div>
                </div>

                <form method="POST">
                    <div class="form-group row">
                        <label for="kodeKabupaten" class="col-sm-2 col-form-label">Kode Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kodeKabupaten" name="inputKode" maxlength="4" required="" placeholder="No. Kabupaten (Max : 4 Karakter)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="namaKabupaten" class="col-sm-2 col-form-label">Nama Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="namaKabupaten" name="inputNama" required="" placeholder="Nama Kabupaten">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan Kabupaten</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="keterangan" name="inputKet" placeholder="Keterangan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ref" class="col-sm-2 col-form-label">Kode Provinsi</label>
                        <div class="col-sm-10">
                            <select name="inputKodeProv" id="ref" class="form-control">

                                <option value="<?php echo $row["provinsiID"]; ?>">Kode Provinsi</option>
                                <?php while ($row = mysqli_fetch_array($dataProvinsi)) : ?>
                                    <option value="<?php echo $row["provinsiID"]; ?>">
                                        <?php echo $row["provinsiID"]; ?>
                                        <?php echo $row["Nama_Provinsi"]; ?>
                                    </option>
                                <?php endwhile; ?>

                            </select>
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
                    <div class="container">
                        <h1 class="display-4">Daftar Kabupaten Wisata</h1>
                        <h2>Hasil Entri Data pada Tabel Kabupaten Wisata</h2>
                    </div>
                </div> <!-- penutup jumbotron -->

                <form method="POST">
                    <div class="form-group row mb-2">
                        <label for="search" class="col-sm-3">Nama Kabupaten</label>
                        <div class="col-sm-6">
                            <input value="<?php if (isset($_POST["search"])) {
                                                echo $_POST["search"];
                                            } ?>" type="text" name="search" class="form-control" id="search" placeholder="Cari Nama Kecamatan">
                        </div>
                        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
                    </div>
                </form>

                <table class="table table-hover table-success">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Kabupaten</th>
                            <th>Nama Kabupaten</th>
                            <th>Keterangan</th>
                            <th>Kode Provinsi</th>
                            <th>Nama Provinsi</th>
                            <th colspan="2" style="text-align: center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php

                        if (isset($_POST["kirim"])) {
                            $search = $_POST["search"];
                            $data = mysqli_query($connection, "select kabupaten.*, provinsi.provinsiID,
                        provinsi.Nama_Provinsi
                        from kabupaten, provinsi
                        where Nama_Kabupaten like '%" . $search . "%'
                        and kabupaten.provinsiID = provinsi.provinsiID
                        order by kabupatenID
                        ");
                        } else {
                            $data = mysqli_query($connection, "select kabupaten.*, provinsi.provinsiID,
                            provinsi.Nama_Provinsi
                            from kabupaten, provinsi
                            where kabupaten.provinsiID = provinsi.provinsiID
                            order by kabupatenID");
                        }




                        $nomor = 1;
                        while ($row = mysqli_fetch_array($data)) : ?>

                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $row['kabupatenID']; ?></td>
                                <td><?php echo $row['Nama_Kabupaten']; ?></td>
                                <td><?php echo $row['Keterangan']; ?></td>
                                <td><?php echo $row['provinsiID']; ?></td>
                                <td><?php echo $row['Nama_Provinsi']; ?></td>

                                <!-- untuk icons edit dan delete -->

                                <td>
                                    <a href="kabupatenEdit.php?ubahKab=<?php echo $row["kabupatenID"]; ?>" class="btn btn-success btn-sm" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                </td>

                                <td>
                                    <a href="kabupatenHapus.php?hapusKab=<?php echo $row["kabupatenID"]; ?>" class="btn btn-danger btn-sm" title="Delete">
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

    </div>
</div>

<?php include "footer.php" ?>


<?php

mysqli_close($connection);
ob_end_flush();

?>


</html>