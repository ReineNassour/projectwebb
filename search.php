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

        .login-box {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 440px;
            height: 480px;
            padding: 30px;
            background: blue;
            z-index: 1;
        }

        .login-header {
            text-align: center;
            margin: 20px 0 40px 0;
        }

        .login-header header {
            color: #333;
            font-size: 30px;
            font-weight: 600;
        }

        .input-box .input-field {
            width: 100%;
            height: 60px;
            font-size: 17px;
            padding: 0 25px;
            margin-bottom: 15px;
            border-radius: 30px;
            border: none;
            box-shadow: 0px 5px 10px 1px rgba(0, 0, 0, 0.05);
            outline: none;
            transition: .3s;
        }

        ::placeholder {
            font-weight: 500;
            color: #222;
        }

        .input-field:focus {
            width: 105%;
        }

        .forgot {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }

        section {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: #555;
        }

        #check {
            margin-right: 10px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        section a {
            color: #555;
        }

        .input-submit {
            position: relative;
        }

        .submit-btn {
            width: 100%;
            height: 60px;
            background: #222;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: .3s;
        }

        .input-submit label {
            position: absolute;
            top: 45%;
            left: 50%;
            color: #fff;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #000;
            transform: scale(1.05, 1);
        }

        .sign-up-link {
            text-align: center;
            font-size: 15px;
            margin-top: 20px;
        }

        .sign-up-link a {
            color: #000;
            font-weight: 600;
        }

        .red {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">

        <?php include "header.php" ?>

        <!-- Page Header Start -->
        <div class="container-fluid page-header mb-5 p-0" style="background-image: url(img/carousel-1.jpg);">
            <div class="container-fluid page-header-inner py-5">
                <div class="container text-center pb-5">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">SEARCH</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>

                            <li class="breadcrumb-item text-white active" aria-current="page">SEARCH</li>
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
                                <h1>Discover More and More !!!!</h1>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Booking End -->

        <div>
            <div class="d-flex justify-content-center align-items-center pb-5">
                <div class="container">
                    <div class="selection-boxes">
                        <h2 class="text-center">Search For Locations</h2>
                            <div class="input-box">
                                <select id="continent" name="continent" class="input-field" onchange="getCountries()">
                                    <?php
                                    include "db.php";
                                    $sql = "SELECT * FROM Continent;";
                                    $res = $conn->query($sql);
                                    while ($row = $res->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="input-box">
                                <select id="country" name="country" class="input-field" onchange="getCities()">
                                </select>
                            </div>

                            <div class="input-box">
                                <select id="city" name="city" class="input-field">
                                </select>
                            </div>

                            <div class="input-submit">
                                <button type="button" class="submit-btn" onclick="getLocations()">Search</button>
                                <label for="submit">Search</label>
                            </div><br><br>

                        <div id="location" class=" row g-4">
                                  
                        </div>

                    </div>
                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>



    
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
    <script>
        getCountries();

        function getCountries() {
            let ContinentID = document.getElementById('continent').value;
            $(document).ready(function() {
                $.ajax({
                    data: {
                        ContinentID: ContinentID,
                    },
                    url: 'getCountries.php',
                    method: 'POST',
                    success: function(response) {
                        $('#country').html(response);
                        getCities();
                    }
                });
            });
        }

        function getCities() {
            let countryID = document.getElementById('country').value;
            $(document).ready(function() {
                $.ajax({
                    data: {
                        countryID: countryID,
                    },
                    url: 'getCities.php',
                    method: 'POST',
                    success: function(response) {
                        $('#city').html(response);
                    }
                });
            });
        }

        function getLocations() {
            let cityID = document.getElementById("city").value;
            $(document).ready(function() {
                $.ajax({
                    data: {
                        cityID: cityID,
                    },
                    url: 'getLocations.php',
                    method: 'POST',
                    success: function(response) {
                        $('#location').html(response);
                    }
                });
            });
        }
    </script>

</body>

</html>