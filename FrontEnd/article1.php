<?php include "upper.php" ?>

<?php include "dataArtikel2.php" ?>

<?php foreach ($artikel2 as $newsItem2) : ?>
    <div class="media" id="MEDIA">
        <div class="media-left">
            <img src="img/<?php echo $newsItem2["Gambar"] ?>" class="media-object" width="160px" height="160px">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $newsItem2["Judul"] ?></h4>
            <span><?php echo $newsItem2["Tanggal"] ?></span>
            <p><?php echo $newsItem2["Rangkum"] ?></p>
            <span>Source : <?php echo $newsItem2["Source"] ?></span>
            <a href="
            news.php?gambar=<?php echo $newsItem2["Gambar"] ?>
            &judul=<?php echo $newsItem2["Judul"] ?>
            &tanggal=<?php echo $newsItem2["Tanggal"] ?>
            &first=<?php echo $newsItem2["Isi1"] ?>
            &second=<?php echo $newsItem2["Isi2"] ?>
            &third=<?php echo $newsItem2["Isi3"] ?>
            &source=<?php echo $newsItem2["Source"] ?>
            &link=<?php echo $newsItem2["Link"] ?>
            "><em>More...</em></a>
        </div>
    </div>
<?php endforeach; ?>
<div class="halaman">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="index.php #MEDIA">Previous</a></li>
            <li class="page-item"><a class="page-link" href="index.php #MEDIA">1</a></li>
            <li class="page-item active"><a class="page-link" href="article1.php">2</a></li>
            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
</div>

<?php include "lower.php" ?>