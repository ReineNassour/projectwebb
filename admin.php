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
<?php
include 'adminheader.php';
?>

<?php
include 'db.php';
$sql = "SELECT* FROM location";
$result = $conn->query($sql);
?>

<div class="container mt-3">
    <h2>Manage Places</h2>

    <table class="table" border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tr>

            <?php
            while ($row = $result->fetch_assoc()) {
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

                <td>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                            <img class="img-fluid" src="<?php echo $row['image'] ?>" alt="">
                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo $row['price']; ?></small>
                            </div>
                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                <h5 class="mb-0"><?php echo $continentName;?>-<?php echo $countryName;?>-<?php echo $cityName;?>- <?php echo $row['Name'];?></h5>
                                    </h5>
                                    <div class="ps-2">
                                        <form method="post">
                                            <p>Rate location</p>
                                            <input type="number" name="rate" min="1" max="5" step="1"><br><br>
                                            <button type="submit" class="btn btn-sm btn-primary rounded py-2 px-4">Submit</button>
                                    </div>
                                    </form>
                                </div>
                                <p class="text-body mb-3"><?php echo $row['Description']; ?></p>
                                <div class="d-flex justify-content-between">
                                    <a href="fav.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-primary rounded py-2 px-4">Add to Favorite</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>

                <td>
                    <a href="update.php?id=<?= $row['ID'] ?>">UPDATE</a>||
                    <a href="delete.php?pid=<?= $row['ID'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>

        </tr>
    <?php
            }
    ?>

    </table>
</div>


</body>

</html>
</body>
</html>