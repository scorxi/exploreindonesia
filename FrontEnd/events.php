<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Indonesia - Events</title>

    <style>
        .events .container-fluid {
            background: linear-gradient(to bottom right, #fff, #529262);
            margin-bottom: 35px;
        }

        .events .header h2 {
            padding: 15px;
            margin-bottom: 15px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .events .header p {
            padding: 15px;
            letter-spacing: 0.5px;
            text-align: center;
        }

        .container {
            margin-bottom: 70px;
        }
    </style>
</head>


<body>
    <?php include "navbar.php";


    $kegiatan = mysqli_query($connection, "select * from kegiatan, kabupaten
    where kegiatan.kabupatenID = kabupaten.kabupatenID");
    ?>

    <section class="events">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="header">
                        <h2>Calendar of Events</h2>
                        <em><strong>Be A Part of Our Events</strong></em>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum at recusandae, distinctio ea deleniti esse illo rerum voluptatum exercitationem, incidunt delectus, laborum velit hic tempora. Reiciendis, odit unde! Expedita, impedit!</p>
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
        <div class="container">
            <div class="col-sm-12">
                <?php if (mysqli_num_rows($kegiatan) > 0) { ?>
                    <?php while ($rowKegiatan = mysqli_fetch_array($kegiatan)) : ?>
                        <div class="media row">
                            <div class="col-sm-4">
                                <img class="align-self-center mr-3" width="280px" height="210px" src="img/<?php echo $rowKegiatan["eventPoster"] ?>" alt="Generic placeholder image">
                                <p><?php echo $rowKegiatan["eventSumber"] ?></p>
                            </div>
                            <div class="media-body col-sm-8">
                                <h6 class="mt-0">Kabupaten <?php echo $rowKegiatan["Nama_Kabupaten"] ?></h6>
                                <hr>
                                <h3 class="mt-0"><?php echo $rowKegiatan["eventNama"] ?></h3>
                                <p><?php echo $rowKegiatan["eventKet"] ?></p>
                                <span>Event on <?php echo $rowKegiatan["eventMulai"] ?> - <?php echo $rowKegiatan["eventSelesai"] ?></span>
                            </div>
                        </div>
                    <?php endwhile ?>
                <?php } ?>
            </div>
        </div>
    </section>



    <?php include "footer.php" ?>
</body>

</html>