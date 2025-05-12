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
</head>

<body>
    <div class="container-xxl bg-white p-0">


        <?php include "header.php" ?>


        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Favorites</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">Favorites</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Page Header End -->


        <div class="container mt-3">
            <div class="row g-4">
            <?php
            include "db.php";
            if (isset($_SESSION['user'])) {
                $userID = $_SESSION['user']['id'];
                $sql = "SELECT * FROM FAVOURITE WHERE USER_ID = $userID";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $locID = $row['LOC_ID'];
                    $sql2 = "SELECT * FROM LOCATION WHERE ID = $locID";
                    $result2 = $conn->query($sql2)->fetch_assoc();
                    $cityID = $result2['CITY_ID'];
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
                                <img class="img-fluid" src="<?php echo $result2['image'] ?>" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo $result2['price']; ?></small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?php echo $continentName; ?>-<?php echo $countryName; ?>-<?php echo $cityName; ?>- <?php echo $result2['Name']; ?></h5>

                                    </h5>
                                    <div class="ps-2">
                                        <form method="post">
                                            <p>Rate location</p>
                                            <input type="number" name="rate" min="1" max="5" step="1"><br><br>
                                            <input type="hidden" name="location_id" value="<?php echo $result2['ID']; ?>">
                                            <button type="submit" class="btn btn-sm btn-primary rounded py-2 px-4">Submit</button>
                                        </form>
                                    </div>
                                </div>
                                <p class="text-body mb-3"><?php echo $result2['Description']; ?></p>
                            </div>
                        </div>
                    </div>
            <?php   }
            } else {
                header("Location: index.php");
            }
            ?>
</div>
        </div>
        <?php include "feedback.php";
        include "footer.php"; ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>