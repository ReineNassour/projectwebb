<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
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


        .star {
            cursor: pointer;
            color: #ccc;
            /* Default color */
        }

        .star:hover,
        .star.active {
            color: #ffcc00;
            /* Yellow when hovered or active */
        }

        iframe {
            border-radius: 8px;
            width: 100%;
            height: 100%;
        }
    </style>


</head>

<body>
    <div class="container-xxl bg-white p-0">

       <?php include "header.php" ?>
       
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img2/g3.jpg);">
        <div class="container-fluid page-header-inner py-5">
            <div class="container text-center pb-5">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Gardens</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Gardens</li>
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

                            <h1>Discover More Gardens arround the world</h1>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->




    <!-- Room Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Some</h6>
                <h1 class="mb-5">Gardens Around<span class="text-primary text-uppercase">the world</span></h1>
            </div>
            <div class="row g-4">
                <!-- Hotel 1 -->
                <?php  
                     include 'db.php';

                     if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['rate']) && isset($_POST['location_id'])){
                        $rate=$_POST['rate'];
                        $id = $_POST['location_id'];
                        $sql="UPDATE `location` SET Rating='$rate' where ID='$id'";
                       $result=$conn->query($sql);
                       }

                     $sql="SELECT * FROM `location` where Type='garden'";
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
                    
                     
                    ?>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title text-center text-primary text-uppercase">Some</h6>
                <h1 class="mb-5"><span class="text-primary text-uppercase">Gardens Around</span> The World</h1>
            </div>
            <div class="row g-4">
                <!-- Google Map and Room Description in Same Row -->
                <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                        frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
               


    <!-- feedback Start -->
    <?php include "feedback.php" ?>
    <!-- feedback Start -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container pb-5">
            <div class="row g-5">
                <div class="col-md-6 col-lg-4">
                    <div class="bg-primary rounded p-4">
                        <a href="index.html">
                            <h1 class="text-white text-uppercase mb-3">GET OUTSIDE</h1>
                        </a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <h6 class="section-title text-start text-primary text-uppercase mb-4">Contact</h6>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, BEIRUT, LEBANON</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="row gy-5 g-4">
                        <div class="col-md-6">
                            <h6 class="section-title text-start text-primary text-uppercase mb-4">Services</h6>
                            <a class="btn btn-link" href="hotels.html">Hotels</a>
                            <a class="btn btn-link" href="rest">Restaurants</a>
                            <a class="btn btn-link" href="museum.html">Museums</a>
                            <a class="btn btn-link" href="search.html">Search</a>
                            <a class="btn btn-link" href="gardens.html">Gardens</a>

                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">GET OUTSIDE</a>, All Right Reserved.

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="">Cookies</a>
                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
        // Handle Star Ratings
        document.querySelectorAll('.star').forEach(star => {
            star.addEventListener('click', (e) => {
                const hotelId = e.target.closest('.stars').getAttribute('data-hotel');
                const rating = e.target.getAttribute('data-value');
                const ratingDisplay = document.getElementById('rating-' + hotelId);

                // Update stars color
                const stars = e.target.closest('.stars').querySelectorAll('.star');
                stars.forEach(star => {
                    star.style.color = star.getAttribute('data-value') <= rating ? '#ffcc00' : '#ccc';
                });

                // Update rating value
                ratingDisplay.textContent = rating;
            });
        });
    </script>



    <!-- Room End -->

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