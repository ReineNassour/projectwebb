<!DOCTYPE html>
<html lang="en">
<?php  session_start() ?>
<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


    <style>
        .star {
            cursor: pointer;
            color: #ccc;
            /* Default gray color */
        }

        .star.text-warning {
            color: #ffcc00;
            /* Yellow color for rated stars */
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <?php include "header.php" ?>


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img2/mus4.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Meuseums</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">Museums</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <!-- Booking Start -->
        <div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container">
                <div class="bg-white shadow" style="padding: 35px;">
                    <div class="row g-2">
                        <div class="col-md-10">
                            <div class="row g-2">

                                <h1>Discover More Museums arround the world</h1>


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h6 class="section-title text-start text-primary text-uppercase">About Us</h6>
                        <h1 class="mb-4">Welcome to <span class="text-primary text-uppercase">GET OUTSIDE</span></h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <div class="row g-3 pb-4">
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-hotel fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">5 </h2>
                                        <p>Stars</p>
                                        <p class="mb-0">Asia</p>
                                        <a class="btn btn-primary py-3 px-5 mt-2" href="search.html">Explore More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users-cog fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">5</h2>
                                        <p>Stars</p>
                                        <p class="mb-0">Europe</p>
                                        <a class="btn btn-primary py-3 px-5 mt-2" href="search.html">Explore More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="border rounded p-1">
                                    <div class="border rounded text-center p-4">
                                        <i class="fa fa-users fa-2x text-primary mb-2"></i>
                                        <h2 class="mb-1" data-toggle="counter-up">5</h2>
                                        <p>stars</p>
                                        <p class="mb-0">America</p>
                                        <a class="btn btn-primary py-3 px-5 mt-2" href="search.html">Explore More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.1s" src="img2/mus5.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.3s" src="img2/mus4.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-50 wow zoomIn" data-wow-delay="0.5s" src="img2/mus6.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.7s" src="img2/mus3.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- About End -->
        <!-- Room Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="section-title text-center text-primary text-uppercase">Some</h6>
                    <h1 class="mb-5">Museums Around<span class="text-primary text-uppercase">the world</span></h1>
                </div>
                <div class="row g-4">
                     <?php  
                     include 'db.php';
                     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['rate']) && isset($_POST['location_id'])){
                        $rate=$_POST['rate'];
                        $id = $_POST['location_id'];
                        $sql="UPDATE `location` SET Rating='$rate' where ID='$id'";
                       $result=$conn->query($sql);
                       }

                     $sql="SELECT * FROM `location` where Type='museum'";
                     $result=$conn->query($sql);

                     if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $cityID = $row['CITY_ID'];
                            $citysql = "SELECT * FROM CITY WHERE ID = $cityID";
                            $cityRes = $conn->query($citysql)->fetch_assoc();
                            $cityName = $cityRes['NAME'];
                            $countryID = $cityRes['country_id'];
                            $countrysql = "SELECT * from country where id = $countryID";
                            $countryRes = $conn->query($countrysql)->fetch_assoc();
                            $countryName = $countryRes['NAME'];
                            $continentID = $countryRes['CONTINENT_ID'];
                            $continentsql = "SELECT NAME FROM CONTINENT WHERE ID = $continentID";
                            $continentName = $conn->query($continentsql)->fetch_assoc()['NAME'];
                     ?>
                   <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                            <img class="img-fluid" src="<?php echo $row['image'] ?>" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo $row['price'];?></small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $continentName;?>-<?php echo $countryName;?>-<?php echo $cityName;?>- <?php echo $row['Name'];?></h5>

                                    </h5>
                                    <div class="ps-2">
                                       <form method="post">
                                        <p>Rate location</p>
                                        <input type="number" name="rate" min="1" max="5" step="1"><br><br>
                                        <input type="hidden" name="location_id" value="<?php echo $row['ID']; ?>">
                                        <button type="submit" class="btn btn-sm btn-primary rounded py-2 px-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-body mb-3"><?php echo $row['Description'];?></p>
                                <div class="d-flex justify-content-between">
                                <a href="addFav.php?id=<?=$row['ID']?>" class="btn btn-sm btn-primary rounded py-2 px-4">Add to Favorite</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  
                    }
                    }
                    else {
                        echo "No museums found.";
                    }
                     
                    ?>
                </div>
            </div>
        </div>
        <!-- Room End -->
        <?php include 'feedback.php' ?>
        <?php include "footer.php" ?>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        // JavaScript to handle the rating system
        const stars = document.querySelectorAll('.star');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const ratingValue = this.getAttribute('data-value');
                const hotelId = this.closest('.stars').getAttribute('data-hotel');
                updateRating(hotelId, ratingValue);
            });
        });

        function updateRating(hotelId, ratingValue) {
            // Update the rating display
            const ratingElement = document.getElementById('rating-' + hotelId);
            ratingElement.textContent = ratingValue;

            // Highlight the selected stars
            const starsInHotel = document.querySelectorAll('.stars[data-hotel="' + hotelId + '"] .star');
            starsInHotel.forEach(star => {
                if (star.getAttribute('data-value') <= ratingValue) {
                    star.classList.add('text-warning'); // Highlight selected stars
                } else {
                    star.classList.remove('text-warning'); // Unhighlight unselected stars
                }
            });
        }
    </script>

</body>

</html>