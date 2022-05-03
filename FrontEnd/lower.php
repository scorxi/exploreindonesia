<div class="col-sm-4">
    <div class="newsHeader">
        <h3>Panorama</h3>
    </div>
    <div class="videoItem" id="mediaTopMargin">
        <iframe width="310" height="166" src="https://www.youtube.com/embed/aKtb7Y3qOck" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="videoItem">
        <iframe width="310" height="166" src="https://www.youtube.com/embed/kQIri35Yjds" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="videoItem">
        <iframe width="310" height="166" src="https://www.youtube.com/embed/BbkFE_K_t0c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
</div>
</div>
</section>

<section class="tours">
    <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>We Have The Best Tours</h2>
                    <em><strong>Preffered Tour Packages</strong></em>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum at recusandae, distinctio ea deleniti esse illo rerum voluptatum exercitationem, incidunt delectus, laborum velit hic tempora. Reiciendis, odit unde! Expedita, impedit!</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="tourItem" data-aos="flip-left" data-aos-duration="500" data-aos-delay="150">
                    <img src="img/Tours Komodo.png" alt="">
                    <div class="thumb">
                        <div class="content">
                            <p>August - November 2021</p>
                            <h2>Komodo Island</h2>
                            <a href="#"><button>See More</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="tourItem" data-aos="flip-left" data-aos-duration="500" data-aos-delay="400">
                    <img src="img/Tours Tanah Lot.png" alt="">
                    <div class="thumb">
                        <div class="content">
                            <p>April - July 2022</p>
                            <h2>Pura Tanah Lot</h2>
                            <a href="#"><button>See More</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="tourItem" data-aos="flip-left" data-aos-duration="500" data-aos-delay="650">
                    <img src="img/Tours Bromo.png" alt="">
                    <div class="thumb">
                        <div class="content">
                            <p>April - July 2022</p>
                            <h2>Mount Bromo</h2>
                            <a href="#"><button>See More</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<section class="destinasi" id="Destinations">
    <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>Start Your Exploration</h2>
                    <em><strong>Preffered Destinations</strong></em>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam laborum suscipit consequatur quibusdam, nostrum accusantium commodi neque nobis. Odio modi quidem excepturi, tenetur odit laboriosam praesentium ratione quis numquam nisi?</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <?php if (mysqli_num_rows($destinasi) > 0) { ?>
                    <?php while ($rowDestinasi = mysqli_fetch_array($destinasi)) : ?>
                        <div class="media">
                            <img class="align-self-center mr-3" width="280px" height="210px" src="img/<?php echo $rowDestinasi['Foto_File'] ?>" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0 des-title"><?php echo $rowDestinasi['Nama_Destinasi'] ?></h5>
                                <h6 class="mt-0"><?php echo $rowDestinasi['Alamat'] ?> - <?php echo $rowDestinasi["Nama_Kategori"] ?></h6>
                                <p><?php echo $rowDestinasi['Keterangan'] ?></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php } ?>
            </div>
            <div class="col-sm-4">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Objek Wisata
                        <span class="badge badge-primary badge-pill"><?php echo $jumlah ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Mobil Rental
                        <span class="badge badge-primary badge-pill"><?php echo $jumlahRental ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Jumlah Resort
                        <span class="badge badge-primary badge-pill"><?php echo $jumlahResort ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="galeri">
    <div class="container-fluid" id="GALLERY" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>Explore Beautiful Places</h2>
                    <em><strong>Take a Glance of Your Vacation to Come</strong></em>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui tempore possimus dignissimos earum a laborum maxime molestias blanditiis doloribus atque in quisquam reprehenderit voluptate suscipit alias tempora, veniam sapiente. Voluptatum.</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row" data-aos="fade-left" data-aos-duration="700">
            <?php while ($rowFoto = mysqli_fetch_array($foto)) : ?>
                <div class="col-sm-4">
                    <figure class="figure">
                        <img src="img/<?php echo $rowFoto['Foto_File'] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada">
                        <figcaption class="figure-caption text-right"><?php echo $rowFoto['Nama_Foto'] ?> - <?php echo $rowFoto['Nama_Provinsi'] ?></figcaption>
                    </figure>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="rental" id="Rental">
    <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>Take These to Explore With You</h2>
                    <em><strong>Cars for Rental</strong></em>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Harum fuga tempora unde nemo maxime dicta corporis enim cum! Labore impedit facilis veniam temporibus. Fuga officiis cupiditate vitae eligendi, unde voluptatem.</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row" data-aos="fade-left" data-aos-duration="1500">
            <?php while ($rowRental = mysqli_fetch_array($rental)) : ?>
                <div class="col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="img/<?php echo $rowRental['Foto_Mobil'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title car-title"><?php echo $rowRental['Nama_Mobil']; ?></h5>
                            <h6 class="card-title"><?php echo $rowRental['Nama_Area']; ?> - <?php echo $rowRental['Nama_Provinsi']; ?></h6>
                            <p class="card-text"><?php echo $rowRental['Jenis Mobil']; ?></p>
                            <em class="card-text"><?php echo "Rp." . $rowRental['Harga_per_Hari']; ?></em>
                            <a href="#" class="btn btn-primary">Rent Car</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="resort" id="Hotels">
    <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>We Have The Best Resort</h2>
                    <em><strong>Preffered Resorts</strong></em>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Accusamus quibusdam ea cupiditate iure. Unde quo in facilis blanditiis sit tempore nesciunt recusandae, officiis, dolorem nemo neque iste eligendi corrupti voluptate?</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row" data-aos="fade-in" data-aos-duration="1500">
            <?php while ($rowResort = mysqli_fetch_array($resort)) : ?>
                <div class="col-sm-6">
                    <div class="card mb-3">
                        <img class="card-img-top" src="img/<?php echo $rowResort['Foto_Resort'] ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title res-title"><?php echo $rowResort['Nama_Resort'] ?> - <?php echo $rowResort['Nama_Provinsi'] ?></h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><?php echo $rowResort['Kelas_Resort'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="restoran">
    <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>Restaurants</h2>
                    <em><strong>Gather and Enjoy While You Finishing Your Meal</strong></em>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui tempore possimus dignissimos earum a laborum maxime molestias blanditiis doloribus atque in quisquam reprehenderit voluptate suscipit alias tempora, veniam sapiente. Voluptatum.</p>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row" data-aos="fade-left" data-aos-duration="1500">
            <?php while ($rowResto = mysqli_fetch_array($resto)) : ?>
                <div class="col-sm-4">
                    <figure class="figure">
                        <img src="img/<?php echo $rowResto['Foto_Restoran'] ?>" class="figure-img img-fluid rounded" alt="Foto Tidak Ada">
                        <figcaption class="figure-caption text-right"><?php echo $rowResto['Nama_Restoran'] ?> - <?php echo $rowResto['Nama_Area'] ?></figcaption>
                    </figure>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<section class="comments">
    <div class="container-fluid" data-aos="fade-in" data-aos-duration="1000">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="header">
                    <h2>Let's See What Others Think</h2>
                    <em><strong>Our Customer's Feedbacks</strong></em>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="media" data-aos="fade-in" data-aos-duration="750" data-aos-delay="100">
                    <img class="align-self-center mr-3" src="img/People 1.png" alt="Generic placeholder image" width="65px" height="65px">
                    <div class="media-body">
                        <h5 class="mt-0 semi-bold">"Best Holiday Ever"</h5>
                        <p>It is really incredible to have a such unforgettable holiday for the rest of my life..</p>
                    </div>
                </div>
                <div class="media" data-aos="fade-in" data-aos-duration="750" data-aos-delay="250">
                    <img class="align-self-center mr-3" src="img/People 2.png" alt="Generic placeholder image" width="65px" height="65px">
                    <div class="media-body">
                        <h5 class="mt-0 semi-bold">"Totally Incredible"</h5>
                        <p>They really have an excellent and long experience in the world of tourism. No regret, guarantee.</p>
                    </div>
                </div>
                <div class="media" data-aos="fade-in" data-aos-duration="750" data-aos-delay="250">
                    <img class="align-self-center mr-3" src="img/People 3.png" alt="Generic placeholder image" width="65px" height="65px">
                    <div class="media-body">
                        <h5 class="mt-0 semi-bold">"I finally found myself!"</h5>
                        <p>I was amaze by the beauty of a vast and wonderful land that located in other part of the world from where I live. Real life changing.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</section>

<section class="quotes">
    <div class="container-fluid">
        <div class="row" data-aos="fade-in" data-aos-duration="1000" data-aos-delay="750">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">"Travel - The best way to be lost and found at the same time"</p>
                    <footer class="blockquote-footer">Brenna <cite title="Source Title">Smith</cite></footer>
                </blockquote>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
</section>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-3">
                <div class="logoHeader">
                    <img src="img/Logo Footer.png" alt="" width="80px" height="80px">
                    <h2>Explore Indonesia</h2>
                </div>
                <div class="links">
                    <ul>
                        <li id="twitter"><a href="#" class="fa_twitter"><img src="img/icons8-twitter-18.png" alt=""></a></li>
                        <li id="linkedin"><a href="#" class="fab fa-linkedin-in"><img src="img/icons8-linkedin-18.png" alt=""></a></li>
                        <li id="instagram"><a href="#" class="fab fa-instagram"><img src="img/icons8-instagram-18.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="contacts">
                    <h3>Contact Information</h3>
                    <p>Praesent iaculis gravida elementum. Proin fermentum neque facilisis semper pharetra. Sed vestibulum
                        vehicula tincidunt.</p>
                </div>
                <ul>
                    <li><strong>Phone :</strong> <br> 085611027678</li>
                    <li><strong>Email :</strong> <br> agungdarmawan1187@gmail.com</li>
                    <li><strong>Address :</strong> <br> DKI Jakarta</li>
                </ul>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
    <div class="container-fluid" id="footer">
        <p>Copyright &copy; 2022 Web Development - <em>Agung Darmawan</em> </p>
    </div>
</footer>





<!-- Animate on Scroll -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        once: true,
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Smooth Scrolling -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Add smooth scrolling to all links
        $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                // prevent link anchor secara default ketika di-klik 
                // event.preventDefault(); 

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function() {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });
</script>
</body>

</html>